<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_post', function (Blueprint $table) {
            // カラムを追加
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('block_id');
            // 複合主キーを定義
            $table->primary(['post_id','block_id']);
            // 指定したカラムに外部キー制約を定義
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('block_id')->references('id')->on('blocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('block_post');
    }
};
