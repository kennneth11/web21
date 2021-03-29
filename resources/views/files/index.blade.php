@extends('files.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 Uploading Example</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('file-upload') }}"> Add File</a>
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
            <th>File Name</th>
            <th>File Type</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th width="350px">Action</th>
        </tr>
        @foreach ($files as $file)
        <tr>
            <td>{{ $file->id }}</td>
            <td>{{ $file->FileName }}</td>
            <td>{{ $file->FileType }}</td>
            <td>{{ $file->created_at }}</td>
            <td>{{ $file->updated_at }}</td>
            <td>
                <form action="{{ route('files.destroy',$file->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('files.edit',$file->id) }}">Edit File</a>
    
                    <a class="btn btn-primary" href="{{ route('files.show',$file->id) }}">View File</a>

   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete File</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $files->links() !!}
      
@endsection