                <div class="main-content container-fluid p-0" id="trashd" style="display: none;">
                    <div class="email-inbox-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="email-title">
                                    <span class="icon">
                                        <i class="fas fa-inbox"></i>
                                    </span> 
                                    Trash Messages
                                    @if(count($msgtrashnot) > 0)
                                        <span class="new-messages">
                                            @if(count($msgtrashnot) > 1)
                                                ({{count($msgtrashnot)}} new messages)
                                            @else
                                                ({{count($msgtrashnot)}} new message)
                                            @endif
                                        </span> 
                                    @else

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(count($msgtrash) > 0)
                        <div class="email-filters">
                            <div class="email-filters-left">
                                <label class="custom-control custom-checkbox be-select-all">
                                    <input class="custom-control-input chk_all" type="checkbox" name="chk_all"><span class="custom-control-label"></span>
                                </label>
                                <div class="btn-group">
                                    <button class="btn btn-light dropdown-toggle" data-toggle="dropdown" type="button">
                                        With selected <span class="caret"></span></button>
                                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Mark as rea</a><a class="dropdown-item" href="#">Mark as unread</a><a class="dropdown-item" href="#">Spam</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-light dropdown-toggle" data-toggle="dropdown" type="button">Order by <span class="caret"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Date</a><a class="dropdown-item" href="#">From</a><a class="dropdown-item" href="#">Subject</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Size</a>
                                    </div>
                                </div>
                            </div>
                            <div class="email-filters-right"><span class="email-pagination-indicator">1-50 of 253</span>
                                <div class="btn-group email-pagination-nav">
                                    <button class="btn btn-light" type="button"><i class="fas fa-angle-left"></i></button>
                                    <button class="btn btn-light" type="button"><i class="fas fa-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                        @foreach($msgtrash as $mtrash)
                            <div class="email-list">
                                @if($mtrash->msgstats == 'unread')
                                    <div class="email-list-item email-list-item--unread">
                                @else
                                    <div class="email-list-item">
                                @endif
                                    <div class="email-list-actions">
                                        <label class="custom-control custom-checkbox">
                                            <input class="custom-control-input checkboxes" type="checkbox" value="1" id="one"><span class="custom-control-label"></span>
                                        </label>
                                    </div>
                                    <a href="#" class="email-list-detail" id="viewh{{$mtrash->id}}">
                                        <span class="date float-right">
                                            <span class="icon">
                                                <i class="fas fa-paperclip"></i>
                                            </span>
                                            @if($mtrash->y == date('Y'))
                                                {{$mtrash->d}} {{$mtrash->m}}
                                            @else
                                                {{$mtrash->d}} {{$mtrash->m}} {{$mtrash->y}}
                                            @endif
                                        </span>
                                        <span class="from">
                                            @if($mtrash->msgcat == 'user')
                                                @if(count($users) > 0)
                                                    @foreach($users as $user)
                                                        @if($user->id == $mtrash->sender)
                                                            {{$user->name}}
                                                        @else
                                                            
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <i style="color: red;">Unknown</i>
                                                @endif
                                            @elseif($mtrash->msgcat == 'student')
                                                @if(count($students) > 0)
                                                    @foreach($students as $student)
                                                        @if($student->id == $mtrash->sender)
                                                            {{$student->firstname}} {{$student->othernames}}
                                                        @else
                                                            
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <i style="color: red;">Unknown</i>
                                                @endif
                                            @elseif($mtrash->msgcat == 'staff')
                                                @if(count($staffs) > 0)
                                                    @foreach($staffs as $staff)
                                                        @if($staff->id == $mtrash->sender)
                                                            {{$staff->firstname}} {{$staff->othernames}}
                                                        @else
                                                            
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <i style="color: red;">Unknown</i>
                                                @endif
                                            @else

                                            @endif
                                        </span>
                                        <p class="msg">{{$mtrash->title}}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="email-list">
                            <div class="email-list-item email-list-item--unread" style="text-align: center;">
                                <i style="color: red;">No message has been trashed!</i>
                            </div>
                        </div>
                    @endif
                </div>
                @if(count($msgtrash) > 0)
                    @foreach($msgtrash as $mtrash)
                        @php $vid = $mtrash; @endphp
                        @include('inc.admin.message.message.view')
                        @include('inc.admin.message.message.reply')
                    @endforeach
                @else
                    
                @endif