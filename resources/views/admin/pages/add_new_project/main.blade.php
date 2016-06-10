@extends('admin.master')

@section('title', 'Add a New Project')

@section('content')

    <section class="main-content">

        @include('admin.pages.add_new_project.form')
        @include('admin.pages.add_new_project.documents')
        @include('admin.pages.add_new_project.upload_documents')

    </section>

@endsection