<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNatanielmarmuckiRentalbikeBikeDates extends Migration
{
    public function up()
    {
        Schema::create('natanielmarmucki_rentalbike_bike_dates', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('bike_is');
            $table->integer('date_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('natanielmarmucki_rentalbike_bike_dates');
    }
}
