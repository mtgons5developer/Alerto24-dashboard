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
        Schema::create('video_url', function (Blueprint $table) {
            $table->id();
            $table->integer('task_id')->nullable();
            $table->text('videoUrl')->nullable();
            $table->text('thumbnail')->nullable();
            $table->integer('status')->default('1')->comment('0-deactive,1-active');
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
        Schema::dropIfExists('video_url');
    }
};
