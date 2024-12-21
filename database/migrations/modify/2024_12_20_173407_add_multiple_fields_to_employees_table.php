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
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('reporting_manager_id')->nullable()->after('pension_amount');
            $table->boolean('allow_manual_attendance')->default(false)->after('reporting_manager_id');
            $table->unsignedBigInteger('religion_id')->nullable()->after('allow_manual_attendance');
            $table->unsignedBigInteger('country_id')->nullable()->after('religion_id');
            $table->unsignedBigInteger('city_id')->nullable()->after('country_id');
            $table->unsignedBigInteger('province_id')->nullable()->after('city_id');
            $table->unsignedBigInteger('station_id')->nullable()->after('province_id');
            $table->unsignedBigInteger('region_id')->nullable()->after('station_id');
            $table->unsignedBigInteger('gl_class_id')->nullable()->after('region_id');
            $table->unsignedBigInteger('sub_deparment_id')->nullable()->after('gl_class_id');
            $table->unsignedBigInteger('leaving_reason_id')->nullable()->after('sub_deparment_id');
            $table->enum('status',['active','inactive'])->default('active')->after('leaving_reason_id');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
};
