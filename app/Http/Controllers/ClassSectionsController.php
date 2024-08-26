<?php

namespace App\Http\Controllers;

use App\Models\ClassSections;
use Illuminate\Http\Request;

class ClassSectionsController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required',
            'title' => 'required|string|unique:class_sections,title',
            'teacher_id' => 'nullable',
        ]);

        ClassSections::create($validated);

        return redirect()->route('classes.edit', $validated['class_id'])->with('success', ['message' => 'Class section has been added.']);
    }
}
