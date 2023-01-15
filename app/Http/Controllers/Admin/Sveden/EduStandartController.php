<?php

namespace App\Http\Controllers\Admin\Sveden;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sveden\EducationStandart;

class EduStandartController extends Controller
{
    public function index()
    {
        $eduStandarts = EducationStandart::get();
        return view('admin.sveden.eduStandarts', compact('eduStandarts'));
    }
    public function edit($id)
    {
        $eduStandarts = EducationStandart::find($id);
        return view('admin.sveden.eduStandartsEdit', compact('eduStandarts'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required',
            'link_requirements' => 'required',
        ]);

        $eduStandarts = EducationStandart::find($id);
        $data = $request->all();
        $eduStandarts->update($data);

        return redirect()->route('admin.sveden.eduStandarts')->with('success', 'Изменения сохранены');
    }
    public function destroy($id)
    {
        //
    }
}
