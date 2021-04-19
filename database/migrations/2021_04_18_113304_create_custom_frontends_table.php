<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomFrontendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_frontends', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('mockup_image')->nullable();
            $table->string('hire_me_image')->nullable();
            $table->string('testimonial_image')->nullable();
            $table->string('get_in_touch_image')->nullable();
            $table->string('addedby');
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
        Schema::dropIfExists('custom_frontends');
    }
}
