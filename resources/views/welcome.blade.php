@extends('layouts.default')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-sm-6">
        <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-9">
                    <input type="file" name="file" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </div>
        </form>

    </div>
</div>

@stop