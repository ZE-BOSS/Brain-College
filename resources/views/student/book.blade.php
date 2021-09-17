
    @extends('layouts.student')

        @section('content')
            <!-- MAIN CONTENT-->
            <style type="text/css">.backc{background-color: #333;color: white;}</style>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40 backc">
                                    <div id="toolbar" class="">
                                        <select class="form-control backc">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <table class="table table-borderless table-data3" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="book" class="border-0">Book</th>
                                                <th data-field="subject" class="border-0">Subject</th>
                                                <th data-field="edition" class="border-0">Teacher</th>
                                                <th data-field="class" class="border-0">Class</th>
                                                <th data-field="price" class="border-0">Price</th>
                                                <th data-field="action" class="border-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($books) > 0)
                                            @foreach($books as $book)
                                                <tr>
                                                    <td></td>
                                                    <td>{{$book->name}}</td>
                                                    <td>
                                                        @if(count($subjects) > 0)
                                                            @foreach($subjects as $subject)
                                                                @if($subject->id == $book->subject)
                                                                    {{$subject->name}}
                                                                @endif    
                                                            @endforeach
                                                        @else
                                                            None
                                                        @endif
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
                                                    <td class="process">
                                                        @if(count($class) > 0)
                                                            @foreach($class as $cls)
                                                                @if($cls->id == $book->classid)
                                                                    {{$cls->name}}
                                                                @endif    
                                                            @endforeach
                                                        @else
                                                            None
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$book->price}}
                                                    </td>
                                                    <td style="text-align: center; justify-content: center;">
                                                        <a href="#">
                                                            <div class="table-data-feature">
                                                                <span style="font-size: 17px; font-weight: 30px;">Make Request</span>
                                                            </div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        
