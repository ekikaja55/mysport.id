<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\materi;
use Illuminate\Http\Request;

class materiController extends Controller
{

    public function view(Request $request)
    {
        $query = materi::query();
        if ($request->has('course') && $request->course != '') {
            $query->where('id_course', $request->course);
        }
        if ($request->has('date_filter') && $request->date_filter == 'latest') {
            $query->orderBy('updated_at', 'desc');
        }
        if ($request->has('date_filter') && $request->date_filter == 'oldest') {
            $query->orderBy('updated_at', 'asc');
        }
        if ($request->has('search') && $request->search != '') {
            $query->where('name_materi', 'like', '%' . $request->search . '%');
        }
        $materi = $query->get();
        $courses = course::all();

        return view('admin_view.materi.view', compact('materi', 'courses'));
    }

    public function create()
    {
        $courses = course::all();
        return view('admin_view.materi.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_materi' => 'required|string|min:3',
            'desc_materi' => 'required|string|min:20',
            'id_course' => 'required',
        ]);

        materi::create([
            'name_materi' => $request->name_materi,
            'desc_materi' => $request->desc_materi,
            'id_course' => $request->id_course,
        ]);

        return redirect()->route('materi.view')->with('success', 'Materi added successfully.');
    }

    public function edit($id)
    {
        $courses = course::all();
        $materi = materi::findOrFail($id);
        return view('admin_view.materi.edit', compact('materi', 'courses'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name_materi' => 'required|string|min:3',
            'desc_materi' => 'required|string|min:20',
            'id_course' => 'required'
        ]);

        $materi = materi::findOrFail($id);
        $materi->update([
            'id_course' => $request->id_course,
            'name_materi' => $request->name_materi,
            'desc_materi' => $request->desc_materi
        ]);

        return redirect()->route('materi.view')->with('success', 'Materi updated successfully');
    }

    public function destroy($id)
    {
        $materi = materi::findOrFail($id);
        $materi->delete();
        return redirect()->route('materi.view')->with('success', 'Materi deleted successfully');
    }
}
