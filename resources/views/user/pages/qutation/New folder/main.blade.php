@extends('user.master')

@section('title', 'Add a New Project')

@section('content')

    <section class="main-content">

        @include('user.pages.add_new_project.form')
        @include('user.pages.add_new_project.documents')
        @include('user.pages.add_new_project.upload_documents')

    </section>

@endsection