@extends('components.admin.layouts.crud')

@section('title', 'Create Product')

@section('content')
    <div class="col-10 mx-auto mt-5">
        <div class="card mb-6">
            <div class="card-header d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary waves-effect waves-light"
                    style="border-radius: 50%; padding: 12px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgb(255, 255, 255); transform: ; msFilter:;">
                        <path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
                    </svg>
                </a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.dashboard.edit.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="category">Kategori Produk</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="ri-building-4-line ri-20px"></i></span>
                                <select id="category" name="category" class="form-control"
                                    aria-describedby="basic-icon-default-company2">
                                    <option value="food" {{ $product->category == 'food' ? 'selected' : '' }}>Makanan</option>
                                    <option value="drink" {{ $product->category == 'drink' ? 'selected' : '' }}>Minuman</option>
                                </select>
                            </div>
                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Produk</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ri-user-line ri-20px"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="Seblak" aria-describedby="basic-icon-default-fullname2"
                                    fdprocessedid="3tq798" name="name" value="{{ $product->name}}" required>
                            </div>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Harga Produk</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="ri-building-4-line ri-20px"></i></span>
                                <input type="number" id="basic-icon-default-company" class="form-control"
                                    placeholder="130000" aria-describedby="basic-icon-default-company2"
                                    fdprocessedid="7el9oe" name="price" value="{{ $product->price}}">
                            </div>
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="file-upload">Gambar Produk</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-file2" class="input-group-text"><i
                                        class="ri-upload-line ri-20px"></i></span>
                                <input type="file" id="file-upload" name="cover" class="form-control"
                                    aria-describedby="basic-icon-default-file2">
                            </div>
                            @error('cover')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary waves-effect waves-light"
                                fdprocessedid="1frc0q">Edit Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
