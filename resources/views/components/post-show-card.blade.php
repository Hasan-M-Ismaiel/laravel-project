@props(['article'])

<div {{ $attributes->merge(['class' => '']) }}>
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
                     <span class="text-muted h6 col">Published <time>{{ $article->created_at->diffForHumans() }}</time></span>
                     <p class="card-text">{{ $article->body }}</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

         