<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data['products'] = Product::orderBy('id','desc')->with('category')->get();
        $data['page_type'] = 'productAll'; 
        return view('admin.product.manageProducts', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $data['page_type'] = 'productAdd'; 
        $data['categories'] = Category::where('status','1')->orderBy('id','desc')->get();
        return view('admin.product.addProduct', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // Validation
        $validatedData = $request->validate([
            'category_uid' => 'required',
            'product_name' => 'required|string|max:255',
            'long_desc' => 'required',
            'product_assets' => 'required',
            'product_assets.*' => 'required|mimes:jpeg,png,jpg,webp|max:20480',
            'product_specification_assets.*' => 'file|mimes:pdf|max:20480',
        ]);

        $assets = [];
        $productUid = (string)Str::uuid()->getHex();

        // Product Images
        foreach ($request->file('product_assets') as $asset) {
            $type = $asset->getMimeType();
        
            $filename = Str::random(20) . '.' . $asset->getClientOriginalExtension();
            $path = $asset->storeAs('product_assets/' . $productUid, $filename);
            
            $assetPath = 'storage/app/' . $path;
            $assets[] = [
                'path' => $assetPath,
            ];            
        }

        // Specifications
        foreach ($request->file('product_specification_assets') as $asset) {
            $type = $asset->getMimeType();
        
            $filename = Str::random(20) . '.' . $asset->getClientOriginalExtension();
            $path = $asset->storeAs('product_specification_assets/' . $productUid, $filename);
            
            $assetPath = 'storage/app/' . $path;
            $product_specification_assets[] = [
                'original_filename' => $asset->getClientOriginalName(),
                'path' => $assetPath,
            ];            
        }

        $validatedData['product_uid'] = $productUid;
        $validatedData['product_assets'] = json_encode($assets);
        $validatedData['product_specification_assets'] = json_encode($product_specification_assets);
        $validatedData['status'] = '1';
        $update = Product::create($validatedData);
        if($update){
            return response()->json([
                'message'=>'Product Created Successfully!',
                'type'=>'success'
            ]);
        }else{
            return response()->json([
                'message'=>'Something went wrong, try again later!',
                'type'=>'error'
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($product_uid){
        $data['page_type'] = 'productEdit'; 
        $data['categories'] = Category::where('status','1')->orderBy('id','desc')->get();
        $data['product'] = Product::where('product_uid', $product_uid)->first(); 
        return view('admin.product.editProduct', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product_uid){
        // Validation
        $validatedData = $request->validate([
            'category_uid' => 'required',
            'product_name' => 'required|string|max:255',
            'long_desc' => 'required',
        ]);

        $update = Product::where('product_uid', $product_uid)->update($validatedData);
        if($update){
            return response()->json([
                'message'=>'Product Updated Successfully!',
                'type'=>'success'
            ]);
        }else{
            return response()->json([
                'message'=>'Something went wrong, try again later!',
                'type'=>'error'
            ]);
        }
    }

    public function getAssets(Request $request, $product_uid){
        $this->checkUserType($request);
        $html = 'No Assets Found!, Please Upload some.';
        $product = Product::select('product_uid','product_assets')->where('product_uid' , $product_uid)->first();

        
        if(!empty($product->product_assets)){

            $assetData = json_decode($product->product_assets,true);
            if(count($assetData) > 0 ){

                $html = '';
                foreach($assetData as $key => $singleData){
                    $assets = "<img class='mb-3' src='".env('STORAGE_URL').$singleData['path']."' alt='' style='height: 100px;border: 1px solid #000;'>";
                    $html .= "<hr><div class='mb-3' style='display:flex;flex-direction: column;'>$assets<button onclick=deleteAsset('$product_uid','$key') class='btn btn-danger' style='width:max-content'>delete Asset</button></div>";
                }

                return response()->json([
                    'message' => ' Assets Found!',
                    'type' => 'success',
                    'html' => $html
                ]);
            }else{
                return response()->json([
                    'message' => 'No Assets Found! Add New',
                    'type' => 'error',
                    'html' => $html
                ]);
            }
        }else{
            return response()->json([
                'message' => 'No Assets Found! Add New',
                'type' => 'error',
                'html' => $html
            ]);
        }
    }

    public function getSepcifications(Request $request, $product_uid){
        $this->checkUserType($request);
        $html = 'No Assets Found!, Please Upload some.';
        $product = Product::select('product_uid','product_specification_assets')->where('product_uid' , $product_uid)->first();

        if(!empty($product->product_specification_assets)){

            $assetData = json_decode($product->product_specification_assets,true);
            if(count($assetData) > 0 ){

                $html = '';
                foreach($assetData as $key => $singleData){
                    $original_filename = $singleData['original_filename'];
                    $assets = "<iframe  class='mb-3' src='".env('STORAGE_URL').$singleData['path']."#zoom=150' alt='' style='height: 120px;width:auto;border: 1px solid #000;'></iframe>";
                    $html .= "<hr><div class='mb-3' style='display:flex;flex-direction: column;width: 180px;'>$assets <span style='width:80px'><b>NAME:</b> $original_filename</span><button onclick=deleteSpecificationAsset('$product_uid','$key') class='btn btn-danger' style='width:max-content'>Delete Specification</button></div>";
                }

                return response()->json([
                    'message' => ' Assets Found!',
                    'type' => 'success',
                    'html' => $html
                ]);
            }else{
                return response()->json([
                    'message' => 'No Assets Found! Add New',
                    'type' => 'error',
                    'html' => $html
                ]);
            }
        }else{
            return response()->json([
                'message' => 'No Assets Found! Add New',
                'type' => 'error',
                'html' => $html
            ]);
        }
    }

    public function addAssets(Request $request){

        $validatedData = $request->validate([
            'product_uid' => 'required|string',
            'products_assets.*' => 'file|mimes:jpeg,png,jpg,webp|max:20480',
        ]);

        if(empty($request->product_assets) || count($request->product_assets) <= 0){
            return response()->json([
                'message'=>'Please select atleast 1 file!',
                'type'=>'error'
            ]);
        }


        $productDetails = Product::select('product_assets')->where('product_uid', $validatedData['product_uid'])->first();
        if($productDetails && isset($productDetails->product_assets)){
            $assetsArr = json_decode($productDetails->product_assets, true);
            
            $assets = count($assetsArr) > 0 ? $assetsArr : [];

            foreach ($request->file('product_assets') as $asset) {
                $type = $asset->getMimeType();
            
                $filename = Str::random(20) . '.' . $asset->getClientOriginalExtension();
                $path = $asset->storeAs('product_assets/' . $validatedData['product_uid'], $filename);
                
                $assetPath = 'storage/app/' . $path;
                $assets[] = [
                    'path' => $assetPath,
                ];            
            }
    
            $product_assets = json_encode($assets);
            $update = Product::where('product_uid',$validatedData['product_uid'])->update(['product_assets' => $product_assets]);
            if($update){
                return response()->json([
                    'message'=>'Product  Assets Updated Successfully!',
                    'type'=>'success'
                ]);
            }else{
                return response()->json([
                    'message'=>'Something went wrong, try again later!',
                    'type'=>'error'
                ]);
            }
        }else{
            return response()->json([
                'message'=>'Something went wrong, try again later!',
                'type'=>'error'
            ]);
        }
    }

    public function addSpecification(Request $request){

        $validatedData = $request->validate([
            'product_uid' => 'required|string',
            'product_specification_assets.*' => 'file|mimes:pdf|max:20480',
        ]);

        if(empty($request->product_specification_assets) || count($request->product_specification_assets) <= 0){
            return response()->json([
                'message'=>'Please select atleast 1 file!',
                'type'=>'error'
            ]);
        }


        $productDetails = Product::select('product_specification_assets')->where('product_uid', $validatedData['product_uid'])->first();
        
        if($productDetails && isset($productDetails->product_specification_assets)){
            $assetsArr = json_decode($productDetails->product_specification_assets, true);
            
            $assets = count($assetsArr) > 0 ? $assetsArr : [];

            foreach ($request->file('product_specification_assets') as $asset) {
                $type = $asset->getMimeType();
            
                $filename = Str::random(20) . '.' . $asset->getClientOriginalExtension();
                $path = $asset->storeAs('product_specification_assets/' . $validatedData['product_uid'], $filename);
                
                $assetPath = 'storage/app/' . $path;
                $assets[] = [
                    'original_filename' => $asset->getClientOriginalName(),
                    'path' => $assetPath,
                ];            
            }
    
            $product_specification_assets = json_encode($assets);
            
            $update = Product::where('product_uid',$validatedData['product_uid'])->update(['product_specification_assets' => $product_specification_assets]);
            if($update){
                return response()->json([
                    'message'=>'Product Specification Updated Successfully!',
                    'type'=>'success'
                ]);
            }else{
                return response()->json([
                    'message'=>'Something went wrong, try again later!',
                    'type'=>'error'
                ]);
            }
        }else{
            return response()->json([
                'message'=>'Something went wrong, try again later!',
                'type'=>'error'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, $product_uid){
        $this->checkUserType($request);
        $product = Product::where('product_uid' , $product_uid)->first();

        if($product){

            if($product->status == '1')
                $status = '0';
            else if($product->status == '0')
                $status = '1';

            $delete = Product::where('product_uid' , $product_uid)->update(['status' => $status]);

            if($delete){
                return response()->json([
                    'message'=>'Product  Status Updated Successfully!',
                    'type'=>'success',
                    'status' => ($status == '1' ? 'Active' : 'Deactive')
                ]);
            }else{
                return response()->json([
                    'message'=>'Something went wrong, try again later!',
                    'type'=>'error'
                ]);
            }
        }else{
            return response()->json([
                'message'=>'Invalid  Unique ID!',
                'type'=>'error'
            ]);
        }
    }

    public function deleteAssets(Request $request, $product_uid, $key){
        $this->checkUserType($request);
        // remove image from product DB

        $productDetails = Product::select('product_assets')->where('product_uid', $product_uid)->first();
        
        if($productDetails && isset($productDetails->product_assets)){

            $json_data = $productDetails->product_assets;
            $assetsArr = json_decode($json_data, true);

            if(isset($assetsArr[$key])){
                $imagePath = $assetsArr[$key]['path']; // Specify the image path

               
                if ($this->deleteImage($imagePath)) {

                    unset($assetsArr[$key]);
                    $newArr = array_values($assetsArr);
                    Product::where('product_uid', $product_uid)->update(['product_assets' => json_encode($newArr)]);

                    return response()->json([
                        'message'=>'Product  Asset deleted Successfully!',
                        'type'=>'success'
                    ]);
                }else {
                    return response()->json([
                        'message'=>'Something went wrong, try again later',
                        'type'=>'error'
                    ]);
                }
            }else {
                return response()->json([
                    'message'=>'Something went wrong, try again later.',
                    'type'=>'error'
                ]);
            }
        }
    }

    public function deleteSpecifications(Request $request, $product_uid, $key){
        $this->checkUserType($request);
        // remove image from product DB

        $productDetails = Product::select('product_specification_assets')->where('product_uid', $product_uid)->first();
        
        if($productDetails && isset($productDetails->product_specification_assets)){

            $json_data = $productDetails->product_specification_assets;
            $assetsArr = json_decode($json_data, true);

            if(isset($assetsArr[$key])){
                $imagePath = $assetsArr[$key]['path']; // Specify the image path

               
                if ($this->deleteImage($imagePath)) {

                    unset($assetsArr[$key]);
                    $newArr = array_values($assetsArr);
                    Product::where('product_uid', $product_uid)->update(['product_specification_assets' => json_encode($newArr)]);

                    return response()->json([
                        'message'=>'Product Specification Assets deleted Successfully!',
                        'type'=>'success'
                    ]);
                }else {
                    return response()->json([
                        'message'=>'Something went wrong, try again later',
                        'type'=>'error'
                    ]);
                }
            }else {
                return response()->json([
                    'message'=>'Something went wrong, try again later.',
                    'type'=>'error'
                ]);
            }
        }
    }

    public function deleteImage($imagePath){
        if (file_exists($imagePath)) {
            unlink($imagePath);
            return true;
        }
        return false;
    }

    public function checkUserType(Request $request){
        // Check User Type and Redirect
        if($request->session()->has('user_type') && $request->session()->get('user_type') != 'admin')
          return redirect()->route('adminlogin');
    }
}
