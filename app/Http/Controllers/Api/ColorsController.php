<?php

namespace App\Http\Controllers\Api;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorsController extends Controller
{
    public function index()
    {
        return Color::all();
    }
}
