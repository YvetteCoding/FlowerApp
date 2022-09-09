<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flower;

class ApiController extends Controller
{
    public function index()
    {
        $flowers = Flower::all();

        return $flowers->toJson(JSON_PRETTY_PRINT);
    }

    public function fetchPrice($num1, $num2)
    {
        $flowers = Flower::where('price', '>', $num1)->where('price', '<', $num2)->get();

        return $flowers->toJson(JSON_PRETTY_PRINT);
    }
}
