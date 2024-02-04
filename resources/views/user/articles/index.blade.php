@extends('layouts.userLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if ($articles->count())
                    <x-posts-grid :articles="$articles" />
                @else
                    <p class="text-center">No articles yet. Please check back later.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
