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

    public function Delete_Student($id) ;
}


