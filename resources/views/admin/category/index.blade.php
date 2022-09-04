@extends('admin.layouts.app')

@section('content')

<div class="container">

    <div class="row pt-4">
        <h2 class="text-center">Category Manage</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div class="col-lg">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategory">
                <i class="fa-solid fa-plus"></i>
                Category
            </button>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg">
            <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th>Category</th>
                    <th width="20%">Options</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>
                            <button class="btn btn-link text-dark" data-bs-toggle="modal" data-bs-target="#editCategory-{{ $category->id }}">
                                <i class="fa-solid fa-pencil"></i>
                                Edit
                            </button>
                            <form id="form-delete" action="{{ url("/admin/category/$category->id/delete") }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link text-danger" id="btn-delete">
                                    <i class="fa-solid fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection

@include('admin.category.create')
@include('admin.category.edit')

@push('scripts')

<script>
    $(document).on('click', '#btn-delete', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "Data will be deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#form-delete').submit();
            }
        });
    });
</script>

@endpush
