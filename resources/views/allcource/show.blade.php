@extends('layouts.Courcelayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $Cource->cource_name }}</div>
                            @if(!Auth::user()->enrollments()->where('Cource_id', ($Cource->id))->exists())
                                <form action="{{ route('cources.enroll', $Cource->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Enroll</button>
                                </form>
                            @endif


                    <div class="card-body">
                        <p>{{ $Cource->cource_detail }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  


