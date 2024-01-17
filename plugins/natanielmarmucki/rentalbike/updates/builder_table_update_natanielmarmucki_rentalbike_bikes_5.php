<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeBikes5 extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_bikes', function($table)
        {
            $table->integer('type');
            $table->integer('mtype');
            $table->string('name', 191)->default(null)->change();
            $table->string('slug', 191)->default(null)->change();
            $table->text('description')->default(null)->change();
            $table->integer('price')->default(null)->change();
            $table->timestamp('created_at')->default(null)->change();
            $table->timestamp('updated_at')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_bikes', function($table)
        {
            $table->dropColumn('type');
            $table->dropColumn('mtype');
            $table->string('name', 191)->default('NULL')->change();
            $table->string('slug', 191)->default('NULL')->change();
            $table->text('description')->default('NULL')->change();
            $table->integer('price')->default(NULL)->change();
            $table->timestamp('created_at')->default('NULL')->change();
            $table->timestamp('updated_at')->default('NULL')->change();
        });
    }
}
