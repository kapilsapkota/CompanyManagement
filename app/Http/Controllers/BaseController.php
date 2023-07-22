<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function resourceExist($resource)
    {
        if(!$resource)
            return redirect()->route('home')->send()->with('error', 'Sorry! Resource Not Found!');
    }
}
