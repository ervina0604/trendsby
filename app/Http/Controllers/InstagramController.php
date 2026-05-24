<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramController extends Controller
{
    public function index()
    {
        $json = file_get_contents(public_path('data/pedulisungaisurabaya_data.json'));
        $posts = json_decode($json, true);

        return view('Instagram.index', compact('posts'));
    }
}