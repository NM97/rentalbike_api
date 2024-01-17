<?php namespace NatanielMarmucki\Rentalbike\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiRentalbikeTodo2 extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_rentalbike_todo', function($table)
        {
            $table->timestamp('created_at')->default(null)->change();
            $table->timestamp('updated_at')->default(null)->change();
            $table->renameColumn('iduser', 'user_id');
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_rentalbike_todo', function($table)
        {
            $table->timestamp('created_at')->default('NULL')->change();
            $table->timestamp('updated_at')->default('NULL')->change();
            $table->renameColumn('user_id', 'iduser');
        });
    }
}
