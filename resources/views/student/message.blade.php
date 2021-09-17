    @extends('layouts.student')

        @section('content')
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('/student/images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-comment-text"></i> Messages</h3>
                                        <button class="au-btn-plus">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div id="mainmsg" class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                @if(count($mstats) > 0)
                                                    <p>You Have <span>({{count($mstats)}})</span> new messages</p>
                                                @else

                                                @endif
                                            </div>
                                            @php $i = 0; @endphp
                                            @if(count($messages) > 0)
                                                @if(count($messages) > 4)
                                                    <div class="au-message-list js-scrollbar3">
                                                @else
                                                    <div class="js-scrollbar3">
                                                @endif
                                                    @foreach($messages as $message)
                                                        @if($message->msgstats == 'unread')
                                                            @if($i > 4)
                                                                <div class="au-message__item unread js-load-item" id="msg">
                                                            @else
                                                                <div class="au-message__item unread" id="msg">
                                                            @endif    
                                                        @else
                                                            @if($i > 4)
                                                                <div class="au-message__item js-load-item" id="msg">
                                                            @else
                                                                <div class="au-message__item" id="msg">
                                                            @endif  
                                                        @endif 
                                                            <div class="au-message__item-inner">
                                                                <div class="au-message__item-text">
                                                                    <div class="avatar-wrap">
                                                                        <div class="avatar">
                                                                            <img src="/student/images/icon/avatar-02.jpg" alt="John Smith">
                                                                        </div>
                                                                    </div>
                                                                    <div class="text">
                                                                        <h5 class="name">
                                                                            @if(count($sites) > 4)
                                                                                @foreach($sites as $site)
                                                                                    {{$site->name}} 
                                                                                @endforeach
                                                                            @else
                                                                                School
                                                                            @endif 
                                                                        </h5>
                                                                        <p>
                                                                            @foreach($students as $student)
                                                                                @if($student->id == $message->reciever)
                                                                                    {{$message->title}}
                                                                                @else
                                                                                    None
                                                                                @endif   
                                                                            @endforeach
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="au-message__item-time">
                                                                    <span>
                                                                        {{$message->time}} - 
                                                                        @if($message->y == date('Y'))
                                                                            {{$message->d}} {{$message->m}}
                                                                        @else
                                                                            {{$message->d}} {{$message->m}} {{$message->y}}
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php $i++; @endphp
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="js-scrollbar3">
                                                    <div class="au-task__item au-task__item--danger">
                                                        <div class="au-task__item-inner">
                                                            <h5 class="task">
                                                                <a href="#">
                                                                    No message has been sent to this student!
                                                                </a>
                                                            </h5>
                                                            <span class="time"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                             @endif
                                             @if(count($messages) > 4)
                                                <div class="au-message__footer">
                                                    <button class="au-btn au-btn-load js-load-btn">load more</button>
                                                </div>
                                            @else
                                                <div class="au-message__footer">
                                                    
                                                </div>
                                            @endif
                                        </div>
                                        @if(count($messages) > 0)
                                            @foreach($messages as $message)
                                                <div id="viewmsg" class="au-chat" style="display: none;">
                                                    <div class="au-chat__title">
                                                        <div class="au-chat-info">
                                                            <span class="nick">
                                                                <input type="hidden" name="id" id="id" value="{{$message->id}}">
                                                                <a href="#" id="bmsg"><- Back</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="au-chat__content">
                                                        <div class="recei-mess-wrap">
                                                            <span class="mess-time">
                                                                {{$message->time}} - 
                                                                @if($message->y == date('Y'))
                                                                    {{$message->d}} {{$message->m}}
                                                                @else
                                                                    {{$message->d}} {{$message->m}} {{$message->y}}
                                                                @endif
                                                            </span>
                                                            <div class="recei-mess__inner">
                                                                <div class="recei-mess-list">
                                                                    <?php echo $message->msg; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
