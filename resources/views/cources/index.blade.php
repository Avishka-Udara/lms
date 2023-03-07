@extends('cources.layout')



@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 9 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cources.create') }}"> Create New cource</a>
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
            <th>cource_name</th>
            <th>cource_detail</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($cources as $cource)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $cource->cource_name }}</td>
                <td>{{ $cource->cource_detail }}</td>
                <td>
                    <form action="{{ route('cources.destroy', $cource->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('cources.show', $cource->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('cources.edit', $cource->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>

            </tr>
        @endforeach

    </table>



    {!! $cources->links() !!}
@endsection
