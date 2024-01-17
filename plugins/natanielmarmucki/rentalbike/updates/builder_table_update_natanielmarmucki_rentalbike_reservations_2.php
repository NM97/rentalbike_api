<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeReservations2 extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_reservations', function($table)
        {
            $table->timestamp('created_at')->default(null)->change();
            $table->timestamp('updated_at')->default(null)->change();
            $table->dropColumn(' returned');
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_reservations', function($table)
        {
            $table->timestamp('created_at')->default('NULL')->change();
            $table->timestamp('updated_at')->default('NULL')->change();
            $table->boolean(' returned');
        });
    }
}
