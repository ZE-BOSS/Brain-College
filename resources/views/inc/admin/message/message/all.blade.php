            @if(count($msguser) > 0)
                @foreach($msguser as $muser)
                    var viewd{{$muser->id}} = $('#viewd{{$muser->id}}');
                    viewd{{$muser->id}}.css({'display':'none'});

                    var replied{{$muser->id}} = $('#replied{{$muser->id}}');
                    replied{{$muser->id}}.css({'display':'none'});
                @endforeach
            @else
                        
            @endif
            @if(count($msgstudent) > 0)
                @foreach($msgstudent as $mstudent)
                    var viewd{{$mstudent->id}} = $('#viewd{{$mstudent->id}}');
                    viewd{{$mstudent->id}}.css({'display':'none'});

                    var replied{{$mstudent->id}} = $('#replied{{$mstudent->id}}');
                    replied{{$mstudent->id}}.css({'display':'none'});
                @endforeach
            @else
                        
            @endif
            @if(count($msgstaff) > 0)
                @foreach($msgstaff as $mstaff)
                    var viewd{{$mstaff->id}} = $('#viewd{{$mstaff->id}}');
                    viewd{{$mstaff->id}}.css({'display':'none'});

                    var replied{{$mstaff->id}} = $('#replied{{$mstaff->id}}');
                    replied{{$mstaff->id}}.css({'display':'none'});
                @endforeach
            @else
                        
            @endif
            @if(count($msgrequest) > 0)
                @foreach($msgrequest as $mrequest)
                    var viewd{{$mrequest->id}} = $('#viewd{{$mrequest->id}}');
                    viewd{{$mrequest->id}}.css({'display':'none'});

                    var replied{{$mrequest->id}} = $('#replied{{$mrequest->id}}');
                    replied{{$mrequest->id}}.css({'display':'none'});
                @endforeach
            @else
                        
            @endif
            @if(count($msgsent) > 0)
                @foreach($msgsent as $msent)
                    var viewd{{$msent->id}} = $('#viewd{{$msent->id}}');
                    viewd{{$msent->id}}.css({'display':'none'});

                    var replied{{$msent->id}} = $('#replied{{$msent->id}}');
                    replied{{$msent->id}}.css({'display':'none'});
                @endforeach
            @else
                        
            @endif
            @if(count($msgdraft) > 0)
                @foreach($msgdraft as $mdraft)
                    var viewd{{$mdraft->id}} = $('#viewd{{$mdraft->id}}');
                    viewd{{$mdraft->id}}.css({'display':'none'});

                    var replied{{$mdraft->id}} = $('#replied{{$mdraft->id}}');
                    replied{{$mdraft->id}}.css({'display':'none'});
                @endforeach
            @else
                        
            @endif
            @if(count($msgtrash) > 0)
                @foreach($msgtrash as $mtrash)
                    var viewd{{$mtrash->id}} = $('#viewd{{$mtrash->id}}');
                    viewd{{$mtrash->id}}.css({'display':'none'});

                    var replied{{$mtrash->id}} = $('#replied{{$mtrash->id}}');
                    replied{{$mtrash->id}}.css({'display':'none'});
                @endforeach
            @else
                        
            @endif