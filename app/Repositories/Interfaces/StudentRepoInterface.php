<?php

namespace App\Repositories\Interfaces;

interface StudentRepoInterface
{
    public function Get_Students () ;

    public function create_Student () ;

    public function Get_classrooms($id) ;

    public function Get_Sections ($id) ;

    public function Store_Student ($request) ;

    public function Edit_Student ($id) ;

    public function Update_Student ($request) ;

    public function show_Student ($id) ;

    public function Delete_Student($id) ;

    //Upload_attachment
    public function Upload_attachment($request);

    //Download_attachment
    public function Download_attachment($studentname,$filename);

    // //Delete_attachment
    public function Delete_attachment($request);
}


