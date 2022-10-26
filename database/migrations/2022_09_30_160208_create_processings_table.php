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
        Schema::create('processings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('unprocessed_grading_id')->nullable();
            $table->foreign('unprocessed_grading_id')->references('id')->on('unprocessed_gradings');

            $table->unsignedBigInteger('first_storage_id')->nullable();
            $table->foreign('first_storage_id')->references('id')->on('first_storages');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('workshop_id')->nullable();
            $table->foreign('workshop_id')->references('id')->on('workshops');

            $table->boolean('status')->default(0)->nullable();


            $table->text('description')->nullable();

            // 'unprocessed_grading_id',
            // 'first_storage_id',
            // 'user_id',
            // 'store_id',
            // 'description',

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
        Schema::dropIfExists('processings');
    }
};
