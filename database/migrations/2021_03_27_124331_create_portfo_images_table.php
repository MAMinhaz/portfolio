<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfo_images', function (Blueprint $table) {
            $table->id();
            $table->integer('portfo_id');
            $table->string('thumbnail_image')->default('thumbnail_image_default');
            $table->string('portfo_image')->default('portfo_image_default');
            $table->integer('addedby');
            $table->softDeletes();
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
        Schema::dropIfExists('portfo_images');
    }
}
