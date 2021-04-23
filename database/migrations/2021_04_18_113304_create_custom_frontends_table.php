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
            $table->string('portfolio_logo')->default('portfolio_logo_default.png');
            $table->string('site_name')->nullable();
            $table->string('portfolio_theme')->default(1);
            $table->string('cv')->nullable();
            $table->string('mockup_image')->nullable()->default('mockup_default.png');
            $table->string('hire_me_image')->nullable()->default('hire_me_default.jpg');
            $table->string('testimonial_image')->nullable()->default('testimonial_default.jpg');
            $table->string('get_in_touch_image')->nullable()->default('get_in_touch_default.jpg');
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
