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
