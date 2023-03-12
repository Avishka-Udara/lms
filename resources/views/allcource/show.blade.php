@extends('layouts.courcelayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img class="card-img-top" src="/images/{{ $Cource->image }}" alt="Card image cap">
                    <div class="card-header">{{ $Cource->cource_name }}</div>
                        @if (auth()->check())
                            @if(!Auth::user()->enrollments()->where('Cource_id', ($Cource->id))->exists())
                                <form action="{{ route('cources.enroll', $Cource->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Enroll</button>
                                </form>
                            @endif
                        @else
                            <p>Please <a href="{{ route('login') }}">log in</a> To Enroll</p>
                        @endif
                    <div class="card-body">
                        <p>{{ $Cource->cource_detail }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  


