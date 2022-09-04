@extends('admin.layouts.app')

@section('content')

<div class="container">

    <div class="row pt-4">
        <h2 class="text-center">Edit Products</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    {{-- Form create --}}
    <div class="row my-4">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <form action="{{ url("/admin/product/$product->id/update") }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Product name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-select" name="category" @error('category') is-invalid @enderror>
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $category)
                                            @if (old('category', $product->category_id) == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Thumbnail</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            Choose
                                          </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="thumbnail" readonly value="{{ old('thumbnail', $product->thumbnail) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Stock</label>
                                    <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $product->stock) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Discount</label>
                                    <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount', $product->discount) }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3 float-end">
                                    <a href="{{ route('product') }}" class="btn btn-light me-4">
                                        <i class="fa-solid fa-left-long"></i>
                                        Back
                                    </a>
                                    <button class="btn btn-primary">
                                        <i class="fa-solid fa-plus"></i>
                                        Create
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    {{-- /Form create --}}

</div>

@endsection

@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
    $('#lfm').filemanager('file');
</script>

@endpush


