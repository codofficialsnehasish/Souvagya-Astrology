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
            $table->dropColumn('certificate');

            $table->string('pan_card_number')->after('aadhaar_back_side')->nullable();
            $table->string('pan_card_proof')->after('pan_card_number')->nullable();

            $table->string('alternate_contact_number')->after('phone_verified_at')->nullable();
            $table->enum('gender',['Male', 'Female'])->after('pan_card_proof')->nullable();
            $table->date('date_of_birth')->after('gender')->nullable();
            $table->string('blood_group')->after('date_of_birth')->nullable();
            $table->string('nationality')->after('blood_group')->nullable();
            $table->string('religion')->after('nationality')->nullable();
            $table->string('marital_status')->after('religion')->nullable();

            $table->string('present_country')->after('marital_status')->nullable();
            $table->string('present_state')->after('present_country')->nullable();
            $table->string('present_city')->after('present_state')->nullable();
            $table->string('present_pin_code')->after('present_city')->nullable();
            $table->string('present_address')->after('present_pin_code')->nullable();

            $table->string('permanent_country')->after('present_address')->nullable();
            $table->string('permanent_state')->after('permanent_country')->nullable();
            $table->string('permanent_city')->after('permanent_state')->nullable();
            $table->string('permanent_pin_code')->after('permanent_city')->nullable();
            $table->string('permanent_address')->after('permanent_pin_code')->nullable();

            $table->string('bank_ac_number')->after('permanent_address')->nullable();
            $table->string('bank_name')->after('bank_ac_number')->nullable();
            $table->string('ifsc_code')->after('bank_name')->nullable();
            $table->string('passbook_image')->after('ifsc_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('certificate')->after('aadhaar_back_side')->nullable();

            $table->dropColumn([
                'pan_card_number',
                'pan_card_proof',
                'alternate_contact_number',
                'gender',
                'date_of_birth',
                'blood_group',
                'nationality',
                'religion',
                'marital_status',
                'present_country',
                'present_state',
                'present_city',
                'present_pin_code',
                'present_address',
                'permanent_country',
                'permanent_state',
                'permanent_city',
                'permanent_pin_code',
                'permanent_address',
                'bank_ac_number',
                'bank_name',
                'ifsc_code',
                'passbook_image'
            ]);
        });
    }
};
