<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CommonController extends Controller
{
    function getUserData()
    {
        $userData = User::all();
        return  view('dashboard', compact('userData'));
    }
    function fileUpload(Request $requset)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->getRealPath();
            $handle = fopen($filePath, "r");
            $header = true;
       
      
    }
}