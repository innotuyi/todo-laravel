@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Articles</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('articles.create') }}"> Create New Article</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Body</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->body }}</td>
                <td>
                    <form action="{{ route('articles.destroy',$article->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('articles.show',$article->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
