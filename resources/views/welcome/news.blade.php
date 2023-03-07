@extends('layouts.welcomelayout')
@section('content')
        <!-- Content -->
        <div class="page-content bg-white">
            <!-- inner page banner -->
            <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
                <div class="container">
                    <div class="page-banner-entry">
                        <h1 class="text-white">News Page</h1>
                     </div>
                </div>
            </div>
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
            @foreach ($posts as $post)
            <section class="py-4 py-xl-5">
                <div class="container">
                    <div class="bg-dark border rounded border-0 border-dark overflow-hidden">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <div class="text-white p-4 p-md-5">
                                    <h2 class="fw-bold text-white mb-3">{{ $post->Title }}</h2>
                                    <ul class="media-post">
                                        <li> <i class="fa fa-clock-o"> </i>{{ $post->created_at }}</li>
                                    </ul>
                                    <p class="mb-4">{{ $post->description }}</p>
                                </div>
                            </div>
                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;"><img class="w-100 h-100 fit-cover" src="/images/{{ $post->image }}"></div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
        </div>
@endsection
