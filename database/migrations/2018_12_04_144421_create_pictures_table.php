<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename', '80')->comment('文件名');
            $table->string('storename', '80')->comment('存储文件名');
            $table->integer('width')->unsigned()->comment('宽度');
            $table->integer('height')->unsigned()->comment('高度');
            $table->integer('size')->unsigned()->comment('文件大小');
            $table->string('path', '150')->comment('文件路径');
            $table->string('hash', '32')->comment('hash');
            $table->string('url', '300')->comment('链接');
            $table->string('delete', '300')->comment('删除链接');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pictures');
    }
}
