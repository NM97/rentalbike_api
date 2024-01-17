<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeBikes extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_bikes', function($table)
        {
            $table->string('name', 191)->default('null')->change();
            $table->string('slug', 191)->default('null')->change();
            $table->text('description')->default('null')->change();
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_bikes', function($table)
        {
            $table->string('name', 191)->default('NULL')->change();
            $table->string('slug', 191)->default('NULL')->change();
            $table->text('description')->default('NULL')->change();
            $table->timestamp('created_at')->nullable()->default('NULL');
            $table->timestamp('updated_at')->nullable()->default('NULL');
        });
    }
}
