@extends('admin.pages.add_new_project.main')

@section('title', 'Project Edit')

@section('edit_button')
	<div class="form-group btn-edit-pro-group">
		<div class="col-sm-12 add_update_btn">
			<button type="button" id="ready_for_update_btn" class="btn btn-default bold uppercase btn-stroke btn-edit-pro">Edit Project</button>
		&nbsp;
			<a href="{{url('/add_project_coding_new/'.$proposal_no)}}" class="btn btn-default bold uppercase btn-stroke btn-edit-pro send-edit">Send Project To Coding</a>
		</div>
	</div>
@stop

@section('save_button')

@stop