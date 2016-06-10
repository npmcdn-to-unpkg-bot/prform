<section class="section section-complt">
	<div class="container">
	<div class="wagon mb-70">
		<div class="wagon-body">
			<div class="other-note-holder">
				<label>Other Notes:</label>
				<textarea required name="other_notes" class="form-control">@if(Request::old('other_notes')){{Request::old('other_notes')}}@elseif ( $project_details ){{ $project_details->other_notes }}@endif</textarea>
			</div>
		</div>
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-red btn-lg btn-has-icon bold text-uppercase">
			<span class="bicon">
				<i class="fa fa-paper-plane-o"></i>
			</span>
			<span class="btext">SUBMIT COMPLETED FORM</span>
		</button>
	</div>
	</div>
</section>