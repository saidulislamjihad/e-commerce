<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Subcategory;
use App\Models\User;
use App\Repository\Interface\BrandInterface;
use App\Repository\Interface\CategoryInterface;
use App\Repository\Interface\SubcategoryInterface;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use Exception;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->get();
        $blogs = Blog::take(5)->get();
        $sliders = Setting::all();
        return view('frontend.home.index', compact('categories', 'blogs', 'sliders'));
    }

    public function categories()
    {
        $categories = Category::where('status', 1)->get();
        return response()->json([
            'status' => 200,
            'categories' => $categories
        ]);
    }
    public function subcategories()
    {
        $subcategories = Subcategory::orderBy('created_at', 'desc')->get();
        return response()->json([
            'status' => 200,
            'subcategories' => $subcategories
        ]);
    }
    public function brands()
    {
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return response()->json([
            'status' => 200,
            'brands' => $brands
        ]);
    }

    public function productDetails($id, $slug)
    {
        $details = Product::with('category', 'subcategory', 'brand', 'productImages', 'supplier', 'reviews')->where('id', $id)->first();

        $related = Product::with('reviews')->where('status', 1)->where('cat_id', '=', $details->category ? $details->category->id: '')
            ->where('id', '!=', $details->id)
            ->get();

        return view('frontend.product.details', compact('details', 'related'));
    }

    //======= Bolgs =======//
    public function blogs(){
        $blogs = Blog::get();
        return view('frontend.blog.blogs', compact('blogs'));
    }

    // public function blogDetails($id, $slug)
    // {
    //     return $blogDetails = Blog::where('id', $id)->first();
    //     return view('frontend.blog.blog-details');
    // }

    public function blogDetails($slug)
    {
        $blogDetails = Blog::where('slug', $slug)->first();
        return view('frontend.blog.blog-details', compact('blogDetails'));
    }

    //======== Contact Us ===========//
    public function contactUs(){
        return view('frontend.contact-us.contact-us');
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:15|min:11',
            'subject' => 'required|max:191',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->withSuccess('Thank you for contacting us. as soon as possible we will feedback you, Stay connect with us.');
    }

    //========= setting ==========//
    public function privacyPolicy(){
        return view('frontend.settings.privacy-policy');
    }
    public function paymentPolicy(){
        return view('frontend.settings.payment-policy');
    }
    public function shippingPolicy(){
        return view('frontend.settings.shipping-policy');
    }
    public function returnPolicy(){
        return view('frontend.settings.return-policy');
    }
    public function refundPolicy(){
        return view('frontend.settings.refund-policy');
    }
    public function aboutUs(){
        return view('frontend.settings.about-us');
    }
    public function termConditions(){
        return view('frontend.settings.terms-condition');
    }
    public function career(){
        return view('frontend.settings.career');
    }

    public function productFiltering(Request $request)
    {
        $filterProducts = Product::with('category', 'subcategory', 'brand', 'productImages', 'reviews')
        ->where(function($cat) use ($request){
            if($request->category_ids){
                $cat->whereIn('cat_id', $request->category_ids);
            }
        })->orWhere(function($subcat) use ($request){
            if($request->subcategory_ids){
                $subcat->whereIn('sub_cat_id', $request->subcategory_ids);
            }
        })->orWhere(function($brand) use ($request){
            if($request->brand_ids){
                $brand->whereIn('brand_id', $request->brand_ids);
            }
        })->get();
        return $filterProducts;
    }

    public function getAllCategory()
    {
        $categories = Category::latest()->get();
        return $categories;
    }

    public function categoryProducts($slug)
    {
        $categoryProducts = Category::with('products')->where('slug', $slug)->first();
        return view('frontend.product.category-products', compact('categoryProducts'));
    }

    public function subcategoryProducts($slug)
    {
        $subcategoryProducts = Subcategory::with('products')->where('slug', $slug)->first();
        return view('frontend.product.subcategory-products', compact('subcategoryProducts'));
    }

    public function allProducts()
    {
        $products = Product::all();
        return $products;
    }

    public function searchData(Request $request)
    {
        $search_data = Product::with('reviews')->where('name', 'LIKE','%'.$request->search.'%')->take(10)->get();
        return response()->json($search_data, 200);
    }


    //===================== Order tracking ===========================//

    public function checkProductStatusForm()
    {
        $categories = Category::with('subcategories')->get();
        $orderTrack = Order::where('orderId', request()->orderId)->first();
        return view('frontend.orderTracking.tracking', compact('categories', 'orderTrack'));
    }


    //================= Social login =======================//

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('social_id', $user->id)->first();

            if($finduser){

                Auth::guard('web')->login($finduser);

                return redirect('/');

            }else{
                $newUser = User::create([
                    'social_id'  => $user->id,
                    'first_name' => $user->getName(),
                    'last_name'  => $user->getName(),
                    'email'      => $user->getEmail(),
                    'avatar'     => $user->getAvatar(),
                    'password'   => bcrypt(12345678)
                ]);

                Auth::guard('web')->login($newUser);

                return redirect()->intended('customer/dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
