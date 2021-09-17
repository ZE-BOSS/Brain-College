
	@extends('layouts.admin')

		@section('content')
			<div class="container-fluid dashboard-content">
	            <!-- ============================================================== -->
	            <!-- pageheader  -->
	            <!-- ============================================================== -->
	            
	            <!-- ============================================================== -->
	            <!-- end pageheader  -->
	            <!-- ============================================================== -->
	            <!-- ============================================================== -->
	            <!-- content  -->
	            <!-- ============================================================== -->
	            <!-- ============================================================== -->
	            <!-- influencer profile  -->
	            <!-- ============================================================== -->
	            <?php
                	use App\Model\site;
                	use App\Model\setting;
                	use App\Model\branch;

                	$site = site::find(1);
                	$setting = setting::find(1);
                	$branches = branch::all()->where('status', 'Active');
                ?>
	            <div class="row">
	                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                    <div class="card influencer-profile-data">
	                        <div class="card-body">
	                            <div class="row">
	                                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
	                                    <div class="text-center">
	                                        <img src="{{asset('/storage/image/site/'.$site->image)}}" alt="User Avatar" class="rounded-circle user-avatar-xxl">
	                                    </div>
	                                </div>
	                                <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
	                                    <div class="user-avatar-info">
	                                        <div class="m-b-20">
	                                            <div class="user-avatar-name">
	                                                <h2 class="mb-1">{{$site->name}}</h2>
	                                            </div>
	                                        </div>
	                                        <div class="user-avatar-address">
	                                            <p class="border-bottom pb-3">
	                                                <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i></span>
	                                                <span class="mb-2 ml-xl-4 d-xl-inline-block d-block">
	                                                	@if(count($branches) > 0)
	                                                		@foreach($branches as $branch)
	                                                			@if($branch->id == $site->address)
	                                                				{{$branch->address}}
	                                                			@endif
	                                                		@endforeach
	                                                	@else
	                                                		No Address Has Been Added
	                                                	@endif
	                                                </span>
	                                            </p>
	                                            <div class="mt-3">
	                                                <a href="#" class="badge badge-light mr-1"><?php echo $site->title; ?></a>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>s
	                    </div>
	                </div>
	            </div>
	            <!-- ============================================================== -->
	            <!-- end influencer profile  -->
	            <!-- ============================================================== -->
	            <!-- ============================================================== -->
	            <!-- widgets   -->
	            <!-- ============================================================== -->
	            <div class="row">
	                <!-- ============================================================== -->
	                <!-- four widgets   -->
	                <!-- ============================================================== -->
	                <!-- ============================================================== -->
	                <!-- total views   -->
	                <!-- ============================================================== -->
	                <?php
	                	use App\Model\event;
	                	use App\Model\gallery;
	                	use App\Model\student;
	                	use App\Model\staff;
	                	use App\Model\clas;
	                	use App\Model\book;
	                	use App\Model\subject;

                		$events = event::all()->where('status', 'Active');
                		$galleries = gallery::all()->where('status', 'Active');
                		$students = student::all()->where('status', 'Active');
                		$staffs = staff::all()->where('status', 'Active');
                		$classes = clas::all()->where('status', 'Active');
                		$books = book::all()->where('status', 'Active');
                		$subjects = subject::all()->where('status', 'Active');
	                ?>
	                @if($setting->dash_wig1 == 'event')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">All Events</h5>
		                                <h2 class="mb-0">{{count($events)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
		                                <i class="fa fa-eye fa-fw fa-sm text-info"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig2 == 'event')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">All Events</h5>
		                                <h2 class="mb-0">{{count($events)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
		                                <i class="fa fa-eye fa-fw fa-sm text-info"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig3 == 'event')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">All Events</h5>
		                                <h2 class="mb-0">{{count($events)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
		                                <i class="fa fa-eye fa-fw fa-sm text-info"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig4 == 'event')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">All Events</h5>
		                                <h2 class="mb-0">{{count($events)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
		                                <i class="fa fa-eye fa-fw fa-sm text-info"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @else

                    @endif

                    @if($setting->dash_wig1 == 'gallery')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">All Gallery Media</h5>
		                                <h2 class="mb-0">{{count($galleries)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig2 == 'gallery')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">All Gallery Media</h5>
		                                <h2 class="mb-0">{{count($galleries)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig3 == 'gallery')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">All Gallery Media</h5>
		                                <h2 class="mb-0">{{count($galleries)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig4 == 'gallery')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">All Gallery Media</h5>
		                                <h2 class="mb-0">{{count($galleries)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @else

                    @endif

                    @if($setting->dash_wig1 == 'class')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">All Classes</h5>
		                                <h2 class="mb-0">{{count($classes)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
		                                <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig2 == 'class')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">All Classes</h5>
		                                <h2 class="mb-0">{{count($classes)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
		                                <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig3 == 'class')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">All Classes</h5>
		                                <h2 class="mb-0">{{count($classes)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
		                                <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig4 == 'class')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">All Classes</h5>
		                                <h2 class="mb-0">{{count($classes)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
		                                <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @else

                    @endif

                    @if($setting->dash_wig1 == 'subject')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Subjects</h5>
		                                <h2 class="mb-0">{{count($subjects)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig2 == 'subject')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Subjects</h5>
		                                <h2 class="mb-0">{{count($subjects)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig3 == 'subject')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Subjects</h5>
		                                <h2 class="mb-0">{{count($subjects)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig4 == 'subject')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Subjects</h5>
		                                <h2 class="mb-0">{{count($subjects)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
		                                <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @else

                    @endif

                    @if($setting->dash_wig1 == 'book')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Books</h5>
		                                <h2 class="mb-0">{{count($books)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig2 == 'book')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Books</h5>
		                                <h2 class="mb-0">{{count($books)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig3 == 'book')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Books</h5>
		                                <h2 class="mb-0">{{count($books)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig4 == 'book')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Books</h5>
		                                <h2 class="mb-0">{{count($books)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @else

                    @endif

                    @if($setting->dash_wig1 == 'student')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Students</h5>
		                                <h2 class="mb-0">{{count($students)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig2 == 'student')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Students</h5>
		                                <h2 class="mb-0">{{count($students)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig3 == 'student')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Students</h5>
		                                <h2 class="mb-0">{{count($students)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
		                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig4 == 'student')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Students</h5>
		                                <h2 class="mb-0">{{count($students)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
		                                <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @else

                    @endif

                    @if($setting->dash_wig1 == 'staff')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Staffs</h5>
		                                <h2 class="mb-0">{{count($staffs)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
		                                <i class="fa fa-eye fa-fw fa-sm text-info"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig2 == 'staff')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Staffs</h5>
		                                <h2 class="mb-0">{{count($staffs)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
		                                <i class="fa fa-eye fa-fw fa-sm text-info"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig3 == 'staff')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Staffs</h5>
		                                <h2 class="mb-0">{{count($staffs)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
		                                <i class="fa fa-eye fa-fw fa-sm text-info"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @elseif($setting->dash_wig4 == 'staff')
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="d-inline-block">
		                                <h5 class="text-muted">Total Staffs</h5>
		                                <h2 class="mb-0">{{count($staffs)}}</h2>
		                            </div>
		                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
		                                <i class="fa fa-eye fa-fw fa-sm text-info"></i>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    @else

                    @endif
	                <!-- ============================================================== -->
	                <!-- end total earned   -->
	                <!-- ============================================================== -->
	            </div>
	            <!-- ============================================================== -->
	            <!-- end widgets   -->
	            <!-- ============================================================== -->
	        </div> 
	    @endsection