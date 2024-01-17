<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteNatanielmarmuckiRentalbikeRental extends Migration
{
    public function up()
    {
        Schema::dropIfExists('natanielmarmucki_rentalbike_rental');
    }
    
    public function down()
    {
        Schema::create('natanielmarmucki_rentalbike_rental', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->dateTime('pickup');
            $table->dateTime('drop_off');
            $table->integer('reservation_id')->nullable()->default(NULL);
            $table->integer('user_id')->nullable()->default(NULL);
            $table->double('price', 10, 0);
            $table->boolean('returned');
            $table->timestamp('created_at')->nullable()->default('NULL');
            $table->timestamp('updated_at')->nullable()->default('NULL');
        });
    }
}
