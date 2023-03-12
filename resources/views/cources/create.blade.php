@extends('layouts.courcelayout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New cource</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cources.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form action="{{ route('cources.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>cource_name:</strong>
                    <input type="text" name="cource_name" class="form-control" placeholder="cource_name" value="{{ old('cource_name') }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>cource_detail:</strong>
                    <textarea class="form-control" style="height:150px" name="cource_detail" placeholder="cource_detail" value="{{ old('cource_detail') }}"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>enrollment_key:</strong>
                    <input type="text" name="enrollment_key" class="form-control" placeholder="enrollment_key" value="{{ old('enrollment_key') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>
    </form>
@endsection
