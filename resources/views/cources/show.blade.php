@extends('layouts.courcelayout')

@section('content')
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="cources">Cources</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $cource->cource_name }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $cource->cource_name }}</div>
                        @if(Auth::user()->usertype == 0)
                            
                            @if(!Auth::user()->enrollments()->where('cource_id', ($cource->id))->exists())
                                <form action="{{ route('cources.enroll', $cource->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Enroll</button>
                                </form>
                            @endif
                        @endif


                    <div class="card-body">
                        <p>{{ $cource->year }} > {{ $cource->semester }}</p>
                        <p>{{ $cource->cource_detail }}</p>

                        <h4>{{ __('cource Materials') }}</h4>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image:</strong>
                                <img src="/images/{{ $cource->image }}" width="500px">
                            </div>
                        </div>

                        <ul>
                                @foreach($cource->materials as $material)
                                    <li><a href="{{ route('cources.materials.show',[$cource, $material]) }}">{{ $material->title }}</a></li>
                                @endforeach
                        </ul>
                        @if(Auth::user()->usertype == 2)
                        <div class="form-group mb-0">
                            <a href="{{ route('cources.materials.create', $cource->id) }}" class="btn btn-primary">Add Material</a>
                


                            <a href="{{ route('cources.edit', $cource->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            <a href="{{ route('cources.materials.index', $cource->id) }}" class="btn btn-primary">{{ __('View All materials') }}</a>
                            <form class="d-inline" method="POST" action="{{ route('cources.destroy', $cource->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>{{ __('Delete') }}</button>
                            </form>
                        </div> 
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  


