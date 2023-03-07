@extends('cources.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show cource</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cources.index') }}"> Back</a>
            </div>
            <form action="{{ route('cources.destroy', $cource->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('cources.show', $cource->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('cources.edit', $cource->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>



    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>cource_name:</strong>
                {{ $cource->cource_name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>cource_detail:</strong>
                {{ $cource->cource_detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>enrollment_key:</strong>
                {{ $cource->enrollment_key }}
            </div>
        </div>
    </div>
@endsection
