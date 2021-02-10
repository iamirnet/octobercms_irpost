<?php

namespace iAmirNet\IRPost\Models;

class IRPost
{
    use Methods\Variables, Methods\Shipping;
    public function __construct()
    {
        //$this->shipping = \Session::get('shipping') ? : [];
        $this->tax_rate = IRPostSettings::get('irpost_tax_rate');
        $this->id_price = IRPostSettings::get('irpost_id_price');
        $this->fine_price = IRPostSettings::get('irpost_fine_price');
        $this->ads_price = IRPostSettings::get('irpost_ads_price');
        $this->insurance_price = IRPostSettings::get('irpost_insurance_price');
        $this->packaging_price = IRPostSettings::get('irpost_packaging_price');

    }
}
