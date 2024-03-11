<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();
        return view('admin.faculty.view', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faculties = Faculty::create($request->all());
            return redirect()->route('facultys.create')->with('success', 'Faculty created successfully!!');
            $validated = $request->validate([
                'name' => ['required'],
                'description' => ['required'],
            ]);
        
        // $this->validate($request, [
        //     'name' => 'required|unique:faculties', // Sử dụng dấu => để chỉ định quy tắc cho trường 'name'
        // ]);
        
        // $data = $request->all();
        // Faculty::create($data);
        // return redirect()->back()->with('message', 'Faculty created successfully!!');
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
        $faculty = Faculty::find($id);
        return view('admin.faculty.edit', compact('faculty'));
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
        $faculty = Faculty::find($id);
        $data = $request->all();
        $faculty->update($data);
        return redirect()->back()->with('message', 'Record update succesffuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculties = Faculty::find($id);
        $faculties->delete();
        return redirect()->route('facultys.index')->with('message', 'Record Delete succesffuly!');
    }
}
