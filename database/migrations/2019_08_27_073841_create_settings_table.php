<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name');
            $table->string('logo');
            $table->string('phone');
            $table->string('email');
            $table->string('loaction');
            $table->string('facebook_url');
            $table->string('twitter_url');
            $table->string('instagram_url');
            $table->string('stock_threshold')->nullable();
            $table->text('about_us');
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
        Schema::dropIfExists('settings');
    }
}
