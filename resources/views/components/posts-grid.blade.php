@props(['articles'])

<div class="container">
    <div class="row">
        @foreach ($articles as $article)
            <x-post-card
                :article="$article"
                class="col-sm"
            />
            @if ($loop->index % 3 == 0)
            
                </div><div class="row">
            @endif
        @endforeach
    </div>
</div>
