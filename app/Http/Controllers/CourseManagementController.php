<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\CourseManagementRequest;
use App\Services\CourseManagementService;
use Illuminate\Support\Facades\Session;
use PhpParser\Error;


class CourseManagementController extends Controller
{
    public function __construct(
            protected CourseManagementService $courseManagementService
        ) {
    }

    public function index(): \Illuminate\View\View
    {
        $courses = $this->courseManagementService->all();
        return view('course.index', compact('courses'));
    }

    public function store(CourseManagementRequest $request){
    //    return $request->validated();
        try{
            $course = $this->courseManagementService->create($request->validated());
        }catch (Exception $ex){
            throw new Exception("Something went wrong creating course " . $ex->getMessage());
        }
        Session::flash('course_created', 'Course Created Successfully');
        return redirect()->route('course.index');
    }

    public function edit(int $id): \Illuminate\View\View
    {
        $course = $this->courseManagementService->find($id);

        return view('course.edit', compact('course'));
    }

    public function update(CourseManagementRequest $request, $id){
        try{
            $course = $this->courseManagementService->update($request->validated(), $id);
        }catch (Exception $ex){
            throw new Exception("Something went wrong in updating course " . $ex->getMessage());
        }
        Session::flash('course_updated', 'Course Updated Successfully');
        return redirect()->route('course.index');
    }

    public function destroy(int $id){
        try{
            $course = $this->courseManagementService->delete($id);
        }catch (Exception $ex){
            throw new Exception("Something went wrong in deleting course " . $ex->getMessage());
        }
        Session::flash('course_deleted', 'Course Deleted Successfully');
        return redirect()->route('course.index');    }
}
