<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class courseController extends Controller
{
    public function index()
    {

        $course = course::all();
        return view('admin_view.home', compact('course'));
    }

    public function view(Request $request)
    {

        $course = course::all();
        return view('admin_view.view', compact('course'));
    }

    public function edit($id)
    {
        $course = course::findOrFail($id);
        return view('admin_view.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name_course' => 'required|string|min:3',
            'desc_course' => 'required|string|min:20',
        ]);

        $course = course::findOrFail($id);
        $course->update([
            'name_course' => $request->name_course,
            'desc_course' => $request->desc_course
        ]);

        return redirect()->route('admin.view')->with('success', 'Course updated successfully');
    }


    public function create()
    {
        return view('admin_view.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name_course' => 'required|string|min:3',
            'desc_course' => 'required|string|min:20'
        ]);

        $course = new course;
        $course->name_course = $request->name_course;
        $course->desc_course = $request->desc_course;
        $course->save();

        return redirect()->route('admin.view')->with('success', 'Course added successfully');
    }

    public function destroy($id)
    {
        $course = course::findOrFail($id);
        $course->delete();
        return redirect()->route('admin.view')->with('success', 'Course deleted successfully');
    }
}
