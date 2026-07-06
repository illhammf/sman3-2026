<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppdb_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->string('full_name');
            $table->string('nickname')->nullable();
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->text('address');
            $table->string('rt_rw')->nullable();
            $table->string('village');
            $table->string('district');
            $table->string('city');
            $table->string('postal_code')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('previous_school');
            $table->text('previous_school_address')->nullable();
            $table->string('nisn')->nullable();
            $table->string('father_name');
            $table->string('father_education')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_name');
            $table->string('mother_education')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_education')->nullable();
            $table->string('guardian_occupation')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('family_card')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->date('registration_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdb_registrations');
    }
};
