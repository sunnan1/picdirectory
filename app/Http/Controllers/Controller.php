<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function main()
    {
        return view("directory");
    }

    public function data()
    {
        if (request()->has("take") && request()->has("skip"))
        {
            $page_from = request()->get("take");
            $page_to = request()->get("skip");
            $model = Employees::with(['location','extension'])->ByPaginate($page_from , $page_to);
            echo '{"pageSize":'.$page_to.',"page":'.$page_from.',"total":'.Employees::active()->count().',"data":'.json_encode($model->get()).'}';
        }
    }
}
