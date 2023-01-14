<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Subject;
use App\Models\YearLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProgramSubjectOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Program $program)
    {
        return Inertia::render('Admin/Programs/SubjectOffers/Index', [
            'program' => $program,
            'yearLevels' => YearLevel::all()->map(function ($yearLevel) {
                return [
                    'id' => $yearLevel->id,
                    'name' => $yearLevel->name,
                    'semester' => YearLevel::SEMESTERS[$yearLevel->semester],
                    'semester_key' => $yearLevel->semester,
                ];
            }),
            'filters' => request()->only(['year_level_id']),
            'subjects' =>  request()->input('year_level_id') ? 
                            $program->subjects()->wherePivot('year_level_id', request()->input('year_level_id'))
                            ->with('year_levels')
                            ->get()
                            ->map(function($subject){
                                return [
                                    'id'=>$subject->id,
                                    'code'=>$subject->code,
                                    'descriptive_title'=>$subject->descriptive_title,
                                    'unit'=>$subject->unit,
                                    'semester'=>YearLevel::SEMESTERS[$subject->year_levels->first()->semester],
                                    'year_level'=>$subject->year_levels->first()->name,
                                ];
                            }) :
                            $program->subjects()->with('year_levels')->get()->map(function($subject){
                                return [
                                    'id'=>$subject->id,
                                    'code'=>$subject->code,
                                    'descriptive_title'=>$subject->descriptive_title,
                                    'unit'=>$subject->unit,
                                    'semester'=>YearLevel::SEMESTERS[$subject->year_levels->first()->semester],
                                    'year_level'=>$subject->year_levels->first()->name,
                                ];
                            }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Program $program, YearLevel $yearLevel)
    {
        return Inertia::render('Admin/Programs/SubjectOffers/Create', [
            'program' => $program,
            'yearLevel' => $yearLevel,
            'formatedSemester' => YearLevel::SEMESTERS[$yearLevel->semester],
            'subjects' => Subject::whereDoesntHave('programs', function ($query) use ($program) {
                $query->where('programs.id', $program->id);
            })->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $year_level_id = $request->yearLevelId;
        $subject_ids = $request->subjectIds;
        $program_id = $request->programId;
        DB::beginTransaction();

        $program = Program::find($program_id);

        foreach ($subject_ids as $subject_id) {
            if (! $program->subjects()->wherePivot('subject_id', $subject_id)->exists()) {
                $program->subjects()->attach($subject_id, ['year_level_id' => $year_level_id]);
            }
        }
        DB::commit();

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'message' => 'Subject has been added successfully',
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
