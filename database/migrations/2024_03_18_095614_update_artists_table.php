<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('artists', function (Blueprint $table) {

            $table->string('country_of_death', 100)->nullable();

        });

    }

    public function down(): void
    {
        Schema::table('artists', function (Blueprint $table) {
            $table->string('country_of_death', 100)->nullable();
        });
    }
};
