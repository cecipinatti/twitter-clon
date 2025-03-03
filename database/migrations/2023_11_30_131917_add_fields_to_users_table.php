<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// php artisan make:migration add_fields_to_users_table
// php artisan migrate (ejecutar)

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('nick', 30)->unique()->nullable();
            $table->string('city', 30)->nullable();
            $table->string('country', 30)->nullable();
            $table->string('phone', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['nick', 'city', 'country', 'phone']);
        });
    }
};
