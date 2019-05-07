<?php

namespace App\Http\Controllers;

use App\User;
use App\ClassModel;
use App\StudentClass;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassController extends Controller
{

    public function index(Request $request)
    {
        $models = DB::table('class')->orderBy('id', 'desc')->get();
        
        return view('class.index',[
            'models'   => $models,
        ]);
    }

    public function add(Request $request)
    {
        $model = new ClassModel();
        
        return view('class.add',[
            'title'    => 'Add Class',
            'teachers' => $this->getTeachers(),
            'students' => $this->getStudents(),
            'model'    => $model,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $model = ClassModel::find($id);
        return view('class.add',[
            'title'   => 'Edit Class',
            'teachers' => $this->getTeachers(),
            'students' => $this->getStudents(),
            'model'   => $model,
        ]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required|unique:class,name,'.intval($request->get('id')).',id',
            'teacher' => 'required',
        ]);

        if(!empty($request->get('id'))){
            $model = ClassModel::find($request->get('id'));
        }else{
            $model = new ClassModel();
        }

        $model->name         = $request->get('name');
        $model->description  = $request->get('description');
        $model->teacher_id   = $request->get('teacher');

        $model->save();

        $model->studentClass()->delete();

        foreach ($request->get('students') as $student) {
            $studentClass             = new StudentClass();
            $studentClass->class_id   = $model->id;
            $studentClass->student_id = $student;
            $studentClass->save();
        }
        
        $request->session()->flash('successMessage', 'Class '.$model->name.' successfully saved');

        return redirect('class');
    }

    public function delete(Request $request, $id)
    {
        $model = ClassModel::find($id);
        $model->delete();
        
        $request->session()->flash('successMessage', 'Class '.$model->name.' successfully deleted');

        return redirect('class');
    }

    protected function getTeachers(){
        return DB::table('teacher')->get();
    }

    protected function getStudents(){
        return DB::table('student')->get();
    }

    public function print(Request $request)
    {

        $models = ClassModel::get();

        $header = view('class.header-pdf', ['title' => 'Class List with Teacher and Students'])->render();

        \PDF::setHeaderCallback(function($pdf) use ($header) {
            $pdf->writeHTML($header);
        });

        $html = view('class.print-pdf', [
            'models'  => $models,
        ])->render();

        \PDF::SetTitle('Class List with Teacher and Students');
        \PDF::SetMargins(5, 20, 5, 0);
        \PDF::SetAutoPageBreak(TRUE, 10);
        \PDF::AddPage('L', 'A4');
        \PDF::writeHTML($html);
        \PDF::Output('Class List with Teacher and Students.pdf');
        \PDF::reset();
    }
}