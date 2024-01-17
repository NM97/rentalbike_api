<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteNatanielmarmuckiRentalbikeReservationsRental extends Migration
{
    public function up()
    {
        Schema::dropIfExists('natanielmarmucki_rentalbike_reservations_rental');
    }
    
    public function down()
    {
        Schema::create('natanielmarmucki_rentalbike_reservations_rental', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('rental_id');
            $table->integer('reservation_id');
        });
    }
}
