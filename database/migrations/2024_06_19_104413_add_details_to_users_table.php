<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->nullable()->after('email');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('age');
            $table->string('caste')->nullable()->after('gender');
            $table->text('address')->nullable()->after('caste');
            $table->string('profile_picture')->nullable()->after('address');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('age');
            $table->dropColumn('gender');
            $table->dropColumn('caste');
            $table->dropColumn('address');
            $table->dropColumn('profile_picture');
        });
    }
};
