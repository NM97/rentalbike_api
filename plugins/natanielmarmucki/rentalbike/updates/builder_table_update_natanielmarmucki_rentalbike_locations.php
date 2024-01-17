<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeLocations extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_locations', function($table)
        {
            $table->text('description');
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_locations', function($table)
        {
            $table->dropColumn('description');
        });
    }
}
