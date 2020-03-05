<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livehouse', function (Blueprint $table) {
            $table->increments('id')->comment('主キー');
            $table->string('livehouse_name', 255)->comment('ライブハウス名');
            $table->string('livehouse_short_name', 255)->nullable()->comment('一覧表示用のライブハウス名');
            $table->text('livehouse_detail')->comment('ライブハウス詳細');
            $table->string('genre', 255)->comment('ジャンル');
            $table->integer('area')->comment('地域エリアコード');
            $table->string('region', 255)->comment('都道府県');
            $table->string('city', 255)->nullable()->comment('都市名');
            $table->string('address')->comment('ライブハウス住所');
            $table->integer('capacity')->comment('収容人数');
            $table->string('tag1', 255)->comment('タグ1');
            $table->string('tag2', 255)->comment('タグ2');
            $table->string('tag3', 255)->comment('タグ3');
            $table->float('average_points', 11)->nullable()->comment('平均評価');
            $table->string('livehouse_url', 255)->comment('公式サイトURL');
            $table->string('livehouse_img', 255)->comment('画像パス');
            $table->integer('livehouse_like')->comment('ライブハウスのいいね');
            $table->string('keyword', 255)->comment('検索用キーワード');
            $table->integer('review_count')->nullable()->comment('レビュー数');
            $table->integer('player_review_count')->nullable()->comment('出演者のレビュー数');
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
        Schema::dropIfExists('livehouse');
    }
}
