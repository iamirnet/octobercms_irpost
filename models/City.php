<?php
namespace iAmirNet\IRPost\Models;

use Azarinweb\Minimall\Classes\Traits\PriceAccessors;
use Azarinweb\Minimall\Models\Currency;
use Azarinweb\Minimall\Models\Price;
use Form;
use Illuminate\Support\Facades\Session;
use Model;
use Closure;

/**
 * State Model
 */
class City extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use PriceAccessors {
        priceRelation as priceAccessorPriceRelation;
    }

    const MORPH_KEY = 'iamirnet.city';

    public $table = 'iamirnet_location_cities';

    public $implement = ['@Azarinweb.Translate.Behaviors.TranslatableModel'];

    public $translatable = ['name'];

    protected $guarded = ['*'];

    protected $fillable = ['name', 'code'];

    public $rules = [
        'name' => 'required',
        'code' => 'required',
    ];

    public $belongsTo = [
        'state' => ['Azarinweb\Location\Models\State']
    ];

    public $morphMany = [
        'irpost_pishtaz500' => [
            Price::class,
            'name'       => 'priceable',
            'conditions' => 'price_category_id is null and field = "irpost_pishtaz500"',
        ],
        'irpost_pishtaz1000' => [
            Price::class,
            'name'       => 'priceable',
            'conditions' => 'price_category_id is null and field = "irpost_pishtaz1000"',
        ],
        'irpost_pishtaz2000' => [
            Price::class,
            'name'       => 'priceable',
            'conditions' => 'price_category_id is null and field = "irpost_pishtaz2000"',
        ],
        'irpost_pishtazup' => [
            Price::class,
            'name'       => 'priceable',
            'conditions' => 'price_category_id is null and field = "irpost_pishtazup"',
        ],
        'irpost_custom500' => [
            Price::class,
            'name'       => 'priceable',
            'conditions' => 'price_category_id is null and field = "irpost_custom500"',
        ],
        'irpost_custom1000' => [
            Price::class,
            'name'       => 'priceable',
            'conditions' => 'price_category_id is null and field = "irpost_custom1000"',
        ],
        'irpost_custom2000' => [
            Price::class,
            'name'       => 'priceable',
            'conditions' => 'price_category_id is null and field = "irpost_custom2000"',
        ],
        'irpost_customup' => [
            Price::class,
            'name'       => 'priceable',
            'conditions' => 'price_category_id is null and field = "irpost_customup"',
        ],
    ];

    public $timestamps = false;

    protected static $nameList = [];

    public static function getNameList($stateId)
    {
        if (isset(self::$nameList[$stateId])) {
            return self::$nameList[$stateId];
        }

        return self::$nameList[$stateId] = self::whereStateId($stateId)->orderBy('name', 'asc')->lists('name', 'id');
    }

    public static function formSelect($name, $stateId = null, $selectedValue = null, $options = [])
    {
        return Form::select($name, self::getNameList($stateId), $selectedValue, $options);
    }

    public static function getDefault()
    {
        return ($defaultId = Setting::get('default_city'))
            ? static::find($defaultId)
            : null;
    }

    public function irpostPishtaz($currency = null, $type = 500)
    {
        return $this->price($currency, 'irpost_pishtaz' . $type);
    }

    public function irpostCustom($currency = null, $type = 500)
    {
        return $this->price($currency, 'irpost_custom' . $type);
    }

    public function getIrpostPishtaz500Attribute()
    {
        return $this->irpostPishtaz(null,500);
    }

    public function getIrpostPishtaz1000Attribute()
    {
        return $this->irpostPishtaz(null,1000);
    }

    public function getIrpostPishtaz2000Attribute()
    {
        return $this->irpostPishtaz(null,2000);
    }

    public function getIrpostPishtazupAttribute()
    {
        return $this->irpostPishtaz(null,'up');
    }

    public function getIrpostCustom500Attribute()
    {
        return $this->irpostCustom(null,500);
    }

    public function getIrpostCustom1000Attribute()
    {
        return $this->irpostCustom(null,1000);
    }

    public function getIrpostCustom2000Attribute()
    {
        return $this->irpostCustom(null,2000);
    }

    public function getIrpostCustomupAttribute()
    {
        return $this->irpostCustom(null,'up');
    }

    protected function priceRelation(
        $currency = null,
        $relation = 'prices',
        ?Closure $filter = null
    ) {
        $currency = Currency::resolve($currency);
        $query = Price::where('priceable_id' , $this->id)->where('field' , $relation)->where('currency_id', $currency->id);
        $price = $query->first();
        return $price;
    }


    public function afterDelete()
    {
        \DB::table('azarinweb_minimall_prices')
            ->where('priceable_type', self::MORPH_KEY)
            ->where('priceable_id', $this->id)
            ->delete();
    }

    public function afterSave()
    {
        foreach ([500, 1000,2000, 'up'] as $type) {
            $this->updatePrices($this, 'irpost_pishtaz' . $type, '_irpost_pishtaz' . $type);
            $this->updatePrices($this, 'irpost_custom' . $type, '_irpost_custom' . $type);
        }
    }

    protected function updatePrices($model, $field = null, $key = '_prices')
    {
        $data = post('MallPrice', []);
        foreach ($data as $currency => $_data) {
            $value = array_get($_data, $key);
            if ($value === '') {
                $value = null;
            }
            Price::updateOrCreate([
                'price_category_id' => null,
                'priceable_id'      => $model->id,
                'priceable_type'    => $model::MORPH_KEY,
                'currency_id'       => $currency,
                'field'             => $field,
            ], [
                'price' => $value,
            ]);
        }
    }
}
