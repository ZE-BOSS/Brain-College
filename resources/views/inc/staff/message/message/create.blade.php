                <div class="main-content container-fluid p-0" id="composed" style="display: none;">
                    <div class="email-head">
                        <div class="email-head-title">Compose new message<span class="icon mdi mdi-edit"></span></div>
                    </div>
                    <form action="{{url('/main_controller_panel/messages/create')}}" method="post" id="cform">
                        @csrf
                        <div class="email-compose-fields">
                            <!-- <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert" id="errmain">
                                <strong>ERROR!</strong>
                                <p id="err"></p>
                                <a href="#" class="close" onclick="document.getElementById('errmain').style.display = 'none';" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </a>
                            </div>
                            <div class="alert alert-success alert-dismissible fade show" style="display: none;" role="alert" id="sucmain">
                                <strong>SUCCESS!</strong>
                                <p id="suc"></p>
                                <a href="#" class="close" onclick="document.getElementById('sucmain').style.display = 'none';" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </a>
                            </div> -->
                            <div class="to cc">
                                <div class="form-group row pt-2">
                                    <label class="col-md-1 control-label">From</label>
                                    <div class="col-md-11">
                                        <select class="js-example-basic-multiple" multiple="multiple" name="cfrom" id="cfrom">
                                            @if(count($sites) > 0)
                                                @foreach($sites as $site)
                                                    <option value="{{$site->id}}">{{$site->email}}</option>
                                                @endforeach
                                            @else
                                                <option selected="selected" value=""></option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="ellipsis row">
                                    <label class="col-md-3 control-label" style="padding-left: 0px;">Reciever Category</label>
                                    <div class="col-md-9" style="padding-left: 0px; padding-right: 0px;">
                                        <div class="form-control" data-toggle="collapse" aria-expanded="false" data-target="#new" aria-controls="new" style="height: 40px; font-size: 12px; text-align: center;" id="selcat">Click to Select Category</div>
                                        <div class="collapse submenu" id="new" style="position: relative; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
                                            <a class="dropdown-item" id="cstudent" href="#"><i class="fas fa-edit"></i> Student</a>
                                            <a class="dropdown-item" id="cstaff" href="#"><i class=" fas fa-trash-alt"></i> Staff</a>
                                            <a class="dropdown-item" id="cvisitor" href="#"><i class=" fas fa-trash-alt"></i> Visitor</a>
                                        </div>
                                    </div>
                                </div><br>
                                <input class="form-control" type="hidden" id="hid" name="hid">
                            </div>
                            <div class="to" id="ctosd" style="display: none; color: green;">
                                <div class="form-group row pt-0">
                                    <label class="col-md-1 control-label" style="color: green;">To:</label>
                                    <div class="col-md-11"> 
                                        <select class="js-example-basic-multiple" multiple="multiple" style="border-color: green;" id="ctosdi" name="ctosd">
                                            @if(count($students) > 0)
                                                @foreach($students as $student)
                                                    <option value="{{$student->id}}">{{$student->email}}</option>
                                                @endforeach
                                            @else

                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="to" id="ctosf" style="display: none; color: blue;">
                                <div class="form-group row pt-0">
                                    <label class="col-md-1 control-label" style="color: blue;">To:</label>
                                    <div class="col-md-11"> 
                                        <select class="js-example-basic-multiple" multiple="multiple" style="border-color: blue;" id="ctosfi" name="ctosf">
                                            @if(count($staffs) > 0)
                                                @foreach($staffs as $staff)
                                                    <option value="{{$staff->id}}">{{$staff->email}}</option>
                                                @endforeach
                                            @else

                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="to" id="ctovs" style="display: none; color: red;">
                                <div class="form-group row pt-0">
                                    <label class="col-md-1 control-label" style="color: red;">To:</label>
                                    <div class="col-md-11">
                                        <select class="js-example-basic-multiple" multiple="multiple" style="border-color: red;" id="ctovsi" name="ctovs">
                                            @if(count($users) > 0)
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->email}}</option>
                                                @endforeach
                                            @else

                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="subject">
                                <div class="form-group row pt-2">
                                    <label class="col-md-1 control-label">Subject</label>
                                    <div class="col-md-11">
                                        <input class="form-control" type="text" id="csub" name="csub">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="email editor">
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <label class="control-label sr-only" for="summernote">Descriptions </label>
                                    <textarea class="form-control" id="summernote" name="editordata" rows="6" name="summernote" placeholder="Write Descriptions"></textarea>
                                </div>
                            </div>
                            <div class="email action-send" style="padding-bottom: 50px;">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-space" id="cbtn"><i class="icon s7-mail"></i> Send</button>
                                        <button class="btn btn-secondary btn-space" id="creset"><i class="icon s7-close"></i> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>