
    @extends('layouts.student')

        @section('content')
            <!-- MAIN CONTENT-->
            <style type="text/css">.backc{background-color: #333;color: white;}</style>
            <div class="main-content">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText">My Class</strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Teacher</th>
                                        <th>Captain</th>
                                        <th>Books</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($class) > 0)
                                        @foreach($class as $cls)
                                            <tr>
                                                <td>
                                                    {{$cls->name}}
                                                </td>
                                                <td>
                                                    @if(count($staffs) > 0)
                                                        @foreach($staffs as $staff)
                                                            @if(count($class) > 0)
                                                                @foreach($class as $cls)
                                                                    @if($staff->id == $cls->teacher)
                                                                        {{$staff->firstname}} {{$staff->othernames}}
                                                                    @endif 
                                                                @endforeach
                                                            @else
                                                                None
                                                            @endif   
                                                        @endforeach
                                                    @else
                                                        None
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach($students as $student)
                                                        @if($student->id == $cls->captain)
                                                            {{$student->firstname}} {{$student->othernames}}
                                                        @else
                                                            None
                                                        @endif   
                                                    @endforeach
                                                </td>
                                                <td class="process">
                                                    @if(count($books) > 0)
                                                        ({{count($books)}})
                                                    @else
                                                        None
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td style="text-align: center;" colspan="4">No class has been allocated to this student!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        
