@extends('layouts.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>View File</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('files.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>File Name:</strong></br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            {{ $file->FileName }}
        </div>
    </div>

    <div class="col-md-6-offset-4">
                        {{-- <embed src="{{ asset('storage/'.$file->path) }}" type="$file->FileType" width="100%" height="600px" />--}}
                         <a href="{{ asset('storage/'.$file->path) }}"><button type="submit"> Open File </button></a>
                        {{--  <iframe src="{{ asset('storage/'.$file->path) }}" frameborder="5" style="width: 100%"></iframe> --}} 
    </div>   
@endsection