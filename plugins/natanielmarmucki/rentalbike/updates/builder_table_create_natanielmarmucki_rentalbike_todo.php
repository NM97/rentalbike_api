<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNatanielmarmuckiRentalbikeTodo extends Migration
{
    public function up()
    {
        Schema::create('natanielmarmucki_rentalbike_todo', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('iduser');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('natanielmarmucki_rentalbike_todo');
    }
}
