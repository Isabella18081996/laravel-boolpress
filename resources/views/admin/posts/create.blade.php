@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuovo post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        
    @endif
    <div>
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label class="label-control" for="title">Titolo</label>
                <input type="text" id="title" name="title"  class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                @error('title')
                    <div class="text-danger">{{$message}}<div>                   
                @enderror
            </div>

            <div class="mb-3">
                <label class="label-control" for="content">Content</label>
                <textarea type="text" id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5" >{{old('content')}}</textarea>
                @error('content')
                    <div class="text-danger">{{$message}}<div>                   
                @enderror
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Invio</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
            </div>

        </form>
    </div>


</div>
@endsection