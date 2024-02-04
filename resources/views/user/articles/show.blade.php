@extends('layouts.userLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <x-post-show-card :article="$article" />
            </div>
        </div>
    </div>
</div>
@endsection
