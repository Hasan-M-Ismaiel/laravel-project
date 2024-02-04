@extends('layouts.adminLayout')

@section('content')
 
<div class="container">
    <div class="row justify-content-center">
        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 mt-4">
                <span class="pt-2 pb-2 pr-3 font-medium text-danger border border-danger border-rounded rounded">
                    <span class="bg-danger py-2 px-2  text-white">Whoops!</span>{{ __(' Something went wrong.') }}
                </span>

                <ul class="mt-3 list-group list-group-flush text-danger">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card ">
            <div class="card-body">
                <h2 class="card-title mb-4">{{ $page }}</h2>
                <form action='{{ route("admin.tags.update", $tag) }}' method="POST">
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="add the name of the tag" value="{{ $tag->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">update</button>
                </form>
            </div>
        </div> 
    </div>
</div>
@endsection
