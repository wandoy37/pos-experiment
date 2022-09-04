@foreach ($categories as $category)
<div class="modal fade" id="editCategory-{{ $category->id }}" tabindex="-1" aria-labelledby="createCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCategoryLabel">
                    <i class="fa-solid fa-pencil"></i>
                    Category
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url("/category/$category->id/update") }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Category name.." value="{{ $category->title }}">
                    </div>
                    <div class="mb-3 float-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
