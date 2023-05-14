<?php

namespace App\Repositories\Interfaces;

interface TeacherRepoInterface
{
    // get all Teachers
    public function getAllTeachers();

    // get Speciaizations
    public function getSpeciaizations();

    // get Genders
    public function getGenders();

    // StoreTeachers
    public function StoreTeachers($request);

    // EditTeachers
    public function editTeachers($id);

     // UpdateTeachers
     public function updateTeachers($request);

      // DeleteTeachers
      public function deleteTeachers($request);
}




