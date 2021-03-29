@extends('files.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Porducts</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('files.index') }}"> Back</a>
        </div>
    </div>
</div>
   
<form method="POST" enctype="multipart/form-data" id="create" action="{{ route('store') }}" >

    {{csrf_field()}}
                 
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <input type="file" name="file" placeholder="Choose file" id="file">
                @error('file')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </div>
    </div>     
</form>
@endsection