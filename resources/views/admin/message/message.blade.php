    @extends('layouts.admin')

        @section('content')
            <div class="container-fluid">
                <aside class="page-aside">
                    <div class="aside-content">
                        <div class="aside-header">
                            <button class="navbar-toggle" data-target=".aside-nav" data-toggle="collapse" type="button"><span class="icon"><i class="fas fa-caret-down"></i></span></button><span class="title"></span>
                            <p class="description"></p>
                        </div>
                        <div class="aside-compose"><a class="btn btn-lg btn-secondary btn-block" href="#" id="composeh">Compose Email</a></div>
                        <div class="aside-nav collapse">
                            <ul class="nav">
                                <li class="active" id="inbox">
                                    <a href="#" id="inboxh">
                                        <span class="icon">
                                            <i class="fas fa-fw fa-inbox"></i>
                                        </span>
                                        Inbox
                                        @if(count($msgusernot) > 0)
                                            <span class="badge badge-success float-right">{{count($msgusernot)}}</span>
                                        @else

                                        @endif
                                    </a>
                                </li>
                                <li class="" id="student">
                                    <a href="#" id="studenth">
                                        <span class="icon">
                                            <i class="fas fa-fw fa-users"></i>
                                        </span>
                                        Students
                                        @if(count($msgstudentnot) > 0)
                                            <span class="badge badge-primary float-right">{{count($msgstudentnot)}}</span>
                                        @else

                                        @endif
                                    </a>
                                </li>
                                <li class="" id="staff">
                                    <a href="#" id="staffh">
                                        <span class="icon">
                                            <i class="fas fa-fw fa-user"></i>
                                        </span>
                                        Staff
                                        @if(count($msgstaffnot) > 0)
                                            <span class="badge badge-warning float-right">{{count($msgstaffnot)}}</span>
                                        @else

                                        @endif
                                    </a>
                                </li>
                                <li class="" id="request">
                                    <a href="#" id="requesth">
                                        <span class="icon">
                                            <i class="fas fa-fw fa-universal-access"></i>
                                        </span>
                                        Requests
                                        @if(count($msgrequestnot) > 0)
                                            <span class="badge badge-danger float-right">{{count($msgrequestnot)}}</span>
                                        @else

                                        @endif
                                    </a>
                                </li>
                            </ul><span class="title">Other</span>
                            <ul class="nav nav-pills nav-stacked">
                                <li class="" id="sentm">
                                    <a href="#" id="sentmh">
                                        <span class="icon">
                                            <i class="fas fa-fw  fa-envelope"></i>
                                        </span>
                                        Sent Mail
                                        @if(count($msgsentnot) > 0)
                                            <span class="badge badge-success float-right">{{count($msgsentnot)}}</span>
                                        @else

                                        @endif
                                    </a>
                                </li>
                                <li class="" id="draft">
                                    <a href="#" id="drafth">
                                        <span class="icon">
                                            <i class="fas fa-fw fa-file"></i>
                                        </span>
                                        Drafts
                                        @if(count($msgdraftnot) > 0)
                                            <span class="badge badge-warning float-right">{{count($msgdraftnot)}}</span>
                                        @else

                                        @endif
                                    </a>
                                </li>
                                <li class="" id="trash">
                                    <a href="#" id="trashh">
                                        <span class="icon">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </span>
                                        Trash
                                        @if(count($msgtrashnot) > 0)
                                            <span class="badge badge-danger float-right">{{count($msgtrashnot)}}</span>
                                        @else

                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
                <div class="main-content container-fluid p-0">
                    <div class="email-head">
                        <div class="email-compose-fields">
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
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>SUCCESS!</strong> {{session('success')}}
                                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                                
                            @elseif(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>ERROR!</strong> {{session('error')}}
                                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                            @else

                            @endif
                        </div>
                    </div>
                    
                </div>
                @include('inc.admin.message.message.create')
                @include('inc.admin.message.message.staff')
                @include('inc.admin.message.message.request')
                @include('inc.admin.message.message.sent')
                @include('inc.admin.message.message.draft')
                @include('inc.admin.message.message.trash')
                @include('inc.admin.message.message.inbox')
                @include('inc.admin.message.message.student')
            </div>
        @endsection