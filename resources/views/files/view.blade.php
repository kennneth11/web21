@extends('files.layout')
@section('content')
    <h2>{{$file->FileName}}</h2>
    <h2>{{ asset('storage/'.$file->path) }}</h2>

    <div class="col-md-6-offset-4">
                        {{-- <embed src="{{ asset('storage/'.$file->path) }}" type="$file->FileType" width="100%" height="600px" />--}}
                         <a href="{{ asset('storage/'.$file->path) }}"><button type="submit"> Open File </button></a>
                        {{--  <iframe src="{{ asset('storage/'.$file->path) }}" frameborder="5" style="width: 100%"></iframe> --}} 
    </div>   
@endsection