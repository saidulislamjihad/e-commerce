@extends('frontend.master')

@section('title')
    Vendor Product Upload
@endsection

@section('content')
    <section class="supplier-product-section">
        <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                    <div class="supplier-product-section-title-outer">
                        <h4 class="title-inner">
                            Update Product
                        </h4>
                        <a href="{{ url('supplier/dashboard') }}" class="btn btn-primary float-right">
                           <i class="fas fa-arrow-alt-circle-left"></i> Back
                        </a>
                    </div>
                   <form action="{{ route('vendor.product.update', $data['product']->id) }}" method="post" enctype="multipart/form-data" id="uploadProduct">
                        @csrf
                       <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                       <label>Name <small class="text-danger">*</small></label>
                                       <input type="text" name="name" class="form-control" value="{{ $data['product']->name }}" placeholder="Product Name">
                                       <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>SKU <small class="text-danger">*</small></label>
                                       <input type="text" name="sku" class="form-control" value="{{ $data['product']->sku }}" placeholder="Product SKU">
                                       <span style="color: red"> {{ $errors->has('sku') ? $errors->first('sku') : ' ' }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="form-group col-md-6">
                                       <label>Category Name <small class="text-danger">*</small></label>
                                       <select class="form-control" name="cat_id" id="cat_id" onchange="subcategory(this.value)">
                                           <option selected disabled>Select a category</option>
                                           @foreach ($data['categories'] as $category)
                                                <option value="{{ $category->id }}" {{ $data['product']->cat_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                           @endforeach
                                       </select>
                                       <span style="color: red"> {{ $errors->has('cat_id') ? $errors->first('cat_id') : ' ' }}</span>
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label>Stock <small class="text-danger">*</small></label>
                                       <input type="text" name="stock" class="form-control" value="{{ $data['product']->stock }}" placeholder="Product Stock">
                                       <span style="color: red"> {{ $errors->has('stock') ? $errors->first('stock') : ' ' }}</span>
                                   </div>
                                </div>
                                <div class="row">
                                   <div class="form-group col-md-6">
                                       <label>Subcategory Name <small class="text-danger">*</small></label>
                                       <select class="form-control" name="sub_cat_id" id="sub_cat_id">
                                           <option selected disabled>Select a subcategory</option>
                                           @foreach ($data['subcategories'] as $subcategory)
                                                <option value="{{ $subcategory->id }}" {{ $data['product']->sub_cat_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                            @endforeach
                                       </select>
                                       <span style="color: red"> {{ $errors->has('sub_cat_id') ? $errors->first('sub_cat_id') : ' ' }}</span>
                                   </div>
                                   <div class="form-group col-md-6">
                                       <label>Vat/Tax <small class="text-danger">*</small></label>
                                       <input type="text" name="vat_tax" class="form-control" value="{{ $data['product']->vat_tax }}" placeholder="Product vat tax">
                                       <span style="color: red"> {{ $errors->has('vat_tax') ? $errors->first('vat_tax') : ' ' }}</span>
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Brand Name <small class="text-danger">*</small></label>
                                        <select class="form-control" name="brand_id" id="brand_id">
                                            <option selected disabled>Select a brand</option>
                                            @foreach ($data['brands'] as $brand)
                                                <option value="{{ $brand->id }}" {{ $data['product']->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        <span style="color: red"> {{ $errors->has('brand_id') ? $errors->first('brand_id') : ' ' }}</span>
                                    </div>
                                       <div class="form-group col-md-6">
                                           <label>Main Image <small class="text-danger">*</small></label>
                                           <input type="file" name="image" class="form-control" placeholder="">
                                           <img src="{{ asset('/product/images/'.$data['product']->image) }}" style="height: 80px; width:80px;" />
                                           <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                       </div>
                                </div>
                                <div class="row">
                                   <div class="form-group col-md-6">
                                       <label>Qty <small class="text-danger">*</small></label>
                                       <input type="number" min="1" name="qty" class="form-control" value="{{ $data['product']->vat_tax }}" placeholder="Qty">
                                       <span style="color: red"> {{ $errors->has('qty') ? $errors->first('qty') : ' ' }}</span>
                                   </div>
                                   <div class="form-group col-md-6 new-f-i-w">
                                       <div class="new-f-i">
                                           <label>Gallery Image <small class="text-danger">*</small></label>
                                          <div class="input-wrapper">
                                               <input type="file" name="gallery_image[]" class="form-control add-gallery-image" accept="image/*">
                                               <button type="button" class="add-new add-gallery-image-btn" id="addMoreImages">
                                                   <i class="fas fa-plus-circle"></i>
                                               </button>
                                          </div>
                                          <span style="color: red"> {{ $errors->has('gallery_image') ? $errors->first('gallery_image') : ' ' }}</span>
                                          <div id="newRow" class="mt-2"></div>
                                          <div class="gallery-image">
                                            @foreach ($data['product']->productImages as $gallery)
                                                <img src="{{ asset('/galleryImage/'.$gallery->gallery_image) }}" style="height: 80px; width:80px;" />
                                            @endforeach
                                        </div>
                                       </div>
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Buy Price <small class="text-danger">*</small></label>
                                        <input type="number" name="buy_price" class="form-control" value="{{ $data['product']->buy_price }}"
                                        placeholder="Product buy price">
                                        <span style="color: red"> {{ $errors->has('buy_price') ? $errors->first('buy_price') : ' ' }}</span>
                                    </div>
                                   <div class="form-group col-md-4">
                                       <label>Regular Price <small class="text-danger">*</small></label>
                                       <input type="text" name="regular_price" class="form-control" value="{{ $data['product']->regular_price }}"
                                       placeholder="Product regular price">
                                       <span style="color: red"> {{ $errors->has('regular_price') ? $errors->first('regular_price') : ' ' }}</span>
                                   </div>

                                   <div class="form-group col-md-4">
                                        <label>Discount Price <small class="text-danger">(Optional)</small></label>
                                        <input type="text" name="discount_price" class="form-control" value="{{ $data['product']->discount_price }}"
                                        placeholder="Product discount price">
                                        <span style="color: red"> {{ $errors->has('discount_price') ? $errors->first('discount_price') : ' ' }}</span>
                                    </div>

                                   {{-- <div class="form-group col-md-6 new-f-i-w">
                                       <div class="new-f-i">
                                           <label>Product Size</label>
                                           <div class="input-wrapper">
                                               <input type="text" name="size[]" class="form-control add-product-size" placeholder="Product size">
                                               <button type="button" class="add-new add-product-size-btn" id="addMoreSize">
                                                   <i class="fas fa-plus-circle"></i>
                                               </button>
                                           </div>
                                           <div id="newRowForSize" class="mt-2"></div>
                                       </div>
                                   </div> --}}
                                </div>
                                <div class="form-group col-md-12 px-0">
                                   <label>Short Description <small class="text-danger">*</small></label>
                                   <textarea class="form-control" name="short_description" rows="6" placeholder="Product short description">{{ $data['product']->short_description }}</textarea>
                                   <span style="color: red"> {{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                                </div>
                                <div class="form-group col-md-12 px-0">
                                   <label>Long Description <small class="text-danger">*</small></label>
                                   <textarea class="form-control" name="long_description" rows="15" id="productLongDescription"
                                   placeholder="Product long description">{{ $data['product']->long_description }}</textarea>
                                   <span style="color: red"> {{ $errors->has('long_description') ? $errors->first('long_description') : ' ' }}</span>
                                </div>
                                <div class="form-group col-md-12 px-0">
                                   <label>Product type <small class="text-danger">*</small></label>
                                   <select class="form-control" name="product_type">
                                        <option selected disabled>Select a product type</option>
                                        <option value="feature" {{ $data['product']->product_type == 'feature' ? 'selected' : '' }}>Feature</option>
                                        <option value="hot" {{ $data['product']->product_type == 'hot' ? 'selected' : '' }}>Hot Product</option>
                                        <option value="discount" {{ $data['product']->product_type == 'discount' ? 'selected' : '' }}>Discount Product</option>
                                        <option value="new" {{ $data['product']->product_type == 'new' ? 'selected' : '' }}>New Arrival Product</option>
                                        <option value="top" {{ $data['product']->product_type == 'top' ? 'selected' : '' }}>Top Product</option>
                                        <option value="upcoming" {{ $data['product']->product_type == 'upcoming' ? 'selected' : '' }}>Upcoming Product</option>
                                   </select>
                                   <span style="color: red"> {{ $errors->has('product_type') ? $errors->first('product_type') : ' ' }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 additional-info-form">
                                <div class="additional-info-wrapper">
                                    <div class="additional-info-title">
                                        <h4 class="info-title">
                                            Additional Information
                                        </h4>
                                    </div>
                                    <label>
                                        Product Address
                                        <small class="text-danger" style="font-size: 18px;">*</small>
                                    </label><br>
                                    <textarea rows="4" class="form-control" name="product_address" placeholder="Product shipping from">{{ $data['product']->product_address ?? '' }}</textarea><br>
                                    <label for="inside">
                                        Inside Dhaka
                                    </label><br>
                                    <input type="text" name="inside_dhaka" value="{{ $data['product']->inside_dhaka ?? '' }}" placeholder="Product shipping charge" class="form-control"><br>
                                    <span style="color: red"> {{ $errors->has('inside_dhaka') ? $errors->first('inside_dhaka') : ' ' }}</span>
                                     <label for="outside">
                                        Outside Dhaka
                                    </label><br>
                                     <input type="text" name="outside_dhaka" value="{{ $data['product']->outside_dhaka ?? '' }}" placeholder="Product shipping charge" class="form-control"><br>
                                    <span style="color: red"> {{ $errors->has('outside_dhaka') ? $errors->first('outside_dhaka') : ' ' }}</span>
                                     <label>
                                        Delivary Time
                                        <small class="text-danger" style="font-size: 18px;">*</small>
                                    </label><br>
                                     <input type="text" name="delivery_time" class="form-control" value="{{ $data['product']->delivery_time ?? '' }}" placeholder="Product delivery time"><br>
                                    <span style="color: red"> {{ $errors->has('product_type') ? $errors->first('product_type') : ' ' }}</span>
                                     <hr>
                                     <label>
                                        SEO Title
                                        <small class="text-danger" style="font-size: 18px;">*</small>
                                    </label><br>
                                     <input type="text" name="seo_title" class="form-control" value="{{ $data['product']->seo_title ?? '' }}" placeholder="Seo title"><br>
                                     <label>
                                        SEO Description
                                        <small class="text-danger" style="font-size: 18px;">*</small>
                                    </label><br>
                                     <textarea rows="4" name="seo_description" class="form-control" placeholder="Seo description">{{ $data['product']->seo_description ?? '' }}</textarea><br>
                                     <label>
                                        SEO Keyword
                                        <small class="text-danger" style="font-size: 18px;">*</small>
                                    </label><br>
                                     <input type="text" name="seo_keyword" value="{{ $data['product']->seo_keyword ?? ''  }}" class="form-control" placeholder="Seo keyword">
                                </div>
                           </div>
                           <div class="form-group col-md-12 add-new-product-btn-inner">
                               <button type="submit" class="add-new-product-btn">
                                   submit
                               </button>
                            </div>
                       </div>
                   </form>
               </div>
           </div>
        </div>
    </section>
@endsection

@push('script')
    <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: '#productLongDescription'
        });
    </script>

    <script>
        $('#addMoreImages').click(function(){
            let html = '';
            html+='<div class="input-wrapper" id="removeRow">'
                html+='<input type="file" name="gallery_image[]" class="form-control add-gallery-image" placeholder="">'
                html+='<button class="add-new remove-gallery-image-btn" type="button" id="remove">'
                    html+='<i class="fas fa-minus" style="color: #fff"></i>'
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
                html+='<button class="add-new remove-gallery-image-btn" type="button" id="removeSize">'
                    html+='<i class="fas fa-minus" style="color: #fff"></i>'
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
                html+='<button class="add-new remove-gallery-image-btn" type="button" id="removeColor">'
                    html+='<i class="fas fa-minus" style="color: #fff"></i>'
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
