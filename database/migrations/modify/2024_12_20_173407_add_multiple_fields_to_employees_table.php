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
             // Drop the existing columns 
             // uncomment and run this after fetch all columns details from new columns.
            //  $table->dropForeign('employees_department_id_foreign');
            //  $table->dropForeign('employees_designation_id_foreign');
            //  $table->dropColumn([
            //     'joining_date',
            //     'exit_date',
            //     'marital_status',
            //     'address',
            //     'city',
            //     'state',
            //     'country',
            //     'zip_code',
            //     'department_id',
            //     'designation_id',
            // ]);
        // Add new columns
        $table->string('employee_code')->nullable()->after('id');
        $table->string('punch_code')->nullable()->after('employee_code');
        $table->string('cnic')->nullable()->after('contact_no');
        $table->date('cnic_issuance_date')->nullable()->after('cnic');
        $table->unsignedBigInteger('report_to_employee_id')->nullable()->after('cnic_issuance_date');
        $table->foreign('report_to_employee_id','employees_report_to_employee_id_foreign')->references('id')->on('employees')->onDelete('set NULL');
        $table->unsignedBigInteger('martial_status_id')->nullable()->after('contact_no');
        $table->foreign('marital_status_id','employees_martial_status_id_foreign')->references('id')->on('constants')->onDelete('set NULL');
        $table->unsignedBigInteger('gender_id')->nullable()->after('contact_no');
        $table->foreign('gender_id','employees_gender_id_foreign')->references('id')->on('constants')->onDelete('set NULL');
        $table->string('place_of_birth')->nullable()->after('contact_no');
        $table->unsignedBigInteger('religion_id')->nullable()->after('cnic_issuance_date');
        $table->foreign('religion_id')->references('id')->on('religions')->onDelete('set NULL');
        $table->unsignedBigInteger('employee_status_id')->nullable()->after('religion_id');
        $table->foreign('employee_status_id','employees_employee_status_id_foreign')->references('id')->on('constants')->onDelete('set NULL');
                       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
        
            // Drop the new columns
            $table->dropForeign('employees_report_to_employee_id_foreign');
            $table->dropForeign('employees_martial_status_id_foreign');
            $table->dropForeign('employees_gender_id_foreign');
            $table->dropForeign('employees_religion_id_foreign');
            $table->dropForeign('employees_employee_status_id_foreign');
    
            // Drop the new columns
            $table->dropColumn([
                'employee_code',
                'punch_code',
                'report_to_employee_id',
                'marital_status_id',
                'gender_id',
                'place_of_birth',
                'cnic',
                'cnic_issuance_date',
                'religion_id',
                'employee_status_id',
            ]);
            
            // Re-add the old columns (if you want to roll back)
            // uncomment and run this after fetch all columns details from new columns.
            
            // $table->date('joining_date')->nullable()->after('status_id');
            // $table->date('exit_date')->nullable()->after('joining_date');
            // $table->string('marital_status', 191)->nullable()->after('exit_date');
            // $table->text('address')->nullable()->after('marital_status');
            // $table->string('city', 64)->nullable()->after('address');
            // $table->string('state', 64)->nullable()->after('city');
            // $table->string('country', 64)->nullable()->after('state');
            // $table->string('zip_code', 24)->nullable()->after('country');
            // $table->unsignedBigInteger('department_id')->nullable()->after('company_id');
            // $table->unsignedBigInteger('designation_id')->nullable()->after('department_id');
            
            // $table->foreign('department_id', 'employees_department_id_foreign')->references('id')->on('departments')->onDelete('set NULL');
            // $table->foreign('designation_id', 'employees_designation_id_foreign')->references('id')->on('designations')->onDelete('set NULL');
        });
    }
};
