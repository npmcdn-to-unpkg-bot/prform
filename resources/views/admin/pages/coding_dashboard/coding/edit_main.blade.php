@extends('admin.pages.coding_dashboard.coding.master')

@section('title', 'Edit Project Coding')

@section('content')

    <section class="main-content">

        @include('admin.pages.coding_dashboard.coding.edit_form')       

    </section>

<script type="text/javascript">  
   $(document).ready(function(){    
     $(document).on('click', '#ready_for_update_btn', function() {
      $('.stk2').removeAttr('disabled');

       $('.add_update_btn').empty();
      $('.add_update_btn').append('<button type="submit" class="btn btn-default bold uppercase btn-stroke btn-edit-pro">Save</button>');
    }); 
  });
</script>

@endsection