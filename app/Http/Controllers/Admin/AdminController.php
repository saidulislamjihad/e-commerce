<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //========== Supplier information ============//

    public function supplierList()
    {
        $suppliers = Supplier::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.supplier.list', compact('suppliers'));
    }

    public function supplierDelete($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect()->back()->with('success', 'Supplier has been successfully deleted.');
    }

    public function supplierActive(Supplier $supplier)
    {
        $supplier->is_approved = 0;
        $products = Product::where('vendor_id', $supplier->id)->get();
        foreach ($products as $item) {
            $item->status = 0;
            $item->save();
        }
        $supplier->save();
        return redirect()->back()->with('success', 'Supplier has been successfully inactive.');
    }

    public function supplierInactive(Supplier $supplier)
    {
        $supplier->is_approved = 1;
        $products = Product::where('vendor_id', $supplier->id)->get();
        foreach ($products as $item) {
            $item->status = 1;
            $item->save();
        }
        $supplier->save();
        return redirect()->back()->with('success', 'Supplier has been successfully active.');
    }

    //========== Customer information ============//

    public function customerList()
    {
        $customers = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.customer.list', compact('customers'));
    }

    public function customerDelete($id)
    {
        $customer = User::find($id);
        $customer->delete();
        return redirect()->back()->with('success', 'Customer has been successfully deleted.');
    }

    public function contacts()
    {
        $sql = Contact::orderBy('created_at', 'desc');
        if(isset(request()->search)){
            $sql->where('name', 'LIKE', '%' . request()->search . '%')
                ->orWhere('name', 'LIKE', '%' . request()->search . '%')
                ->orWhere('email', 'LIKE', '%' . request()->search . '%');
        }

        $contacts = $sql->paginate(20);
        return view('admin.contact.index', compact('contacts'));
    }

    public function contactDelete($id)
    {
        $conatct = Contact::find($id);
        $conatct->delete();
        return redirect()->back()->with('success', 'Contact has been successfully deleted.');
    }

    //================== Website Settings ========================//

    public function sliderList()
    {
        $sliders = Setting::get();
        return view('admin.settings.index', compact('sliders'));
    }

    public function sliderCreate()
    {
        return view('admin.settings.create');
    }

    public function sliderStore(Request $request)
    {
        $this->validate($request, [
            'image' => 'required'
        ]);

        if($request->file('image')){
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $image->move('setting', $fileName);
        }

        $newSlider = new Setting();
        $newSlider->image = $fileName;
        $newSlider->save();
        return redirect()->back()->with('success', 'Slider image has been added.');
    }

    public function sliderEdit($id)
    {
        $slider = Setting::find($id);
        return view('admin.settings.edit', compact('slider'));
    }

    public function sliderUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required'
        ]);

        $sliderUpdate = Setting::find($id);

        if($request->hasFile('image')){
            if($sliderUpdate->image && file_exists('setting/'.$sliderUpdate->image)){
                unlink('setting/'.$sliderUpdate->image);
            }
            $image = $request->file('image');
            $fileName = date('YmdHi').'.'.$image->getClientOriginalExtension();
            $image->move('setting', $fileName);
            $sliderUpdate->image = $fileName;
            $sliderUpdate->save();
        }
        return redirect()->back()->with('success', 'Slider image has been updated.');
    }

    public function sliderDelete($id)
    {
        $sliderDelete = Setting::find($id);
        $sliderDelete->delete();
        return redirect()->back()->with('success', 'Slider image has been deleted.');
    }
}
