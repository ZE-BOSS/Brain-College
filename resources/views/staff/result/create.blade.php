<!DOCTYPE html>
<html >
    <head>
        @include('inc.staff.index')
    </head>
    <body id="reload">
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="main" style="margin-top: 15px; margin-bottom: 15px; margin-left: 15px; margin-right: 15px;">
            <div class="dashboard-influence" id="load">
                <div class="quote"style="margin-top: 15px; margin-bottom: 15px; margin-left: 15px; margin-right: 15px;">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Student Result</h2>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12">
                            
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            @if(count($students) > 0)
                                                @foreach($students as $student)
                                                    @if($student->id == $result->studentid)
                                                        <a href="{{route('staff_student.show', $student->id)}}" class="btn-danger" style="padding: 10px;"> < Back</a>
                                                    @endif
                                                @endforeach
                                            @else
                                                <p style="color: red;"> None</p>
                                            @endif
                                            <i class="mb-0" style="padding-right: 5px;"></i>
                                            <i class="mb-0" style="font-size: 19px; margin-left: 38%;">Student Result</i>
                                        </div>
                                        <div class="card-body">
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
                                            @if(count($r_tables) > 0)
                                                @foreach($r_tables as $r_table)
                                                    @if($result->tablerand == $r_table->rand)
                                                        <form action="{{ route('staff_result.update', $result->id) }}" enctype="multipart/form-data" method="post">
                                                            @csrf
                                                            {{ method_field('PUT') }}
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="row">
                                                                            <div class="col-md-6" style="font-size: 15px;">
                                                                                Educational Branch:
                                                                            </div> 
                                                                            @if(count($branches) > 0)
                                                                                @foreach($branches as $branch)
                                                                                    @if(count($students) > 0)
                                                                                        @foreach($students as $student)
                                                                                            @if($branch->id == $student->branch && $result->studentid == $student->id)
                                                                                                <i> {{$branch->name}}</i>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endif
                                                                                @endforeach
                                                                            @else
                                                                                <i style="color: red;"> None</i>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="row">
                                                                            <div class="col-md-6" style="font-size: 15px;">
                                                                                Admission No:
                                                                            </div>
                                                                            @if(count($students) > 0 && count($sites) > 0)
                                                                                @foreach($students as $student)
                                                                                    @foreach($sites as $site)
                                                                                        @if($result->studentid == $student->id && $site->id == 1)
                                                                                            <i> {{$site->admission_no_prefix}} {{$student->admission_no}}</i>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endforeach
                                                                            @else
                                                                                <i style="color: red;"> None</i>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="row">
                                                                            <div class="col-md-6" style="font-size: 15px;">
                                                                                Session:
                                                                            </div> 
                                                                            @if(count($session) > 0)
                                                                                @foreach($session as $session)
                                                                                    @if($session->id == $result->session)
                                                                                        <i> {{$session->name}}</i>                                                                        @endif
                                                                                @endforeach
                                                                            @else
                                                                                <i style="color: red;"> None</i>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="row">
                                                                            <div class="col-md-6" style="font-size: 15px;">
                                                                                Sex: 
                                                                            </div>
                                                                            @if(count($students) > 0)
                                                                                @foreach($students as $student)
                                                                                    @if($result->studentid == $student->id)
                                                                                        <i> {{$student->sex}}</i>
                                                                                    @endif
                                                                                @endforeach
                                                                            @else
                                                                                <i style="color: red;"> None</i>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="row">
                                                                            <div class="col-md-6" style="font-size: 15px;">
                                                                                Student's Name:
                                                                            </div> 
                                                                            @if(count($students) > 0)
                                                                                @foreach($students as $student)
                                                                                    @if($student->id == $result->studentid)
                                                                                        <i> {{$student->firstname}} {{$student->othernames}}</i>
                                                                                    @endif
                                                                                @endforeach
                                                                            @else
                                                                                <i style="color: red;"> None</i>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="row">
                                                                            <div class="col-md-6" style="font-size: 15px;">
                                                                                Term:
                                                                            </div> 
                                                                            <p style="color: red; display: none;" id="term_head">None</p>
                                                                            @if(count($term) > 0)
                                                                                @foreach($term as $ter)
                                                                                    @if($ter->id == $result->term)
                                                                                        <i> {{$ter->name}}</i>
                                                                                    @endif
                                                                                @endforeach
                                                                            @else
                                                                                <i style="color: red;"> None</i>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="row">
                                                                            <div class="col-md-6" style="font-size: 15px;">
                                                                                Class:
                                                                            </div> 
                                                                            @if(count($classes) > 0)
                                                                                @foreach($classes as $class)
                                                                                    @if($class->id == $result->classid)
                                                                                        <i> {{$class->name}}</i>
                                                                                    @endif
                                                                                @endforeach
                                                                            @else
                                                                                <i style="color: red;"> None</i>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="row">
                                                                            <div class="col-md-6" style="font-size: 15px;">
                                                                                Number in Class:
                                                                            </div> 
                                                                            <i>{{count($rescount)}}</i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr class="mb-4">
                                                            <div class="col-md-12">
                                                                <span>1. ATTENDANCE (REGULARITY & PUNCTUALITY)</span>
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td>School</td>
                                                                            <td>Sport</td>
                                                                            <td>Other Organised Activities</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>No of times school opened / activities held</td>
                                                                            <td><input value="{{$r_table->school_open}}" type="text" name="school1"></td>
                                                                            <td><input value="{{$r_table->sport_open}}" type="text" name="sport1"></td>
                                                                            <td><input value="{{$r_table->other_open}}" ype="text" name="ooa1"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>No of times present</td>
                                                                            <td><input value="{{$r_table->school_present}}" type="text" name="school2"></td>
                                                                            <td><input value="{{$r_table->sport_present}}" type="text" name="sport2"></td>
                                                                            <td><input value="{{$r_table->other_present}}"type="text" name="ooa2"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>No of times punctual</td>
                                                                            <td><input value="{{$r_table->school_punctual}}" type="text" name="school3"></td>
                                                                            <td><input value="{{$r_table->sport_punctual}}" type="text" name="sport3"></td>
                                                                            <td><input value="{{$r_table->other_punctual}}" type="text" name="ooa3"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>No of times absent</td>
                                                                            <td><input value="{{$r_table->school_absent}}" type="text" name="school4"></td>
                                                                            <td><input value="{{$r_table->sport_absent}}" type="text" name="sport4"></td>
                                                                            <td><input value="{{$r_table->other_absent}}" type="text" name="ooa4"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table><br>
                                                            </div>
                                                            <hr class="mb-4">
                                                            <div class="col-md-12">
                                                                <span>2. Special Conduct Report During the Term</span>
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            @if(!empty($r_table->loyalty))
                                                                                <td><input type="checkbox" checked name="loyalty" value="checked"> Loyalty </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="loyalty" value="checked"> Loyalty </td>
                                                                            @endif
                                                                            @if(!empty($r_table->honesty))
                                                                                <td><input type="checkbox" checked name="honesty" value="checked"> Honesty </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="honesty" value="checked"> Honesty </td>
                                                                            @endif
                                                                            @if(!empty($r_table->cleaniness))
                                                                                <td><input type="checkbox" checked name="cleanliness" value="checked"> Cleanliness </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="cleanliness" value="checked"> Cleanliness </td>
                                                                            @endif
                                                                            @if(!empty($r_table->punctuality))
                                                                                <td><input type="checkbox" checked name="punctuality" value="checked"> Punctuality </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="punctuality" value="checked"> Punctuality </td>
                                                                            @endif
                                                                            @if(!empty($r_table->regularity))
                                                                                <td><input type="checkbox" checked name="regularity" value="checked"> Regularity </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="regularity" value="checked"> Regularity </td>
                                                                            @endif
                                                                        </tr>
                                                                    </tbody>
                                                                </table><br>
                                                                <div colspan="5">Comment <input type="text" value="{{$r_table->conduct_comment}}" id="conduct_comment" name="conduct_comment" style="width: 65rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></div>
                                                                <br>
                                                            </div>
                                                            <hr class="mb-4">
                                                            <div class="col-md-12">
                                                                <span>3. PHYSICAL DEVELOPMENT & HEALTH</span>
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <td colspan="2">Height</td>
                                                                            <td colspan="2">Weight</td>
                                                                            <td colspan="2"></td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Beginning of Term</td>
                                                                            <td>End of Term</td>
                                                                            <td>Beginning of Term</td>
                                                                            <td>End of Term</td>
                                                                            <td>No of days Absent due to illness</td>
                                                                            <td>Nature of illness</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><input type="text" value="{{$r_table->b_height}}" name="height1"> M</td>
                                                                            <td><input type="text" value="{{$r_table->e_height}}" name="height2"> M</td>
                                                                            <td><input type="text" value="{{$r_table->b_weight}}" name="weight1"> KG</td>
                                                                            <td><input type="text" value="{{$r_table->e_weight}}" name="weight2"> KG</td>
                                                                            <td><input type="text" value="{{$r_table->illness_no}}" name="illness1"></td>
                                                                            <td><input type="text" value="{{$r_table->illness_nature}}" name="illness2" style="width: 200px;"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table><br>
                                                            </div>
                                                            <hr class="mb-4">
                                                            <div class="col-md-12">
                                                                <span>4. Performance in Subjects</span>
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <td colspan=""></td>
                                                                            <td>Attendance(%)</td>
                                                                            <td>Continious Assessment Scores</td>
                                                                            <td>Examination Scores</td>
                                                                            <td>Total Scores</td>
                                                                            <td>Scores B/ forward</td>
                                                                            <td>Weighted Average</td>
                                                                            <td>Grade</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @if(count($settings) > 0)
                                                                            @foreach($settings as $setting)
                                                                                <tr>
                                                                                    <td colspan="">Max Obtainable</td>
                                                                                    <td>{{$setting->m_attendance}}</td>
                                                                                    <td>{{$setting->m_test}}</td>
                                                                                    <td>{{$setting->m_exam}}</td>
                                                                                    <td>{{$setting->m_total}}</td>
                                                                                    <td>{{$setting->m_forward}}</td>
                                                                                    <td>{{$setting->m_average}}</td>
                                                                                    <td>{{$setting->m_grade}}</td>
                                                                                    
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                        @php $sub = $r_subs->pluck('subjectid'); @endphp
                                                                            @forelse($subjects as $subject)
                                                                                @if($subject->classid == $result->classid)
                                                                                    @forelse($r_subs as $r_sub)
                                                                                        @if($r_sub->sub == $r_table->sub_no)
                                                                                            @if(!$sub->contains($subject->id) && $r_sub->subjectid != $subject->id)
                                                                                                @continue ($subject->id == $r_sub->subjectid)
                                                                                                    <tr>
                                                                                                        <td>{{$subject->name}}</td>
                                                                                                        <td colspan=""><input type="text" name="{{$subject->id}}_attendance"></td>
                                                                                                        <td colspan=""><input type="text" name="{{$subject->id}}_test"></td>
                                                                                                        <td colspan=""><input type="text" name="{{$subject->id}}_exam"></td>
                                                                                                        <td colspan=""><input type="text" name="{{$subject->id}}_total"></td>
                                                                                                        <td colspan=""><input type="text" name="{{$subject->id}}_forward"></td>
                                                                                                        <td colspan=""><input type="text" name="{{$subject->id}}_wa"></td>
                                                                                                        <td colspan=""><input type="text" name="{{$subject->id}}_grade"></td>
                                                                                                    </tr>
                                                                                                @break ($subject->id != $r_sub->subjectid)
                                                                                            @elseif($sub->contains($subject->id) && $subject->id == $r_sub->subjectid)
                                                                                                <tr>
                                                                                                    <td>{{$subject->name}}</td>
                                                                                                    <td colspan=""><input type="text" value="{{$r_sub->s_attendance}}" name="{{$subject->id}}_attendance"></td>
                                                                                                    <td colspan=""><input type="text" value="{{$r_sub->s_test}}" name="{{$subject->id}}_test"></td>
                                                                                                    <td colspan=""><input type="text" value="{{$r_sub->s_exam}}" name="{{$subject->id}}_exam"></td>
                                                                                                    <td colspan=""><input type="text" value="{{$r_sub->s_total}}" name="{{$subject->id}}_total"></td>
                                                                                                    <td colspan=""><input type="text" value="{{$r_sub->s_forward}}" name="{{$subject->id}}_forward"></td>
                                                                                                    <td colspan=""><input type="text" value="{{$r_sub->s_average}}" name="{{$subject->id}}_wa"></td>
                                                                                                    <td colspan=""><input type="text" value="{{$r_sub->s_grade}}" name="{{$subject->id}}_grade"></td>
                                                                                                </tr>
                                                                                            @else

                                                                                            @endif                                           
                                                                                        @endif
                                                                                    @empty
                                                                                        <tr>
                                                                                            <td>{{$subject->name}}</td>
                                                                                            <td colspan=""><input type="text" name="{{$subject->id}}_attendance"></td>
                                                                                            <td colspan=""><input type="text" name="{{$subject->id}}_test"></td>
                                                                                            <td colspan=""><input type="text" name="{{$subject->id}}_exam"></td>
                                                                                            <td colspan=""><input type="text" name="{{$subject->id}}_total"></td>
                                                                                            <td colspan=""><input type="text" name="{{$subject->id}}_forward"></td>
                                                                                            <td colspan=""><input type="text" name="{{$subject->id}}_wa"></td>
                                                                                            <td colspan=""><input type="text" name="{{$subject->id}}_grade"></td>
                                                                                        </tr>
                                                                                    @endforelse
                                                                                @else
                                                                                    
                                                                                @endif
                                                                            @empty

                                                                            @endforelse
                                                                    </tbody>
                                                                </table><br>
                                                            </div>
                                                            <hr class="mb-4">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <span>Term's Gross Score: <input type="text" value="{{$r_table->t_gross_score}}" name="gs" style="width: 10rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></span>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <span>Term's Average: <input type="text" value="{{$r_table->t_average}}" name="ta" style="width: 10rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></span>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <span>Cummulative Score: <input type="text" value="{{$r_table->c_score}}" name="cums" style="width: 10rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></span>
                                                                    </div>
                                                                    <div class="col-md-4"><br>
                                                                        <span>Cummulative Average: <input type="text" value="{{$r_table->c_average}}" name="cuma" style="width: 10rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></span>
                                                                    </div>
                                                                    <div class="col-md-4"><br>
                                                                        <span>Position: <input type="text" name="position" value="{{$r_table->position}}" style="width: 10rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <hr class="mb-4">
                                                            <div class="col-md-12">
                                                                <span>5. Sporting Activities</span>
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            @if(!empty($r_table->indoor_game))
                                                                                <td><input type="checkbox" checked name="ig" value="checked"> Indoor Games </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="ig" value="checked"> Indoor Games </td>
                                                                            @endif
                                                                            @if(!empty($r_table->ball_game))
                                                                                <td><input type="checkbox" checked name="bg" value="checked"> Ball Games </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="bg" value="checked"> Ball Games </td>
                                                                            @endif
                                                                            @if(!empty($r_table->combative_game))
                                                                                <td><input type="checkbox" checked name="cg" value="checked"> Combative Games </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="cg" value="checked"> Combative Games </td>
                                                                            @endif
                                                                            @if(!empty($r_table->track))
                                                                                <td><input type="checkbox" checked name="track" value="checked"> Track </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="track" value="checked"> Track </td>
                                                                            @endif
                                                                            @if(!empty($r_table->jumps))
                                                                                <td><input type="checkbox" checked name="jumps" value="checked"> Jumps </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="jumps" value="checked"> Jumps </td>
                                                                            @endif
                                                                            @if(!empty($r_table->throw))
                                                                                <td><input type="checkbox" checked name="throw" value="checked"> Throw </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="throw" value="checked"> Throw </td>
                                                                            @endif
                                                                            @if(!empty($r_table->swimming))
                                                                                <td><input type="checkbox" checked name="swimming" value="checked"> Swimming </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="swimming" value="checked"> Swimming </td>
                                                                            @endif
                                                                            @if(!empty($r_table->weight_lifting))
                                                                                <td><input type="checkbox" checked name="Weight" value="checked"> Weight Lifting </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="Weight" value="checked"> Weight Lifting </td>
                                                                            @endif
                                                                        </tr>
                                                                    </tbody>
                                                                </table><br>
                                                                <div>Comments <input type="text" name="sport_comment" value="{{$r_table->sport_comment}}" style="width: 70rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></div>
                                                            </div>
                                                            <hr class="mb-4">
                                                            <div class="col-md-12">
                                                                <span>6. Clubs, Youth Organisation, ETC.</span>
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>Organisation </td>
                                                                            <td>Position Held </td>
                                                                            <td>Significant Contributions </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="text" value="{{$r_table->organisation}}" style="width: 300px;" name="organisation"></td>
                                                                            <td><input type="text" value="{{$r_table->office}}" style="width: 300px;" name="office"></td>
                                                                            <td><input type="text" value="{{$r_table->contribution}}" style="width: 300px;" name="contribution"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table><br>
                                                            </div>
                                                            <hr class="mb-4">
                                                            <div class="col-md-12">
                                                                <span>Gradding System: &nbsp&nbsp
                                                                    <i style="color: green;">80-100 Excellent (A)</i>,&nbsp&nbsp 
                                                                    <i style="color: blue;">70-79 Very Good (B)</i>,&nbsp&nbsp 
                                                                    <i style="color: skyblue;">60-69 Good (C)</i>,&nbsp&nbsp 
                                                                    <i style="color: gray;">50-59 Pass (D)</i>,&nbsp&nbsp 
                                                                    <i style="color: orange;">40-49 Fair (E)</i>,&nbsp&nbsp 
                                                                    <i style="color: red;">Below 40 Fail (F)</i>.
                                                                </span><br><br>
                                                                <div>Class Teacher's Comment <input type="text" value="{{$r_table->teacher_comment}}" name="teacher_comment" style="width: 60rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></div><br>
                                                                <div>Principal's Comment <input type="text" value="{{$r_table->principal_comment}}" name="principal_comment" style="width: 60rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></div><br>
                                                                <span>School Stamp & Signature </span>
                                                                @if(!empty($r_table->shool_signature) &&  file_exists(storage_path().'/app/public/image/result/'.$r_table->shool_signature))
                                                                    <input type="file" class="form-control" onchange="readLink(this);" name="background" placeholder="" id="background">
                                                                    <img id="blaw" style="display: inline; width: 390px; height: 200px;" src="{{asset('/storage/image/result/'.$r_table->shool_signature)}}" alt="Your Media">
                                                                @else
                                                                    <input type="file" class="form-control" onchange="readLink(this);" name="background" placeholder="" id="background">
                                                                    <img id="blaw" style="display: inline; width: 390px; height: 200px;" src="" alt="Your Media">
                                                                @endif
                                                            </div>
                                                            <hr class="mb-4">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <button class="btn btn-primary btn-lg" type="submit">Update Result</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @endif
                                                @endforeach
                                            @else
                                                <form action="{{ route('staff_result.store') }}" enctype="multipart/form-data" method="post">
                                                    @csrf
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <input type="hidden" name="id" value="{{$result->id}}">
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-md-6" style="font-size: 15px;">
                                                                        Educational Branch:
                                                                    </div> 
                                                                    @if(count($branches) > 0)
                                                                        @foreach($branches as $branch)
                                                                            @if(count($students) > 0)
                                                                                @foreach($students as $student)
                                                                                    @if($branch->id == $student->branch && $result->studentid == $student->id)
                                                                                        <i> {{$branch->name}}</i>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <i style="color: red;"> None</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-md-6" style="font-size: 15px;">
                                                                        Admission No:
                                                                    </div>
                                                                    @if(count($students) > 0 && count($sites) > 0)
                                                                        @foreach($students as $student)
                                                                            @foreach($sites as $site)
                                                                                @if($result->studentid == $student->id && $site->id == 1)
                                                                                    <i> {{$site->admission_no_prefix}} {{$student->admission_no}}</i>
                                                                                @endif
                                                                            @endforeach
                                                                        @endforeach
                                                                    @else
                                                                        <i style="color: red;"> None</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-md-6" style="font-size: 15px;">
                                                                        Session:
                                                                    </div> 
                                                                    @if(count($session) > 0)
                                                                        @foreach($session as $session)
                                                                            @if($session->id == $result->session)
                                                                                <i> {{$session->name}}</i>                                                                        @endif
                                                                        @endforeach
                                                                    @else
                                                                        <i style="color: red;"> None</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-md-6" style="font-size: 15px;">
                                                                        Sex: 
                                                                    </div>
                                                                    @if(count($students) > 0)
                                                                        @foreach($students as $student)
                                                                            @if($result->studentid == $student->id)
                                                                                <i> {{$student->sex}}</i>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <i style="color: red;"> None</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-md-6" style="font-size: 15px;">
                                                                        Student's Name:
                                                                    </div> 
                                                                    @if(count($students) > 0)
                                                                        @foreach($students as $student)
                                                                            @if($student->id == $result->studentid)
                                                                                <i> {{$student->firstname}} {{$student->othernames}}</i>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <i style="color: red;"> None</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-md-6" style="font-size: 15px;">
                                                                        Term:
                                                                    </div> 
                                                                    <p style="color: red; display: none;" id="term_head">None</p>
                                                                    @if(count($term) > 0)
                                                                        @foreach($term as $ter)
                                                                            @if($ter->id == $result->term)
                                                                                <i> {{$ter->name}}</i>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <i style="color: red;"> None</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-md-6" style="font-size: 15px;">
                                                                        Class:
                                                                    </div> 
                                                                    @if(count($classes) > 0)
                                                                        @foreach($classes as $class)
                                                                            @if($class->id == $result->classid)
                                                                                <i> {{$class->name}}</i>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <i style="color: red;"> None</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="col-md-6" style="font-size: 15px;">
                                                                        Number in Class:
                                                                    </div> 
                                                                    <i>{{count($rescount)}}</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-4">
                                                    <div class="col-md-12">
                                                        <span>1. ATTENDANCE (REGULARITY & PUNCTUALITY)</span>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>School</td>
                                                                    <td>Sport</td>
                                                                    <td>Other Organised Activities</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>No of times school opened / activities held</td>
                                                                    <td><input type="text" name="school1"></td>
                                                                    <td><input type="text" name="sport1"></td>
                                                                    <td><input ype="text" name="ooa1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>No of times present</td>
                                                                    <td><input type="text" name="school2"></td>
                                                                    <td><input type="text" name="sport2"></td>
                                                                    <td><input type="text" name="ooa2"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>No of times punctual</td>
                                                                    <td><input type="text" name="school3"></td>
                                                                    <td><input type="text" name="sport3"></td>
                                                                    <td><input type="text" name="ooa3"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>No of times absent</td>
                                                                    <td><input type="text" name="school4"></td>
                                                                    <td><input type="text" name="sport4"></td>
                                                                    <td><input type="text" name="ooa4"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table><br>
                                                    </div>
                                                    <hr class="mb-4">
                                                    <div class="col-md-12">
                                                        <span>2. Special Conduct Report During the Term</span>
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="checkbox" name="loyalty" value="checked"> Loyalty </td>
                                                                    <td><input type="checkbox" name="honesty" value="checked"> Honesty </td>
                                                                    <td><input type="checkbox" name="cleanliness" value="checked"> Cleanliness </td>
                                                                    <td><input type="checkbox" name="punctuality" value="checked"> Punctuality </td>
                                                                    <td><input type="checkbox" name="regularity" value="checked"> Regularity </td>
                                                                </tr>
                                                            </tbody>
                                                        </table><br>
                                                        <div colspan="5">Comment <input type="text" id="conduct_comment" name="conduct_comment" style="width: 65rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></div>
                                                        <br>
                                                    </div>
                                                    <hr class="mb-4">
                                                    <div class="col-md-12">
                                                        <span>3. PHYSICAL DEVELOPMENT & HEALTH</span>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td colspan="2">Height</td>
                                                                    <td colspan="2">Weight</td>
                                                                    <td colspan="2"></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Beginning of Term</td>
                                                                    <td>End of Term</td>
                                                                    <td>Beginning of Term</td>
                                                                    <td>End of Term</td>
                                                                    <td>No of days Absent due to illness</td>
                                                                    <td>Nature of illness</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="height1"> M</td>
                                                                    <td><input type="text" name="height2"> M</td>
                                                                    <td><input type="text" name="weight1"> KG</td>
                                                                    <td><input type="text" name="weight2"> KG</td>
                                                                    <td><input type="text" name="illness1"></td>
                                                                    <td><input type="text" name="illness2" style="width: 200px;"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table><br>
                                                    </div>
                                                    <hr class="mb-4">
                                                    <div class="col-md-12">
                                                        <span>4. Performance in Subjects</span>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td colspan=""></td>
                                                                    <td>Attendance(%)</td>
                                                                    <td>Continious Assessment Scores</td>
                                                                    <td>Examination Scores</td>
                                                                    <td>Total Scores</td>
                                                                    <td>Scores B/ forward</td>
                                                                    <td>Weighted Average</td>
                                                                    <td>Grade</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if(count($settings) > 0)
                                                                    @foreach($settings as $setting)
                                                                        <tr>
                                                                            <td colspan="">Max Obtainable</td>
                                                                            <td>{{$setting->m_attendance}}</td>
                                                                            <td>{{$setting->m_test}}</td>
                                                                            <td>{{$setting->m_exam}}</td>
                                                                            <td>{{$setting->m_total}}</td>
                                                                            <td>{{$setting->m_forward}}</td>
                                                                            <td>{{$setting->m_average}}</td>
                                                                            <td>{{$setting->m_grade}}</td>
                                                                            
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                                @if(count($subjects) > 0)
                                                                    @foreach($subjects as $subject)
                                                                        @if($subject->classid == $result->classid)
                                                                            <tr>
                                                                                <td>{{$subject->name}}</td>
                                                                                <td colspan=""><input type="text" name="{{$subject->id}}_attendance"></td>
                                                                                <td colspan=""><input type="text" name="{{$subject->id}}_test"></td>
                                                                                <td colspan=""><input type="text" name="{{$subject->id}}_exam"></td>
                                                                                <td colspan=""><input type="text" name="{{$subject->id}}_total"></td>
                                                                                <td colspan=""><input type="text" name="{{$subject->id}}_forward"></td>
                                                                                <td colspan=""><input type="text" name="{{$subject->id}}_wa"></td>
                                                                                <td colspan=""><input type="text" name="{{$subject->id}}_grade"></td>
                                                                            </tr>
                                                                        @else
                                                                            
                                                                        @endif
                                                                    @endforeach
                                                                @else
                                                                    
                                                                @endif
                                                            </tbody>
                                                        </table><br>
                                                    </div>
                                                    <hr class="mb-4">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <span>Term's Gross Score: <input type="text" name="gs" style="width: 10rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <span>Term's Average: <input type="text" name="ta" style="width: 10rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <span>Cummulative Score: <input type="text" name="cums" style="width: 10rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></span>
                                                            </div>
                                                            <div class="col-md-4"><br>
                                                                <span>Cummulative Average: <input type="text" name="cuma" style="width: 10rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></span>
                                                            </div>
                                                            <div class="col-md-4"><br>
                                                                <span>Position: <input type="text" name="position" style="width: 10rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <hr class="mb-4">
                                                    <div class="col-md-12">
                                                        <span>5. Sporting Activities</span>
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="checkbox" name="ig" value="checked"> Indoor Games </td>
                                                                    <td><input type="checkbox" name="bg" value="checked"> Ball Games </td>
                                                                    <td><input type="checkbox" name="cg" value="checked"> Combative Games </td>
                                                                    <td><input type="checkbox" name="track" value="checked"> Track </td>
                                                                    <td><input type="checkbox" name="jumps" value="checked"> Jumps </td>
                                                                    <td><input type="checkbox" name="throw" value="checked"> Throw </td>
                                                                    <td><input type="checkbox" name="swimming" value="checked"> Swimming </td>
                                                                </tr>
                                                            </tbody>
                                                        </table><br>
                                                        <div>Comments <input type="text" name="sport_comment" style="width: 70rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></div>
                                                    </div>
                                                    <hr class="mb-4">
                                                    <div class="col-md-12">
                                                        <span>6. Clubs, Youth Organisation, ETC.</span>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td>Organisation </td>
                                                                    <td>Position Held </td>
                                                                    <td>Significant Contributions </td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" name="organisation" style="width: 300px;"></td>
                                                                    <td><input type="text" name="office" style="width: 300px;"></td>
                                                                    <td><input type="text" name="contribution" style="width: 300px;"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table><br>
                                                    </div>
                                                    <hr class="mb-4">
                                                    <div class="col-md-12">
                                                        <span>Gradding System: &nbsp&nbsp
                                                            <i style="color: green;">80-100 Excellent (A)</i>,&nbsp&nbsp 
                                                            <i style="color: blue;">70-79 Very Good (B)</i>,&nbsp&nbsp 
                                                            <i style="color: skyblue;">60-69 Good (C)</i>,&nbsp&nbsp 
                                                            <i style="color: gray;">50-59 Pass (D)</i>,&nbsp&nbsp 
                                                            <i style="color: orange;">40-49 Fair (E)</i>,&nbsp&nbsp 
                                                            <i style="color: red;">Below 40 Fail (F)</i>.
                                                        </span><br><br>
                                                        <div>Class Teacher's Comment <input type="text" name="teacher_comment" style="width: 60rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></div><br>
                                                        <div>Principal's Comment <input type="text" name="principal_comment" style="width: 60rem; border: none; border-bottom: 1px solid; background: none; overflow: visible; outline: none;"></div><br>
                                                        <span>School Stamp & Signature </span>
                                                        <input type="file" class="form-control" onchange="readLink(this);" name="background" placeholder="" id="background">
                                                        <img id="blaw" style="display: inline; width: 390px; height: 200px;" src="" alt="Your Media">
                                                    </div>
                                                    <hr class="mb-4">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button class="btn btn-primary btn-lg" type="submit">Save Result</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="foot" style="background-color: white; padding: 20px; position: absolute; left: 0; right: 0;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                           Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        @include('inc.admin.result.create.exit')
        <script type="text/javascript">
            function readURL(input){
                if(input.files && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#blah').attr('src', e.target.result).width(390).height(200);
                    };
                    $('#blah').css({'display':'inline'});
                    reader.readAsDataURL(input.files[0]);
                }
            }
            function readLink(input){
                if(input.files && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#blaw').attr('src', e.target.result).width(390).height(200);
                    };
                    $('#blaw').css({'display':'inline'});
                    reader.readAsDataURL(input.files[0]);
                }
            }
            function readLin(input){
                if(input.files && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#blas').attr('src', e.target.result).width(390).height(200);
                    };
                    $('#blas').css({'display':'inline'});
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </body>
</html>