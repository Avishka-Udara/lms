@extends('layouts.courcelayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cources') }}</div>
                    <div class="card-header"><a href="allcources">{{ __('All Cources') }}</a></div>
                    

                    <div class="card-body">
                        @if(Auth::user()->usertype == 2)
                        <a href="{{ route('cources.create') }}" class="btn btn-primary mb-3">{{ __('Create New Cource') }}</a>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    @if(Auth::user()->usertype == 2)
                                    <th>{{ __('Actions') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cources as $cource)
                                    <tr>
                                        <td>{{ $cource->id }}</td>
                                        <td>{{ $cource->cource_name }}</td>
                                        <td>{{ $cource->cource_detail }}</td>
                                        @if(Auth::user()->usertype == 2)
                                        <td>
                                            <a href="{{ route('cources.show', $cource) }}" class="btn btn-primary btn-sm">{{ __('View') }}</a>
                                            <a href="{{ route('cources.edit', $cource) }}" class="btn btn-secondary btn-sm">{{ __('Edit') }}</a>
                                            <form action="{{ route('cources.destroy', $cource) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                        @elseif(Auth::user()->usertype == 0)
                                        <td>
                                        <a href="{{ route('cources.show', $cource) }}" class="btn btn-primary btn-sm">{{ __('View') }}</a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $cources->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
