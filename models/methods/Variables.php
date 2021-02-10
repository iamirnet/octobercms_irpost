<?php

namespace iAmirNet\IRPost\Models\Methods;

trait Variables
{
    public $order = null;
    public $user = null;

    public $shipping = [];
    public $tax_rate = 0;
    public $id_price = 0;
    public $fine_price = 0;
    public $ads_price = 0;
    public $insurance_price = 0;
    public $packaging_price = 0;
}