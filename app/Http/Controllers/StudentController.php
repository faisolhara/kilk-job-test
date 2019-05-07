<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $models = DB::table('student')->orderBy('id', 'desc')->get();
        
        return view('student.index',[
            'models'   => $models,
        ]);
    }

    public function add(Request $request)
    {
        $model = new Student();
        
        return view('student.add',[
            'title'   => 'Add Student',
            'model'   => $model,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $model = Student::find($id);
        
        return view('student.add',[
            'title'   => 'Edit Student',
            'model'   => $model,
        ]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:student,name,'.intval($request->get('id')).',id',
        ]);

        if(!empty($request->get('id'))){
            $model = Student::find($request->get('id'));
        }else{
            $model = new Student();
        }

        $model->name       = $request->get('name');
        $model->address    = $request->get('address');


        $model->save();
        
        $request->session()->flash('successMessage', 'Student '.$model->name.' successfully saved');

        return redirect('student');
    }

    public function delete(Request $request, $id)
    {
        $studentClass = DB::table('student_class')->where('student_id', $id)->first();
        $model = Student::find($id);
        
        if($studentClass !== null){
            return redirect(\URL::previous())->withInput($request->all())->withErrors(['errorMessage' => $model->name.' students cannot be deleted because they assigned in the class!']);
        }

        $model->delete();
        
        $request->session()->flash('successMessage', 'Student '.$model->name.' successfully deleted');

        return redirect('student');
    }
}