<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNatanielmarmuckiRentalbike extends Migration
{
    public function up()
    {
        Schema::create('natanielmarmucki_rentalbike_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('type_id');
            $table->integer('bike_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('natanielmarmucki_rentalbike_');
    }
}
