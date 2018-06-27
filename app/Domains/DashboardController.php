<?php

namespace App\Domains;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
     return view('dashboard.index');
    }

}

?>
