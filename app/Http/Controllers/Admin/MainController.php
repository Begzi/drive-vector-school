<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class MainController extends Controller
{
    public function index()
    {
        // $tag = new Tag(); Уникальные слаги работают
        // $tag->title = "Привет мир!";
        // $tag->save();
        return view('admin.index');
    }
}
