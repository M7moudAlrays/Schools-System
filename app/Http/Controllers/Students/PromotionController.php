<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student ;
use App\Repositories\Interfaces\StudentPromotionInterface;

class PromotionController extends Controller
{
    protected $StudentPromotionRepo ;

    public function __construct(StudentPromotionInterface $Student_P_Repo)
    {
       $this->StudentPromotionRepo = $Student_P_Repo ;
    }    
    
    public function index()
    {
       return $this->StudentPromotionRepo->index() ;
    }

    
    public function create()
    {
        return $this->StudentPromotionRepo->create() ;
    }

    
    public function store(Request $request)
    {
      return $this->StudentPromotionRepo->store($request) ;
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($request)
    {
        return $this->StudentPromotionRepo->destroy($request) ;
    }

}
