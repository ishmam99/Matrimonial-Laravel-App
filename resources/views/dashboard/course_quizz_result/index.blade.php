@extends('layouts.dashboard')

@section('content')

  <div class="card card-custom">
    @if(session()->has('success'))
      <div class="alert alert-success">
        {{session()->get('success')}}
      </div>
    @elseif(session()->has('error'))
      <div class="alert alert-danger">
        {{session()->get('error')}}
      </div>
    @endif
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
      <div class="card-title">
        <h3 class="card-label">User Enrolled Course List</h3>
      </div>
      <div class="card-toolbar">
        
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
          <thead>
            <tr>
              <th>SL</th>
              <th>Course Title</th>
              <th>User</th>
              {{-- <th>Date</th> --}}
              <th>Quizzes</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($userCourses as $course)
              <tr>
                <td>{{ $loop->iteration + $userCourses->firstItem()-1}}</td>
                <td>{{ $course->course->title }}</td>
                <td>{{ $course->profile->name }}</td>
                <td>{{$course->quiz_completed}}/{{ $course->course->quizzes->count() }}</td>
                <td>{{$course->status == 1 ? 'Pass':($course->status==2?'Fail':'Running')}} </td>
                
               
                <td nowrap="nowrap">
                  <a href="{{ route('userCourse.show', $course->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-2">
                    <span class="svg-icon svg-icon-md svg-icon-primary">
                      <img src="https://img.icons8.com/ios/20/000000/view-file.png"/>
                    </span>
                  </a>
                  
                
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $userCourses->links() }}
    </div>
  </div>

@endsection
