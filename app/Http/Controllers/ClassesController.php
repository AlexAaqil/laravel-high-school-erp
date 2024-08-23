<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::orderBy('class_name')->get();
        return view('admin.classes.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.classes.classes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|unique:classes',
        ]);

        Classes::create($validated);

        return redirect()->route('classes.index')->with('success', ['message' => 'Class has been added.']);
    }

    public function show(Classes $classes)
    {
        //
    }

    public function edit(Classes $classes)
    {
        return view('admin.classes.classes.edit', compact('classes'));
    }

    public function update(Request $request, Classes $classes)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|unique:classes,class_name,' . $classes->id,
        ]);

        $classes->update($validated);

        return redirect()->route('classes.index')->with('success', ['message' => 'Class has been updated.']);
    }

    public function destroy(Classes $classes)
    {
        $classes->delete();

        return redirect()->route('classes.index')->with('success', ['message' => 'Class has been deleted.']);
    }
}
