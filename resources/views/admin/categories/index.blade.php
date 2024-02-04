@extends('layouts.adminLayout')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="card">
        <h2 class="card-title mt-4 mb-4">{{ $page }}</h2>
        <x-categories-table :categories="$categories"  />
      </div>
  </div>
</div>
@endsection
