<tr>
    <td></td>
    <td>
        @if($hostel_list->hostelid == $hostel->id)
            @if($hostel_list->user_category == 'Staff')
                @if(count($staffs) > 0)
                    @foreach($staffs as $staff)
                        @if($staff->id == $hostel_list->userid)
                            <a href="{{route('staffs.show', $staff->id)}}">{{$staff->firstname}} {{$staff->othernames}}</a>
                        @endif
                    @endforeach
                @else
                    <a href="#" style="color: red;">None</a>
                @endif
            @elseif($hostel_list->user_category == 'Student')
                @if(count($students) > 0)
                    @foreach($students as $student)
                        @if($student->id == $hostel_list->userid)
                            <a href="{{route('students.show', $student->id)}}">{{$student->firstname}} {{$student->othernames}}</a>
                        @endif
                    @endforeach
                @else
                    <a href="#" style="color: red;">None</a>
                @endif
            @endif
        @endif
    </td>
    <td>{{$hostel_list->user_category}}</td>
    <td>{{$hostel_list->room}}</td>
    <td>
        @if(count($classes) > 0)
            @foreach($classes as $class)
                @if($class->id == $hostel_list->classid)
                    <a href="{{route('classes.show', $class->id)}}">{{$class->name}}</a>
                @endif
            @endforeach
        @else
            <a href="#" style="color: red;">None</a>
        @endif
    </td>
    <td>{{$hostel->status}}</td>
    <td>
        <div class="dropdown" style="text-align: center;">
            <a href="#" class="dropdown-toggle" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-{{$hostel->id}}" aria-controls="submenu-{{$hostel->id}}">
                <i class="fas fa-ellipsis-h"></i>
            </a>
        </div>
        <div class="collapse submenu" id="submenu-{{$hostel->id}}" style="position: absolute; background-color: white; border: 1px solid; border-color: #b8bce0; z-index: 1000;">
            <!-- item-->
            <a href="{{route('staff_hostel.show', $hostel->id)}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-eye"></i> View</a>
            <!-- item-->
            <a href="{{route('staff_hostel.edit', $hostel->id)}}" class="dropdown-item" style="color: #71748d;"><i class="fas fa-edit"></i>Edit</a>
            <!-- item-->
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$hostel->id}}" style="color: #71748d;"><i class="fas fa-trash-alt"></i>Delete</a>
        </div>
    </td>
</tr>
<div class="modal fade show" id="exampleModal{{$hostel->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this hostel?</p>
            </div>
            <div class="modal-footer">
                <form id="delete-form-{{ $hostel->id }}" method="post" action="{{ route('staff_hostel.destroy',$hostel->id) }}" style="display: none">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                <a href="#" onclick="document.getElementById('delete-form-{{ $hostel->id }}').submit();" class="btn btn-primary">Confirm</a>
            </div>
        </div>
    </div>
</div>