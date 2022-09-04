@extends('admin.layouts.app')

@section('content')

<div class="container">

    <div class="row pt-4">
        <h2 class="text-center">Products Manage</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div id="flash "></div>

        <div class="col-lg">
            <a href="{{ route('category') }}" class="btn btn-light">Categories</a>
            <div class="float-end">
                <a href="{{ route('product.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    Product
                </a>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg">
            <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th width="20%">Price</th>
                    <th>Category</th>
                    <th width="20%">Options</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>
                                <a href="{{ url("/admin/product/$product->slug/edit") }}">
                                    <i class="fa-solid fa-pencil"></i>
                                    Edit
                                </a>
                                <form id="form-delete" action="{{ url("/admin/product/$product->id/delete") }}" method="POST" class="d-inline">
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


