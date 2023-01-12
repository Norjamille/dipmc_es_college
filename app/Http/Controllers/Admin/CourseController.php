<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Courses/Index',[
            'courses'=>Course::query()
                    ->when(request()->input('search'),function($query){
                        $query->where('code','like','%'.request()->input('search').'%');
                    })
                    ->paginate(10)
                    ->withQueryString(),
            'filters'=>request()->only(['search'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Courses/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code'=>'required|unique:courses,code',
            'descriptive_title'=>'required',
            'unit'=>'required|numeric|min:1',
        ]);

        Course::create($data);

        return redirect()->route('admin.courses')->with('toast',[
            'type'=>'success',
            'message'=>'New course has been added'
        ]);
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
        return Inertia::render('Admin/Courses/Edit',[
            'course'=>Course::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'code'=>'required|unique:courses,code,'.$course->id,
            'descriptive_title'=>'required',
            'unit'=>'required|numeric|min:1',
        ]);

        $course->update($data);

        return redirect()->route('admin.courses')->with('toast',[
            'type'=>'success',
            'message'=>'Course has been updated successfully'
        ]);
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
