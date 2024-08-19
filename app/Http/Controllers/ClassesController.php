<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        return view('admin.classes.classes.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Classes $classes)
    {
        //
    }

    public function edit(Classes $classes)
    {
        //
    }

    public function update(Request $request, Classes $classes)
    {
        //
    }

    public function destroy(Classes $classes)
    {
        //
    }
}
