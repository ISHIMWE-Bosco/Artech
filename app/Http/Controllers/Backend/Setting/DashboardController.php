<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\Material;
use App\Models\Instructor;
use App\Models\Enrollment;
use App\Models\Lesson;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $enrollment = Enrollment::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();


        $student = Student::get();
        $category = CourseCategory::get();
        $user = User::get();
        $course = Course::get();
        $material = Material::get();
        $lesson = Lesson::get();

        $instructor = Instructor::paginate(10);
       

        if (fullAccess())
            return view('backend.adminDashboard',
        compact('student','category','user','course','material','enrollment','instructor','lesson')); 
        else
        if ($user->role = 'instructor')
            return view('backend.instructorDashboard'
        
            ,compact('student','category','course','material','enrollment','instructor','lesson')); 
        
        else
        if ($user->role = 'parent')
            return view('backend.ParentDashboard');
        else
            return view('backend.dashboard');

        //   $user = User::get();
        //   if($user->role = 'instructor') 
        //     return view('backend.instructorDashboard');
    }
}
