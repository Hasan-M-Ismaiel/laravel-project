@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    @if($article->getFirstMediaUrl("articles"))
                                        <div class="media media-2x1 gd-primary"><a class="media-content" style='background-image:url("{{ $article->getFirstMediaUrl("articles") }}")' data-abc="true"><strong class="text-fade bg-white rounded rounded-border px-4 py-2">{{ $article->title }}</strong></a></div>
                                    @else
                                        <div class="media media-2x1 gd-primary"><a class="media-content" style="background-image:url('/images/article.jpg')" data-abc="true"><strong class="text-fade bg-white rounded rounded-border px-4 py-2">{{ $article->title }}</strong></a></div>
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title col">{{ $article->title }}</h5>
                                        <span class="border-start  border-3  border-primary ps-2 "> {{ $article->category->name }}</span>
                                        <br>
                                        <br>
                                        <span class="text-muted h6 col">Published <time>{{ $article->created_at->diffForHumans() }}</time></span>
                                        <p class="card-text">{{ $article->body }}</p>
                                    </div>
                                    <div class="m-4">
                                        <a class="btn btn-primary" href="{{ route('admin.articles.edit', $article->id) }}" role="button">Edit</a>
                                        <a class="btn btn-danger m-1" type="button"
                                                onclick="if (confirm('Are you sure?') == true) {
                                                            document.getElementById('delete-item').submit();
                                                            event.preventDefault();
                                                        } else {
                                                            return;
                                                        }
                                                            ">
                                                {{ __('Delete') }}
                                        </a>
                                        <!-- for the delete  -->
                                        <form id="delete-item" action="{{ route('admin.articles.destroy', $article->id) }}" class="d-none" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
