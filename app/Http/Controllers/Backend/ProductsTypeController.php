<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductsType;

class ProductsTypeController extends Controller
{
    public function AllType(){
        $types = ProductsType::latest()->get();
        return view('backend.type.all_type' ,compact('types'));

    } // End Method

    public function AddType(){
        return view('backend.type.add_type');

    } // End Method

    public function StoreType(Request $request){
        // Validation
        $request->validate([
            'type_name' => 'required|unique:products_types|max:200',
            'type_icon' => 'required'
        ]);

        ProductsType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Products Type Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);

    } // End Method

    public function EditType($id){
        $types = ProductsType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));

    } // End Method

    public function UpdateType(Request $request){
        $pid = $request->id;

        ProductsType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Products Type Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);

    } // End Method

    public function DeleteType($id){
        ProductsType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Products Type Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method
}
