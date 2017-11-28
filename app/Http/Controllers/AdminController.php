<?php

namespace Taller\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
       return view('admin.index');
    }

    /*public function admin()
    {
        return view('admin.admin');
    }

    public function theme()
    {
        return view('admin.theme');
    }*/

}
