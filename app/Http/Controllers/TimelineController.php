<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => 'Timeline Index'
        ], 200);
    }
}
