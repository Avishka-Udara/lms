@extends('layouts.welcomehead')
@section('content')
<br>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Cources</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('All Cources') }}</div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-2 g-2">
                        @foreach ($Cources as $Cource)
                        <section class="py-4 py-xl-5">
                            <div class="bg-dark border rounded border-0 border-dark overflow-hidden">
                                <div class="text-white p-4 p-md-5">
                                    <h2 class="fw-bold text-white mb-3">{{ $Cource->cource_name }}</h2>
                                    <h2><a href="{{ route('allcources.cource.show',[$Cource]) }}">show cource</a></h2>
                                    <ul class="media-post">
                                        <li> <i class="fa fa-clock-o"> </i>{{ $Cource->created_at }}</li>
                                    </ul>
                                    <p class="mb-4">{{ $Cource->cource_detail }}</p>
                                </div>
                            </div>
                        </section>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
