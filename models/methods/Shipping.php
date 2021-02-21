<?php

namespace iAmirNet\IRPost\Models\Methods;

use Azarinweb\Location\Models\State as StateModel;
use iAmirNet\IRPost\Models\City as CityModel;

trait Shipping
{
    public function getAmount($state, $city, $weight, $method)
    {
        $state = StateModel::where('name', $state ? : 'تهران')->first();
        if ($state) {
            $city = $state->cities->where('name', $city)->first() ? : $state->cities->first();
            if ($city) {
                if ($method == 'smart')
                    $method = $weight < 5000 ? 'custom' : 'pishtaz';
                $type = 500;
                if ($weight <= 1000 && $weight > 500) $type = 1000;
                if ($weight <= 2000 && $weight > 1000) $type = 2000;
                if ($weight > 2000) $type = 'up';
                $post_price = ($method == 'pishtaz'? $city->irpostPishtaz(null, $type) : $city->irpostCustom(null, $type));
                if($type == 'up' && $post_price){
                    $post_price_last = ($method == 'pishtaz'? $city->irpostPishtaz(null, 2000) : $city->irpostCustom(null, 2000));
                    $post_price = $post_price ? $post_price->integer: 0;
                    $post_price_last = $post_price_last ? $post_price_last->integer: 0;
                    $post_total = $post_price_last + ((ceil(($weight - 2000) / 1000)) * $post_price);
                }else
                    $post_total = $post_price ? $post_price->integer : 0;
            }else
                $post_total = 0;
            $extra = ((int)$this->id_price + (int)$this->fine_price + (int)$this->ads_price + (int)$this->insurance_price) * 100;
            if ($this->tax_rate) $extra += (($post_total + $extra) * $this->tax_rate) / 100;
            $total = $post_total + $extra + ($this->packaging_price  * 100);
            return ceil($total / 100000) * 100000;
        }
        return 0;
    }

    public function getShippingMethod()
    {
        return $this->shipping['method'];
    }

    public function procShipping($totals, $method)
    {
        $variables = [
            $totals->getInput()->shipping_state_name,
            $totals->getInput()->shipping_city_name,
            $totals->weightTotal()
        ];
        if ($method->irpost_type) $this->shipping['method'] = $method->irpost_type;
        if (isset($this->shipping['method']) && in_array($this->shipping['method'], ['smart','pishtaz', 'custom', 'pleasant']) && $totals->weightTotal()) {
            $variables[] = $this->getShippingMethod();
            if ($method->irpost_free && $method->irpost_free * 10 < $totals->productPostTaxes()) {
                $price = 0;
                $this->shipping['free'] = true;
            } elseif (isset($this->shipping['price']) && $this->shipping['price'] && isset($this->shipping['hash']) && $this->shipping['hash'] == md5(serialize($variables))) {
                $price = $this->shipping['price'];
                $this->shipping['free'] = false;
            } else {
                $price = $this->getAmount(...$variables);
                $this->shipping['price'] = $price;
                $this->shipping['hash'] = md5(serialize($variables));
                $this->shipping['free'] = false;
            }
        } else {
            $price = $method->price()->integer;
            $this->shipping = ['method' => 'none', 'price' => $price, 'free' => false];
        }
        //\Session::put('shipping', $this->shipping);
        return $price;
    }

    public static function _procShipping($totals, $method)
    {
        return (new self())->procShipping($totals, $method);
    }
}
