<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sveden\Budget;
use App\Models\Sveden\Common;
use App\Models\Sveden\Document;
use App\Models\Sveden\Education;
use App\Models\Sveden\EducationStandart;
use App\Models\Sveden\Employee;
use App\Models\Sveden\Grant;
use App\Models\Sveden\Management;
use App\Models\Sveden\ObjectsSchool;
use App\Models\Sveden\PaidEducation;
use App\Models\Sveden\Struct;
use App\Models\Sveden\Teacher;
use App\Models\Sveden\Vacancy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SvedenController extends Controller
{
    public function common()
    {
    	$commons = Common::get();
        return view('admin.sveden.common', compact('commons'));
    }
    public function commonEdit($id)
    {
    	$common = Common::find($id);
        return view('admin.sveden.commonEdit', compact('common'));
    }
    public function commonUpdate(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required',
            'shortname' => 'required',
            'founder' => 'required',
            'address' => 'required',
            'work_time_day' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

    	$common = Common::find($id);
        $data = $request->all();

        $common->update($data);

        return redirect()->route('admin.sveden.common')->with('success', 'Изменения сохранены');
    }
    public function struct()
    {
    	$structs = Struct::get();
        return view('admin.sveden.struct', compact('structs'));
    }
    public function structEdit($id)
    {
    	$struct = Struct::find($id);
        return view('admin.sveden.structEdit', compact('struct'));
    }
    public function structUpdate(Request $request, $id)
    {
        $request->validate([
            'government' => 'required',
            'leader_government' => 'required',
            'location_government' => 'required',
            'info_about_government_pdf' => 'nullable|mimes:pdf',
        ]);

    	$struct = Struct::find($id);
        $data = $request->all();
        if ($request->hasFile('info_about_government_pdf')) {
        	$data['info_about_government_pdf'] = Struct::uploadFile($request);
        }

        $struct->update($data);

        return redirect()->route('admin.sveden.struct')->with('success', 'Изменения сохранены');
    }
    public function eduStandarts()
    {
    	$eduStandarts = EducationStandart::get();
        return view('admin.sveden.eduStandarts', compact('eduStandarts'));
    }
    public function eduStandartsEdit($id)
    {
    	$eduStandarts = EducationStandart::find($id);
        return view('admin.sveden.eduStandartsEdit', compact('eduStandarts'));
    }
    public function eduStandartsUpdate(Request $request, $id)
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
    public function objects()
    {
    	$objects = ObjectsSchool::get();
        return view('admin.sveden.objects', compact('objects'));
    }
    public function objectsEdit($id)
    {
    	$object = ObjectsSchool::find($id);
        return view('admin.sveden.objectsEdit', compact('object'));
    }
    public function objectsUpdate(Request $request, $id)
    {
        $request->validate([
            'cabinet_count' => 'required',
            'car_count' => 'required',
            'table_count' => 'required',
            'chair_count' => 'required',
            'placat_count' => 'required',
            'maneken_count' => 'required',
            'pc_count' => 'required',
            'processor_count' => 'required',
            'screen_count' => 'required',
        ]);

    	$objects = ObjectsSchool::find($id);
        $data = $request->all();

        $objects->update($data);

        return redirect()->route('admin.sveden.objects')->with('success', 'Изменения сохранены');
    }
    public function grants()
    {
    	$grants = Grant::get();
        return view('admin.sveden.grants', compact('grants'));
    }
    public function grantsEdit($id)
    {
    	$grant = Grant::find($id);
        return view('admin.sveden.grantsEdit', compact('grant'));
    }
    public function grantsUpdate(Request $request, $id)
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
    public function paidEdu()
    {
    	$paidEdus = PaidEducation::get();

    	$documents = Document::get();
    	$document = $documents[0];
        return view('admin.sveden.paidEdu', compact('paidEdus', 'document'));
    }
    public function paidEduEdit($id)
    {
    	$paidEdu = PaidEducation::find($id);
        return view('admin.sveden.paidEduEdit', compact('paidEdu'));
    }
    public function paidEduUpdate(Request $request, $id)
    {
        $request->validate([
            'text' => 'required',
        ]);

    	$paidEdu = PaidEducation::find($id);
        $data = $request->all();

        $paidEdu->update($data);

        return redirect()->route('admin.sveden.paidEdu')->with('success', 'Изменения сохранены');
    }
    public function budget()
    {
    	$budgets = Budget::get();
        return view('admin.sveden.budget', compact('budgets'));
    }
    public function budgetEdit($id)
    {
    	$budget = Budget::find($id);
        return view('admin.sveden.budgetEdit', compact('budget'));
    }
    public function budgetUpdate(Request $request, $id)
    {
        $request->validate([
            'federal_budget' => 'required',
            'local_budget' => 'required',
            'person_budget' => 'required',
            'subject_budget' => 'required',
        ]);

    	$budget = Budget::find($id);
        $data = $request->all();

        $budget->update($data);

        return redirect()->route('admin.sveden.budget')->with('success', 'Изменения сохранены');
    }
    public function vacant()
    {
    	$sveden = true;
    	$vacants = Vacancy::get();
        return view('admin.sveden.vacant', compact('vacants'));
    }
    public function vacantEdit($id)
    {
    	$vacant = Vacancy::find($id);
        return view('admin.sveden.vacantEdit', compact('vacant'));
    }
    public function vacantUpdate(Request $request, $id)
    {
        $request->validate([
            'federal_budget_count' => 'required',
            'local_budget_count' => 'required',
            'person_budget_count' => 'required',
            'subject_budget_count' => 'required',
        ]);

    	$vacant = Vacancy::find($id);
        $data = $request->all();

        $vacant->update($data);

        return redirect()->route('admin.sveden.vacant')->with('success', 'Изменения сохранены');
    }


    public function employees()
    {
    	$teachers = Teacher::get();
    	$managers = Management::get();
        return view('admin.sveden.employees', compact('teachers', 'managers'));
    }

    public function employeesCreate()
    {
        return view('admin.sveden.employeesCreate');
    }

    public function employeesStorage(Request $request)
    {

        $request->validate([
            'employee_id' => 'required',
        ]);
        if ($request['employee_id'] == 1){
	        $request->validate([
	            'fullname' => 'required',
	            'telephone' => 'required',
	            'email' => 'required',
	            'post' => 'required',
	        ]);
        	$data['fullname'] = $request['fullname'];
        	$data['telephone'] = $request['telephone'];
        	$data['email'] = $request['email'];
        	$data['post'] = $request['post'];

        	$manager = Management::create($data);

        }
        elseif ($request['employee_id'] == 2) {
	        $request->validate([
	            'fullname' => 'required',
	            'telephone' => 'required',
	            'email' => 'required',
	            'post' => 'required',
	            'education' => 'required',
	            'work_experience' => 'required',
	        ]);
        	$data['fullname'] = $request['fullname'];
        	$data['telephone'] = $request['telephone'];
        	$data['email'] = $request['email'];
        	$data['post'] = $request['post'];
        	$data['education'] = $request['education'];
        	$data['work_experience'] = $request['work_experience'];

        	$teacher = Teacher::create($data);
        }
        else{
        	return redirect()->route('admin.sveden.employeesCreate')->with('error', 'Не выбран роль сотрудника');
        }

        return redirect()->route('admin.sveden.employees')->with('success', 'Сотрудник добавлен');
    }

    public function managerEdit($id)
    {
    	$manager = Management::find($id);
        return view('admin.sveden.managerEdit', compact('manager'));
    }

    public function managerUdate(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'post' => 'required',
            'education' => 'required',
            'work_experience' => 'required',
        ]);
    	$manager = Management::find($id);
        $data = $request->all();

        $manager->update($data);

        return redirect()->route('admin.sveden.employees')->with('success', 'Изменения сохранены');
    }
    public function managerDestroy(Request $request, $id)
    {
        $manager = Management::find($id);
        $manager->delete();

        return redirect()->route('admin.sveden.employees')->with('success', 'Сотрудник удалён');
    }

    public function teacherEdit($id)
    {
    	$teacher = Teacher::find($id);
        return view('admin.sveden.teacherEdit', compact('teacher'));
    }

    public function teacherUpdate(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'post' => 'required',
            'education' => 'required',
            'work_experience' => 'required',
        ]);
        $teacher = Teacher::find($id);
        $data = $request->all();

        $teacher->update($data);

        return redirect()->route('admin.sveden.employees')->with('success', 'Изменения сохранены');
    }
    public function teacherDestroy(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();

        return redirect()->route('admin.sveden.employees')->with('success', 'Сотрудник удалён');
    }
}
