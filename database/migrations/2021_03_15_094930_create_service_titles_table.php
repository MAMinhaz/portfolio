<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_titles', function (Blueprint $table) {
            $table->id();
            $table->string('service_title', 300);
            $table->string('service_list_1', 200)->nullable();
            $table->string('service_list_2', 200)->nullable();
            $table->string('service_list_3', 200)->nullable();
            $table->string('service_list_4', 200)->nullable();
            $table->string('service_list_5', 200)->nullable();
            $table->string('service_list_6', 200)->nullable();
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
        Schema::dropIfExists('service_titles');
    }
}
