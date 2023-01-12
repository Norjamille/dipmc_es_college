<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProgramController extends Controller
{
   
    public function index()
    {
        
        return Inertia::render('Admin/Programs/Index',[
            'programs'=>Program::query()
                    ->when(request()->input('search'), function($query){
                        $query->where('name','like','%'.request()->input('search').'%');
                    })
                    ->paginate(10)
                    ->withQueryString(),
            'filters'=>request()->only(['search'])
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Programs/Create');
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([
            'abbreviation'=>'required',
            'name'=>'required',
        ]);
        Program::create($data);
        return redirect()->route('admin.programs')->with('toast',[
            'type'=>'success',
            'message'=>'Program created successfully'
        ]);
    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        return Inertia::render('Admin/Programs/Edit',[
            'program'=>Program::findOrFail($id),
        ]);
    }

   
    public function update(Request $request, Program $program)
    {
        $data = $request->validate([
            'name'=>'required',
            'abbreviation'=>'required'
        ]);

        $program->update($data);

        return redirect()->route('admin.programs')->with('toast',[
            'type'=>'success',
            'message'=>'Program updated successfully',
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
