<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('registration_number')->unique()->nullable();
            $table->string('nisn')->unique()->nullable();
            $table->string('nik')->unique()->nullable();
            $table->string('full_name');
            $table->enum('gender', ['L', 'P']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('religion');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('school_origin')->nullable(); // Sekolah Asal
            $table->year('graduation_year')->nullable();
            $table->string('jalur_pendaftaran')->nullable();
            $table->enum('status', ['pending', 'verified', 'rejected', 'accepted', 'not_accepted'])->default('pending');
            $table->boolean('is_finalized')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
