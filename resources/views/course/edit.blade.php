<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Course</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h2>Course Management System</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('course.update', ['id'=>$course])}}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <h3>Update Course</h3>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-7">
                                <input type="text" name="title" class="form-control" value="{{ $course->title}}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-7">
                                <textarea name="description" class="form-control" rows="3" required>{{ $course->description}}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Duration</label>
                            <div class="col-sm-7">
                            <input type="number" name="duration" class="form-control" value="{{ $course->duration}}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Instructor</label>
                            <div class="col-sm-7">
                            <input type="text" name="instructor" class="form-control" value="{{ $course->instructor}}" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </body>
</html>