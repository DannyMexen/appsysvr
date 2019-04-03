<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Administrator;

class AdministratorsController extends Controller
{
    //
    public function index()
    {

        $administrators = Administrator::all();

        return $administrators;

        return view('/requisitions');
    }
}
