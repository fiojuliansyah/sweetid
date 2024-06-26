<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Course;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Notifications\NewCourse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:course-list|product-create|course-edit|course-delete', ['only' => ['index','show']]);
         $this->middleware('permission:course-create', ['only' => ['create','store']]);
         $this->middleware('permission:course-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        return view('admin.courses.create',compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'video' => 'required',
            'title' => 'required',
            'duration' => 'required',
        ]);                

        $file = Storage::disk('google')->put(Str::slug($request->title), $request->file('video'));

        // $folderName = 'courses';
        // $file = Storage::disk('cloudinary')->put(
        //     $folderName . '/' . Str::slug($request->title),
        //     $request->file('video')
        // );
        
        $course = new Course;
        $course->room_id = $request->room_id;
        $course->title = $request->title;
        $course->duration = $request->duration;
        $course->video = $file;
        $course->save();
        
        $users = User::all();
        foreach ($users as $user) {
          $user->notify(new NewCourse());
        }

        return redirect()->route('courses.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $rooms = Room::all();
        return view('admin.courses.edit',compact('course','rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'duration' => 'required',
        ]);
        
        // if ($course->video && $request->hasFile('video')) {
        //     $filename = basename($course->video);
        //     $publicId = 'courses/'. $course->title . '/' . pathinfo($filename, PATHINFO_FILENAME);
        //     Cloudinary::destroy($publicId);
        // }

    
        if ($request->hasFile('video')) {
            
            $folderName = 'courses';
            $file = Storage::disk('google')->put(
                $folderName . '/' . Str::slug($request->title),
                $request->file('video')
            );
    
            $course->video = $file;
        }
    
        $course->room_id = $request->room_id;
        $course->title = $request->title;
        $course->duration = $request->duration;
        
        $course->save();
        
        return redirect()->route('courses.index')
                        ->with('success','Course updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        \Storage::delete($course->video);
        return redirect()->route('courses.index')
                        ->with('success','Product deleted successfully');
    }
}
