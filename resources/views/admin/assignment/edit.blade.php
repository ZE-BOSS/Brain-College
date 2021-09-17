		@extends('layouts.admin')

			@section('content')
				@if(!empty($ad->queststatus))
            		@include('inc.admin.assignment.edit.complete')
            	@else
            		@include('inc.admin.assignment.edit.remaining')
            	@endif
			@endsection