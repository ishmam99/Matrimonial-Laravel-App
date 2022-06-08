@extends('layouts.dashboard')

@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Report List</h3>
            </div>
           
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Reported By</th>
                            <th>Reported To</th>
                            <th>Professinal Type</th>
                            <th>Details</th>
                            <th>Reported At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                               
                                 <td>{{ $loop->iteration + $reports->firstItem() - 1 }}</td>
                               
                                <td>
                                    {{ $report->profile->name }}
                                <td>
                                    {{ $report->user->name }}
                                </td>
                                <td>
                                    {{ $report->user->user_role == App\Models\User::LAWYER ? 'Lawyer' : ( $report->user->user_role == App\Models\User::AGENT ? 'Agent' : 'Kazi') }}
                                </td>
                                <td>{{$report->details}}</td>
                                <td>{{$report->created_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $reports->links() }}
            </div>
        </div>
    </div>

@endsection
