<?php

namespace App\Repositories\Interfaces ;

Interface StudentPromotionInterface
{
    public function index();

    public function store($request);

    public function create();

    public function destroy($request);

}
