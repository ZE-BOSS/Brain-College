                    <div class="main-content container-fluid p-0" id="viewd{{$vid->id}}" style="display: none;">
                        <div class="email-head">
                            <div class="email-head-subject">
                                <div class="title"> <span>{{$vid->title}}</span>
                                    <div class="icons"><a href="#" class="icon" id="replyh{{$vid->id}}"><i class="fas fa-reply"></i></a><a href="#" class="icon"><i class="fas fa-print"></i></a><a href="#" class="icon"><i class="fas fa-trash"></i></a></div>
                                </div>
                            </div>
                            <div class="email-head-sender">
                                <div class="date">{{$vid->m}} {{$vid->d}} @if(date('Y') == $vid->y) @else {{$vid->y}} @endif, {{$vid->time}}</div>
                                <div class="avatar"><img src="../assets/images/avatar-2.jpg" alt="Avatar" class="rounded-circle user-avatar-md"></div>
                                <div class="sender">
                                    
                                        @if($vid->msgcat == 'user')
                                            @if(count($users) > 0)
                                                @foreach($users as $user)
                                                    @if($user->id == $vid->sender)
                                                        <a href="#">{{$user->name}}</a>
                                                    @else
                                                        
                                                    @endif
                                                @endforeach
                                            @else
                                                <i style="color: red;">Unknown</i>
                                            @endif
                                        @elseif($vid->msgcat == 'student')
                                            @if(count($students) > 0)
                                                @foreach($students as $student)
                                                    @if($student->id == $vid->sender)
                                                        <a href="{{route('students.show',$student->id)}}">{{$student->firstname}} {{$student->othernames}}</a>
                                                    @else
                                                        
                                                    @endif
                                                @endforeach
                                            @else
                                                <i style="color: red;">Unknown</i>
                                            @endif
                                        @elseif($vid->msgcat == 'staff')
                                            @if(count($staffs) > 0)
                                                @foreach($staffs as $staff)
                                                    @if($staff->id == $vid->sender)
                                                        <a href="{{route('staffs.show',$staff->id)}}">{{$staff->firstname}} {{$staff->othernames}}</a>
                                                    @else
                                                        
                                                    @endif
                                                @endforeach
                                            @else
                                                <i style="color: red;">Unknown</i>
                                            @endif
                                        @else
                                            <a href="#">You</a>
                                        @endif
                                        <i style="color: red;"> to </i>  
                                        @if($vid->rcat == 'user')
                                            @if(count($users) > 0)
                                                @foreach($users as $user)
                                                    @if($user->id == $vid->recievers)
                                                        <a href="{{$vid->sender}}">{{$user->name}}</a>
                                                    @else
                                                        
                                                    @endif
                                                @endforeach
                                            @else
                                                <i style="color: red;">Unknown</i>
                                            @endif
                                        @elseif($vid->rcat == 'student')
                                            @if(count($students) > 0)
                                                @foreach($students as $student)
                                                    @if($student->id == $vid->reciever)
                                                        <a href="{{route('students.show',$student->id)}}">{{$student->firstname}} {{$student->othernames}}</a>
                                                    @else
                                                        
                                                    @endif
                                                @endforeach
                                            @else
                                                <i style="color: red;">Unknown</i>
                                            @endif
                                        @elseif($vid->rcat == 'staff')
                                            @if(count($staffs) > 0)
                                                @foreach($staffs as $staff)
                                                    @if($staff->id == $vid->reciever)
                                                        <a href="{{route('staffs.show',$staff->id)}}">{{$staff->firstname}} {{$staff->othernames}}</a>
                                                    @else
                                                        
                                                    @endif
                                                @endforeach
                                            @else
                                                <i style="color: red;">Unknown</i>
                                            @endif
                                        @else
                                            <a href="#">Me</a>
                                        @endif
                                    <div class="actions"><a class="icon toggle-dropdown" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-caret-down"></i></a>
                                        <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(7px, 30px, 0px); top: 0px; left: 0px; will-change: transform;"><a class="dropdown-item" href="#">Mark as read</a><a class="dropdown-item" href="#">Mark as unread</a><a class="dropdown-item" href="#">Spam</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="email-body">
                            <?php echo $vid->msg; ?>
                        </div>
                        <div class="email-attachments">
                            <div class="title">Attachments <span>(2 files, 16,24 KB)</span></div>
                            <ul>
                                <li><a href="#"><span class="icon mdi mdi-attachment-alt"></span> new-release.zip <span>(5.12 KB)</span></a></li>
                                <li><a href="#"><span class="icon mdi mdi-attachment-alt"></span> guidelines.pdf <span>(11.3 MB)</span></a></li>
                            </ul>
                        </div>
                    </div>