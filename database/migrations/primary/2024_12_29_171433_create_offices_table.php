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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('station_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->unsignedBigInteger('office_shift_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable(); // general status : Active , Inactive
            $table->unsignedBigInteger('cost_center_id')->nullable();
            $table->unsignedBigInteger('employee_status_id')->nullable(); // employee status: probation
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('gl_class_id')->nullable();
            $table->unsignedBigInteger('leaving_reason_id')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('confirmation_date')->nullable();
            $table->unsignedInteger('expected_confirmation_days')->nullable();
            $table->date('contract_start_date')->nullable();
            $table->date('contract_end_date')->nullable();
            $table->date('resign_date')->nullable();
            $table->date('leaving_date')->nullable();
            $table->string('password');

            $table->foreign('user_id', 'offices_user_id_foreign')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('employee_id', 'offices_employee_id_foreign')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('station_id', 'offices_station_id_foreign')->references('id')->on('stations')->onDelete('set NULL');
            $table->foreign('company_id','offices_company_id_foreign')->references('id')->on('companies')->onDelete('set NULL');
            $table->foreign('department_id', 'offices_department_id_foreign')->references('id')->on('departments')->onDelete('set NULL');
            $table->foreign('designation_id', 'offices_designation_id_foreign')->references('id')->on('designations')->onDelete('set NULL');
            $table->foreign('office_shift_id', 'offices_office_shift_id_foreign')->references('id')->on('office_shifts')->onDelete('set NULL');
            $table->foreign('status_id')->references('id')->on('constants')->onDelete('set NULL');
            $table->foreign('cost_center_id','offices_cost_center_id_foreign')->references('id')->on('constants')->onDelete('set NULL'); 
            $table->foreign('employee_status_id','offices_employee_status_id_foreign')->references('id')->on('constants')->onDelete('set NULL');
            $table->foreign('region_id', 'offices_region_id_foreign')->references('id')->on('regions')->onDelete('set NULL');
            $table->foreign('gl_class_id','offices_gl_class_id_foreign')->references('id')->on('constants')->onDelete('set NULL');
            $table->foreign('leaving_reason_id','offices_leaving_reason_id_foreign')->references('id')->on('constants')->onDelete('set NULL');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offices', function(Blueprint $table){
        $table->dropForeign('offices_user_id_foreign');
        $table->dropForeign('offices_employee_id_foreign');
        $table->dropForeign('offices_station_id_foreign');
        $table->dropForeign('offices_company_id_foreign');
        $table->dropForeign('offices_department_id_foreign');
        $table->dropForeign('offices_designation_id_foreign');
        $table->dropForeign('offices_office_shift_id_foreign');
        $table->dropForeign('offices_region_id_foreign');
        $table->dropForeign('offices_cost_center_id_foreign');
        $table->dropForeign('offices_employee_status_id_foreign');
        $table->dropForeign('offices_status_id_foreign');
        $table->dropForeign('offices_gl_class_id_foreign');
        $table->dropForeign('offices_leaving_reason_id_foreign');
        });
        Schema::dropIfExists('offices');

    }
};
