	@extends('layouts.student')

		@section('content')	
			<div class="col-lg-12">
	            <div class="card">	
					<div class="datatable-dashv1-list custom-datatable-overright">
                        <style type="text/css">
                            .fixed-table-toolbar .bs-bars, .fixed-table-toolbar .search, .fixed-table-toolbar .columns {
                                position: relative;
                                margin-top: 10px;
                                margin-bottom: 10px;
                                margin-left: 0px;
                                margin-right: 5px;
                                line-height: 34px;
                            }
                        </style>
                        @if(count($result) > 0)
                            <div id="toolbar" class="">
                                <select class="form-control">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>
                            <table class="table" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr class="border-0">
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="class" class="border-0">Class</th>
                                        <th data-field="term" class="border-0">Term</th>
                                        <th data-field="session" class="border-0">Session</th>
                                        <th data-field="action" class="border-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="position: relative;">
                                    @foreach($result as $res)
                                        <tr>
                                            <td></td>
                                            <td>
                                                @if(count($class) > 0)
                                                    @foreach($class as $clas)
                                                        @if($res->classid == $clas->id && $res->studentid == $student->id)
                                                            <a href="{{url('/student_portal/result/view/'.$res->id)}}" target="_blank">{{$clas->name}}</a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if(count($term) > 0)
                                                    @foreach($term as $ter)
                                                        @if($res->term == $ter->id && $res->studentid == $student->id)
                                                            {{$ter->name}}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if(count($session) > 0)
                                                    @foreach($session as $sec)
                                                        @if($res->session == $sec->id && $res->studentid == $student->id)
                                                            {{$sec->name}}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown" style="text-align: center;">
                                                    <a href="#" class="dropdown-toggle card-drop" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-{{$res->id}}" aria-controls="submenu-{{$res->id}}">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </a>
                                                </div>
                                                <div class="collapse submenu" id="submenu-{{$res->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
                                                    <!-- item-->
                                                    <a href="{{url('/student_portal/result/view/'.$res->id)}}" class="dropdown-item" style="color: #71748d;" target="_blank"><i class="fas fa-eye"></i> View</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div style="text-align: center; font-size: 20px;">
                                <i>
                                    <div> No Student Has Been Enrolled Yet!</div>
                                </i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endsection