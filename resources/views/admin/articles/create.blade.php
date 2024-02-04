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
                <form action='{{ route("admin.articles.store") }}' method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="add the title of the article" value="{{ old('title') }}">
                    </div>
                    <div class="form-group mt-4">
                        <label for="body">Body</label>
                        <input type="text" name="body" class="form-control" id="body" placeholder="Article content"  value="{{ old('body') }}">
                    </div>
                    <div class="form-group mt-4">
                        <label class="form-label" for="image">upload image</label>
                        <input type="file" name="image" class="form-control" id="image" />
                    </div>
                    <div class="form-group mt-4">
                        <label for="tags">Tags</label>
                        <input type="text" name="tags" class="form-control" id="tags" placeholder="add Tags here splet it with 'space'" value="{{ old('tags') }}">
                    </div>
                    <div class="form-group mt-4">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="" selected>Choose...</option>
                            @foreach ( $categories as $category )
                                <option value="{{$category->id}}" >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">create</button>
                </form>
            </div>
        </div> 
    </div>
</div>
@endsection
