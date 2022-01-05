<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Response;

class StudentController extends Controller
{
   public function index()
    {
        //show
        $data['students'] = Student::orderBy('id','desc')->paginate(1);   
        return view('list',$data);
    }

    // storedata
     public function store(Request $request)
    {       
         
        $student = new Student();
        $student->first_name =$request->post('txtFirstName');    
        $student->last_name =$request->post('txtLastName');    
        $student->address =$request->post('txtAddress');    
                                         // inputtype name
        $student->save();    
        return Response::json($student);
    }
    public function edit($id)
    {
        //
        $where = array('id' => $id);
        $student  = Student::where($where)->first();
 
        return Response::json($student);
    }
    public function update(Request $request)
    {
                                             //update inputtype name
        $student = Student::find($request->post('hdnStudentId'));
        $student->first_name = $request->post('txtFirstName');
        $student->last_name = $request->post('txtLastName');
        $student->address = $request->post('txtAddress');
        $student->update();
        return Response::json($student);
        
    }
     public function destroy($id)
    {
              //
        $student = Student::where('id',$id)->delete();
        return Response::json($student);
    }
}
?>