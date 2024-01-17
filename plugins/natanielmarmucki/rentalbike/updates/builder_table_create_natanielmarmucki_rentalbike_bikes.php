<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNatanielmarmuckiRentalbikeBikes extends Migration
{
    public function up()
    {
        Schema::create('natanielmarmucki_rentalbike_bikes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('natanielmarmucki_rentalbike_bikes');
    }
}
