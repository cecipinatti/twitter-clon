<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// php artisan make:migration add_used_id_field_to_tweets_table
// php artisan migrate (ejecutar)

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->integer('user_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->dropColumn('user_id');
        });
    }
};
