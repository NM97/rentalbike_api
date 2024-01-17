<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeReservations extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_reservations', function($table)
        {
            $table->double('price', 10, 0);
            $table->boolean(' returned');
            $table->timestamp('created_at')->default(null)->change();
            $table->timestamp('updated_at')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_reservations', function($table)
        {
            $table->dropColumn('price');
            $table->dropColumn(' returned');
            $table->timestamp('created_at')->default('NULL')->change();
            $table->timestamp('updated_at')->default('NULL')->change();
        });
    }
}
