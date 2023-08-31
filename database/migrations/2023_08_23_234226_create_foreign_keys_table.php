<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('my__parents', function(Blueprint $table) 
        {
            $table->foreign('Nationality_Father_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade') ;
            $table->foreign('Blood_Type_Father_id')->references('id')->on('type__bloods')->onUpdate('cascade')->onDelete('cascade') ;
            $table->foreign('Religion_Father_id')->references('id')->on('religions')->onUpdate('cascade')->onDelete('cascade') ;
            $table->foreign('Nationality_Mother_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade') ;
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('type__bloods')->onUpdate('cascade')->onDelete('cascade') ;
            $table->foreign('Religion_Mother_id')->references('id')->on('religions')->onUpdate('cascade')->onDelete('cascade') ;
        });

        Schema::table('parent_attachmets' ,function(Blueprint $table)
        {
            $table->foreign('parent_id')->references('id')->on('my__parents')->onUpdate('cascade')->onDelete('cascade') ;
        }) ;

        Schema::table('Teachers' ,function (Blueprint $table) 
        {
            $table->foreign('Specialization_id')->references('id')->on('specializations')->onDelete('cascade');
        }) ;

        Schema::table('Teachers' ,function (Blueprint $table)
        {
            $table->foreign('Gender_id')->references('id')->on('genders')->onDelete('cascade');
        }) ;

        Schema::table('teacher_section' ,function (Blueprint $table)
        {
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sections_id')->references('id')->on('sections')->onUpdate('cascade')->onDelete('cascade') ;
        }) ;

        Schema::table('students' ,function (Blueprint $table)
        {
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('blood_id')->references('id')->on('type__bloods')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Classroom_id')->references('id')->on('class_rooms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('parent_id')->references('id')->on('my__parents')->onDelete('cascade')->onUpdate('cascade');
        }) ;

        Schema::table('promotions', function (Blueprint $table) 
        {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('from_grade')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreign('from_Classroom')->references('id')->on('Class_rooms')->onDelete('cascade');
            $table->foreign('from_section')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('to_grade')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreign('to_Classroom')->references('id')->on('Class_rooms')->onDelete('cascade');
            $table->foreign('to_section')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_keys');
    }
};
