<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Repository\Interface\BrandInterface;
use App\Repository\Interface\CategoryInterface;
use App\Repository\Interface\ProductInterface;
use App\Repository\Interface\SubcategoryInterface;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $category;
    protected $subcategory;
    protected $brand;
    public function __construct(ProductInterface $product, CategoryInterface $category, SubcategoryInterface $subcategory, BrandInterface $brand)
    {
        $this->product = $product;
        $this->category = $category;
        $this->subcategory = $subcategory;
        $this->brand = $brand;
    }

    public function index()
    {
        $products = $this->product->getAllData();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::orderBy('created_at', 'desc')->get(),
            'subcategories' => Subcategory::orderBy('created_at', 'desc')->get(),
            'brands' => Brand::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function store(ProductRequest $request)
    {
        try{
            $data = $request->only(
            [
                'name',
                'cat_id',
                'sub_cat_id',
                'slug',
                'brand_id',
                'vendor_id',
                'qty',
                'regular_price',
                'buy_price',
                'delivery_charge',
                'discount_price',
                'sku',
                'stock',
                'short_description',
                'long_description',
                'vat_tax',
                'image',
                'gallery_image',
                'color',
                'size',
                'product_type',
                'product_address',
                'inside_dhaka',
                'outside_dhaka',
                'shipping_charge',
                'delivery_time',
                'seo_title',
                'seo_description',
                'seo_keyword',
            ]
        );
            $this->product->store($data);
            return redirect()->route('products.index')->with('success', 'Product has been successfully created.');
        }catch(Exception $exception){
            return redirect()->back()->with('success', $exception->getMessage());
        }
    }

    public function edit($id, $slug)
    {
        return view('admin.products.edit', [
            'categories' => $this->category->getAllData(),
            'subcategories' => $this->subcategory->getAllData(),
            'brands' => $this->brand->getAllData(),
            'product' => $this->product->edit($id)
        ]);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $data = $request->only(
            [
                'name',
                'cat_id',
                'sub_cat_id',
                'slug',
                'brand_id',
                'vendor_id',
                'qty',
                'regular_price',
                'buy_price',
                'discount_price',
                'sku',
                'stock',
                'short_description',
                'long_description',
                'vat_tax',
                'image',
                'gallery_image',
                'color',
                'size',
                'product_type',
                'product_address',
                'inside_dhaka',
                'outside_dhaka',
                'shipping_charge',
                'delivery_time',
                'seo_title',
                'seo_description',
                'seo_keyword',
            ]
        );
        $this->product->update($id, $data);
        return redirect()->route('products.index')->with('success', 'Product has been successfully updated.');
    }

    public function active($id)
    {
        $this->product->active($id);
        return redirect()->route('products.index')->with('success', 'Product has been successfully Inactivated.');
    }

    public function inactive($id)
    {
        $this->product->inactive($id);
        return redirect()->route('products.index')->with('success', 'Product has been successfully Actived.');
    }

    public function delete($id)
    {
        $this->product->delete($id);
        return redirect()->route('products.index')->with('success', 'Product has been successfully deleted.');
    }
}
