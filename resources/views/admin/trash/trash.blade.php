
	@extends('layouts.admin')

		@section('content')
			<div class="container-fluid dashboard-content">
				<div class="row">
	                <div class="col-md-12">
	                    <div class="page-header">
	                        <h2 class="pageheader-title">Trash</h2>
	                        <p class="pageheader-text"></p>
	                        <div class="page-breadcrumb">
	                            <nav aria-label="breadcrumb">
	                                <ol class="breadcrumb">
	                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
	                                    <li class="breadcrumb-item active" aria-current="page">Trash</li>
	                                </ol>
	                            </nav>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="ccol-md-12">
	            	@if(count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>ERROR!</strong>
                            @foreach($errors->all() as $error)
                                {{$error}}<br/>
                            @endforeach-->
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div> 
                    @endif
                    @if(session('delete'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>SUCCESS!</strong> {{session('delete')}}
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        
                    @elseif(session('restore'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>SUCCESS!</strong> {{session('restore')}}
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                    @else

                    @endif
                    <div class="tab-vertical">
                        <ul class="nav nav-tabs" id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="student-vertical-tab" data-toggle="tab" href="#student-vertical" role="tab" aria-controls="student" aria-selected="true">Student</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="staff-vertical-tab" data-toggle="tab" href="#staff-vertical" role="tab" aria-controls="staff" aria-selected="false">Staff</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="visitor-vertical-tab" data-toggle="tab" href="#visitor-vertical" role="tab" aria-controls="visitor" aria-selected="false">Visitors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="class-vertical-tab" data-toggle="tab" href="#class-vertical" role="tab" aria-controls="class" aria-selected="false">Class</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="subject-vertical-tab" data-toggle="tab" href="#subject-vertical" role="tab" aria-controls="subject" aria-selected="false">Subject</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="book-vertical-tab" data-toggle="tab" href="#book-vertical" role="tab" aria-controls="book" aria-selected="true">Book</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="event-vertical-tab" data-toggle="tab" href="#event-vertical" role="tab" aria-controls="event" aria-selected="false">Event</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="gallery-vertical-tab" data-toggle="tab" href="#gallery-vertical" role="tab" aria-controls="gallery" aria-selected="true">Gallery</a>
                            </li>  
                        </ul>
                        <div class="tab-content" id="myTabContent3">
                            <div class="tab-pane fade show active" id="student-vertical" role="tabpanel" aria-labelledby="student-vertical-tab">
                                @include('inc.admin.trash.student.student')
                            </div>
                            <div class="tab-pane fade" id="staff-vertical" role="tabpanel" aria-labelledby="staff-vertical-tab">
                                @include('inc.admin.trash.staff.staff')
                            </div>
                            <div class="tab-pane fade" id="visitor-vertical" role="tabpanel" aria-labelledby="visitor-vertical-tab">
                                @include('inc.admin.trash.visitor.visitor')
                            </div>
                            <div class="tab-pane fade" id="class-vertical" role="tabpanel" aria-labelledby="class-vertical-tab">
                                @include('inc.admin.trash.class.class')
                            </div>
                            <div class="tab-pane fade" id="subject-vertical" role="tabpanel" aria-labelledby="subject-vertical-tab">
                                @include('inc.admin.trash.subject.subject')
                            </div>
                            <div class="tab-pane fade" id="book-vertical" role="tabpanel" aria-labelledby="book-vertical-tab">
                                @include('inc.admin.trash.book.book')
                            </div>
                            <div class="tab-pane fade" id="event-vertical" role="tabpanel" aria-labelledby="event-vertical-tab">
                                @include('inc.admin.trash.event.event')
                            </div>
                            <div class="tab-pane fade" id="gallery-vertical" role="tabpanel" aria-labelledby="gallery-vertical-tab">
                                @include('inc.admin.trash.gallery.gallery')
                            </div>
                        </div>
                    </div>
                </div>
	        </div> 
	    @endsection