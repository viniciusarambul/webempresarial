<?php

namespace App\Domains;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    function index()
    {
     return view('dashboard');
    }

}

?>
