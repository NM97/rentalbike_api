<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeBikeDates extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_bike_dates', function($table)
        {
            $table->renameColumn('bike_is', 'bike_id');
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_bike_dates', function($table)
        {
            $table->renameColumn('bike_id', 'bike_is');
        });
    }
}
