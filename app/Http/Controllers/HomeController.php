<?php

namespace App\Http\Controllers;
use App\Models\Application;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $main = true;
        return view('welcome', compact('main'));
    }
    public function storage(Request $request)
    {
        $request->validate([
            'text' => 'required',
        ]);
        $data['text'] = $request['text'];
        $application = Application::create($data);
        return redirect()->route('home')->with('success', 'Ваша заявка отправлена');
    }
    public function goodUrls()
    {
        return view('goodUrls');
    }
}
