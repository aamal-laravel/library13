@extends('layouts.master')
@section('page' , __('library.add-category'))
@section('content')
<h1>@lang('library.add-category')</h1>
    <form action="/categories" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">@lang('library.name')</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <button class="btn btn-secondary">@lang('library.add-category')</button>
        <a href="/categories" class="btn btn-outline-secondary">@lang('library.back')</a>
    </form>
@endsection     