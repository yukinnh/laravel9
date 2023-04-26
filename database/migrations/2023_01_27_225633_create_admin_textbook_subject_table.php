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
        Schema::create('admin_textbook_subject', function (Blueprint $table) {
            // カラムを追加
            $table->unsignedBigInteger('admin_textbook_id');
            $table->unsignedBigInteger('subject_id');
            // 複合主キーを定義
            $table->primary(['admin_textbook_id','subject_id']);
            // 指定したカラムに外部キー制約を定義
            $table->foreign('admin_textbook_id')->references('id')->on('admin_textbooks')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_textbook_subject');
    }
};
