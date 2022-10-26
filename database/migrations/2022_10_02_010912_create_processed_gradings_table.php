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
        Schema::create('processed_gradings', function (Blueprint $table) {
            $table->id();

            $table->string('grade')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('weight')->nullable();
            $table->string('color')->nullable();
            $table->string('clarity')->nullable();
            $table->string('treatment')->nullable();
            $table->string('type')->nullable();
            $table->string('cut_shape')->nullable();
            $table->string('lab_certificate')->nullable();

            $table->string('picture')->nullable();
            
            $table->string('qr_code')->nullable();
            $table->boolean('lot_status')->default(0)->nullable();

            $table->boolean('status')->default(0)->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('processing_id')->nullable();
            $table->foreign('processing_id')->references('id')->on('processings');

            $table->timestamps();
        });
    }
// php artisan migrate:refresh --path=/database/migrations/fileName.php
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processed_gradings');
    }
};
