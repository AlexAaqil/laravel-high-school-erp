<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\ClassSections;

class StudentsController extends Controller
{
    private function getClassSections()
    {
        return ClassSections::all();
    }

    public function index()
    {
        $students = Students::all();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $class_sections = $this->getClassSections();
        return view('admin.students.create', compact('$this->class_sections'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_number' => 'required|string|unique:students,registration_number',
            'first_name' => 'required|string|max:80',
            'last_name' => 'required|string|max:120',
            'dob' => 'nullable|date|before:today',
            'phone_main' => 'required|string|max:30',
            'phone_other' => 'nullable|string|max:30',
            'dorm_id' => 'nullable|integer',
            'dorm_room_number' => 'nullable|string',
            'year_admitted' => 'nullable|digits:4|integer',
            'graduation_status' => 'required|boolean',
            'graduation_date' => 'nullable|date',
            'class_section_id' => 'required|integer',
            'parent_id' => 'nullable|integer',
            'password' => 'required|string',
        ]);

        Students::create($validated);

        return redirect()->route('students.index')->with('success', ['message' => 'Student has been admitted']);
    }

    public function edit(Students $student)
    {
        $class_sections = $this->getClassSections();
        return view('admin.students.edit', compact('student', 'class_sections'));
    }

    public function update(Students $student, Request $request)
    {
        $validated = $request->validate([
            'registration_number' => 'required|string|unique:students,registration_number,' . $student->id,
            'first_name' => 'required|string|max:80',
            'last_name' => 'required|string|max:120',
            'dob' => 'nullable|date|before:today',
            'phone_main' => 'required|string|max:30',
            'phone_other' => 'nullable|string|max:30',
            'dorm_id' => 'nullable|integer',
            'dorm_room_number' => 'nullable|string',
            'year_admitted' => 'nullable|digits:4|integer',
            'graduation_status' => 'required|boolean',
            'graduation_date' => 'nullable|date',
            'class_section_id' => 'required|integer',
            'parent_id' => 'nullable|integer',
            'password' => 'required|string',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', ['message' => 'Student details have been updated.']);
    }
}
