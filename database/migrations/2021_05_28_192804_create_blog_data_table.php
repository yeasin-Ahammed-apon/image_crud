<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_data', function (Blueprint $table) {
            $table->id();
            $table->string('titel',50);
            $table->string('img');
            $table->string('dis',500);
            $table->timestamps();
        });
       
    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_data');
    }
}
