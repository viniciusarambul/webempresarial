<?php

namespace App\Domains;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Core\Util\Permission;


class DashboardController extends Controller
{
    public function index()
    {
     return view('dashboard');
    }

}

?>
