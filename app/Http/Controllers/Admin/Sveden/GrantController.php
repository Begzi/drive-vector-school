<?php

namespace App\Http\Controllers\Admin\Sveden;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sveden\Grant;

class GrantController extends Controller
{
    public function index()
    {
    	$grants = Grant::get();
        return view('admin.sveden.grants', compact('grants'));
    }
    public function edit($id)
    {
    	$grant = Grant::find($id);
        return view('admin.sveden.grantsEdit', compact('grant'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'scholarship' => 'required',
            'dormitory' => 'required',
        ]);

    	$grant = Grant::find($id);
        $data = $request->all();

        $grant->update($data);

        return redirect()->route('admin.sveden.grants')->with('success', 'Изменения сохранены');
    }
}
