<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Course</title>
    </head>
    <body>
        
        <div class="container mt-5">

            @if(Session::has('course_created'))
                <div class='alert alert-success'>
                   <p class='text-center'>{{session('course_created')}}</p>
               </div>
            @endif

            @if(Session::has('course_updated'))
                <div class='alert alert-primary'>
                   <p class='text-center'>{{session('course_updated')}}</p>
               </div>
            @endif
            @if(Session::has('course_deleted'))
                <div class='alert alert-danger'>
                   <p class='text-center'>{{session('course_deleted')}}</p>
               </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Course Management System</h2>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('course.store')}}">
                                @csrf
                                @method('post')
                                <div class="mb-3">
                                    <h3>Course Registration </h3>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-7">
                                        <textarea name="description" class="form-control" rows="3" required></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Duration</label>
                                    <div class="col-sm-7">
                                    <input type="number" name="duration" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Instructor</label>
                                    <div class="col-sm-7">
                                    <input type="text" name="instructor" class="form-control" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-stripe">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Duration</th>
                                            <th>Instructor</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $course->title }}</td>
                                                <td>{{ $course->description }}</td>
                                                <td>{{ $course->duration }}</td>
                                                <td>{{ $course->instructor }}</td>
                                                <td><a href="{{route('course.edit', ['id'=>$course])}}" class="link-underline link-underline-opacity-0">Edit</a></td>
                                                <td>
                                                    <form method="post" action="{{route('course.destroy', ['id'=>$course]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit" value="Delete" class=" btn btn-sm btn-danger">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>