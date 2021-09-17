                            <li class="nav-item">
                                <div id="custom-search" class="top-search-bar">
                                    @if(count($s) > 0)
                                        <input type="hidden" name="session_availability" id="session_availability" value="available">
                                    @else
                                        <input type="hidden" name="session_availability" id="session_availability" value="unavailable">
                                    @endif
                                    <select class="custom-select d-block w-100" name="nav_session" placeholder="" id="nav_session">
                                        @if(count($session) > 0)
                                            @foreach($session as $sec)
                                                @if($sec->id == $sid))
                                                    <option value="{{$sec->id}}" selected="selected">{{$sec->name}}</option>
                                                @else
                                                    <option value="{{$sec->id}}">{{$sec->name}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option selected="selected" disabled="disabled" value="">Select Session</option>
                                        @endif  
                                    </select>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="top-search-bar" style="padding-left: 20px;">
                                    @if(count($t) > 0)
                                        <input type="hidden" name="term_availability" id="term_availability" value="available">
                                    @else
                                        <input type="hidden" name="term_availability" id="term_availability" value="unavailable">
                                    @endif
                                    <select class="custom-select d-block w-100" name="nav_term" placeholder="" id="nav_term">
                                        @if(count($term) > 0 && count($session) > 0)
                                            @foreach($term as $ter)
                                                @foreach($session as $sec)
                                                    @if($ter->session == $sec->id)
                                                        @if($ter->id == $tid)
                                                            <option value="{{$ter->id}}" selected="" id="{{$sec->id}}">{{$ter->name}} ({{$sec->name}})</option>
                                                        @else
                                                            <option value="{{$ter->id}}" id="{{$sec->id}}">{{$ter->name}} ({{$sec->name}})</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @else
                                            <option selected="selected" disabled="disabled" value="">Select Term</option>
                                        @endif
                                    </select>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="top-search-bar" style="padding-left: 20px;">
                                    <a href="#" class="btn btn-outline-success btn-sm sub" id="nav_select">Select</a>
                                </div>
                            </li>