@props(['categories'])

<table class="table table-striped mt-2">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td><a href="{{ route('admin.categories.show', $category->id) }}" >{{ $category->name }} </a></td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
                <td>
                    <div style="display: flex;">
                        <a type="button" class="btn btn-primary m-1" href="{{ route('admin.categories.show', $category->id) }}" role="button">Show</a>
                        <a type="button" class="btn btn-secondary m-1" href="{{ route('admin.categories.edit', $category->id) }}" role="button">Edit</a>
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
                        <form id="delete-item" action="{{ route('admin.categories.destroy', $category->id) }}" class="d-none" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>