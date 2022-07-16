@extends('admin.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col">
                    <div class="card radius-10 mb-0">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-1">Add New Product</h5>
                                </div>
                                <div class="ms-auto">
                                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">Products</a>
                                </div>
                            </div>

                            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Product name">
                                                    <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Category Name</label>
                                                    <select class="form-control" name="cat_id" id="cat_id" onchange="categoryWiseSubcategory(this.value)">
                                                        <option selected disabled>Select a category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('cat_id') ? $errors->first('cat_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Subcategory Name</label>
                                                    <select class="form-control" name="sub_cat_id" id="sub_cat_id">
                                                        <option selected disabled>Select a Subcategory</option>
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('sub_cat_id') ? $errors->first('sub_cat_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Brand Name</label>
                                                    <select class="form-control" name="brand_id" id="brand_id">
                                                        <option selected disabled>Select a brand</option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('brand_id') ? $errors->first('brand_id') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Qty</label>
                                                    <input type="number" name="qty" value="{{ old('qty') }}" class="form-control" placeholder="Product qty">
                                                    <span style="color: red"> {{ $errors->has('qty') ? $errors->first('qty') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Buy Price</label>
                                                    <input type="number" name="buy_price" value="{{ old('buy_price') }}" class="form-control" placeholder="Product buy price">
                                                    <span style="color: red"> {{ $errors->has('buy_price') ? $errors->first('buy_price') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Regular Price</label>
                                                    <input type="number" name="regular_price" value="{{ old('regular_price') }}" class="form-control" placeholder="Product regular price">
                                                    <span style="color: red"> {{ $errors->has('regular_price') ? $errors->first('regular_price') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Discount Price (Optional)</label>
                                                    <input type="number" name="discount_price" value="{{ old('discount_price') }}"
                                                    class="form-control" placeholder="Product discount price">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>SKU</label>
                                                    <input type="text" name="sku" value="{{ old('sku') }}" class="form-control" placeholder="Product sku">
                                                    <span style="color: red"> {{ $errors->has('sku') ? $errors->first('sku') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Stock</label>
                                                    <input type="number" name="stock" value="{{ old('stock') }}" class="form-control" placeholder="Product stock">
                                                    <span style="color: red"> {{ $errors->has('stock') ? $errors->first('stock') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Vat/Tax</label>
                                                    <input type="number" name="vat_tax" value="{{ old('vat_tax') }}" class="form-control" placeholder="Product vat tax">
                                                    <span style="color: red"> {{ $errors->has('vat_tax') ? $errors->first('vat_tax') : ' ' }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Main image</label>
                                                    <input type="file" name="image" id="image" class="form-control">
                                                    <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                                </div>
                                                <label>Gallery image</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" name="gallery_image[]" id="gallery_image" class="form-control">
                                                    <button class="btn btn-sm btn-primary" type="button" id="addMore">
                                                        <i class="bx bx-plus-circle" aria-hidden="true" style="margin-left: 7px;"></i>
                                                    </button>
                                                </div>
                                                <span style="color: red"> {{ $errors->has('gallery_image') ? $errors->first('gallery_image') : ' ' }}</span>
                                                <div id="newRow"></div>

                                                <label>Product Size ( Optional )</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="size[]" id="size" class="form-control" placeholder="Product size">
                                                    <span style="color: red"> {{ $errors->has('size') ? $errors->first('size') : ' ' }}</span>
                                                    <button class="btn btn-sm btn-success" type="button" id="addMoreSize">
                                                        <i class="bx bx-plus-circle" aria-hidden="true" style="margin-left: 7px;"></i>
                                                    </button>
                                                </div>
                                                <div id="newRowForSize"></div>

                                                <label>Product Color ( Optional )</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="color[]" id="color" class="form-control" placeholder="Product color">
                                                    <span style="color: red"> {{ $errors->has('color') ? $errors->first('color') : ' ' }}</span>
                                                    <button class="btn btn-sm btn-info" type="button" id="addMoreColor">
                                                        <i class="bx bx-plus-circle" aria-hidden="true" style="margin-left: 7px;"></i>
                                                    </button>
                                                </div>
                                                <div id="newRowForColor"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Short description</label>
                                                <textarea class="form-control" rows="5" name="short_description" placeholder="Enter product short description"></textarea>
                                                <span style="color: red"> {{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Long description</label>
                                                <textarea id="mytextarea" name="long_description"></textarea>
                                                <span style="color: red"> {{ $errors->has('long_description') ? $errors->first('long_description') : ' ' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product type</label>
                                                <select class="form-control" name="product_type" id="product_type">
                                                    <option selected disabled>Select a product type</option>
                                                    <option value="feature">Feature</option>
                                                    <option value="hot">Hot Product</option>
                                                    <option value="discount">Discount Product</option>
                                                    <option value="new">New Arrival Product</option>
                                                    <option value="top">Top Product</option>
                                                    <option value="upcoming">Upcoming Product</option>
                                                </select>
                                                <span style="color: red"> {{ $errors->has('brand_id') ? $errors->first('brand_id') : ' ' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 additional-info-form">
                                        <div class="additional-info-wrapper">
                                            <div class="additional-info-title">
                                                <h6 class="info-title">
                                                    Additional Information
                                                </h6>
                                            </div>
                                            <label>Product Address</label><br>
                                            <textarea rows="4" class="form-control" name="product_address" placeholder="Product shipping from"></textarea><br>
                                            <label for="inside">Inside Dhaka</label><br>
                                            <input type="text" name="inside_dhaka" class="form-control" value="" placeholder="Product shipping charge"><br>
                                            <label for="outside">Outside Dhaka</label><br>
                                            <input type="text" name="outside_dhaka" class="form-control" value="" placeholder="Product shipping charge"><br>
                                            <label>Delivery Time <small class="text-danger">( Same delivery day inside and outside Dhaka )</small></label><br>
                                            <input type="text" name="delivery_time" class="form-control" value="" placeholder="Product delivery time"><br>
                                            <hr>
                                            <label>SEO Title</label><br>
                                            <input type="text" name="seo_title" class="form-control" value="" placeholder="Seo title"><br>
                                            <label>SEO Description</label><br>
                                            <textarea rows="4" name="seo_description" class="form-control" placeholder="Seo description"></textarea><br>
                                            <label>SEO Keyword</label><br>
                                            <input type="text" name="seo_keyword" value="" class="form-control" placeholder="Seo keyword">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-2 float-right">Submit</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#mytextarea'
    });
</script>
    <script>
        $('#addMore').click(function(){
            let html = '';
            html+='<div class="input-group mb-3" id="removeRow">'
                html+='<input type="file" name="gallery_image[]" id="gallery_image" class="form-control">'
                html+='<button class="btn btn-sm btn-danger" type="button" id="remove">'
                    html+='<i class="bx bx-minus" aria-hidden="true" style="margin-left: 7px;"></i>'
                html+='</button>'
            html+='</div>'

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#remove', function () {
            $(this).closest('#removeRow').remove();
        });

        $('#addMoreSize').click(function(){
            let html = '';
            html+='<div class="input-group mb-3" id="removeSizeRow">'
                html+='<input type="text" name="size[]" id="size" class="form-control" placeholder="Product size">'
                html+='<button class="btn btn-sm btn-danger" type="button" id="removeSize">'
                    html+='<i class="bx bx-minus" aria-hidden="true" style="margin-left: 7px;"></i>'
                html+='</button>'
            html+='</div>'

            $('#newRowForSize').append(html);
        });

        // remove row
        $(document).on('click', '#removeSize', function () {
            $(this).closest('#removeSizeRow').remove();
        });

        $('#addMoreColor').click(function(){
            let html = '';
            html+='<div class="input-group mb-3" id="removeColorRow">'
                html+='<input type="text" name="color[]" id="color" class="form-control" placeholder="Product color">'
                html+='<button class="btn btn-sm btn-danger" type="button" id="removeColor">'
                    html+='<i class="bx bx-minus" aria-hidden="true" style="margin-left: 7px;"></i>'
                html+='</button>'
            html+='</div>'

            $('#newRowForColor').append(html);
        });

        // remove row
        $(document).on('click', '#removeColor', function () {
            $(this).closest('#removeColorRow').remove();
        });
    </script>
@endpush
