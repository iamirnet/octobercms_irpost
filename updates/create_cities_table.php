<?php namespace iAmirNet\IRPost\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCitiesTable extends Migration
{

    public function up()
    {
        /*
         * The cities table was previously owned by Azarinweb.User
         * so this occurance is detected and the table renamed.
         * @deprecated Safe to remove if year >= 2017
         */
        if (Schema::hasTable('iamirnet_user_cities')) {
            Schema::rename('iamirnet_user_cities', 'iamirnet_location_cities');
            return;
        }
        if (!Schema::hasTable('iamirnet_location_cities'))
            Schema::create('iamirnet_location_cities', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->integer('state_id')->unsigned()->nullable()->index();
                $table->string('name')->index();
                $table->string('code')->nullable();
            });
    }

    public function down()
    {
        Schema::dropIfExists('iamirnet_location_cities');
    }

}
