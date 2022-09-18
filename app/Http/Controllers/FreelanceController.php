<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreelanceController extends Controller
{
    public function freelancehome()
    {
        return view('freelance.homefreelance');
    }

}
