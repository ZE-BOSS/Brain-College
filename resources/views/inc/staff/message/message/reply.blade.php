                <div class="main-content container-fluid p-0" id="replied{{$vid->id}}" style="display: none;">
                    <div class="email-head">
                        <div class="email-head-title">Reply message<span class="icon mdi mdi-edit"></span></div>
                    </div>
                    <div class="email-compose-fields">
                        <div class="to cc">
                            <div class="form-group row pt-2">
                                <label class="col-md-1 control-label">From</label>
                                <div class="col-md-11">
                                    <select class="js-example-basic-multiple" multiple="multiple" name="from{{$vid->id}}">
                                        @if(count($sites) > 0)
                                            @foreach($sites as $site)
                                                <option selected="selected" value="{{$site->email}}">{{$site->email}}</option>
                                            @endforeach
                                        @else
                                            <option selected="selected" value="1">crestgateschools@gmail.com</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="to" id="tosd">
                            <div class="form-group row pt-0">
                                <label class="col-md-1 control-label">To:</label>
                                <div class="col-md-11">
                                    <select class="js-example-basic-multiple" multiple="multiple" name="tosd{{$vid->id}}">
                                        @if($vid->rcat == 'student')
                                            @if(count($students) > 0)
                                                @foreach($students as $student)
                                                    @if($student->id == $vid->reciever)
                                                        <option selected value="{{$student->email}}">{{$student->email}}</option>
                                                    @else
                                                        <option value="{{$student->email}}">{{$student->email}}</option>
                                                    @endif
                                                @endforeach
                                            @else

                                            @endif
                                        @elseif($vid->rcat == 'user')
                                            @if(count($users) > 0)
                                                @foreach($users as $user)
                                                    @if($user->id == $vid->reciever)
                                                        <option selected value="{{$user->email}}">{{$user->email}}</option>
                                                    @else
                                                        <option value="{{$user->email}}">{{$user->email}}</option>
                                                    @endif
                                                @endforeach
                                            @else

                                            @endif
                                        @elseif($vid->rcat == 'staff')
                                            @if(count($staffs) > 0)
                                                @foreach($staffs as $staff)
                                                    @if($staff->id == $vid->reciever)
                                                        <option selected value="{{$staff->email}}">{{$staff->email}}</option>
                                                    @else
                                                        <option value="{{$staff->email}}">{{$staff->email}}</option>
                                                    @endif
                                                @endforeach
                                            @else

                                            @endif
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
                                    <input class="form-control" type="text" name="sub{{$vid->id}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="email editor">
                        <div class="col-md-12 p-0">
                            <div class="form-group row pt-2">
                                <div class="col-md-12">
                                    <div class="form-control" name="sud{{$vid->id}}"><?php echo $vid->msg; ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only" for="summernote{{$vid->id}}">Descriptions </label>
                                <textarea class="form-control" id="summernote{{$vid->id}}" rows="6" name="msg{{$vid->id}}" placeholder="Write Descriptions"></textarea>
                            </div>
                        </div>
                        <div class="email action-send" style="padding-bottom: 50px;">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-space" type="submit"><i class="icon s7-mail"></i> Send</button>
                                    <button class="btn btn-secondary btn-space" type="button"><i class="icon s7-close"></i> Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>