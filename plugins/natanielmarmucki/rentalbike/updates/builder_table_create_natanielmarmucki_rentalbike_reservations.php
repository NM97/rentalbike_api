<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNatanielmarmuckiRentalbikeReservations extends Migration
{
    public function up()
    {
        Schema::create('natanielmarmucki_rentalbike_reservations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->dateTime('pickup');
            $table->dateTime('dropoff');
            $table->integer('user_id');
            $table->integer('bike_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('natanielmarmucki_rentalbike_reservations');
    }
}
