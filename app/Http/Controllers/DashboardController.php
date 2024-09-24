<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMessage;
use App\Models\Blog;
use App\Models\ClassSections;
use App\Models\Students;
use App\Models\Parents;

class DashboardController extends Controller
{
    public function index()
    {
        $user_level = Auth()->user()->user_level;

        if($user_level == 1)
        {
            return redirect()->route('dashboard');
        }
        else if($user_level == 0)
        {
            return redirect()->route('admin.dashboard');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function admin_dashboard()
    {
        $count_users = User::count();
        $count_user_messages = UserMessage::count();
        $count_blogs = Blog::count();
        $count_classes = ClassSections::count();
        $count_admins = User::where('user_level', 1)->count();
        $count_students = Students::count();
        $count_teachers = User::where('user_level', 3)->count();
        $count_parents = Parents::count();

        return view('admin.dashboard', compact(
            'count_users',
            'count_user_messages',
            'count_blogs',
            'count_classes',
            'count_admins',
            'count_students',
            'count_teachers',
            'count_parents',
        ));
    }
}
