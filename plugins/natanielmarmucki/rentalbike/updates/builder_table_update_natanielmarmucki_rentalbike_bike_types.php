<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeBikeTypes extends Migration
{
    public function up()
    {
        Schema::rename('natanielmarmucki_rentalbike_', 'natanielmarmucki_rentalbike_bike_types');
    }
    
    public function down()
    {
        Schema::rename('natanielmarmucki_rentalbike_bike_types', 'natanielmarmucki_rentalbike_');
    }
}
