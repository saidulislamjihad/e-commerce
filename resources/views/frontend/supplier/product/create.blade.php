@extends('frontend.master')

@section('title')
    Vendor Product Upload
@endsection

@section('content')
    <section class="supplier-product-section">
        <div class="container-fluid">
            @if(Session::has('success'))
                <x-alert :message="session('success')" title="Success" type="success"></x-alert>
            @endif
            @if(Session::has('error'))
                <x-alert :message="session('error')" title="Error" type="error"></x-alert>
            @endif
           <div class="row">
               <div class="col-md-12">
                    <div class="supplier-product-section-title-outer">
                        <h4 class="title-inner">
                            New Product
                        </h4>
                    </div>
               </div>
               <div class="col-md-12">
                   <form action="{{ route('vendor.product.upload') }}" method="post" enctype="multipart/form-data" id="uploadProduct">
                        @csrf
                       <div class="row">
                           <div class="col-md-8">
                               <div class="row">
                                   <div class="form-group col-md-6">
                                       <x-label style="font-weight: 700">
                                           Name <small class="text-danger" style="font-size: 18px;">*</small>
                                       </x-label>
                                       <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Product Name">
                                       <x-error>
                                        {{ $errors->has('name') ? $errors->first('name') : ' ' }}
                                       </x-error>
                                   </div>
                                   <div class="form-group col-md-6">
                                    <x-label style="font-weight: 700">
                                        Sku <small class="text-danger" style="font-size: 18px;">*</small>
                                    </x-label>
                                       <input type="text" name="sku" class="form-control" value="{{ old('sku') }}" placeholder="Product SKU">
                                       <x-error>
                                        {{ $errors->has('sku') ? $errors->first('sku') : ' ' }}
                                       </x-error>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-6">
                                       <x-label style="font-weight: 700">
                                        Category Name <small class="text-danger" style="font-size: 18px;">*</small>
                                       </x-label>
                                       <select class="form-control" name="cat_id" id="cat_id" onchange="subcategory(this.value)">
                                           <option selected disabled>Select a category</option>
                                           @foreach ($data['categories'] as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                           @endforeach
                                       </select>
                                       <x-error>
                                        {{ $errors->has('cat_id') ? $errors->first('cat_id') : ' ' }}
                                       </x-error>
                                   </div>
                                   <div class="form-group col-md-6">
                                       <x-label style="font-weight: 700">
                                        Stock <small class="text-danger" style="font-size: 18px;">*</small>
                                       </x-label>
                                       <input type="text" name="stock" class="form-control" value="{{ old('stock') }}" placeholder="Product Stock">
                                       <x-error>
                                        {{ $errors->has('stock') ? $errors->first('stock') : ' ' }}
                                       </x-error>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-6">
                                       <x-label style="font-weight: 700">
                                        Subcategory Name <small class="text-danger" style="font-size: 18px;">*</small>
                                       </x-label>
                                       <select class="form-control" name="sub_cat_id" id="sub_cat_id">
                                           <option selected disabled>Select a subcategory</option>
                                       </select>
                                       <x-error>
                                        {{ $errors->has('sub_cat_id') ? $errors->first('sub_cat_id') : ' ' }}
                                       </x-error>
                                   </div>
                                   <div class="form-group col-md-6">
                                       <x-label style="font-weight: 700">
                                        Vat/Tax <small class="text-danger" style="font-size: 18px;">*</small>
                                       </x-label>
                                       <input type="text" name="vat_tax" class="form-control" value="{{ old('vat_tax') }}" placeholder="Product vat tax">
                                       <x-error>
                                        {{ $errors->has('vat_tax') ? $errors->first('vat_tax') : ' ' }}
                                       </x-error>
                                   </div>
                               </div>
                               <div class="row">
                                <div class="form-group col-md-6">
                                    <x-label style="font-weight: 700">
                                        Brand Name <small class="text-danger" style="font-size: 18px;">*</small>
                                    </x-label>
                                    <select class="form-control" name="brand_id" id="brand_id">
                                        <option selected disabled>Select a brand</option>
                                        @foreach ($data['brands'] as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-error>
                                        {{ $errors->has('brand_id') ? $errors->first('brand_id') : ' ' }}
                                    </x-error>
                                </div>
                                   <div class="form-group col-md-6">
                                       <x-label style="font-weight: 700">
                                        Main Image <small class="text-danger" style="font-size: 18px;">*</small>
                                        </x-label>
                                       <input type="file" name="image" class="form-control" onchange="imagePreview(event)">
                                    <x-error>
                                       {{ $errors->has('image') ? $errors->first('image') : ' ' }}
                                    </x-error>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-6">
                                       <x-label style="font-weight: 700">
                                        Qty <small class="text-danger" style="font-size: 18px;">*</small>
                                        </x-label>
                                       <input type="number" min="1" name="qty" value="{{ old('qty') }}" class="form-control" placeholder="Qty">
                                       <x-error>
                                        {{ $errors->has('qty') ? $errors->first('qty') : ' ' }}
                                       </x-error>
                                   </div>
                                   <div class="form-group col-md-6 new-f-i-w">
                                       <div class="new-f-i">
                                           <x-label style="font-weight: 700">
                                            Gallery Image <small class="text-danger" style="font-size: 18px;">*</small>
                                            </x-label>
                                          <div class="input-wrapper">
                                               <input type="file" name="gallery_image[]" class="form-control add-gallery-image" accept="image/*">
                                               <button type="button" class="add-new add-gallery-image-btn" id="addMoreImages">
                                                   <i class="fas fa-plus-circle"></i>
                                               </button>
                                          </div>
                                          <div id="newRow" class="mt-2"></div>
                                          <x-error>
                                            {{ $errors->has('gallery_image') ? $errors->first('gallery_image') : ' ' }}
                                          </x-error>
                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                    <div class="form-group col-md-4">
                                        <x-label style="font-weight: 700">
                                        Buy Price <small class="text-danger" style="font-size: 18px;">*</small>
                                        </x-label>
                                        <input type="text" name="buy_price" class="form-control" value="{{ old('buy_price') }}" placeholder="Product buy price">
                                        <x-error>
                                        {{ $errors->has('regular_price') ? $errors->first('regular_price') : ' ' }}
                                        </x-error>
                                    </div>
                                   <div class="form-group col-md-4">
                                       <x-label style="font-weight: 700">
                                        Sales Price <small class="text-danger" style="font-size: 18px;">*</small>
                                       </x-label>
                                       <input type="text" name="regular_price" class="form-control" value="{{ old('regular_price') }}" onkeyup="productPrice(this.value)" placeholder="Product regular price">
                                       <span id="demo"></span>
                                       <x-error>
                                        {{ $errors->has('regular_price') ? $errors->first('regular_price') : ' ' }}
                                      </x-error>
                                   </div>
                                   <div class="form-group col-md-4 new-f-i-w">
                                       <div class="new-f-i">
                                           <x-label style="font-weight: 700">
                                            Product Size <small class="text-danger" style="font-size: 14px;">(Optional)</small>
                                            </x-label>
                                           <div class="input-wrapper">
                                               <input type="text" name="size[]" value="" class="form-control add-product-size" placeholder="Product size">
                                               <button type="button" class="add-new add-product-size-btn" id="addMoreSize">
                                                   <i class="fas fa-plus-circle"></i>
                                               </button>
                                           </div>
                                           <div id="newRowForSize" class="mt-2"></div>
                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-6">
                                       <x-label style="font-weight: 700">
                                        Discount Price <small class="text-danger" style="font-size: 14px;">(Optional)</small>
                                        </x-label>
                                       <input type="text" name="discount_price" class="form-control" value="{{ old('discount_price') }}" placeholder="Product discount price">
                                   </div>
                                   <div class="form-group col-md-6 new-f-i-w">
                                       <div class="new-f-i">
                                           <label></label>
                                           <x-label style="font-weight: 700">
                                            Product Color <small class="text-danger" style="font-size: 14px;">(Optional)</small>
                                           </x-label>
                                           <div class="input-wrapper">
                                               <input type="text" name="color[]" value="" class="form-control add-product-color" id="" placeholder="Product color">
                                               <button type="button" class="add-new add-product-color-btn" id="addMoreColor">
                                                   <i class="fas fa-plus-circle"></i>
                                               </button>
                                           </div>
                                           <div id="newRowForColor" class="mt-2"></div>
                                       </div>
                                   </div>
                               </div>
                               <div class="form-group col-md-12 px-0">
                                   <x-label style="font-weight: 700">
                                    Short Description <small class="text-danger" style="font-size: 18px;">*</small>
                                   </x-label>
                                   <textarea class="form-control" name="short_description" rows="6" placeholder="Product short description">{{ old('short_description') }}</textarea>
                                   <x-error>
                                    {{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}
                                  </x-error>
                               </div>
                               <div class="form-group col-md-12 px-0">
                                   <x-label style="font-weight: 700">
                                    Long Description<small class="text-danger" style="font-size: 18px;">*</small>
                                   </x-label>
                                   <textarea class="form-control" name="long_description" rows="15" id="productLongDescription" placeholder="Product long description">{{ old('long_description') }}</textarea>
                                   <x-error>
                                    {{ $errors->has('long_description') ? $errors->first('long_description') : ' ' }}
                                  </x-error>
                               </div>
                               <div class="form-group col-md-12 px-0">
                                   <x-label style="font-weight: 700">
                                    Product type <small class="text-danger" style="font-size: 18px;">*</small>
                                   </x-label>
                                   <select class="form-control" name="product_type">
                                        <option selected disabled>Select a product type</option>
                                        <option value="feature" @if (old('product_type') == 'feature') selected="selected" @endif>Feature</option>
                                        <option value="hot" @if (old('product_type') == 'hot') selected="selected" @endif>Hot Product</option>
                                        <option value="discount" @if (old('product_type') == 'discount') selected="selected" @endif>Discount Product</option>
                                        <option value="new" @if (old('product_type') == 'new') selected="selected" @endif>New Arrival Product</option>
                                        <option value="top" @if (old('product_type') == 'top') selected="selected" @endif>Top Product</option>
                                        <option value="upcoming" @if (old('product_type') == 'upcoming') selected="selected" @endif>Upcoming Product</option>
                                   </select>
                                   <x-error>
                                    {{ $errors->has('product_type') ? $errors->first('product_type') : ' ' }}
                                  </x-error>
                               </div>
                           </div>
                           <div class="col-md-4 additional-info-form">
                                <div class="additional-info-wrapper">
                                    <div class="additional-info-title">
                                        <h4 class="info-title">
                                            Additional Information
                                        </h4>
                                    </div>
                                    <label>Product Address <small class="text-danger" style="font-size: 18px;">*</small></label><br>
                                    <textarea rows="4" class="form-control" name="product_address" placeholder="Product shipping from">{{ old('product_address') }}</textarea><br>
                                    <label for="inside">Inside Dhaka <small class="text-danger" style="font-size: 18px;">*</small></label><br>
                                    <input type="text" name="inside_dhaka" class="form-control" value="{{ old('inside_dhaka') }}" placeholder="Product shipping charge"><br>
                                    <x-error>
                                        {{ $errors->has('inside_dhaka') ? $errors->first('inside_dhaka') : ' ' }}
                                    </x-error>
                                    <br/>
                                     <label for="outside">Outside Dhaka <small class="text-danger" style="font-size: 18px;">*</small></label><br>
                                     <input type="text" name="outside_dhaka" class="form-control" value="{{ old('outside_dhaka') }}" placeholder="Product shipping charge"><br>
                                    <x-error>
                                        {{ $errors->has('outside_dhaka') ? $errors->first('outside_dhaka') : ' ' }}
                                    </x-error>
                                    <br/>
                                     <label>Delivery Time <small class="text-danger" style="font-size: 18px;">*</small></label><br>
                                     <input type="text" name="delivery_time" class="form-control" value="{{ old('delivery_time') }}" placeholder="Product delivery time"><br>
                                    <x-error>
                                        {{ $errors->has('delivery_time') ? $errors->first('delivery_time') : ' ' }}
                                    </x-error>
                                     <hr>
                                     <label>SEO Title</label><br>
                                     <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}" placeholder="Seo title"><br>
                                     <label>SEO Description</label><br>
                                     <textarea rows="4" name="seo_description" class="form-control" placeholder="Seo description">{{ old('seo_description') }}</textarea><br>
                                     <label>SEO Keyword</label><br>
                                     <input type="text" name="seo_keyword" value="{{ old('seo_keyword') }}" class="form-control" placeholder="Seo keyword">
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
        // function productPrice(event){
        //     console.log(event/100*5);
        //     document.getElementById('demo').innerText = event;
        // }
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
