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
        Schema::create('first_storages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('unprocessed_grading_id')->nullable();
            $table->foreign('unprocessed_grading_id')->references('id')->on('unprocessed_gradings');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('store_id')->nullable();
            $table->foreign('store_id')->references('id')->on('stores');

            $table->boolean('status')->default(0)->nullable();

            $table->text('description')->nullable();
            
            $table->timestamps();
        });
    }
// php artisan migrate --path=/database/migrations/fileName.php

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('first_storages');
    }
};
