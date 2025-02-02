<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::orderBy('id','desc')->get();
        $data['page_type'] = 'categoryAll'; 
        return view('admin.category.manageCategories', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_type'] = 'categoryAdd'; 
        return view('admin.category.addCategory', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string',
            'short_desc' => 'required',
            'long_desc' => 'required',
        ]);

        $assets = [];
        $categoryUid = (string)Str::uuid()->getHex();

        $validatedData['category_uid'] = $categoryUid;
        $validatedData['property_assets'] = json_encode($assets);
        $validatedData['status'] = '1';
        $update = Category::create($validatedData);
        if($update){
            return response()->json([
                'message'=>'Category Category Created Successfully!',
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
     * Display the specified resource.
     */
    public function show(Category $Category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($category_uid)
    {
        $data['page_type'] = 'categoryEdit'; 
        $data['category_data'] = Category::where('category_uid', $category_uid)->first(); 
        return view('admin.category.editCategory', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $category_uid)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string',
            'short_desc' => 'required',
            'long_desc' => 'required',
        ]);

        $update = Category::where('category_uid',$category_uid)->update($validatedData);
        if($update){
            return response()->json([
                'message'=>'Category Category Updated Successfully!',
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
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, $category_uid)
    {
        $this->checkUserType($request);
        $Category = Category::where('category_uid' , $category_uid)->first();

        if($Category){

            if($Category->status == '1')
                $status = '0';
            else if($Category->status == '0')
                $status = '1';

            $delete = Category::where('category_uid' , $category_uid)->update(['status' => $status]);

            if($delete){
                return response()->json([
                    'message'=>'Category Category Status Updated Successfully!',
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
                'message'=>'Invalid Category Unique ID!',
                'type'=>'error'
            ]);
        }
    }

    public function deleteAssets(Request $request, $category_uid, $key){
        $this->checkUserType($request);
        // remove image from Category DB
        $propertyDetails = Category::select('property_assets')->where('category_uid', $category_uid)->first();
        
        if($propertyDetails && isset($propertyDetails->property_assets)){
            $assetsArr = json_decode($propertyDetails->property_assets, true);

            if(isset($assetsArr[$key])){
                $imagePath = $assetsArr[$key]['path']; // Specify the image path

               
                if ($this->deleteImage($imagePath)) {

                    unset($assetsArr[$key]);
                    $newArr = json_encode($assetsArr);
                    Category::where('category_uid', $category_uid)->update(['property_assets' => $newArr]);

                    return response()->json([
                        'message'=>'Category Category Asset deleted Successfully!',
                        'type'=>'success'
                    ]);
                }else {
                    return response()->json([
                        'message'=>'Something went wrong, try again later.aasa',
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

    public function deleteImage($imagePath)
    {
        if (file_exists($imagePath)) {
            unlink($imagePath);
            return true;
        }
        return false;
    }

    public function checkUserType(Request $request){
        // Check User Type and Redirect
        if($request->session()->has('user_type') && $request->session()->get('user_type') != 'admin')
          return redirect()->route('index');
    }
}
