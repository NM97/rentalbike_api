<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeTodo extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_todo', function($table)
        {
            $table->boolean('status');
            $table->timestamp('created_at')->default(null)->change();
            $table->timestamp('updated_at')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_todo', function($table)
        {
            $table->dropColumn('status');
            $table->timestamp('created_at')->default('NULL')->change();
            $table->timestamp('updated_at')->default('NULL')->change();
        });
    }
}
