<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeBikeReservations extends Migration
{
    public function up()
    {
        Schema::rename('natanielmarmucki_rentalbike_bike_dates', 'natanielmarmucki_rentalbike_bike_reservations');
        Schema::table('natanielmarmucki_rentalbike_bike_reservations', function($table)
        {
            $table->renameColumn('reservations_id', 'reservation_id');
        });
    }
    
    public function down()
    {
        Schema::rename('natanielmarmucki_rentalbike_bike_reservations', 'natanielmarmucki_rentalbike_bike_dates');
        Schema::table('natanielmarmucki_rentalbike_bike_dates', function($table)
        {
            $table->renameColumn('reservation_id', 'reservations_id');
        });
    }
}
