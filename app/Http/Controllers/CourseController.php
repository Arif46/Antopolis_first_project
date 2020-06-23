<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Course;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' =>'required|integer',
            'course_name' => 'required|string',
            'course_code' => 'required|string',
            
            
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user=new Course;
        $user->student_id = $request->student_id;
        $user->course_name = $request->course_name;
        $user->course_code = $request->course_code;
      
       

        if($user->save()){
            return response()->json(['success'=>"Course created successfully !"], 200);
        }else{
            return response()->json(['error'=>"Course creation unsuccessful !"], 400);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllCourse($student_id)
    {
        $user = Course::where('student_id',$student_id)->get();
        if($user) return response()->json($user, 200);

        return response()->json(['error'=>"No user found !"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)





    
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
