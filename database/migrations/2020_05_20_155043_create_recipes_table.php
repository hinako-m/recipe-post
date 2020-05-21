<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('title', 30);
            $table->string('cooking_time');
            $table->string('cookware');
            $table->string('material');
            $table->string('amount');
            $table->string('memo');  
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    
            

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
