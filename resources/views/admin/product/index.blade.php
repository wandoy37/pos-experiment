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
        <div class="col-lg">
            {{-- <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#createCategory">
                <i class="fa-solid fa-plus"></i>
                Category
              </button> --}}
            <a href="{{ route('category') }}" class="btn btn-light">Categories</a>
            <div class="float-end">
                <a href="http://" class="btn btn-primary">
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
                  <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>
                        <button class="btn btn-link">
                            <i class="fa-solid fa-pencil"></i>
                            Edit
                        </button>
                        <button class="btn btn-link">
                            <i class="fa-solid fa-trash"></i>
                            Delete
                        </button>
                    </td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection


