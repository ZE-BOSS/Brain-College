                <div class="main-content container-fluid p-0" id="staffd" style="display: none;">
                    <div class="email-inbox-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="email-title">
                                    <span class="icon">
                                        <i class="fas fa-inbox"></i>
                                    </span> 
                                    Staff Messages
                                    @if(count($msgstaffnot) > 0)
                                        <span class="new-messages">
                                            @if(count($msgstaffnot) > 1)
                                                ({{count($msgstaffnot)}} new messages)
                                            @else
                                                ({{count($msgstaffnot)}} new message)
                                            @endif
                                        </span> 
                                    @else

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(count($msgstaff) > 0)
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
                        @foreach($msgstaff as $mstaff)
                            <div class="email-list">
                                @if($mstaff->msgstats == 'unread')
                                    <div class="email-list-item email-list-item--unread">
                                @else
                                    <div class="email-list-item">
                                @endif
                                    <div class="email-list-actions">
                                        <label class="custom-control custom-checkbox">
                                            <input class="custom-control-input checkboxes" type="checkbox" value="1" id="one"><span class="custom-control-label"></span>
                                        </label>
                                    </div>
                                    <a href="#" class="email-list-detail" id="viewh{{$mstaff->id}}">
                                        <span class="date float-right">
                                            <span class="icon">
                                                <i class="fas fa-paperclip"></i>
                                            </span>
                                            @if($mstaff->y == date('Y'))
                                                {{$mstaff->d}} {{$mstaff->m}}
                                            @else
                                                {{$mstaff->d}} {{$mstaff->m}} {{$mstaff->y}}
                                            @endif
                                        </span>
                                        <span class="from">
                                            @if(count($staffs) > 0)
                                                @foreach($staffs as $staff)
                                                    @if($staff->id == $mstaff->sender)
                                                        {{$staff->firstname}} {{$staff->othernames}}
                                                    @else
                                                        
                                                    @endif
                                                @endforeach
                                            @else
                                                <i style="color: red;">Unknown</i>
                                            @endif
                                        </span>
                                        <p class="msg">{{$mstaff->title}}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="email-list">
                            <div class="email-list-item email-list-item--unread" style="text-align: center;">
                                <i style="color: red;">No message has been sent to you for this section!</i>
                            </div>
                        </div>
                    @endif
                </div>
                @if(count($msgstaff) > 0)
                    @foreach($msgstaff as $mstaff)
                        @php $vid = $mstaff; @endphp
                        @include('inc.admin.message.message.view')
                    @endforeach
                @else
                    
                @endif