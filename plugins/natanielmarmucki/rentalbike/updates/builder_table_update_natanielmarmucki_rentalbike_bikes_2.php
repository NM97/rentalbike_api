<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeBikes2 extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_bikes', function($table)
        {
            $table->integer('price')->nullable();
            $table->string('name', 191)->default('null')->change();
            $table->string('slug', 191)->default('null')->change();
            $table->text('description')->default('null')->change();
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_bikes', function($table)
        {
            $table->dropColumn('price');
            $table->string('name', 191)->default('\'null\'')->change();
            $table->string('slug', 191)->default('\'null\'')->change();
            $table->text('description')->default('NULL')->change();
        });
    }
}
