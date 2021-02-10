<?php


namespace iAmirNet\IRPost\Models;

use Model;

class IRPostSettings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'iamirnet_shipping_settings';
    public $settingsFields = '$/iamirnet/irpost/models/settings/fields_irpost.yaml';
}