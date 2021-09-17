
    
    <style type="text/css">.space{padding-left: 10px; padding-right: 10px;}</style>
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <!-- ============================================================== -->
                        <!-- overview -->
                        <!-- ============================================================== -->
                        <div class="page-section" id="overview">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">Dashboard</h5>
                                        <div class="card-body">

                                            <div class="col-md-12">
                                                <h4>Allocate Sections to Staffs</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Events</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_event">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->event))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->event == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">News</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_news">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->news))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->news == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Gallery</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_gallery">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->gallery))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->gallery == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Classes</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_class">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->class))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->class == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Subjects</p>
                                                    </div>
                                                    <div class="col-lg-6"> 
                                                        <select class="form-control" id="p_subject">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->subject))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->subject == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Books</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_book">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->book))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->book == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Staffs</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_staff">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->staff))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->staff == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Students</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_student">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->student))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->student == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Messages</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_message">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->message))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->message == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Payments</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_payment">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->payment))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->payment == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Trash</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_trash">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate->trash))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->trash == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div> -->
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Attendance</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_attendance">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->attendance))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->attendance == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Syllabus</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_syllabus">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->syllabus))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->syllabus == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Hostel</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_hostel">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->hostel))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->hostel == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Library</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" id="p_library">
                                                            <option disabled selected>...Select...</option>
                                                            @if(count($staffs) > 0)
                                                                @if(!empty($allocate) && !empty($allocate->library))
                                                                    <option value="" style="color: white; background-color: red">Unallocate</option>
                                                                @endif
                                                                @foreach($staffs as $staff)
                                                                    @if(!empty($allocate) && $allocate->library == $staff->id)
                                                                        <option value="{{$staff->id}}" selected>{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @else
                                                                        <option value="{{$staff->id}}">{{$staff->fisrtname}} {{$staff->othernames}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option disabled>No Staff Has Been Added</option>
                                                            @endif
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <h4>Select 4 categories to show on the dashboard widgets</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Events</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        @if($setting->dash_wig1 == 'event')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="event" id="w_event" value="event" class="switch-input" checked>
                                                        @elseif($setting->dash_wig2 == 'event')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="event" id="w_event" value="event" class="switch-input" checked>
                                                        @elseif($setting->dash_wig3 == 'event')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="event" id="w_event" value="event" class="switch-input" checked>
                                                        @elseif($setting->dash_wig4 == 'event')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="event" id="w_event" value="event" class="switch-input" checked>
                                                        @else
                                                            @if(!empty($setting->dash_wig1) && !empty($setting->dash_wig2) && !empty($setting->dash_wig3) && !empty($setting->dash_wig4))
                                                                <label class="switch switch-default switch-light mr-2">
                                                                    <input type="checkbox" name="event" id="w_event" value="event" class="switch-input" disabled>
                                                            @else
                                                                <label class="switch switch-default switch-primary mr-2">
                                                                    <input type="checkbox" name="event" id="w_event" value="event" class="switch-input">
                                                            @endif
                                                        @endif
                                                            <span class="switch-label"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Gallery</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        @if($setting->dash_wig1 == 'gallery')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="gallery" id="w_gallery" value="gallery" class="switch-input" checked>
                                                        @elseif($setting->dash_wig2 == 'gallery')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="gallery" id="w_gallery" value="gallery" class="switch-input" checked>
                                                        @elseif($setting->dash_wig3 == 'gallery')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="gallery" id="w_gallery" value="gallery" class="switch-input" checked>
                                                        @elseif($setting->dash_wig4 == 'gallery')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="gallery" id="w_gallery" value="gallery" class="switch-input" checked>
                                                        @else
                                                            @if(!empty($setting->dash_wig1) && !empty($setting->dash_wig2) && !empty($setting->dash_wig3) && !empty($setting->dash_wig4))
                                                                <label class="switch switch-default switch-light mr-2">
                                                                    <input type="checkbox" name="gallery" id="w_gallery" value="gallery" class="switch-input" disabled>
                                                            @else
                                                                <label class="switch switch-default switch-primary mr-2">
                                                                    <input type="checkbox" name="gallery" id="w_gallery" value="gallery" class="switch-input">
                                                            @endif
                                                        @endif
                                                            <span class="switch-label"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Classes</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        @if($setting->dash_wig1 == 'class')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="class" id="w_class" value="class" class="switch-input" checked>
                                                        @elseif($setting->dash_wig2 == 'class')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="class" id="w_class" value="class" class="switch-input" checked>
                                                        @elseif($setting->dash_wig3 == 'class')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="class" id="w_class" value="class" class="switch-input" checked>
                                                        @elseif($setting->dash_wig4 == 'class')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="class" id="w_class" value="class" class="switch-input" checked>
                                                        @else
                                                            @if(!empty($setting->dash_wig1) && !empty($setting->dash_wig2) && !empty($setting->dash_wig3) && !empty($setting->dash_wig4))
                                                                <label class="switch switch-default switch-light mr-2">
                                                                    <input type="checkbox" name="class" id="w_class" value="class" class="switch-input" disabled>
                                                            @else
                                                                <label class="switch switch-default switch-primary mr-2">
                                                                    <input type="checkbox" name="class" id="w_class" value="class" class="switch-input">
                                                            @endif
                                                        @endif
                                                            <span class="switch-label"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Subjects</p>
                                                    </div>
                                                    <div class="col-lg-6"> 
                                                        @if($setting->dash_wig1 == 'subject')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="subject" id="w_subject" value="subject" class="switch-input" checked>
                                                        @elseif($setting->dash_wig2 == 'subject')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="subject" id="w_subject" value="subject" class="switch-input" checked>
                                                        @elseif($setting->dash_wig3 == 'subject')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="subject" id="w_subject" value="subject" class="switch-input" checked>
                                                        @elseif($setting->dash_wig4 == 'subject')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="subject" id="w_subject" value="subject" class="switch-input" checked>
                                                        @else
                                                            @if(!empty($setting->dash_wig1) && !empty($setting->dash_wig2) && !empty($setting->dash_wig3) && !empty($setting->dash_wig4))
                                                                <label class="switch switch-default switch-light mr-2">
                                                                    <input type="checkbox" name="subject" id="w_subject" value="subject" class="switch-input" disabled>
                                                            @else
                                                                <label class="switch switch-default switch-primary mr-2">
                                                                    <input type="checkbox" name="subject" id="w_subject" value="subject" class="switch-input">
                                                            @endif
                                                        @endif
                                                            <span class="switch-label"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Books</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        @if($setting->dash_wig1 == 'book')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="book" id="w_book" value="book" class="switch-input" checked>
                                                        @elseif($setting->dash_wig2 == 'book')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="book" id="w_book" value="book" class="switch-input" checked>
                                                        @elseif($setting->dash_wig3 == 'book')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="book" id="w_book" value="book" class="switch-input" checked>
                                                        @elseif($setting->dash_wig4 == 'book')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="book" id="w_book" value="book" class="switch-input" checked>
                                                        @else
                                                            @if(!empty($setting->dash_wig1) && !empty($setting->dash_wig2) && !empty($setting->dash_wig3) && !empty($setting->dash_wig4))
                                                                <label class="switch switch-default switch-light mr-2">
                                                                    <input type="checkbox" name="book" id="w_book" value="book" class="switch-input" disabled>
                                                            @else
                                                                <label class="switch switch-default switch-primary mr-2">
                                                                    <input type="checkbox" name="book" id="w_book" value="book" class="switch-input">
                                                            @endif
                                                        @endif
                                                            <span class="switch-label"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Staffs</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        @if($setting->dash_wig1 == 'staff')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="staff" id="w_staff" value="staff" class="switch-input" checked>
                                                        @elseif($setting->dash_wig2 == 'staff')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="staff" id="w_staff" value="staff" class="switch-input" checked>
                                                        @elseif($setting->dash_wig3 == 'staff')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="staff" id="w_staff" value="staff" class="switch-input" checked>
                                                        @elseif($setting->dash_wig4 == 'staff')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="staff" id="w_staff" value="staff" class="switch-input" checked>
                                                        @else
                                                            @if(!empty($setting->dash_wig1) && !empty($setting->dash_wig2) && !empty($setting->dash_wig3) && !empty($setting->dash_wig4))
                                                                <label class="switch switch-default switch-light mr-2">
                                                                    <input type="checkbox" name="staff" id="w_staff" value="staff" class="switch-input" disabled>
                                                            @else
                                                                <label class="switch switch-default switch-primary mr-2">
                                                                    <input type="checkbox" name="staff" id="w_staff" value="staff" class="switch-input">
                                                            @endif
                                                        @endif
                                                            <span class="switch-label"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 space">
                                                    <div class="col-lg-6">
                                                        <p style="font-size: 15px;">Students</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        @if($setting->dash_wig1 == 'student')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="student" id="w_student" value="student" class="switch-input" checked>
                                                        @elseif($setting->dash_wig2 == 'student')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="student" id="w_student" value="student" class="switch-input" checked>
                                                        @elseif($setting->dash_wig3 == 'student')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="student" id="w_student" value="student" class="switch-input" checked>
                                                        @elseif($setting->dash_wig4 == 'student')
                                                            <label class="switch switch-default switch-primary mr-2">
                                                                <input type="checkbox" name="student" id="w_student" value="student" class="switch-input" checked>
                                                        @else
                                                            @if(!empty($setting->dash_wig1) && !empty($setting->dash_wig2) && !empty($setting->dash_wig3) && !empty($setting->dash_wig4))
                                                                <label class="switch switch-default switch-light mr-2">
                                                                    <input type="checkbox" name="student" id="w_student" value="student" class="switch-input" disabled>
                                                            @else
                                                                <label class="switch switch-default switch-primary mr-2">
                                                                    <input type="checkbox" name="student" id="w_student" value="student" class="switch-input">
                                                            @endif
                                                        @endif
                                                            <span class="switch-label"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end overview -->
                        <!-- ============================================================== -->
                    </div>
                </div>
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- modal  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="modal">
                            <h3 class="section-title"></h3>
                        </div>
                        <div class="card">
                            <h5 class="card-header">School Branch</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card" id="modal">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-5" style="display: none; padding: 10px;"id="back_branch_main">
                                                        <a href="#" class="btn btn-outline-danger btn-sm sub" id="back_branch">< Back</a>
                                                    </div>
                                                    <div class="col-md-5" style="padding: 10px;" id="add_branch_main">
                                                        <a href="#" class="btn btn-outline-success btn-sm sub" id="add_branch">Add New Branch</a>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <h5 class="card-header">Branch</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="errbranch">
                                                    <strong>ERROR!</strong>
                                                    <p id="ebranch"></p>
                                                    <a class="close" onclick="document.getElementById('errbranch').style.display = 'none';" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </a>
                                                </div>
                                                <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="sucbranch">
                                                    <strong>SUCCESS!</strong>
                                                    <p id="sbranch"></p>
                                                    <a class="close" onclick="document.getElementById('sucbranch').style.display = 'none';$('#reload').load(`{{route('settings.index')}}`);" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </a>
                                                </div>
                                                <div class="datatable-dashv1-list custom-datatable-overright" id="btable_view">
                                                    @if(count($branches) > 0)
                                                        <div id="toolbar8" style="width: 170px; position: absolute; margin-bottom: 10px; margin-left: 10px;margin-top: 10px; margin-right: 10px; line-height: 34px;">
                                                            <div class="row">
                                                                <div class="col-lg-12" style="margin-left: 0px;">
                                                                    <select class="form-control">
                                                                        <option value="">Export Basic</option>
                                                                        <option value="all">Export All</option>
                                                                        <option value="selected">Export Selected</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table class="table" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                                            <thead>
                                                                <tr class="border-0">
                                                                    <th data-field="state" data-checkbox="true"></th>
                                                                    <th data-field="bn" class="border-0">Branch Name</th>
                                                                    <th data-field="ba" class="border-0">Branch Address</th>
                                                                    <th data-field="b_term" class="border-0">Term</th>
                                                                    <th data-field="b_session" class="border-0">Session</th>
                                                                    <th data-field="b_status" class="border-0">Status</th>
                                                                    <th data-field="b_action" class="border-0">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody style="position: relative;">
                                                                @foreach($branches as $branch)
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><a href="#" id="branch_view{{$branch->id}}">{{$branch->name}}</a></td>
                                                                        <td>{{$branch->address}}</td>
                                                                        @if(count($terms) > 0)
                                                                            @foreach($terms as $term)
                                                                                @if($branch->term == $term->id)
                                                                                    <td>{{$term->name}}</td>
                                                                                @endif
                                                                            @endforeach
                                                                        @else    
                                                                            <td style="color: red;">None</td>
                                                                        @endif
                                                                        @if(count($sessions) > 0)
                                                                            @foreach($sessions as $session)
                                                                                @if($branch->session == $session->id)
                                                                                    <td>{{$session->name}}</td>
                                                                                @endif
                                                                            @endforeach
                                                                        @else    
                                                                            <td style="color: red;">None</td>
                                                                        @endif
                                                                        <td>{{$branch->status}}</td>
                                                                        <td>
                                                                            <div class="dropdown" style="text-align: center;">
                                                                                <a href="#" class="dropdown-toggle card-drop" data-toggle="collapse" aria-expanded="false" data-target="#bsubmenu-{{$branch->id}}" aria-controls="bsubmenu-{{$branch->id}}">
                                                                                    <i class="fas fa-ellipsis-h"></i>
                                                                                </a>
                                                                            </div>
                                                                            <div class="collapse submenu" id="bsubmenu-{{$branch->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
                                                                                <!-- item-->
                                                                                <a href="#" id="branch_b_view{{$branch->id}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-eye"></i> View</a>
                                                                                <!-- item-->
                                                                                <a href="#" id="branch_edit{{$branch->id}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-edit"></i> Edit</a>
                                                                                
                                                                                <a href="#" id="branch_close{{$branch->id}}" class="dropdown-item" data-toggle="modal" data-target="#bexampleModal{{$branch->id}}" style="color: #71748d;"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <div class="modal fade show" id="bexampleModal{{$branch->id}}" tabindex="-1" role="dialog" aria-labelledby="bexampleModalLabel" style="display: none;">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="bexampleModalLabel">Warning!</h5>
                                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p>Are you sure you want to delete this branch data?</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                                    <button id="bdelete-form-{{ $branch->id }}" class="btn btn-primary">Confirm</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <div style="text-align: center; font-size: 20px;">
                                                            <i>
                                                                <div> No Branch Has Been Added Yet!</div>
                                                            </i>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if(count($branches) > 0)
                                                    @foreach($branches as $branch)
                                                        <div class="col-md-12" id="bView{{$branch->id}}" style="display: none;">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p class="lead"><i class="fas fa-user"></i> Branch Name</p>
                                                                    <p>{{$branch->name}}</p><br>
                                                                </div>
                                                                <hr class="mb-4">
                                                                <div class="col-md-6">
                                                                    <p class="lead"><i class="fas fa-user-circle"></i> Branch Address</p>
                                                                    <p>{{$branch->address}}</p><br>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p class="lead"><i class="fas fa-user-circle"></i> Branch Status</p>
                                                                    <p>{{$branch->status}}</p><br>
                                                                </div>
                                                                <hr class="mb-4">
                                                                <div class="col-md-6">
                                                                    <p class="lead"><i class="fas fa-user-circle"></i> Term Created</p>
                                                                    @if(count($terms) > 0)
                                                                        @foreach($terms as $term)
                                                                            @if($branch->term == $term->id)
                                                                                <p style="color: green;">{{$term->name}}</p>
                                                                            @endif
                                                                        @endforeach
                                                                    @else    
                                                                        <p style="color: red;">None</p>
                                                                    @endif
                                                                </div>
                                                                <hr class="mb-4"><br>
                                                                <div class="col-md-6">
                                                                    <p class="lead"><i class="fas fa-user-circle"></i>Session Created</p>
                                                                    @if(count($sessions) > 0)
                                                                        @foreach($sessions as $session)
                                                                            @if($branch->session == $session->id)
                                                                                <p>{{$session->name}}</p>
                                                                            @endif
                                                                        @endforeach
                                                                    @else    
                                                                        <p style="color: red;">None</p>
                                                                    @endif
                                                                </div><br>
                                                                <hr class="mb-4"><br>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <form id="branch" style="display: none;" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                                    @csrf
                                                    {{ method_field('POST') }}
                                                    <h5>Enter branch infomation.</h5>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="bname">Branch Name</label>
                                                            <input type="text" class="form-control" name="bname" id="bname">
                                                            <div class="invalid-feedback">
                                                                Branch Name is required.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="baddress">Branch Address</label>
                                                            <input type="text" class="form-control" name="baddress" id="baddress">
                                                            <div class="invalid-feedback">
                                                                Branch Address is required.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div><br>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button class="btn btn-success btn-lg sub">Save</button>
                                                                <br/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                @if(count($branches) > 0)
                                                    @foreach($branches as $branch)
                                                        <form id="upbranch{{$branch->id}}" style="display: none;" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                                            @csrf
                                                            {{ method_field('POST') }}
                                                            <input type="hidden" class="form-control" value="{{$branch->id}}" name="bid{{$branch->id}}" id="bid{{$branch->id}}">
                                                            <h5>Edit Branch infomation.</h5>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="upbname{{$branch->id}}">Branch Name</label>
                                                                    <input type="text" class="form-control" value="{{$branch->name}}" name="upbname{{$branch->id}}" id="upbname{{$branch->id}}">
                                                                    <div class="invalid-feedback">
                                                                        Branch Name is required.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="upbaddress{{$branch->id}}">Branch Address</label>
                                                                    <input type="text" class="form-control" value="{{$branch->address}}" name="upbaddress{{$branch->id}}" id="upbaddress{{$branch->id}}">
                                                                    <div class="invalid-feedback">
                                                                        Branch Address is required.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div><br>
                                                                <div class="row">
                                                                    <div class="col-md-10">
                                                                        
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <button class="btn btn-success btn-lg sub">Save</button>
                                                                        <br/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @endforeach
                                                @endif 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- modal  -->
                    <!-- ============================================================== -->
                </div>
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- paginations  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="pagination">
                            <h3 class="section-title"></h3>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Students</h5>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- pagination  -->
                    <!-- ============================================================== -->
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <!-- ============================================================== -->
                        <!-- images  -->
                        <!-- ============================================================== -->
                        <div class="card" id="images">
                            <h5 class="card-header">Messages</h5>
                            <div class="card-body">
                                
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end images -->
                        <!-- ============================================================== -->
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- progressbar  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card" id="pro-bars">
                            <h5 class="card-header">Payments</h5>
                            <div class="card-body">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                                    <div class="section-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-lg-12">
                                                    <p style="font-size: 15px;">Activate Online Payment For Students</p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="switch switch-default switch-success mr-2">
                                                        <input type="checkbox" class="switch-input" checked="true">
                                                        <span class="switch-label curve-label"></span>
                                                        <span class="switch-handle curve-handle"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-lg-12">
                                                    <p style="font-size: 15px;">Pay Staffs Online Using This Platform</p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="switch switch-default switch-info mr-2">
                                                        <input type="checkbox" class="switch-input" checked="true">
                                                        <span class="switch-label curve-label"></span>
                                                        <span class="switch-handle curve-handle"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pills-outline">
                                        <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="home" aria-selected="true">Students</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="profile" aria-selected="false">Staffs</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="spi_success">
                                                    <strong>SUCCESS!</strong>
                                                    <p id="spi_suc"></p>
                                                    <a class="close" onclick="document.getElementById('spi_success').style.display = 'none';$('#reload').load(`{{route('settings.index')}}`);" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </a>
                                                </div>
                                                <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="spi_error">
                                                    <strong>ERROR!</strong>
                                                    <p id="spi_err"></p>
                                                    <a class="close" onclick="document.getElementById('spi_error').style.display = 'none';" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </a>
                                                </div>
                                                <form id="student_payment_info" method="post" enctype="multipart/form-data" class="needs_validation" novalidate="">
                                                    {{ csrf_field() }}
                                                    <h5>School Account Information</h5>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="acc_name">Account Name</label>
                                                            <input type="hidden" class="form-control" name="spi_id" value="{{$id}}"  id="spi_id">
                                                            <input type="text" class="form-control" name="acc_name" placeholder="{{$site->acc_name}}" id="acc_name" required="required">
                                                            <div class="invalid-feedback">
                                                                Account Name is required.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="acc_number">Account Number</label>
                                                            <input type="number" class="form-control" name="acc_number" placeholder="{{$site->acc_number}}" id="acc_number" required="required">
                                                            <div class="invalid-feedback">
                                                                Account Number is required.
                                                            </div><br/>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="acc_bank">Account Bank</label>
                                                            <input type="text" class="form-control" name="acc_bank" placeholder="{{$site->acc_bank}}" id="acc_bank" required="required">
                                                            <div class="invalid-feedback">
                                                                Account Bank is required.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button class="btn btn-primary btn-lg">Submit</button>
                                                            <br/>
                                                        </div>
                                                    </div>
                                                </form><br>
                                                <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="spp_success">
                                                    <strong>SUCCESS!</strong>
                                                    <p id="spp_suc"></p>
                                                    <a class="close" onclick="document.getElementById('spp_success').style.display = 'none';$('#reload').load(`{{route('settings.index')}}`);" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </a>
                                                </div>
                                                <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="spp_error">
                                                    <strong>ERROR!</strong>
                                                    <p id="spp_err"></p>
                                                    <a class="close" onclick="document.getElementById('spp_error').style.display = 'none';" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </a>
                                                </div>
                                                <form id="student_payment_price" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                                    {{ csrf_field() }}
                                                    <h5>Students Payment Information</h5>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="pay_class">Select Class</label>
                                                            <select class="form-control" name="pay_class" placeholder="{{$site->pay_class}}" id="pay_class" required="">
                                                                @if(count($classes) > 0)
                                                                    @foreach($classes as $class)
                                                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                                                    @endforeach
                                                                @else
                                                                    <option disabled="disabled">No Class</option>
                                                                @endif
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Payment Class is required.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="pay_name">Payment Name</label>
                                                            <input type="text" class="form-control" name="pay_name" placeholder="{{$site->pay_name}}" id="pay_name" required="">
                                                            <div class="invalid-feedback">
                                                                Payment Name is required.
                                                            </div><br/>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="pay_price">Payment Price</label>
                                                            <input type="number" class="form-control" name="pay_price" placeholder="{{$site->pay_price}}" id="pay_price" required="">
                                                            <div class="invalid-feedback">
                                                                Payment Price is required.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="pay_discount">Payment Discount</label>
                                                            <input type="number" class="form-control" name="pay_discount" placeholder="{{$site->pay_discount}}" id="pay_discount" required="">
                                                            <div class="invalid-feedback">
                                                                Payment Discount is required.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button class="btn btn-primary btn-lg sub">Submit</button>
                                                            <br/>
                                                        </div>
                                                    </div>
                                                </form><br><br>
                                                <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="p_success">
                                                    <strong>SUCCESS!</strong>
                                                    <p id="p_suc"></p>
                                                    <a class="close" onclick="document.getElementById('p_success').style.display = 'none';$('#reload').load(`{{route('settings.index')}}`);" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </a>
                                                </div>
                                                <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="p_error">
                                                    <strong>ERROR!</strong>
                                                    <p id="p_err"></p>
                                                    <a class="close" onclick="document.getElementById('p_error').style.display = 'none';" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </a>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="datatable-dashv1-list custom-datatable-overright">
                                                            @if(count($pays) > 0)
                                                                <div id="toolbar0_0" style="width: 170px; position: absolute; margin-bottom: 10px; margin-left: 10px;margin-top: 10px; margin-right: 10px; line-height: 34px;" class="">
                                                                    <select class="form-control">
                                                                        <option value="">Export Basic</option>
                                                                        <option value="all">Export All</option>
                                                                        <option value="selected">Export Selected</option>
                                                                    </select>
                                                                </div>
                                                                <table class="table" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                                                    <thead>
                                                                        <tr class="border-0">
                                                                            <th data-field="state" data-checkbox="true"></th>
                                                                            <th data-field="class" class="border-0">Class</th>
                                                                            <th data-field="name" class="border-0">Name</th>
                                                                            <th data-field="price" class="border-0">Price</th>
                                                                            <th data-field="discount" class="border-0">Discount</th>
                                                                            <th data-field="spp_session" class="border-0">Session</th>
                                                                            <th data-field="spp_term" class="border-0">Term</th>
                                                                            <th data-field="spp_action" class="border-0">Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody style="position: relative;">
                                                                        @foreach($pays as $pay)
                                                                            <tr>
                                                                                <td></td>
                                                                                @if(count($classes) > 0)
                                                                                    @foreach($classes as $class)
                                                                                        @if($pay->class == $class->id)
                                                                                            <td><a href="{{route('classes.show', $class->id)}}">{{$class->name}}</a></td>
                                                                                        @elseif($pay->class == 0)
                                                                                            <td>All Classes</td>
                                                                                        @else

                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                                <td>{{$pay->name}}</td>
                                                                                <td>{{$pay->price}}</td>
                                                                                <td>{{$pay->discount}}</td>
                                                                                @if(count($sessions) > 0)
                                                                                    @foreach($sessions as $session)
                                                                                        @if($session->id == $pay->session)
                                                                                            <td>{{$session->name}}</td>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                                @if(count($terms) > 0)
                                                                                    @foreach($terms as $term)
                                                                                        @if(count($sessions) > 0)
                                                                                            @foreach($sessions as $session)
                                                                                                @if($session->id == $term->session && $term->id == $pay->term)
                                                                                                    <td>{{$term->name}}</td>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                                <td>
                                                                                    <div class="dropdown" style="text-align: center;">
                                                                                        <a href="#" class="dropdown-toggle card-drop" href="#" data-toggle="collapse" aria-expanded="false" data-target="#spp_submenu-{{$pay->id}}" aria-controls="spp_submenu-{{$pay->id}}">
                                                                                            <i class="fas fa-ellipsis-h"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="collapse submenu" id="spp_submenu-{{$pay->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
                                                                                        <!-- item-->
                                                                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#spp_exampleModal{{$pay->id}}" style="color: #71748d;"><i class="fas fa-trash-alt"></i>Delete</a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <div class="modal fade show" id="spp_exampleModal{{$pay->id}}" tabindex="-1" role="dialog" aria-labelledby="spp_exampleModalLabel" style="display: none;">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="spp_exampleModalLabel">Warning!</h5>
                                                                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">×</span>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <p>Are you sure you want to delete this Payment data?</p>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <input type="hidden" name="p_id{{$pay->id}}" id="p_id{{$pay->id}}" value="{{$pay->id}}">
                                                                                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                                            <a class="btn btn-primary" href="#" id="payment_btns{{$pay->id}}">Confirm</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <div style="text-align: center; font-size: 20px;">
                                                                    <i>
                                                                        <div> No Payment Has Been Registered Yet!</div>
                                                                    </i>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="stf_success">
                                                    <strong>SUCCESS!</strong>
                                                    <p id="stf_suc"></p>
                                                    <a class="close" onclick="document.getElementById('stf_success').style.display = 'none';$('#reload').load(`{{route('settings.index')}}`);" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </a>
                                                </div>
                                                <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="stf_error">
                                                    <strong>ERROR!</strong>
                                                    <p id="stf_err"></p>
                                                    <a class="close" onclick="document.getElementById('stf_error').style.display = 'none';" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </a>
                                                </div>
                                                <form id="stf_payment" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                                    {{ csrf_field() }}
                                                    <h5>Staffs Payment Information</h5>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="stf_staff">Select Staff</label>
                                                            <select class="form-control" name="stf_staff" id="stf_staff" required="">
                                                                @if(count($staffs) > 0 && count($payments) > 0)
                                                                    @foreach($payments as $payment)
                                                                        @foreach($staffs as $staff)
                                                                            @if($payment->staffid == $staff->id && $payment->m.' '.$payment->y == date('M').' '.date('Y'))
                                                                                <option value="{{$staff->id}}">{{$staff->firstname}} {{$staff->othernames}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    @endforeach
                                                                @else
                                                                    <option disabled="disabled">No Staff</option>
                                                                @endif
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Staff Name is required.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="stf_salary">Salary</label>
                                                            <input type="number" class="form-control" name="stf_salary" id="stf_salary" required="">
                                                            <div class="invalid-feedback">
                                                                Salary is required.
                                                            </div><br/>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="stf_bonus">Bonus</label>
                                                            <input type="number" value="0" class="form-control" name="stf_bonus" id="stf_bonus">
                                                            <div class="invalid-feedback">
                                                                Bonus is required.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button class="btn btn-primary btn-lg sub">Submit</button>
                                                            <br/>
                                                        </div>
                                                    </div>
                                                </form><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end progressbar  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" id="loader">
                            <h5 class="card-header">Trash</h5>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card" id="site">
                            <h5 class="card-header">Site</h5>
                            <div class="card-body">
                                <form method="post" action="/main_controller_panel/settings/site" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name">Site Name</label>
                                            <input type="hidden" class="form-control" name="id" value="{{$id}}"  id="id">
                                            <input type="text" class="form-control" name="name" placeholder="{{$site->name}}" id="name">
                                            <div class="invalid-feedback">
                                                Name is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="motor">Site Motor</label>
                                            <input type="text" class="form-control" name="motor" placeholder="{{$site->title}}" id="motor">
                                            <div class="invalid-feedback">
                                                Motor is required.
                                            </div><br/>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="footer">Site Footer</label>
                                            <input type="text" class="form-control" name="footer" placeholder="{{$site->footer}}" id="footer">
                                            <div class="invalid-feedback">
                                                Footer is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email">Site Email</label>
                                            <input type="text" class="form-control" name="email" placeholder="{{$site->email}}" id="email">
                                            <div class="invalid-feedback">
                                                Email is required.
                                            </div><br/>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name">Facebook</label>
                                            <input type="text" class="form-control" name="facebook" placeholder="{{$site->facebook}}" id="facebook">
                                            <div class="invalid-feedback">
                                                Facebook is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="instagram">Instagram</label>
                                            <input type="text" class="form-control" name="instagram" placeholder="{{$site->instagram}}" id="instagram">
                                            <div class="invalid-feedback">
                                                Instagram is required.
                                            </div><br/>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="twitter">Twitter</label>
                                            <input type="text" class="form-control" name="twitter" placeholder="{{$site->twitter}}" id="twitter">
                                            <div class="invalid-feedback">
                                                Twitter is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="youtube">Youtube</label>
                                            <input type="text" class="form-control" name="youtube" placeholder="{{$site->youtube}}" id="youtube">
                                            <div class="invalid-feedback">
                                                Youtube is required.
                                            </div><br/>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Pinterest">Pinterest</label>
                                            <input type="text" class="form-control" name="pinterest" placeholder="{{$site->pinterest}}" id="pinterest">
                                            <div class="invalid-feedback">
                                                Pinterest is required.
                                            </div><br/>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="linkin">Linkin</label>
                                            <input type="text" class="form-control" name="linkin" placeholder="{{$site->linkin}}" id="linkin">
                                            <div class="invalid-feedback">
                                                Linkin is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="linkin">Students Admission Number Prefix</label>
                                            <input type="text" class="form-control" name="admission_no_prefix" placeholder="{{$site->admission_no_prefix}}" id="admission_no_prefix">
                                            <div class="invalid-feedback">
                                                Students Admission Number Prefix is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="address">Select Main Branch</label>
                                            <select class="form-control" name="address" id="address" required="">
                                                @if(count($branches) > 0)
                                                    <option selected="selected" disabled="disabled">Select...</option>
                                                    @foreach($branches as $branch)
                                                        @if($branch->id == $site->address)
                                                            <option selected="selected" value="{{$branch->id}}">{{$branch->name}}</option>
                                                        @else
                                                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option disabled="disabled">No Staff</option>
                                                @endif
                                            </select>
                                            <div class="invalid-feedback">
                                                Main Branch Address is required.
                                            </div><br/>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="start">When did this school start?</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="day">Day</label>
                                                    <input type="number" class="form-control" name="day" placeholder="{{$site->d}}" id="day">
                                                    <div class="invalid-feedback">
                                                        Day is required.
                                                    </div><br/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="month">Month</label>
                                                    <input type="number" class="form-control" name="month" placeholder="{{$site->m}}" id="month">
                                                    <div class="invalid-feedback">
                                                        Month is required.
                                                    </div><br/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="year">Year</label>
                                                    <input type="number" class="form-control" name="year" placeholder="{{$site->y}}" id="year">
                                                    <div class="invalid-feedback">
                                                        Year is required.
                                                    </div><br/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="phone">Phone Numbers</label>
                                            <input type="text" class="form-control" name="phone" placeholder="{{$site->phoneno}}" id="phone">
                                            <div class="invalid-feedback">
                                                Phone Numbers is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12"><br>
                                            <label for="sim">School Introductory Message</label>
                                            <textarea class="form-control" name="sim" id="sim">{{$site->sim}}</textarea>
                                            <div class="invalid-feedback">
                                                Site Introductory Message is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="sam">School Application Message</label>
                                            <textarea class="form-control" name="sam" id="sam">{{$site->sam}}</textarea>
                                            <div class="invalid-feedback">
                                                School Application Message is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="aboutus">About Us</label>
                                            <textarea class="form-control" name="aboutus" id="aboutus">{{$site->aboutus}}</textarea>
                                            <div class="invalid-feedback">
                                                About Us is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="tc">Terms & Conditions</label>
                                            <textarea class="form-control" name="tc" id="tc">{{$site->tc}}</textarea>
                                            <div class="invalid-feedback">
                                                Terms & Conditions is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="pp">Privacy Policies</label>
                                            <textarea class="form-control" name="pp" id="pp">{{$site->pp}}</textarea>
                                            <div class="invalid-feedback">
                                                Privacy Policies is required.
                                            </div><br>
                                        </div>
                                        <div class="col-md-6"><br/>
                                            <label for="image">School Logo</label>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                            <input type="file" class="form-control" onchange="readURL(this);" name="image" placeholder="{{$site->image}}" id="image">
                                            @if(!empty($site->image) &&  file_exists(storage_path().'/app/public/image/site/'.$site->image))
                                                <img id="blah" style="position: relative; width: 390px; height: 200px;" src="{{asset('/storage/image/site/'.$site->image)}}" alt="Your Image"/>
                                            @else
                                                <img id="blah" style="display: none;" src="#" alt="Your Image"/>
                                            @endif
                                            <div class="invalid-feedback">
                                                Image is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6"><br/>
                                            <label for="simi">School Introductory Message Image</label>
                                            <input type="file" class="form-control" onchange="readSIMI(this);" name="simi" placeholder="{{$site->simi}}" id="simi">
                                            @if(!empty($site->simi) &&  file_exists(storage_path().'/app/public/image/site/'.$site->simi))
                                                <img id="re_simi" style="position: relative; width: 390px; height: 200px;" src="{{asset('/storage/image/site/'.$site->simi)}}" alt="Your Image"/>
                                            @else
                                                <img id="re_simi" style="display: none;" src="#" alt="Your Image"/>
                                            @endif
                                            <div class="invalid-feedback">
                                                School Introductory Message Image is required.
                                            </div><br/>
                                        </div>
                                        <div class="col-md-6"><br/><br/>
                                            <label for="sami">School Application Message Image</label>
                                            <input type="file" class="form-control" onchange="readSAMI(this);" name="sami" placeholder="{{$site->sami}}" id="sami">
                                            @if(!empty($site->sami) &&  file_exists(storage_path().'/app/public/image/site/'.$site->sami))
                                                <img id="re_sami" style="position: relative; width: 390px; height: 200px;" src="{{asset('/storage/image/site/'.$site->sami)}}" alt="Your Image"/>
                                            @else
                                                <img id="re_sami" style="display: none;" src="#" alt="Your Image"/>
                                            @endif
                                            <div class="invalid-feedback">
                                                Image is required.
                                            </div><br/>
                                        </div>
                                        <div class="col-md-6"><br/>
                                            <label for="aui">About Us Image</label>
                                            <input type="file" class="form-control" onchange="readAUI(this);" name="aui" placeholder="{{$site->aui}}" id="aui">
                                            @if(!empty($site->aui) &&  file_exists(storage_path().'/app/public/image/site/'.$site->aui))
                                                <img id="re_aui" style="position: relative; width: 390px; height: 200px;" src="{{asset('/storage/image/site/'.$site->aui)}}" alt="Your Image"/>
                                            @else
                                                <img id="re_aui" style="display: none;" src="#" alt="Your Image"/>
                                            @endif
                                            <div class="invalid-feedback">
                                                School Application Message Image is required.
                                            </div><br/>
                                        </div>
                                        <div class="col-md-6"><br/>
                                            <label for="sbi">Site Background Image</label>
                                            <input type="file" class="form-control" onchange="readSBI(this);" name="sbi" placeholder="{{$site->sbi}}" id="sbi">
                                            @if(!empty($site->sbi) &&  file_exists(storage_path().'/app/public/image/site/'.$site->sbi))
                                                <img id="re_sbi" style="position: relative; width: 390px; height: 200px;" src="{{asset('/storage/image/site/'.$site->sbi)}}" alt="Your Image"/>
                                            @else
                                                <img id="re_sbi" style="display: none;" src="#" alt="Your Image"/>
                                            @endif
                                            <div class="invalid-feedback">
                                                Site Background Image is required.
                                            </div><br/>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <h5>Select the media type to be uploaded in sites home page</h5>
                                            <div class="row">
                                                @if(!empty($site->type) &&  $site->type == 'image' && !empty($site->background) &&  file_exists(storage_path().'/app/public/image/site/'.$site->background))
                                                    <div class="col-md-6">
                                                        <h6>Image</h6>
                                                        <label class="switch switch-default switch-warning mr-2">
                                                            <input type="checkbox" name="type" checked class="switch-input" value="image" id="img">
                                                            <span class="switch-label curve-label"></span>
                                                            <span class="switch-handle curve-handle"></span>
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="col-md-6">
                                                        <h6>Image</h6>
                                                        <label class="switch switch-default switch-warning mr-2">
                                                            <input type="checkbox" name="type" class="switch-input" value="image" id="img">
                                                            <span class="switch-label curve-label"></span>
                                                            <span class="switch-handle curve-handle"></span>
                                                        </label>
                                                    </div>
                                                @endif
                                                @if(!empty($site->type) &&  $site->type == 'video' && !empty($site->background2) &&  file_exists(storage_path().'/app/public/video/site/'.$site->background2))
                                                    <div class="col-md-6">
                                                        <h6>Video</h6>
                                                        <label class="switch switch-default switch-info mr-2">
                                                            <input type="checkbox" checked name="type" class="switch-input" value="video" id="vid">
                                                            <span class="switch-label curve-label"></span>
                                                            <span class="switch-handle curve-handle"></span>
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="col-md-6">
                                                        <h6>Video</h6>
                                                        <label class="switch switch-default switch-info mr-2">
                                                            <input type="checkbox" name="type" class="switch-input" value="video" id="vid">
                                                            <span class="switch-label curve-label"></span>
                                                            <span class="switch-handle curve-handle"></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6"><br/>
                                            <label for="cui">Contact Us Image</label>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                            <input type="file" class="form-control" onchange="readCUI(this);" name="cui" placeholder="{{$site->cui}}" id="cui">
                                            @if(!empty($site->cui) &&  file_exists(storage_path().'/app/public/image/site/'.$site->cui))
                                                <img id="re_cui" style="position: relative; width: 390px; height: 200px;" src="{{asset('/storage/image/site/'.$site->cui)}}" alt="Your Image"/>
                                            @else
                                                <img id="re_cui" style="display: none;" src="#" alt="Your Image"/>
                                            @endif
                                            <div class="invalid-feedback">
                                                Contact Us Image is required.
                                            </div><br/>
                                        </div>
                                        @if($site->type == 'image')
                                            <div class="col-md-6" id="backg"><br/>
                                                <label for="background">Image</label>
                                                <input type="file" class="form-control" onchange="readLink(this);" name="background" placeholder="{{$site->background}}" id="background">
                                                <img id="blaw" style="position: relative; width: 390px; height: 200px;" src="{{asset('/storage/image/site/'.$site->background)}}" alt=""/>
                                            </div>
                                        @else
                                            <div class="col-md-6" style="display: none;" id="backg"><br/>
                                                <label for="background">Image</label>
                                                <input type="file" class="form-control" onchange="readLink(this);" name="background" placeholder="{{$site->background}}" id="background">
                                                <img id="blaw" style="display: none;" src="#" alt="Your Media"/>
                                            </div>
                                        @endif
                                        @if($site->type == 'video')
                                            <div class="col-md-6" id="backg2"><br/>
                                                <label for="background2">Video</label>
                                                <input type="file" class="form-control" onchange="readLin(this);" name="background2" placeholder="{{$site->background2}}" id="background2">
                                                <video id="blas" style="position: relative; width: 390px; height: 200px;" src="{{asset('/storage/video/site/'.$site->background2)}}" controls/>
                                            </div><br>
                                        @else
                                            <div class="col-md-6" style="display: none;" id="backg2"><br/>
                                                <label for="background2">Video</label>
                                                <input type="file" class="form-control" onchange="readLin(this);" name="background2" placeholder="{{$site->background2}}" id="background2">
                                                <video id="blas" style="display: none;" src="#" controls/>
                                            </div><br>
                                        @endif
                                        <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="errmain">
                                            <strong>ERROR!</strong>
                                            <p id="err"></p>
                                            <a class="close" onclick="document.getElementById('errmain').style.display = 'none';" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </a>
                                        </div>
                                        <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="sucmain">
                                            <strong>SUCCESS!</strong>
                                            <p id="suc"></p>
                                            <a class="close" onclick="document.getElementById('sucmain').style.display = 'none';$('#reload').load(`{{route('settings.index')}}`);" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </a>
                                        </div>
                                        <div class="col-md-10">
                                            
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary btn-lg sub">Submit</button>
                                            <br/>
                                        </div>
                                    </div>
                                </form>
                                <!-- id="subimage" -->
                                <!-- <form action="/main_controller_panel/settings/sitep/{{$id}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger btn-lg sub" id="save">Save Media</button>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                </form> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card" id="result">
                            <h5 class="card-header">Result</h5>
                            <div class="card-body">
                                <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="emain">
                                    <strong>ERROR!</strong>
                                    <p id="e"></p>
                                    <a class="close" onclick="document.getElementById('emain').style.display = 'none';" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </a>
                                </div>
                                <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="smain">
                                    <strong>SUCCESS!</strong>
                                    <p id="s"></p>
                                    <a class="close" onclick="document.getElementById('smain').style.display = 'none';$('#reload').load(`{{route('settings.index')}}`);" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </a>
                                </div>
                                <form id="result" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    @csrf
                                    {{ method_field('POST') }}
                                    <h5>Enter the maximum number or grade for each of the provided input below.</h5>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="attendance">Attendance</label>
                                            <input type="number" class="form-control" name="attendance" placeholder="{{$setting->m_attendance}}" id="attendance">
                                            <div class="invalid-feedback">
                                                Attendance is required.
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="test">Test</label>
                                            <input type="number" class="form-control" name="test" placeholder="{{$setting->m_test}}" id="test">
                                            <div class="invalid-feedback">
                                                Test is required.
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="exam">Exam</label>
                                            <input type="number" class="form-control" name="exam" placeholder="{{$setting->m_exam}}" id="exam">
                                            <div class="invalid-feedback">
                                                Exam is required.
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="total">Total</label>
                                            <input type="number" class="form-control" name="total" placeholder="{{$setting->m_total}}" id="total">
                                            <div class="invalid-feedback">
                                                Total is required.
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="forward">Forward</label>
                                            <input type="number" class="form-control" name="forward" placeholder="{{$setting->m_forward}}" id="forward">
                                            <div class="invalid-feedback">
                                                Forward is required.
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="average">Average</label>
                                            <input type="number" class="form-control" name="average" placeholder="{{$setting->m_average}}" id="average">
                                            <div class="invalid-feedback">
                                                Average is required.
                                            </div>
                                        </div>
                                        <div class="col-md-2"><br>
                                            <label for="grade">Grade</label>
                                            <input type="text" class="form-control" name="grade" placeholder="{{$setting->m_grade}}" id="grade">
                                            <div class="invalid-feedback">
                                                Grade is required.
                                            </div>
                                        </div>

                                    </div>
                                    <div><br>
                                        <div class="row">
                                            <div class="col-md-10">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-success btn-lg sub" id="ressave">Save</button>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card" id="msession">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5" style="display: none; padding: 10px;" id="back_session_main">
                                        <a href="#" class="btn btn-outline-danger btn-sm sub" id="back_session">< Back</a>
                                    </div>
                                    <div class="col-md-5" style="padding: 10px;" id="add_session_main">
                                        <a href="#" class="btn btn-outline-success btn-sm sub" id="add_session">Add New Session</a>
                                    </div>
                                    <div class="col-md-7">
                                        <h5 class="card-header">Session</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="errsession">
                                    <strong>ERROR!</strong>
                                    <p id="esession"></p>
                                    <a class="close" onclick="document.getElementById('errsession').style.display = 'none';" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </a>
                                </div>
                                <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="sucsession">
                                    <strong>SUCCESS!</strong>
                                    <p id="ssession"></p>
                                    <a class="close" onclick="document.getElementById('sucsession').style.display = 'none';$('#reload').load(`{{route('settings.index')}}`);" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </a>
                                </div>
                                <div class="datatable-dashv1-list custom-datatable-overright" id="stable_view">
                                    @if(count($sessions) > 0)
                                        <div id="toolbar1" style="width: 170px; position: absolute; margin-bottom: 10px; margin-left: 10px;margin-top: 10px; margin-right: 10px; line-height: 34px;">
                                            <div class="row">
                                                <div class="col-lg-12" style="margin-left: 0px;">
                                                    <select class="form-control">
                                                        <option value="">Export Basic</option>
                                                        <option value="all">Export All</option>
                                                        <option value="selected">Export Selected</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr class="border-0">
                                                    <th data-field="s_state" data-checkbox="true"></th>
                                                    <th data-field="s_name" class="border-0">Session Name</th>
                                                    <th data-field="s_from" class="border-0">Session Starts From</th>
                                                    <th data-field="s_to" class="border-0">Session Ends At</th>
                                                    <th data-field="s_created_at" class="border-0">Created At</th>
                                                    <th data-field="s_status" class="border-0">Status</th>
                                                    <th data-field="s_action" class="border-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody style="position: relative;">
                                                @foreach($sessions as $session)
                                                    <tr>
                                                        <td></td>
                                                        <td><a href="#" id="session_view{{$session->id}}">{{$session->name}}</a></td>
                                                        <td>{{$session->from}}</td>
                                                        <td>{{$session->to}}</td>
                                                        <td>{{$session->created_at}}</td>
                                                        @if($session->category == 'Open')
                                                            <td style="color: green;">{{$session->category}}</td>
                                                        @else
                                                            <td style="color: red;">{{$session->category}}</td>
                                                        @endif
                                                        <td>
                                                            <div class="dropdown" style="text-align: center;">
                                                                <a href="#" class="dropdown-toggle card-drop"data-toggle="collapse" aria-expanded="false" data-target="#ssubmenu-{{$session->id}}" aria-controls="ssubmenu-{{$session->id}}">
                                                                    <i class="fas fa-ellipsis-h"></i>
                                                                </a>
                                                            </div>
                                                            <div class="collapse submenu" id="ssubmenu-{{$session->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
                                                                <!-- item-->
                                                                <a href="#" id="session_t_view{{$session->id}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-eye"></i> View</a>
                                                                <!-- item-->
                                                                <a href="#" id="session_edit{{$session->id}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-edit"></i> Edit</a>
                                                                <!-- item-->
                                                           <!--      @if($session->category == 'Open')
                                                                    <a href="#" id="session_close{{$session->id}}" class="dropdown-item" data-toggle="modal" data-target="#closeModal{{$session->id}}" style="color: #71748d;"><i class="fas fa-times"></i> Close</a>
                                                                @else
                                                                    
                                                                @endif -->

                                                                <a href="#" id="session_delete{{$session->id}}" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$session->id}}" style="color: #71748d;"><i class="fas fa-trash-alt"></i> Delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade show" id="exampleModal{{$session->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this session data?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                    <button class="btn btn-primary" id="delete-form-{{ $session->id }}">Confirm</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade show" id="closeModal{{$session->id}}" tabindex="-1" role="dialog" aria-labelledby="closeModalLabel" style="display: none;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="closeModalLabel">Warning!</h5>
                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p style="color: red;">This action can not be reversed!</p>
                                                                    <p>Are you sure you want to close this session?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                    <button class="btn btn-primary" id="close-form-{{ $session->id }}">Confirm</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php $suse = $session @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div style="text-align: center; font-size: 20px;">
                                            <i>
                                                <div> No Session Has Been Added Yet!</div>
                                            </i>
                                        </div>
                                    @endif
                                </div>
                                <form id="session" style="display: none;" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    @csrf
                                    {{ method_field('POST') }}
                                    <h5>Enter this session infomation.</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="sname">Session Name</label>
                                            <input type="text" class="form-control" name="sname" id="sname" required>
                                            <div class="invalid-feedback">
                                                Session Name is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="sfrom">Session Starts From</label>
                                            <input type="text" class="form-control" name="sfrom" id="sfrom" required>
                                            <div class="invalid-feedback">
                                                When Session Starts is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="sto">Session Ends At</label>
                                            <input type="text" class="form-control" name="sto" id="sto" required>
                                            <div class="invalid-feedback">
                                                When Session Ends is required.
                                            </div>
                                        </div>
                                    </div>
                                    <div><br>
                                        <div class="row">
                                            <div class="col-md-10">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-success btn-lg sub">Save</button>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @if(count($sessions) > 0)
                                    @foreach($sessions as $session)
                                        <div class="col-md-12" id="View{{$session->id}}" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user"></i>Session Name</p>
                                                    <p>{{$session->name}}</p>
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>Session Starts From</p>
                                                    <p>{{$session->from}}</p>
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>Session Ends At</p>
                                                    <p>{{$session->to}}</p>
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>Created At</p>
                                                    <p>{{$session->created_at}}</p>
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>Session Status</p>
                                                    @if($session->category == 'Open')
                                                        <p style="color: green;">{{$session->category}}</p>
                                                    @else
                                                        <p style="color: red;">{{$session->category}}</p>
                                                    @endif
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>Registered Terms For This Session</p>
                                                    @if(count($terms) > 0)
                                                        @foreach($terms as $term)
                                                            @if($term->session == $session->id)
                                                                <p>{{$term->name}}</p>
                                                            @endif
                                                        @endforeach
                                                    @else    
                                                        <p style="color: red;">None</p>
                                                    @endif
                                                </div><br>
                                                <hr class="mb-4"><br>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                @if(count($sessions) > 0)
                                    @foreach($sessions as $session)
                                        <form id="upsession{{$session->id}}" style="display: none;" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                            @csrf
                                            {{ method_field('POST') }}
                                            <input type="hidden" class="form-control" value="{{$session->id}}" name="sid{{$session->id}}" id="sid{{$session->id}}">
                                            <h5>Enter this Session's infomation.</h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="upsname{{$session->id}}">Session Name</label>
                                                    <input type="text" class="form-control" value="{{$session->name}}" name="upsname{{$session->id}}" id="upsname{{$session->id}}">
                                                    <div class="invalid-feedback">
                                                        Session's Name is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="upsfrom{{$session->id}}">Session Starts From</label>
                                                    <input type="text" class="form-control" value="{{$session->from}}" name="upsfrom{{$session->id}}" id="upsfrom{{$session->id}}">
                                                    <div class="invalid-feedback">
                                                        When Session Starts is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="upsto{{$session->id}}">Session Ends At</label>
                                                    <input type="text" class="form-control" value="{{$session->to}}" name="upsto{{$session->id}}" id="upsto{{$session->id}}">
                                                    <div class="invalid-feedback">
                                                        When Session Ends is required.
                                                    </div>
                                                </div>
                                            </div>
                                            <div><br>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-success btn-lg sub">Save</button>
                                                        <br/>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card" id="mterm">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5" style="display: none; padding: 10px;"id="back_term_main">
                                        <a href="#" class="btn btn-outline-danger btn-sm sub" id="back_term">< Back</a>
                                    </div>
                                    <div class="col-md-5" style="padding: 10px;" id="add_term_main">
                                        <a href="#" class="btn btn-outline-success btn-sm sub" id="add_term">Add New Term</a>
                                    </div>
                                    <div class="col-md-7">
                                        <h5 class="card-header">Term</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="errterm">
                                    <strong>ERROR!</strong>
                                    <p id="eterm"></p>
                                    <a class="close" onclick="document.getElementById('errterm').style.display = 'none';" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </a>
                                </div>
                                <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="sucterm">
                                    <strong>SUCCESS!</strong>
                                    <p id="sterm"></p>
                                    <a class="close" onclick="document.getElementById('sucterm').style.display = 'none';$('#reload').load(`{{route('settings.index')}}`);" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </a>
                                </div>
                                <div class="datatable-dashv1-list custom-datatable-overright" id="ttable_view">
                                    @if(count($terms) > 0)
                                        <div id="toolbar2" style="width: 170px; position: absolute; margin-bottom: 10px; margin-left: 10px;margin-top: 10px; margin-right: 10px; line-height: 34px;">
                                            <div class="row">
                                                <div class="col-lg-12" style="margin-left: 0px;">
                                                    <select class="form-control">
                                                        <option value="">Export Basic</option>
                                                        <option value="all">Export All</option>
                                                        <option value="selected">Export Selected</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr class="border-0">
                                                    <th data-field="t_state" data-checkbox="true"></th>
                                                    <th data-field="t_name" class="border-0">Term Name</th>
                                                    <th data-field="t_session" class="border-0">Session Name</th>
                                                    <th data-field="t_from" class="border-0">Term Starts From</th>
                                                    <th data-field="t_to" class="border-0">Term Ends At</th>
                                                    <th data-field="t_created_at" class="border-0">Created At</th>
                                                    <th data-field="t_status" class="border-0">Status</th>
                                                    <th data-field="t_action" class="border-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody style="position: relative;">
                                                @foreach($terms as $term)
                                                    <tr>
                                                        <td></td>
                                                        <td><a href="#" id="term_view{{$term->id}}">{{$term->name}}</a></td>
                                                        @if(count($sessions) > 0)
                                                            @foreach($sessions as $session)
                                                                @if($term->session == $session->id)
                                                                    <td><a href="#" id="session_s_view{{$session->id}}">{{$session->name}}</a></td>
                                                                @endif
                                                            @endforeach
                                                        @else    
                                                            <td style="color: red;">None</td>
                                                        @endif
                                                        <td>{{$term->from}}</td>
                                                        <td>{{$term->to}}</td>
                                                        <td>{{$term->created_at}}</td>
                                                        @if($term->category == 'Open')
                                                            <td style="color: green;">{{$term->category}}</td>
                                                        @else
                                                            <td style="color: red;">{{$term->category}}</td>
                                                        @endif
                                                        <td>
                                                            <div class="dropdown" style="text-align: center;">
                                                                <a href="#" class="dropdown-toggle card-drop" data-toggle="collapse" aria-expanded="false" data-target="#tsubmenu-{{$term->id}}" aria-controls="tsubmenu-{{$term->id}}">
                                                                    <i class="fas fa-ellipsis-h"></i>
                                                                </a>
                                                            </div>
                                                            <div class="collapse submenu" id="tsubmenu-{{$term->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
                                                                <!-- item-->
                                                                <a href="#" id="term_t_view{{$term->id}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-eye"></i> View</a>
                                                                <!-- item-->
                                                                <a href="#" id="term_edit{{$term->id}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-edit"></i> Edit</a>
                                                                <!-- item-->
                                                                <!-- @if($term->category == 'Open')
                                                                    <a href="#" id="term_delete{{$term->id}}" class="dropdown-item" data-toggle="modal" data-target="#tcloseModal{{$term->id}}" style="color: #71748d;"><i class="fas fa-times"></i> Close</a>
                                                                @else
                                                                    
                                                                @endif -->
                                                                
                                                                <a href="#" id="term_close{{$term->id}}" class="dropdown-item" data-toggle="modal" data-target="#texampleModal{{$term->id}}" style="color: #71748d;"><i class="fas fa-trash-alt"></i> Delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade show" id="texampleModal{{$term->id}}" tabindex="-1" role="dialog" aria-labelledby="texampleModalLabel" style="display: none;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="texampleModalLabel">Warning!</h5>
                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this term data?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                    <button id="tdelete-form-{{ $term->id }}" class="btn btn-primary">Confirm</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade show" id="tcloseModal{{$term->id}}" tabindex="-1" role="dialog" aria-labelledby="tcloseModalLabel" style="display: none;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="tcloseModalLabel">Warning!</h5>
                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p style="color: red;">This action can not be reversed!</p>
                                                                    <p>Are you sure you want to close this term?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                    <button class="btn btn-primary" id="tclose-form-{{ $term->id }}">Confirm</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php $tuse = $term @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div style="text-align: center; font-size: 20px;">
                                            <i>
                                                <div> No Term Has Been Added Yet!</div>
                                            </i>
                                        </div>
                                    @endif
                                </div>
                                @if(count($terms) > 0)
                                    @foreach($terms as $term)
                                        <div class="col-md-12" id="tView{{$term->id}}" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user"></i>Term Name</p>
                                                    <p>{{$term->name}}</p>
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>Term Starts From</p>
                                                    <p>{{$term->from}}</p>
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>Term Ends At</p>
                                                    <p>{{$term->to}}</p>
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>Created At</p>
                                                    <p>{{$term->created_at}}</p>
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>Term Status</p>
                                                    @if($term->category == 'Open')
                                                        <p style="color: green;">{{$term->category}}</p>
                                                    @else
                                                        <p style="color: red;">{{$term->category}}</p>
                                                    @endif
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>Registered Session For This Terms</p>
                                                    @if(count($sessions) > 0)
                                                        @foreach($sessions as $session)
                                                            @if($term->session == $session->id)
                                                                <p>{{$session->name}}</p>
                                                            @endif
                                                        @endforeach
                                                    @else    
                                                        <p style="color: red;">None</p>
                                                    @endif
                                                </div><br>
                                                <hr class="mb-4"><br>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <form id="term" style="display: none;" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    @csrf
                                    {{ method_field('POST') }}
                                    <h5>Enter this Term's infomation.</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="sessionid">Select Session</label>
                                            <select class="form-control" name="sessionid" id="sessionid">
                                                @if(count($sessions) > 0)
                                                    @foreach($sessions as $session)
                                                        @if($session->category == 'Open')
                                                            <option value="{{$session->id}}">{{$session->name}}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option disabled="disabled">No Section</option>
                                                @endif
                                            </select>
                                            <div class="invalid-feedback">
                                                Session is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="tname">Term Name</label>
                                            <input type="text" class="form-control" name="tname" id="tname">
                                            <div class="invalid-feedback">
                                                Terms Name is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="tfrom">Term Starts From</label>
                                            <input type="text" class="form-control" name="tfrom" id="tfrom">
                                            <div class="invalid-feedback">
                                                When Term Starts is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="tto">Term Ends At</label>
                                            <input type="text" class="form-control" name="tto" id="tto">
                                            <div class="invalid-feedback">
                                                When Term Ends is required.
                                            </div>
                                        </div>
                                    </div>
                                    <div><br>
                                        <div class="row">
                                            <div class="col-md-10">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-success btn-lg sub">Save</button>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @if(count($terms) > 0)
                                    @foreach($terms as $term)
                                        <form id="upterm{{$term->id}}" style="display: none;" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                            @csrf
                                            {{ method_field('POST') }}
                                            <input type="hidden" class="form-control" value="{{$term->id}}" name="tid{{$term->id}}" id="tid{{$term->id}}">
                                            <h5>Enter this Term's infomation.</h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="upsessionid{{$term->id}}">Select Session</label>
                                                    <select class="form-control" name="upsessionid{{$term->id}}" id="upsessionid{{$term->id}}">
                                                        @if(count($sessions) > 0)
                                                            @foreach($sessions as $session)
                                                                @if($session->id == $term->session)
                                                                    <option value="{{$session->id}}" selected="selected">{{$session->name}}</option>
                                                                @else
                                                                    <option value="{{$session->id}}">{{$session->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <option disabled="disabled">No Section</option>
                                                        @endif
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Session is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="uptname{{$term->id}}">Term Name</label>
                                                    <input type="text" class="form-control" value="{{$term->name}}" name="uptname{{$term->id}}" id="uptname{{$term->id}}">
                                                    <div class="invalid-feedback">
                                                        Terms Name is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="tptfrom{{$term->id}}">Term Starts From</label>
                                                    <input type="text" class="form-control" value="{{$term->from}}" name="uptfrom{{$term->id}}" id="uptfrom{{$term->id}}">
                                                    <div class="invalid-feedback">
                                                        When Term Starts is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="uptto{{$term->id}}">Term Ends At</label>
                                                    <input type="text" class="form-control" value="{{$term->to}}" name="uptto{{$term->id}}" id="uptto{{$term->id}}">
                                                    <div class="invalid-feedback">
                                                        When Term Ends is required.
                                                    </div>
                                                </div>
                                            </div>
                                            <div><br>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-success btn-lg sub">Save</button>
                                                        <br/>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
                                @endif 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card" id="mfaq">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5" style="display: none; padding: 10px;"id="back_faq_main">
                                        <a href="#" class="btn btn-outline-danger btn-sm sub" id="back_faq">< Back</a>
                                    </div>
                                    <div class="col-md-5" style="padding: 10px;" id="add_faq_main">
                                        <a href="#" class="btn btn-outline-success btn-sm sub" id="add_faq">Add New FAQ</a>
                                    </div>
                                    <div class="col-md-7">
                                        <h5 class="card-header">FAQ</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="errfaq">
                                    <strong>ERROR!</strong>
                                    <p id="efaq"></p>
                                    <a class="close" onclick="document.getElementById('errfaq').style.display = 'none';" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </a>
                                </div>
                                <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="sucfaq">
                                    <strong>SUCCESS!</strong>
                                    <p id="sfaq"></p>
                                    <a class="close" onclick="document.getElementById('sucfaq').style.display = 'none';$('#reload').load(`{{route('settings.index')}}`);" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </a>
                                </div>
                                <div class="datatable-dashv1-list custom-datatable-overright" id="faq_table_view">
                                    @if(count($faqs) > 0)
                                        <div id="toolbar2" style="width: 170px; position: absolute; margin-bottom: 10px; margin-left: 10px;margin-top: 10px; margin-right: 10px; line-height: 34px;">
                                            <div class="row">
                                                <div class="col-lg-12" style="margin-left: 0px;">
                                                    <select class="form-control">
                                                        <option value="">Export Basic</option>
                                                        <option value="all">Export All</option>
                                                        <option value="selected">Export Selected</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr class="border-0">
                                                    <th data-field="faq_state" data-checkbox="true"></th>
                                                    <th data-field="faq_question" class="border-0">FAQ Question</th>
                                                    <th data-field="faq_answer" class="border-0">FAQ Answer</th>
                                                    <th data-field="faq_category" class="border-0">FAQ Category</th>
                                                    <th data-field="faq_status" class="border-0">Status</th>
                                                    <th data-field="faq_action" class="border-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody style="position: relative;">
                                                @foreach($faqs as $faq)
                                                    <tr>
                                                        <td></td>
                                                        <td><a href="#" id="faq_view{{$faq->id}}">{{substr($faq->question, 0, 30)}}</a></td>
                                                        <td>{{substr($faq->answer, 0, 30)}}</td>
                                                        <td>{{$faq->category}}</td>
                                                        <td>{{$faq->status}}</td>
                                                        <td>
                                                            <div class="dropdown" style="text-align: center;">
                                                                <a href="#" class="dropdown-toggle card-drop" data-toggle="collapse" aria-expanded="false" data-target="#faqsubmenu-{{$faq->id}}" aria-controls="faqsubmenu-{{$faq->id}}">
                                                                    <i class="fas fa-ellipsis-h"></i>
                                                                </a>
                                                            </div>
                                                            <div class="collapse submenu" id="faqsubmenu-{{$faq->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
                                                                <!-- item-->
                                                                <a href="#" id="faq_f_view{{$faq->id}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-eye"></i> View</a>
                                                                <!-- item-->
                                                                <a href="#" id="faq_edit{{$faq->id}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-edit"></i> Edit</a>
                                                                <!-- item-->
                                                                <!-- @if($faq->category == 'Open')
                                                                    <a href="#" id="faq_delete{{$faq->id}}" class="dropdown-item" data-toggle="modal" data-target="#tcloseModal{{$faq->id}}" style="color: #71748d;"><i class="fas fa-times"></i> Close</a>
                                                                @else
                                                                    
                                                                @endif -->
                                                                
                                                                <a href="#" id="faq_close{{$faq->id}}" class="dropdown-item" data-toggle="modal" data-target="#faqexampleModal{{$faq->id}}" style="color: #71748d;"><i class="fas fa-trash-alt"></i> Delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade show" id="faqexampleModal{{$faq->id}}" tabindex="-1" role="dialog" aria-labelledby="faqexampleModalLabel" style="display: none;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="faqexampleModalLabel">Warning!</h5>
                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this FAQ data?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                    <button id="faqdelete-form-{{ $faq->id }}" class="btn btn-primary">Confirm</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php $fuse = $faq @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div style="text-align: center; font-size: 20px;">
                                            <i>
                                                <div> No FAQ Has Been Added Yet!</div>
                                            </i>
                                        </div>
                                    @endif
                                </div>
                                @if(count($faqs) > 0)
                                    @foreach($faqs as $faq)
                                        <div class="col-md-12" id="faqView{{$faq->id}}" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user"></i>FAQ Question</p>
                                                    <p>{{$faq->question}}</p>
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>FAQ Answer</p>
                                                    <p>{{$faq->answer}}</p>
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>FAQ Category</p>
                                                    <p>{{$faq->category}}</p>
                                                </div><br>
                                                <hr class="mb-4"><br>
                                                <div class="col-md-6">
                                                    <p class="lead"><i class="fas fa-user-circle"></i>Created At</p>
                                                    <p>{{$faq->created_at}}</p>
                                                </div><br>
                                                <hr class="mb-4"><br>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <form id="faq" style="display: none;" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    @csrf
                                    {{ method_field('POST') }}
                                    <h5>Enter this faq's infomation.</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="faqquestion">FAQ</label>
                                            <input type="text" class="form-control" name="faqquestion" id="faqquestion" required>
                                            <div class="invalid-feedback">
                                                FAQ is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="faqanswer">FAQ Answer</label>
                                            <input type="text" class="form-control" name="faqanswer" id="faqanswer" required>
                                            <div class="invalid-feedback">
                                                FAQ Answer is required.
                                            </div>
                                        </div>
                                            <div class="col-md-12">
                                            <label for="faqcategory">Select Category</label>
                                            <select class="form-control" name="faqcategory" id="faqcategory" required>
                                                <option disabled="disabled" selected>...Select...</option>
                                                <option value="Student">Student</option>
                                                <option value="Staff">Staff</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Category is required.
                                            </div>
                                        </div>
                                    </div>
                                    <div><br>
                                        <div class="row">
                                            <div class="col-md-10">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-success btn-lg sub">Save</button>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @if(count($faqs) > 0)
                                    @foreach($faqs as $faq)
                                        <form id="upfaq{{$faq->id}}" style="display: none;" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                            @csrf
                                            {{ method_field('POST') }}
                                            <input type="hidden" class="form-control" value="{{$faq->id}}" name="faqid{{$faq->id}}" id="faqid{{$faq->id}}">
                                            <h5>Update this faq's infomation.</h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="upfaqquestion{{$faq->id}}">FAQ</label>
                                                    <input type="text" class="form-control" value="{{$faq->question}}" name="upfaqquestion{{$faq->id}}" id="upfaqquestion{{$faq->id}}" required>
                                                    <div class="invalid-feedback">
                                                        FAQ is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="upfaqanswer{{$faq->id}}">FAQ Answer</label>
                                                    <input type="text" class="form-control" value="{{$faq->answer}}" name="upfaqanswer{{$faq->id}}" id="upfaqanswer{{$faq->id}}" required>
                                                    <div class="invalid-feedback">
                                                        FAQ Answer is required.
                                                    </div>
                                                </div>
                                                    <div class="col-md-12">
                                                    <label for="upfaqcategory{{$faq->id}}">Select Category</label>
                                                    <select class="form-control" name="upfaqcategory{{$faq->id}}" id="upfaqcategory{{$faq->id}}" required>
                                                        <option disabled="disabled" selected>...Select...</option>
                                                        @if($faq->category == 'Student')
                                                            <option value="Student" selected>Student</option>
                                                            <option value="Staff">Staff</option>
                                                            <option value="Others">Others</option>
                                                        @elseif($faq->category == 'Staff')
                                                            <option value="Student">Student</option>
                                                            <option value="Staff" selected>Staff</option>
                                                            <option value="Others">Others</option>
                                                        @elseif($faq->category == 'Others')
                                                            <option value="Student">Student</option>
                                                            <option value="Staff">Staff</option>
                                                            <option value="Others" selected>Others</option>
                                                        @else
                                                            <option value="Student">Student</option>
                                                            <option value="Staff">Staff</option>
                                                            <option value="Others">Others</option>
                                                        @endif
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Category is required.
                                                    </div>
                                                </div>
                                            </div>
                                            <div><br>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-success btn-lg sub">Save</button>
                                                        <br/>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
                                @endif 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card" id="service">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5" style="display: none; padding: 10px;"id="back_service">
                                        <a href="#" class="btn btn-outline-danger btn-sm sub" id="back_service_main">< Back</a>
                                    </div>
                                    <div class="col-md-5" style="padding: 10px;" id="add_service">
                                        <a href="#" class="btn btn-outline-success btn-sm sub" id="add_service_main">Add New Service</a>
                                    </div>
                                    <div class="col-md-7">
                                        <h5 class="card-header">Service</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="errservice">
                                    <strong>ERROR!</strong>
                                    <p id="eservice"></p>
                                    <a class="close" onclick="document.getElementById('errservice').style.display = 'none';" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </a>
                                </div>
                                <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="sucservice">
                                    <strong>SUCCESS!</strong>
                                    <p id="sservice"></p>
                                    <a class="close" onclick="document.getElementById('sucservice').style.display = 'none';$('#reload').load(`{{route('settings.index')}}`);" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </a>
                                </div>
                                <div class="datatable-dashv1-list custom-datatable-overright" id="serve_table_view">
                                    @if(count($services) > 0)
                                        <div id="toolbar2" style="width: 170px; position: absolute; margin-bottom: 10px; margin-left: 10px;margin-top: 10px; margin-right: 10px; line-height: 34px;">
                                            <div class="row">
                                                <div class="col-lg-12" style="margin-left: 0px;">
                                                    <select class="form-control">
                                                        <option value="">Export Basic</option>
                                                        <option value="all">Export All</option>
                                                        <option value="selected">Export Selected</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr class="border-0">
                                                    <th data-field="serve_state" data-checkbox="true"></th>
                                                    <th data-field="serve_title" class="border-0">Service Title</th>
                                                    <th data-field="serve_image" class="border-0">Service Image</th>
                                                    <th data-field="serve_background" class="border-0">Header Service</th>
                                                    <th data-field="serve_background2" class="border-0">Body Service</th>
                                                    <th data-field="serve_status" class="border-0">Status</th>
                                                    <th data-field="serve_action" class="border-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody style="position: relative;">
                                                @foreach($services as $service)
                                                    <tr>
                                                        <td></td>
                                                        <td><a href="#" id="service_view{{$service->id}}">{{$service->title}}</a></td>
                                                        <td>
                                                            @if(!empty($service->image) &&  file_exists(storage_path().'/app/public/image/service/'.$service->image))
                                                                <a href="#" data-toggle="modal" data-target="#serve_showModal{{$service->id}}">
                                                                    <div class="m-r-10">
                                                                        <img src="{{asset('/storage/image/service/'.$service->image)}}" alt="service" width="35">
                                                                    </div>
                                                                </a>
                                                            @else
                                                                <a href="#" data-toggle="modal" data-target="#serve_showModal{{$service->id}}">
                                                                    <div class="m-r-10">
                                                                        <img src="/admin/assets/images/dribbble.png" alt="service" width="35">
                                                                    </div>
                                                                </a>
                                                            @endif
                                                            <div class="modal fade show" id="serve_showModal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="serve_showModalLabel" style="display: none;">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">{{$service->title}}</h5>
                                                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            @if(!empty($service->image) &&  file_exists(storage_path().'/app/public/image/service/'.$service->image))
                                                                                <img style="width: 100%;" src="{{asset('/storage/image/service/'.$service->image)}}" alt="service">
                                                                            @else
                                                                                <img style="width: 100%;" src="/admin/assets/images/dribbble.png" alt="service">
                                                                            @endif
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if($service->category == 'Head')
                                                                <label class="switch switch-default switch-warning mr-2">
                                                                    <input type="checkbox" name="serve_b_main{{$service->id}}" id="serve_b_main{{$service->id}}" class="switch-input" checked>
                                                            @else
                                                                @if(count($serves) >= 3)
                                                                    <label class="switch switch-default switch-light mr-2">
                                                                        <input type="checkbox" name="serve_b_main{{$service->id}}" id="serve_b_main{{$service->id}}" class="switch-input" disabled>
                                                                @else
                                                                    <label class="switch switch-default switch-warning mr-2">
                                                                        <input type="checkbox" name="serve_b_main{{$service->id}}" id="serve_b_main{{$service->id}}" class="switch-input">
                                                                @endif
                                                            @endif
                                                                <span class="switch-label curve-label"></span>
                                                                <span class="switch-handle curve-handle"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            @if($service->category == 'Body')
                                                                <label class="switch switch-default switch-warning mr-2">
                                                                    <input type="checkbox" name="serve_b_sub{$service->id}}" id="serve_b_sub{{$service->id}}" class="switch-input" checked>
                                                            @else
                                                                @if(count($saves) >= 2)
                                                                    <label class="switch switch-default switch-light mr-2">
                                                                        <input type="checkbox" name="serve_b_sub{{$service->id}}" id="serve_b_sub{{$service->id}}" class="switch-input" disabled>
                                                                @else
                                                                    <label class="switch switch-default switch-warning mr-2">
                                                                        <input type="checkbox" name="serve_b_sub{{$service->id}}" id="serve_b_sub{{$service->id}}" class="switch-input">
                                                                @endif
                                                            @endif
                                                                <span class="switch-label curve-label"></span>
                                                                <span class="switch-handle curve-handle"></span>
                                                            </label>
                                                        </td>
                                                        <td>{{$service->status}}</td>
                                                        <td>
                                                            <div class="dropdown" style="text-align: center;">
                                                                <a href="#" class="dropdown-toggle card-drop" data-toggle="collapse" aria-expanded="false" data-target="#servesubmenu-{{$service->id}}" aria-controls="servesubmenu-{{$service->id}}">
                                                                    <i class="fas fa-ellipsis-h"></i>
                                                                </a>
                                                            </div>
                                                            <div class="collapse submenu" id="servesubmenu-{{$service->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
                                                                <!-- item-->
                                                                <a href="#" id="service_serve_view{{$service->id}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-eye"></i> View</a>
                                                                <!-- item-->
                                                                <a href="#" id="service_edit{{$service->id}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-edit"></i> Edit</a>

                                                                <a href="#" id="service_delete{{$service->id}}" class="dropdown-item" data-toggle="modal" data-target="#serveexampleModal{{$service->id}}" style="color: #71748d;"><i class="fas fa-trash-alt"></i> Delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade show" id="serveexampleModal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="serveexampleModalLabel" style="display: none;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="serveexampleModalLabel">Warning!</h5>
                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this Service data?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                    <button id="servedelete-form-{{ $service->id }}" class="btn btn-primary">Confirm</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php $serveuse = $service @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div style="text-align: center; font-size: 20px;">
                                            <i>
                                                <div> No Service Has Been Added Yet!</div>
                                            </i>
                                        </div>
                                    @endif
                                </div>
                                @if(count($services) > 0)
                                    @foreach($services as $service)
                                        <div class="col-md-12" id="serve_View{{$service->id}}" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="lead">Service Title</p>
                                                    <p>{{$service->title}}</p>
                                                </div>
                                                <hr class="mb-4">
                                                <div class="col-md-6">
                                                    <p class="lead">Service Details</p>
                                                    <p>{{$service->details}}</p><br>
                                                </div>
                                                <hr class="mb-4">
                                                <div class="col-md-6">
                                                    <p class="lead">Header Service</p>
                                                    @if($service->category == 'Head')
                                                        <label class="switch switch-default switch-warning mr-2">
                                                            <input type="checkbox" name="serve_main{{$service->id}}" id="serve_main{{$service->id}}" class="switch-input" checked>
                                                    @else
                                                        @if(count($serves) >= 3)
                                                            <label class="switch switch-default switch-light mr-2">
                                                                <input type="checkbox" name="Serve_main{{$service->id}}" id="serve_main{{$service->id}}" class="switch-input" disabled>
                                                        @else
                                                            <label class="switch switch-default switch-warning mr-2">
                                                                <input type="checkbox" name="serve_main{{$service->id}}" id="serve_main{{$service->id}}" class="switch-input">
                                                        @endif
                                                    @endif
                                                        <span class="switch-label curve-label"></span>
                                                        <span class="switch-handle curve-handle"></span>
                                                    </label>
                                                </div>
                                                <hr class="mb-4">
                                                <div class="col-md-6">
                                                    <p class="lead">Body Service</p>
                                                    @if($service->category == 'Body')
                                                        <label class="switch switch-default switch-warning mr-2">
                                                            <input type="checkbox" name="serve_sub{$service->id}}" id="serve_sub{{$service->id}}" class="switch-input" checked>
                                                    @else
                                                        @if(count($saves) >= 2)
                                                            <label class="switch switch-default switch-light mr-2">
                                                                <input type="checkbox" name="Serve_sub{{$service->id}}" id="serve_sub{{$service->id}}" class="switch-input" disabled>
                                                        @else
                                                            <label class="switch switch-default switch-warning mr-2">
                                                                <input type="checkbox" name="Serve_sub{{$service->id}}" id="serve_sub{{$service->id}}" class="switch-input">
                                                        @endif
                                                    @endif
                                                        <span class="switch-label curve-label"></span>
                                                        <span class="switch-handle curve-handle"></span>
                                                    </label>
                                                </div>
                                                <hr class="mb-4">
                                                <div class="col-md-12">
                                                    <p class="lead">Service Image</p>
                                                    @if(!empty($service->image) &&  file_exists(storage_path().'/app/public/image/service/'.$service->image))
                                                        <img style="width: 100%; height: 300px;" src="{{asset('/storage/image/service/'.$service->image)}}" alt="service">
                                                    @else
                                                        <img style="width: 100%; height: 300px;" src="/admin/assets/images/dribbble.png" alt="service">
                                                    @endif
                                                </div>
                                                <hr class="mb-4">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <form id="service_create" style="display: none;" method="post" enctype="multipart/form-data" action="/main_controller_panel/settings/service" class="needs-validation" novalidate="">
                                    @csrf
                                    {{ method_field('POST') }}
                                    <h5>Enter this service's infomation.</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="title">Service Name</label>
                                            <input type="text" class="form-control" name="serve_title">
                                            <div class="invalid-feedback">
                                                Service Name is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="details">Service Details</label>
                                            <input type="text" class="form-control" name="serve_details">
                                            <div class="invalid-feedback">
                                                Services Details is required.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="image">Service Image</label>
                                            <input type="file" class="form-control" name="serve_image">
                                            <div class="invalid-feedback">
                                                When Service Starts is required.
                                            </div>
                                        </div>
                                    </div>
                                    <div><br>
                                        <div class="row">
                                            <div class="col-md-10">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-success btn-lg sub">Save</button>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @if(count($services) > 0)
                                    @foreach($services as $service)
                                        <form id="upservice{{$service->id}}" style="display: none;" method="post" enctype="multipart/form-data" action="/main_controller_panel/settings/serviceup/{{$service->id}}" class="needs-validation" novalidate="">
                                            @csrf
                                            {{ method_field('POST') }}
                                            <input type="hidden" class="form-control" value="{{$service->id}}" name="upserve_id{{$service->id}}" id="upserve_id{{$service->id}}">
                                            <h5>Enter this service's infomation.</h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="upserve_title{{$service->id}}">Service Name</label>
                                                    <input type="text" class="form-control" value="{{$service->title}}" name="upserve_title{{$service->id}}" id="upserve_title{{$service->id}}">
                                                    <div class="invalid-feedback">
                                                        Service Name is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="upserve_details{{$service->id}}">Service Details</label>
                                                    <input type="text" class="form-control" value="{{$service->details}}" name="upserve_details{{$service->id}}" id="upserve_details{{$service->id}}">
                                                    <div class="invalid-feedback">
                                                        Services Details is required.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="upserve_image{{$service->id}}">Service Image</label>
                                                    <input type="file" class="form-control" name="upserve_image{{$service->id}}" id="upserve_image{{$service->id}}">
                                                    <div class="invalid-feedback">
                                                        When Service Starts is required.
                                                    </div>
                                                </div>
                                            </div>
                                            <div><br>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-success btn-lg sub">Save</button>
                                                        <br/>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
                                @endif 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- sidebar nav  -->
            <!-- ============================================================== -->
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
                <div class="sidebar-nav-fixed">
                    <ul class="list-unstyled">
                        <li><a href="#overview" class="active">Dashboard</a></li>
                        <li><a href="#modal">School Branch</a></li>
                        <li><a href="#pagination">Students</a></li>
                        <li><a href="#images">Messages</a></li>
                        <li><a href="#pro-bars">Payment</a></li>
                        <li><a href="#loader">Trash</a></li>
                        <li><a href="#site">Site</a></li>
                        <li><a href="#result">Result</a></li>
                        <li><a href="#msession">Session</a></li>
                        <li><a href="#mterm">Term</a></li>
                        <li><a href="#mfaq">FAQ</a></li>
                        <li><a href="#service">Service</a></li>
                        <li><a href="#top">Back to Top</a></li>
                    </ul>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end sidebar nav  -->
            <!-- ============================================================== -->
        </div>
    </div>