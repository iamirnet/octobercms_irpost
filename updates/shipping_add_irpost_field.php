<?php namespace iAmirNet\IRPost\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class ShippingAddIRPostField extends Migration
{
    public function up()
    {
        if (Schema::hasColumns('azarinweb_minimall_shipping_methods', ['irpost_type','irpost_free'])) {
            return;
        }

        Schema::table('azarinweb_minimall_shipping_methods', function($table)
        {
            $table->string('irpost_type', 191)->after('price_includes_tax')->nullable();
            $table->string('irpost_free', 191)->after('irpost_type')->nullable();
        });
    }

    public function down()
    {
        if (Schema::hasTable('azarinweb_minimall_shipping_methods')) {
            Schema::table('azarinweb_minimall_shipping_methods', function ($table) {
                $table->dropColumn(['irpost_type']);
                $table->dropColumn(['irpost_free']);
            });
        }
    }
}
