@extends('layouts.Courcelayout')
@section('content')
        <!-- Content -->
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <div class="container">
                    <ul class="list-inline">
                        <li><a href="/">Home</a></li>
                        <li>News</li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumb row END -->
            @foreach ($Cources as $Cource)
            <section class="py-4 py-xl-5">
                <div class="container">
                    <div class="bg-dark border rounded border-0 border-dark overflow-hidden">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <div class="text-white p-4 p-md-5">
                                    <h2 class="fw-bold text-white mb-3">{{ $Cource->cource_name }}</h2>
                                    <h2><a href="{{ route('allcources.cource.show',[$Cource]) }}">show cource</a></h2>
                                    <ul class="media-post">
                                        <li> <i class="fa fa-clock-o"> </i>{{ $Cource->created_at }}</li>
                                    </ul>
                                    <p class="mb-4">{{ $Cource->cource_detail }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
@endsection
