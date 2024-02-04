@props(['articles'])

<table class="table table-striped mt-2">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td><a href="{{ route('admin.articles.show', $article->id) }}" >{{ $article->title }} </a></td>
                <td>{{ substr($article->body, 0, 50)  }}...</td>
                <td>{{ $article->category->name }}</td>
                <td>
                    @foreach ($article->tags as $tag)
                        <span class="btn btn-warning m-1">{{ $tag->name }}</span>
                    @endforeach
                </td>
                <td>{{ $article->created_at->diffForHumans() }}</td>
                <td>
                    <div style="display: flex;">
                        <a type="button" class="btn btn-primary m-1" href="{{ route('admin.articles.show', $article->id) }}" role="button">Show</a>
                        <a type="button" class="btn btn-secondary m-1" href="{{ route('admin.articles.edit', $article->id) }}" role="button">Edit</a>
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
                </td>

            </tr>
        @endforeach
    </tbody>
</table>