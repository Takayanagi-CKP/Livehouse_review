<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->increments('id', 11)->comment('主キー');
            $table->integer('livehouse_id')->comment('ライブハウスID');
            $table->string('user_name')->comment('ユーザーネーム');
            $table->float('points', 11)->nullable()->comment('評価');
            $table->text('title')->comment('レビュータイトル');
            $table->text('comments')->comment('コメント');
            $table->integer('user_type')->comment('ユーザー種別 0:お客さん, 1:出演者, 2:その他');
            $table->integer('comments_like')->comment('コメントのいいね');
            $table->integer('official_flg')->nullable()->comment('公式ユーザーフラグ');
            $table->dateTime('regist_date')->comment('登録日時');
            $table->dateTime('update_time')->comment('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review');
    }
}
