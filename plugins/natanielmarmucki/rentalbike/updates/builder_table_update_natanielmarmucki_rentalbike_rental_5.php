<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeRental5 extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_rental', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('reservation_id')->nullable()->change();
            $table->integer('user_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_rental', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->integer('reservation_id')->nullable(false)->change();
            $table->integer('user_id')->nullable(false)->change();
        });
    }
}
