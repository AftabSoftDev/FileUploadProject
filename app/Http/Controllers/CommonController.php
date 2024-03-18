<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CommonController extends Controller
{
    function getUserData(Request $requset)
    {

        $userData = User::all();

        return  view('dashboard', compact('userData'));
    }
}