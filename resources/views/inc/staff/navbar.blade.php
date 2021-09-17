<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    
                </form>
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                @if(!empty($staff->profilepics) &&  file_exists(storage_path().'/app/public/image/staff/'.Auth::guard('staff')->user()->profilepics))
                                    <img src="{{asset('/storage/image/staff/'.Auth::guard('staff')->user()->profilepics)}}" alt="John Doe">
                                @else
                                    <img src="/staff/images/icon/avatar-big-01.jpg" alt="John Doe">
                                @endif
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">
                                    {{Auth::guard('staff')->user()->firstname}} {{Auth::guard('staff')->user()->othernames}}
                                </a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            @if(!empty($staff->profilepics) &&  file_exists(storage_path().'/app/public/image/staff/'.Auth::guard('staff')->user()->profilepics))
                                                <img src="{{asset('/storage/image/staff/'.Auth::guard('staff')->user()->profilepics)}}" alt="John Doe">
                                            @else
                                                <img src="/staff/images/icon/avatar-big-01.jpg" alt="John Doe">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">
                                                {{Auth::guard('staff')->user()->firstname}} {{Auth::guard('staff')->user()->othernames}}
                                            </a>
                                        </h5>
                                        <span class="email">
                                            {{Auth::guard('staff')->user()->email}}
                                        </span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{route('staff.logout')}}">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>