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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->text('address');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id', 'addresses_employee_id_foreign')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'addresses_user_id_foreign')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('country')->nullable();
            $table->foreign('country', 'addresses_country_foreign')->references('id')->on('countries')->onDelete('set NULL');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->foreign('province_id', 'addresses_province_id_foreign')->references('id')->on('provinces')->onDelete('set NULL');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id','addresses_city_id_foreign')->references('id')->on('cities')->onDelete('set NULL');
            $table->string('zip_code')->nullable();
            $table->string('family_code')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign('addresses_employee_id_foreign');
            $table->dropForeign('addresses_user_id_foreign');
            $table->dropForeign('addresses_country_foreign');
            $table->dropForeign('addresses_province_id_foreign');
            $table->dropForeign('addresses_city_id_foreign');
        });
        Schema::dropIfExists('addresses');

    }
};
