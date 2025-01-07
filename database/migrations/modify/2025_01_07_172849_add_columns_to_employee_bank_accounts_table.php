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
        Schema::table('employee_bank_accounts', function (Blueprint $table) {
            $table->dropColumn('bank_code');
            $table->string('branch_code')->nullable()->after('bank_branch');
            $table->string('short_name')->nullable()->after('bank_name');
            $table->string('swift_code')->nullable()->after('branch_code');
            $table->unsignedBigInteger('account_type_id')->nullable()->after('bank_name');
            $table->foreign('account_type_id', 'employee_bank_accounts_account_type_id_foreign')->references('id')->on('constants')->onDelete('cascade');
            $table->text('address')->nullable()->after('bank_branch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_bank_accounts', function (Blueprint $table) {
            $table->string('bank_code')->nullable()->after('bank_name');
            $table->dropColumn('branch_code');
            $table->dropColumn('short_name');
            $table->dropColumn('swift_code');
            $table->dropForeign('employee_bank_accounts_account_type_id_foreign');
            $table->dropColumn('account_type_id');
            $table->dropColumn('address');
        });
    }
};
