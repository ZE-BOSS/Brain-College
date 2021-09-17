            <div class="dashboard-header">
                <nav class="navbar navbar-expand-lg bg-white fixed-top">
                    <a class="navbar-brand" href="{{route('dashboard')}}">
                        <?php
                            //use App\Model\site;
                            // $site = site::find(1);
                            // echo $site->name;
                        ?>
                        @if(!empty($site->image) &&  file_exists(storage_path().'/app/public/image/site/'.$site->image))
                            <div class="m-r-10">
                                <img src="{{asset('/storage/image/site/'.$site->image)}}" alt="user" width="50">
                            </div>
                        @else
                            <div class="m-r-10">
                                <img src="/admin/assets/images/dribbble.png" alt="user" width="50">
                            </div>
                        @endif
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-right-top">
                            <li class="nav-item dropdown nav-user">
                                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <img src="/admin/assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                    <div class="nav-user-info">
                                        <h5 class="mb-0 text-white nav-user-name">{{Auth::guard('admin')->user()->firstname}} {{Auth::guard('admin')->user()->othernames}}</h5>
                                        <span class="status"></span><span class="ml-2">{{Auth::guard('admin')->user()->username}}</span>
                                    </div>
                                    <a class="dropdown-item" href="{{url('main_controller_panel/setting')}}"><i class="fas fa-cog mr-2"></i>Setting</a>
                                    <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fas fa-power-off mr-2"></i>Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            
        