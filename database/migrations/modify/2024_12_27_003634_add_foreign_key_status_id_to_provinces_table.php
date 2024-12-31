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
        Schema::table('provinces', function (Blueprint $table) {
            
            $table->unsignedInteger('country')->nullable()->after('name');
            $table->foreign('country', 'provinces_country_foreign')->references('id')->on('countries')->onDelete('set NULL');

            $table->unsignedBigInteger('status_id')->nullable()->after('country');
            $table->foreign('status_id','provinces_status_id_foreign')->references('id')->on('constants')->onDelete('set NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('provinces', function (Blueprint $table) {
            $table->dropForeign('provinces_country_foreign');
            $table->dropColumn('country');
            $table->dropForeign('provinces_status_id_foreign');
            $table->dropColumn('status_id');

        });
    }
};
