<?php

namespace App\Repositories\Interfaces ;

Interface StudentGraduatedinterface
{
    public function index();

    public function create();

    public function softDelete($req); 

    public function returnStudent($req);

    public function deleteStudent($req);
}
