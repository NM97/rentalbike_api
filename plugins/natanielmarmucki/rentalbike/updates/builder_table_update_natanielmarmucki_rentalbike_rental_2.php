<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeRental2 extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_rental', function($table)
        {
            $table->integer('reservation_id');
            $table->integer('user_id');
            $table->double('price', 10, 0);
            $table->boolean('returned');
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_rental', function($table)
        {
            $table->dropColumn('reservation_id');
            $table->dropColumn('user_id');
            $table->dropColumn('price');
            $table->dropColumn('returned');
        });
    }
}
