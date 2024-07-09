@extends('backend.layouts.app')
@section('title', 'Admin Dashboard')

@push('styles')
<link rel="stylesheet" href="{{asset('/vendor/jqvmap/css/jqvmap.min.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/chartist/css/chartist.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/skin-2.css')}}">
@endpush

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-primary overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title text-white"><i class="fa fa-users"></i>Total Students</h3>
                        <h5 class="text-white mb-0"> {{$student->count()}}</h5>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title text-white"><i class="fa fa-check-square"></i>&nbsp;Total Enrolled</h3>
                        <h5 class="text-white mb-0"> {{$enrollment->count()}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-success overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title text-white"><i class="fa fa-th-list"></i>&nbsp;Courses</h3>
                        <h5 class="text-white mb-0"> {{$course->count()}}</h5>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title text-white"><i class="fa fa-list-alt" ></i>&nbsp;course Category</h3>
                        <h5 class="text-white mb-0"> {{$category->count()}}</h5>
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-info overflow-hidden">
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white"><i class="fa fa-id-badge"></i>&nbsp;Total Instructor</h3>
                        <h5 class="text-white mb-0"> {{$instructor->count()}}</h5>
                    </div>
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white"><i class="fa fa-book">&nbsp;</i>Total Lesson</h3>
                        <h5 class="text-white mb-0"> {{$lesson->count()}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-secondary overflow-hidden">
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white"> <i class="fa fa-users"></i> &nbsp;Users</h3>
                        <h5 class="text-white mb-0"> {{$user->count()}}</h5>
                    </div>
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white"><i class="fa fa-free-code-camp"></i>&nbsp;Events</h3>
                        <h5 class="text-white mb-0"> {{$material->count()}}</h5>
                    </div>
                    
                </div>
            </div>

            
          
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">New Enrolled Student this week </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm mb-0 table-striped">
                                <thead>
                                    <tr>
                                        <th class="px-5 py-3">Student Name</th>
                                        <th class="py-3">Enrolled Course</th>
                                          <th class="py-3">Date</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="customers">
                                    @foreach ($enrollment as $e)
                                        
                                    <tr class="btn-reveal-trigger">
                                        <td class="p-3">
                                            <a href="javascript:void(0);">
                                                <div class="media d-flex align-items-center">
                                                   
                                                    <div class="media-body">
                                                        <h5 class="mb-0 fs--1">{{$e->student?->name_en}}</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">{{$e->course?->title_en}}</td>
                                        <td class="py-2">{{$e->enrollment_date}}</td>
                                       
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
</div>

@endsection

@push('scripts')
<!-- Chart ChartJS plugin files -->
<script src="{{asset('/vendor/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Chart piety plugin files -->
<script src="{{asset('/vendor/peity/jquery.peity.min.js')}}"></script>

<!-- Chart sparkline plugin files -->
<script src="{{asset('/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Demo scripts -->
<script src="{{asset('/js/dashboard/dashboard-3.js')}}"></script>
@endpush