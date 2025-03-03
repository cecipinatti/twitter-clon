<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// php artisan make:migration create_replies_table
// php artisan migrate (ejecutar)

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //
            $table->text('message');

            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('tweet_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tweet_id')->references('id')->on('tweets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
