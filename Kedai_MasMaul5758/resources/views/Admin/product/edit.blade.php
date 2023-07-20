<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<title>Form Edit Product</title>

@extends('template-admin')
@section('content_admin')

    <style>
        form {
            padding: 2rem
        }

        label {
            margin-top: 5px;
            margin-bottom: 5px;
        }
    </style>


    <form method="post" action="{{ url('/product/' . $data['product_id']) }}" class="col-6" enctype="multipart/form-data"
        autocomplete="off">
        <h1 class="mb-5"><b>Edit Product</b></h1>
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger mb-5">
                <strong>Error!</strong> <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row-6 d-flex align-items-start" style="width: 100%; height:auto">
            <div class="col-8 me-5">
                <div class="mb-3">
                    <label for="categories">Categories test</label>
                    <select name="categori_id" class="form-control">
                        <option value="">Choose One</option>
                        @foreach ($data['categories'] as $index => $item)
                            <option value="{{ $item->id }}"
                                {{ $data['product']->categori_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Input Name" name="names" id="name"
                        required autofocus value="{{ $data['product']->names }}">
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Desciption</label>
                    <input type="text" placeholder="Description" class="form-control" name="descs" id="deskripsi"
                        value="{{ $data['product']->descs }}">
                </div>

                <div class=" mb-3">
                    <label for="harga">Price</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">IDR</span>
                        <input type="number" class="form-control" name="prices" placeholder="-" id="harga"
                            value="{{ $data['product']->prices }}">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div>
                    <label class="form-label d-block">Image Product</label>
                    <img src="{{ url('./assets/media/uploads/products/' . $data['product']->pictures) }}"
                        class="img rounded" style="height: 100px; width:100px; border-radius:100%; margin-right:5px"> <br>
                    <input type="file" name="image" />
                </div>
                <div class="mt-3">
                    <button type="reset" class="btn btn-light border border-2">Clear</button>
                    <button type="submit" class="btn btn-success">Save Change</button>
                </div>
            </div>
        </div>

    </form>

@endsection
