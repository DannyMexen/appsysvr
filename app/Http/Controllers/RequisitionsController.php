<?php

namespace App\Http\Controllers;

use App\Requisition;

use Illuminate\Http\Request;

class RequisitionsController extends Controller
{
    //
    public function index()
        {
           return view('/requisition');
        }
}
