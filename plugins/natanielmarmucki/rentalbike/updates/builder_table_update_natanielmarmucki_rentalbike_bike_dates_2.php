<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeBikeDates2 extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_bike_dates', function($table)
        {
            $table->renameColumn('date_id', 'reservations_id');
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_bike_dates', function($table)
        {
            $table->renameColumn('reservations_id', 'date_id');
        });
    }
}
