<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeRental extends Migration
{
    public function up()
    {
        Schema::rename('natanielmarmucki_rentalbike_dates', 'natanielmarmucki_rentalbike_rental');
    }
    
    public function down()
    {
        Schema::rename('natanielmarmucki_rentalbike_rental', 'natanielmarmucki_rentalbike_dates');
    }
}
