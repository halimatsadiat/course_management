<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\CourseManagementRequest;
use App\Services\CourseManagementService;
use PhpParser\Error;


class CourseManagementController extends Controller
{
    public function __construct(
        protected CourseManagementService $courseManagementService
    ) {
    }

    public function index(): \Illuminate\View\View
    {
        $course = $this->courseManagementService->all();

        return view('course.index', compact('course'));
    }

    public function store(CourseManagementRequest $request){
        try{
            $course = $this->courseManagementService->create($request->validated());
        }catch (Exception $ex){
            throw new Exception("Something went wrong creating course " . $ex->getMessage());
        }
        return redirect()->route('course.show', $course->id);
    }

    public function show(int $id){
        try{
            $course = $this->courseManagementService->find($id);
        }catch (Exception $ex){
            throw new Exception("Something went wrong in getting course " . $ex->getMessage());
        }
        return view('course.show', compact('course'));
    }

    public function update(CourseManagementRequest $request, $id){
        try{
            $course = $this->courseManagementService->update($request->validated(), $id);
        }catch (Exception $ex){
            throw new Exception("Something went wrong in updating course " . $ex->getMessage());
        }
        return redirect()->route('course.show', $id);
    }

    public function destroy(int $id){
        try{
            $course = $this->courseManagementService->delete($id);
        }catch (Exception $ex){
            throw new Exception("Something went wrong in deleting course " . $ex->getMessage());
        }
        return redirect()->route('course.index');    }
}
