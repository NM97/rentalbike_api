<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeBikes3 extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_bikes', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('name', 191)->default(null)->change();
            $table->string('slug', 191)->default(null)->change();
            $table->text('description')->default(null)->change();
            $table->integer('price')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_bikes', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->string('name', 191)->default('\'null\'')->change();
            $table->string('slug', 191)->default('\'null\'')->change();
            $table->text('description')->default('NULL')->change();
            $table->integer('price')->default(NULL)->change();
        });
    }
}
