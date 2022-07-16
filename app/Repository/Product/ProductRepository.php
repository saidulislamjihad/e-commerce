<?php

namespace App\Repository\Product;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Repository\Interface\ProductInterface;
use App\Uploader\FileUpload;
use Session;
use Intervention\Image\Facades\Image;
class ProductRepository implements ProductInterface
{
    public function getAllData()
    {
        return Product::with('category', 'subcategory', 'brand', 'productImages')->paginate(10);
    }

    public function store($data = [])
    {
        //dd($data['image']);
//         if($data['image']){
//             $newFile = new FileUpload();
//             $productImage = $newFile->upload('product', $data['image'], ['details', 'carousel', 'small slider', 'cart image']);
//         }

        if($data['image']){
            $image = $data['image'];
            $data['image'] = time().'.'.$image->extension();

            $filePath = public_path('/product/images');

            $img = Image::make($image->path());
            $img->resize(240, 240, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$data['image']);
            $image->move($filePath, '240x240-'.$data['image']);
        }

        $product = new Product();
        $product->cat_id = $data['cat_id'];
        $product->sub_cat_id = $data['sub_cat_id'];
        $product->brand_id = $data['brand_id'];
        if(auth('supplier')->user()){
            $product->vendor_id = auth('supplier')->user()->id;
        }else{
            $product->vendor_id = 0;
        }

        $product->name = $data['name'];
        $product->slug = str_replace(' ', '-', strtolower($data['name']));
        $product->qty = $data['qty'];
        $product->regular_price = $data['regular_price'];
        $product->buy_price = $data['buy_price'];
        $product->discount_price = $data['discount_price'] ?? '0';
        $product->sku  = $data['sku'];
        $product->stock  = $data['stock'];
        $product->short_description  = $data['short_description'];
        $product->long_description  = $data['long_description'];
        $product->vat_tax  = $data['vat_tax'];
        $product->product_type  = $data['product_type'];
        $product->image = $data['image'];
        $product->product_address  = $data['product_address'];
        $product->inside_dhaka  = $data['inside_dhaka'];
        $product->outside_dhaka  = $data['outside_dhaka'];
        $product->delivery_time  = $data['delivery_time'];
        $product->seo_title  = $data['seo_title'];
        $product->seo_description  = $data['seo_description'];
        $product->seo_keyword  = $data['seo_keyword'];
        $product->save();

        //Product gallery image
        if(!empty($product)){

            if($data['gallery_image']){

                foreach($data['gallery_image'] as $image){
                    $name = $image->getClientOriginalName();
                    $image->move(public_path().'/galleryImage/', $name);
                    $data[] = $name;

                    $productGalleryImage = new ProductImage();
                    $productGalleryImage->product_id = $product->id;
                    $productGalleryImage->gallery_image = $name;
                    $productGalleryImage->save();
                }
            }

            foreach($data['color'] as $key => $color){
                $productColor = new ProductColor();
                $productColor->product_id = $product->id;
                $productColor->color = $data['color'][$key];
                $productColor->save();
            }

            foreach($data['size'] as $key => $size){
                $productSize = new ProductSize();
                $productSize->product_id = $product->id;
                $productSize->size = $data['size'][$key];
                $productSize->save();
            }
        }
    }

    public function edit($id)
    {
        return Product::find($id);
    }

    public function update($id, $data = [])
    {

        $productUpdate = Product::find($id);
        $image = $productUpdate['image'];
        if (isset($data['image'])){
            $newImage = $data['image'];
            if ($data['image']){
                file_exists(('product/images/').$productUpdate['image']);
            }
            $updateImage = time().'.'. $data['image']->extension();

            $filePath = public_path('/product/images');

            //dd($filePath.'/'.$updateImage);

            $img = Image::make($newImage->path());
            $img->resize(240, 240, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$updateImage);

            $data['image']->move($filePath, '240x240-'.$updateImage);

            $productUpdate['image'] = $updateImage;
        }


        $productUpdate->cat_id = $data['cat_id'];
        $productUpdate->sub_cat_id = $data['sub_cat_id'];
        $productUpdate->brand_id = $data['brand_id'];
        if(auth('supplier')->user()){
            $productUpdate->vendor_id = auth('supplier')->user()->id;
        }else{
            $productUpdate->vendor_id = 0;
        }
        $productUpdate->name = $data['name'];
        $productUpdate->slug = str_replace(' ', '-', strtolower($data['name']));
        $productUpdate->qty = $data['qty'];
        $productUpdate->regular_price = $data['regular_price'];
        $productUpdate->buy_price = $data['buy_price'];
        $productUpdate->discount_price = $data['discount_price'] ?? '0';
        $productUpdate->sku  = $data['sku'];
        $productUpdate->stock  = $data['stock'];
        $productUpdate->short_description  = $data['short_description'];
        $productUpdate->long_description  = $data['long_description'];
        $productUpdate->vat_tax  = $data['vat_tax'];
        $productUpdate->product_type  = $data['product_type'];
        $productUpdate->product_address  = $data['product_address'];
        $productUpdate->inside_dhaka  = $data['inside_dhaka'];
        $productUpdate->outside_dhaka  = $data['outside_dhaka'];
        $productUpdate->delivery_time  = $data['delivery_time'];
        $productUpdate->seo_title  = $data['seo_title'];
        $productUpdate->seo_description  = $data['seo_description'];
        $productUpdate->seo_keyword  = $data['seo_keyword'];
        $productUpdate->save();

        //Product gallery image
        if(!empty($productUpdate)){

            if(isset($data['gallery_image'])){
                if($data['gallery_image']){
                    ProductImage::where('product_id', $id)->delete();
                    foreach($data['gallery_image'] as $image){
                        $name = $image->getClientOriginalName();
                        $image->move(public_path().'/galleryImage/', $name);
                        $data[] = $name;

                        $productGalleryImage = new ProductImage();
                        $productGalleryImage->product_id = $productUpdate->id;
                        $productGalleryImage->gallery_image = $name;
                        $productGalleryImage->save();
                    }
                }
            }

            // foreach($data['color'] as $key => $color){
            //     $productColor = new ProductColor();
            //     $productColor->product_id = $product->id;
            //     $productColor->color = $data['color'][$key];
            //     $productColor->save();
            // }

            // foreach($data['size'] as $key => $size){
            //     $productSize = new ProductSize();
            //     $productSize->product_id = $product->id;
            //     $productSize->size = $data['size'][$key];
            //     $productSize->save();
            // }
        }
    }

    public function active($id)
    {
        $productActive = Product::find($id);
        $productActive->status = 0;
        $productActive->save();
    }

    public function inactive($id)
    {
        $productInactive = Product::find($id);
        $productInactive->status = 1;
        $productInactive->save();
    }

    public function delete($id)
    {
        $productDelete = Product::find($id);
        $productDelete->delete();
    }
}
