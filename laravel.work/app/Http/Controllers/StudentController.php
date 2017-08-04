<?php
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $student=Student::paginate(5);
        return view('student.index',compact('student'));
    }
    public function create()
    {
        $student = new Student();
        return view('student/create',['student'=>$student]);
    }
    public function store(Request $request)
    {
        if($request->isMethod('POST')) {
            $this->validate($request, [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required',
                ],
                [
                    'required' => ':attribute 为必填项',
                    'min' => ':attribute 长度不符合要求',
                    'integer' => ':attribute 必须为整数',
                ], [
                    'Student.name' => '姓名',
                    'Student.age' => '年龄',
                    'Student.sex' => '性别',
                ]);
            $data = $request->input('Student');
            $student = new Student();
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];
            if ($student->save()) {
                return redirect('student/index')->with('success', '成功！');
            } else {
                return redirect()->back()->withInput();//withInput数据保持
            }
        }
    }

    public function update(Request $request,$id)
    {
        $student = Student::find($id);
        if($request->isMethod('POST')){
            $this->validate($request,[
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required',
                    ],
                [
                    'required' => ':attribute 为必填项',
                    'min' => ':attribute 长度不符合要求',
                    'integer' => ':attribute 必须为整数',
                ], [
                    'Student.name' => '姓名',
                    'Student.age' => '年龄',
                    'Student.sex' => '性别',
                ]);
            $data = $request->input('Student');
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];
            if($student->save()){
                return redirect('student/index')->with('success','修改成功！');
            }
        }
        return view('student/update',['student'=>$student]);
    }

    public function detail($id)
    {
        $student =Student::find($id);
        return view('student/detail',['student'=>$student]);
    }
    public function delete($id)
    {
        $student = Student::find($id);
        if($student->delete()){
            return redirect('student/index')->with('success','删除成功！');
        }else{
            return redirect('student/index')->with('error','删除失败！');
        }
    }

}