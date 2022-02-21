<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todoables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('todos_id');
            $table->bigInteger('todoable_id');
            $table->string('todoable_type');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('todoables');
    }
}
