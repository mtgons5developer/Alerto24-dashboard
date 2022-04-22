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
        Schema::create('admin_notification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('adminID')->nullable();
            $table->unsignedBigInteger('userID')->nullable();
            $table->unsignedBigInteger('categoryID')->nullable();
            $table->text('message');
            $table->integer('status')->default('0')->comment('0-pending,1-accept,2-reject');
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
        Schema::dropIfExists('admin_notification');
    }
};
