<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    function getUserData()
    {
        $userData = User::all();
        return  view('dashboard', compact('userData'));
    }
    function fileUpload(Request $request)
    {
        set_time_limit(600);
        if ($csvData = $request->input('csvData')) {
            $chunkIndex = $request->input('chunkIndex');
            $totalChunks = $request->input('totalChunks');
            $lines = explode(PHP_EOL, $csvData);

            foreach ($lines as $line) {
                $chunk = str_getcsv($line);
                DB::table('file_records')->insert([
                    'company_id' => $chunk[0],
                    'name' => $chunk[1],
                    'domain' => $chunk[2],
                    'industry' => $chunk[3],
                    'size_range' => $chunk[4],
                    'locality' => $chunk[5],
                    'country' => $chunk[6],
                    'linkedin_url' => $chunk[7],
                    'curr_emp' => $chunk[8],
                    'estim_emp' => $chunk[9],
                ]);
            }
        }
        return response()->json(['success' => true]);
    }

}