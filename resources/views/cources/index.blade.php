@extends('layouts.courcelayout')

@section('content')
<br>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cources</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header">{{ __('Your Cources') }}</div>
                    

                    <div class="card-body">
                        @if(Auth::user()->usertype == 2)
                        <a href="{{ route('cources.create') }}" class="btn btn-primary mb-3">{{ __('Create New Cource') }}</a>
                        @endif
                        <a href="allcources" class="btn btn-secondary  mb-3">{{ __('Vies All Cources') }}</a>
                        
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach ($cources as $cource)
                            <div class="col">
                                <div class="card">
                                    <img src="/images/{{ $cource->image }}" class="card-img-top" alt="...">
                                    <div class="card-header">{{ $cource->cource_name }}</div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $cource->cource_detail }}</p>
                                        <div class="mt-3">
                                            @if(Auth::user()->usertype == 0)
                                                <a href="{{ route('cources.show', $cource) }}" class="btn btn-primary">{{ __('View Cource') }}</a>
                                            @endif
                                            @if(Auth::user()->usertype == 2)
                                                <a href="{{ route('cources.show', $cource) }}" class="btn btn-primary">{{ __('View Cource') }}</a>
                                                <a href="{{ route('cources.edit', $cource) }}" class="btn btn-info">{{ __('Edit') }}</a>
                                                <form action="{{ route('cources.destroy', $cource) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn  btn-outline-danger show-alert-delete-box" data-toggle="tooltip" title='Delete'>{{ __('Delete Cource') }}</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
