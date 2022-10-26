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
        Schema::create('unprocessed_gradings', function (Blueprint $table) {
            $table->id();

            $table->string('specimen/bag');
            $table->string('grade');
            $table->string('weight');
            $table->string('size');
            $table->string('picture')->nullable();
            $table->string('qr_code')->nullable();

            $table->unsignedBigInteger('mine_id')->nullable();
            $table->foreign('mine_id')->references('id')->on('mines');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('store_id')->nullable();
            $table->foreign('store_id')->references('id')->on('stores');

            $table->boolean('status')->default(0)->nullable();

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
        Schema::dropIfExists('unprocessed_gradings');
    }
};
