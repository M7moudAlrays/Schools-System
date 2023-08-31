<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\StudentGraduatedinterface;


class GraduateController extends Controller
{
    protected $StudentGraduatedRepo ;

    public function __construct (StudentGraduatedinterface $Student_G_Repo)
    {
        $this->StudentGraduatedRepo = $Student_G_Repo ;
    }
    
    public function index()
    {
        return $this->StudentGraduatedRepo->index() ;
    }

    public function create()
    {
        return $this->StudentGraduatedRepo->create() ;
    }

    public function store(Request $request)
    {
        return $this->StudentGraduatedRepo->softDelete($request) ;
    }

    public function update(Request $request)
    {
        return $this->StudentGraduatedRepo->returnStudent($request) ;
    }

    public function destroy(Request $request)
    {
        return $this->StudentGraduatedRepo->deleteStudent($request) ;
    }
}
