<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Subjects/Index', [
            'subjects' => Subject::query()
                    ->when(request()->input('search'), function ($query) {
                        $query->where('code', 'like', '%'.request()->input('search').'%');
                    })
                    ->paginate(10)
                    ->withQueryString(),
            'filters' => request()->only(['search']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Subjects/Create');
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
            'code' => 'required|unique:subjects,code',
            'descriptive_title' => 'required',
            'unit' => 'required|numeric|min:1',
        ]);

        Subject::create($data);

        return redirect()->route('admin.subjects')->with('toast', [
            'type' => 'success',
            'message' => 'New course has been added',
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
        return Inertia::render('Admin/Subjects/Edit', [
            'subject' => Subject::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $data = $request->validate([
            'code' => 'required|unique:subjects,code,'.$subject->id,
            'descriptive_title' => 'required',
            'unit' => 'required|numeric|min:1',
        ]);

        $subject->update($data);

        return redirect()->route('admin.subjects')->with('toast', [
            'type' => 'success',
            'message' => 'Subject has been updated successfully',
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
