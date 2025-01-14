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
        Schema::create('benefits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id', 'benefits_employee_id_foreign')->references('id')->on('employees')->onDelete('cascade');
            $table->string('registration_number')->nullable();
            $table->string('social_security_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('benefits', function(Blueprint $table){
            $table->dropForeign('benefits_employee_id_foreign');
            });
            Schema::dropIfExists('benefits');
    }
};
