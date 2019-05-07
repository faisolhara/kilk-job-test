<?php

namespace App\Http\Controllers;

use App\User;
use App\Teacher;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function index(Request $request)
    {
        $models = DB::table('teacher')->orderBy('id', 'desc')->get();
        
        return view('teacher.index',[
            'models'   => $models,
        ]);
    }

    public function add(Request $request)
    {
        $model = new Teacher();
        
        return view('teacher.add',[
            'title'   => 'Add Teacher',
            'model'   => $model,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $model = Teacher::find($id);
        
        return view('teacher.add',[
            'title'   => 'Edit Teacher',
            'model'   => $model,
        ]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:teacher,name,'.intval($request->get('id')).',id',
        ]);

        if(!empty($request->get('id'))){
            $model = Teacher::find($request->get('id'));
        }else{
            $model = new Teacher();
        }

        $model->name       = $request->get('name');
        $model->address    = $request->get('address');


        $model->save();
        
        $request->session()->flash('successMessage', 'Teacher '.$model->name.' successfully saved');

        return redirect('teacher');
    }

    public function delete(Request $request, $id)
    {

        $class = DB::table('class')->where('teacher_id', $id)->first();
        $model = Teacher::find($id);

        if($class !== null){
            return redirect(\URL::previous())->withInput($request->all())->withErrors(['errorMessage' => $model->name.' teachers cannot be deleted because they assigned in the class!']);
        }
        $model->delete();
        
        $request->session()->flash('successMessage', 'Teacher '.$model->name.' successfully deleted');

        return redirect('teacher');
    }
}