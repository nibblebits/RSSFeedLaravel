<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCategoryRssFeedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_category_rss_feed', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('news_category_id')->unsigned();
            $table->bigInteger('rss_feed_id')->unsigned();
            $table->foreign('news_category_id')->references('id')->on('news_categories');
            $table->foreign('rss_feed_id')->references('id')->on('rss_feeds');
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
        Schema::dropIfExists('news_category_rss_feed');
    }
}
