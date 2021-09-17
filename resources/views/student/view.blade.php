<!DOCTYPE html>
<html >
    <head>
        <?php
            use App\Model\site;
            $site = site::find(1);
            echo'<link rel="shortcut icon" type="image/x-icon" href="'.asset('/storage/image/site/'.$site->image).'">';
        ?>
        @include('inc.student.index')
    </head>
    <body id="reload">
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="main" style="margin-top: 15px; margin-bottom: 15px; margin-left: 15px; margin-right: 15px;">
            <div class="dashboard-influence" id="load">
                <div class="quote"style="margin-top: 15px; margin-bottom: 15px; margin-left: 15px; margin-right: 15px;">
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
                                                        <a href="{{route('result.index')}}" class="btn-danger" style="padding: 10px;"> < Back</a>
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
                                                        <div class="col-md-12">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                Educational Branch:
                                                                            </div> 
                                                                            <div class="col-md-6">
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
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                Admission No:
                                                                            </div>
                                                                            <div class="col-md-6">
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
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                Session:
                                                                            </div> 
                                                                            <div class="col-md-6">
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
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                Sex: 
                                                                            </div>
                                                                            <div class="col-md-6">
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
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                Student's Name:
                                                                            </div> 
                                                                            <div class="col-md-6">
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
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                Term:
                                                                            </div> 
                                                                            <div class="col-md-6">
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
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                Class:
                                                                            </div> 
                                                                            <div class="col-md-6">
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
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                Number in Class:
                                                                            </div> 
                                                                            <div class="col-md-6">
                                                                                <i>{{count($rescount)}}</i>
                                                                            </div>
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
                                                                            <td><p>{{$r_table->school_open}}</p></td>
                                                                            <td><p>{{$r_table->sport_open}}</p></td>
                                                                            <td><p>{{$r_table->other_open}}</p></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>No of times present</td>
                                                                            <td><p>{{$r_table->school_present}}</p></td>
                                                                            <td><p>{{$r_table->sport_present}}</p></td>
                                                                            <td><p>{{$r_table->other_present}}</p></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>No of times punctual</td>
                                                                            <td><p>{{$r_table->school_punctual}}</p></td>
                                                                            <td><p>{{$r_table->sport_punctual}}</p></td>
                                                                            <td><p>{{$r_table->other_punctual}}</p></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>No of times absent</td>
                                                                            <td><p>{{$r_table->school_absent}}</p></td>
                                                                            <td><p>{{$r_table->sport_absent}}</p></td>
                                                                            <td><p>{{$r_table->other_absent}}</p></td>
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
                                                                                <td><input type="checkbox" checked name="loyalty" value="checked" disabled> Loyalty </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="loyalty" value="checked" disabled> Loyalty </td>
                                                                            @endif
                                                                            @if(!empty($r_table->honesty))
                                                                                <td><input type="checkbox" checked name="honesty" value="checked" disabled> Honesty </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="honesty" value="checked" disabled> Honesty </td>
                                                                            @endif
                                                                            @if(!empty($r_table->cleaniness))
                                                                                <td><input type="checkbox" checked name="cleanliness" value="checked" disabled> Cleanliness </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="cleanliness" value="checked" disabled> Cleanliness </td>
                                                                            @endif
                                                                            @if(!empty($r_table->punctuality))
                                                                                <td><input type="checkbox" checked name="punctuality" value="checked" disabled> Punctuality </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="punctuality" value="checked" disabled> Punctuality </td>
                                                                            @endif
                                                                            @if(!empty($r_table->regularity))
                                                                                <td><input type="checkbox" checked name="regularity" value="checked" disabled> Regularity </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="regularity" value="checked" disabled> Regularity </td>
                                                                            @endif
                                                                        </tr>
                                                                    </tbody>
                                                                </table><br>
                                                                <div>Comment: <p>{{$r_table->conduct_comment}}</p></div>
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
                                                                            <td>{{$r_table->b_height}} M</td>
                                                                            <td>{{$r_table->e_height}} M</td>
                                                                            <td>{{$r_table->b_weight}} KG</td>
                                                                            <td>{{$r_table->e_weight}} KG</td>
                                                                            <td>{{$r_table->illness_no}}</td>
                                                                            <td>{{$r_table->illness_nature}}</td>
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
                                                                                                        <td colspan="7"></td>
                                                                                                    </tr>
                                                                                                @break ($subject->id != $r_sub->subjectid)
                                                                                            @elseif($sub->contains($subject->id) && $subject->id == $r_sub->subjectid)
                                                                                                <tr>
                                                                                                    <td>{{$subject->name}}</td>
                                                                                                    <td colspan="">{{$r_sub->s_attendance}}</td>
                                                                                                    <td colspan="">{{$r_sub->s_test}}</td>
                                                                                                    <td colspan="">{{$r_sub->s_exam}}</td>
                                                                                                    <td colspan="">{{$r_sub->s_total}}</td>
                                                                                                    <td colspan="">{{$r_sub->s_forward}}</td>
                                                                                                    <td colspan="">{{$r_sub->s_average}}</td>
                                                                                                    <td colspan="">{{$r_sub->s_grade}}</td>
                                                                                                </tr>
                                                                                            @else

                                                                                            @endif                                           
                                                                                        @endif
                                                                                    @empty
                                                                                        <tr>
                                                                                            <td>{{$subject->name}}</td>
                                                                                            <td colspan="7">No result has been recorded for this subject</td>
                                                                                        </tr>
                                                                                    @endforelse
                                                                                @else
                                                                                    <tr>
                                                                                        <td colspan="8">No result has been recorded for any subject</td>
                                                                                    </tr>
                                                                                @endif
                                                                            @empty
                                                                                <tr>
                                                                                    <td colspan="8">No subject has been added for this students class</td>
                                                                                </tr>
                                                                            @endforelse
                                                                    </tbody>
                                                                </table><br>
                                                            </div>
                                                            <hr class="mb-4">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <span>Term's Gross Score: <p>{{$r_table->t_gross_score}}</p></span>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <span>Term's Average: <p>{{$r_table->t_average}}</p></span>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <span>Cummulative Score: <p>{{$r_table->c_score}}</p></span>
                                                                    </div>
                                                                    <div class="col-md-4"><br>
                                                                        <span>Cummulative Average: <p>{{$r_table->c_average}}</p></span>
                                                                    </div>
                                                                    <div class="col-md-4"><br>
                                                                        <span>Position: <p>{{$r_table->position}}</p></span>
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
                                                                                <td><input type="checkbox" checked name="ig" value="checked" disabled> Indoor Games </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="ig" value="checked" disabled> Indoor Games </td>
                                                                            @endif
                                                                            @if(!empty($r_table->ball_game))
                                                                                <td><input type="checkbox" checked name="bg" value="checked" disabled> Ball Games </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="bg" value="checked" disabled> Ball Games </td>
                                                                            @endif
                                                                            @if(!empty($r_table->combative_game))
                                                                                <td><input type="checkbox" checked name="cg" value="checked" disabled> Combative Games </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="cg" value="checked" disabled> Combative Games </td>
                                                                            @endif
                                                                            @if(!empty($r_table->track))
                                                                                <td><input type="checkbox" checked name="track" value="checked" disabled> Track </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="track" value="checked" disabled> Track </td>
                                                                            @endif
                                                                            @if(!empty($r_table->jumps))
                                                                                <td><input type="checkbox" checked name="jumps" value="checked" disabled> Jumps </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="jumps" value="checked" disabled> Jumps </td>
                                                                            @endif
                                                                            @if(!empty($r_table->throw))
                                                                                <td><input type="checkbox" checked name="throw" value="checked" disabled> Throw </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="throw" value="checked" disabled> Throw </td>
                                                                            @endif
                                                                            @if(!empty($r_table->swimming))
                                                                                <td><input type="checkbox" checked name="swimming" value="checked" disabled> Swimming </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="swimming" value="checked" disabled> Swimming </td>
                                                                            @endif
                                                                            @if(!empty($r_table->weight_lifting))
                                                                                <td><input type="checkbox" checked name="Weight" value="checked" disabled> Weight Lifting </td>
                                                                            @else
                                                                                <td><input type="checkbox" name="Weight" value="checked" disabled> Weight Lifting </td>
                                                                            @endif
                                                                        </tr>
                                                                    </tbody>
                                                                </table><br>
                                                                <div>Comments: <p>{{$r_table->sport_comment}}</p></div>
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
                                                                            <td><p>{{$r_table->organisation}}</p></td>
                                                                            <td><p>{{$r_table->office}}</p></td>
                                                                            <td><p>{{$r_table->contribution}}</p></td>
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
                                                                <div>Class Teacher's Comment: <p>{{$r_table->teacher_comment}}</p></div><br>
                                                                <div>Principal's Comment: <p>{{$r_table->principal_comment}}</p></div><br>
                                                                <span>School Stamp & Signature </span>
                                                                @if(!empty($r_table->shool_signature) &&  file_exists(storage_path().'/app/public/image/result/'.$r_table->shool_signature))
                                                                    <img style="display: inline; width: 390px; height: 200px;" src="{{asset('/storage/image/result/'.$r_table->shool_signature)}}" alt="Your Media">
                                                                @else

                                                                @endif
                                                            </div>
                                                            <hr class="mb-4">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                <div class="col-md-12">
                                                    <p style="text-align: center;"> This result has not been added yet!</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('inc.student.exit')
    </body>
</html>