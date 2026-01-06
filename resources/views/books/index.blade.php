@extends('layouts.master')

@section('page', 'books')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@lang('library.all-books')</h1>
        <a href="{{route('web.books.create')}}" class="btn btn-secondary">@lang('library.add-book') </a>
    </div>
    <table class="table table-bordered table-striped table-hover">
        <tr class="table-secondary">
            <th>ISBN</th>
            <th>title</th>
            <th>price</th>
            <th>mortgage</th>
            <th>category</th>
            <th>cover</th>
            <th>action</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->ISBN }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->mortgage }}</td>
                <td>{{ $book->category->name }}</td>
                <td><a href="{{asset('storage/book-images/' . ($book->cover ?? 'no-image.jpg'))}}"><img src="{{asset('storage/book-images/' . ($book->cover ?? 'no-image.jpg'))}}" alt="{{$book->title}}" width="75"></a> </td>
                <td>
                    <a href="{{route('web.books.edit' , $book->ISBN)}}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{route('web.books.destroy', [$book->ISBN ])}}" method="post" class="d-inline-block"
                        onsubmit="return confirm('هل أنت متأكد')">
                        @csrf
                        <button class="btn btn-sm btn-danger">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
