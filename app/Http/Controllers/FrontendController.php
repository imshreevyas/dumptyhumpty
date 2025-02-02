<?php

namespace App\Http\Controllers;

use App\Models\Residential;
use App\Models\Commercial;
use App\Models\GeneralSetting;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    
    const settings = '';
    const data = [];

    function __construct(Request $request){
        // Get All Settings
        $settingsArr = optional(GeneralSetting::where('status', '1')->get())->toArray();
        $settingsArrNew = [];
        foreach($settingsArr as $singleSettings){
            $settingsArrNew[$singleSettings['name']] = $singleSettings['value'];
        }

        // Get Main Logo
        $settingsArrNew['logo'] = Admin::select('logo')->first()['logo'];
        $this->data['settings'] = $settingsArrNew;
    }

    public function index(){
        $this->data['products'] = optional(Product::where('status', '1')->orderBy('id', 'DESC')->get())->toArray();
        $this->data['settings']['page'] = 'home';
        return view('frontend.views.home', $this->data);
    }

    public function aboutus(){
        $this->data['settings']['page'] = 'about-us';
        return view('frontend.views.about-us', $this->data);
    }

    public function contactus(){
        $this->data['settings']['page'] = 'contact-us';
        return view('frontend.views.contact-us', $this->data);
    }

    public function cost_saving_calculator(){
        $this->data['settings']['page'] = 'cost-saving-calculator';
        return view('frontend.views.cost-saving-calculator', $this->data);
    }

    public function product_details($product_uid = 0){

        $this->data['settings']['page'] = 'product-details';
        if($product_uid == 0){
            return view('frontend.views.errors.404', $this->data);    
        }

        $this->data['product'] = Product::where('product_uid',$product_uid)->with('category')->first();
        if(empty($this->data['product'])){
            return view('frontend.views.errors.404', $this->data);    
        }

        $this->data['related_products'] = Product::where('category_uid',$this->data['product']['category_uid'])->where('product_uid', '!=', $this->data['product']['product_uid'])->with('category')->get();
        return view('frontend.views.product-details', $this->data);
    }

    public function products_list(){
        $this->data['settings']['page'] = 'product-list';
        $this->data['related_products'] = Product::where('status', 1)->with('category')->get();
        if(empty($this->data['product'])){
            return view('frontend.views.errors.404', $this->data);    
        }

        return view('frontend.views.product-list', $this->data);
    }

}