@extends('layouts.app')
@section('content')
    <div class="w-100 mx-auto">
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data" id="upload-form">
            @csrf
            @include('components.form-upload')
        </form>
    </div>
@endsection
