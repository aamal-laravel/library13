@extends('layouts.master')
@section('page' , __('library.edit-category'))
@section('content')
<h1>@lang('library.edit-category')</h1>
    <form action="/categories/update/{{$category->id}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">@lang('library.name')</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
        </div>
        <button class="btn btn-secondary">@lang('library.edit-category')</button>
        <a href="{{route('categories.index')}}" class="btn btn-outline-secondary">@lang('library.back')</a>
    </form>
@endsection     