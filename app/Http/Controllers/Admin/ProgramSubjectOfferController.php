<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Course;
use App\Models\Program;
use App\Models\YearLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramSubjectOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Program $program)
    {
        return Inertia::render('Admin/Programs/SubjectOffers/Index',[
            'program'=>$program,
            'yearLevels'=> YearLevel::all()->map(function($yearLevel){
                return [
                    'id'=>$yearLevel->id,
                    'name'=>$yearLevel->name,
                    'semester'=>YearLevel::SEMESTERS[$yearLevel->semester],
                    'semester_key'=>$yearLevel->semester
                ];
            }),
            'offers'=>Inertia::lazy(function() use($program) {
                $program->courses()->when(request()->input('year_level_id'), function($query){
                    $query->wherePivot('year_level_id',request()->input('year_level_id'));
                });
            }),
            'filters'=>request()->only(['year_level_id','course_code']),
            'courses'=> Course::when(request()->input('course_code'), fn($query)=> $query->whereCode(request()->input('course_code')))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
