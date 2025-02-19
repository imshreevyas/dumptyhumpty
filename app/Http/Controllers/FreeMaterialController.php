<?php

namespace App\Http\Controllers;

use App\Models\FreeMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FreeMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkUserType();
        $data['data'] = FreeMaterial::orderBy('id','desc')->paginate(1);
        $data['page_type'] = 'freeMaterialAll'; 
        return view('admin.free_material.manageFreeMaterial', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkUserType();
        $data['page_type'] = 'freeMaterialAdd'; 
        return view('admin.free_material.addFreeMaterial', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'file_og_name' => 'required',
            'age_group' => 'required',
            'file' => 'required|file|mimes:pdf,jpeg,png,jpg,webp,PNG,JPG|max:20480',
        ]);

        $assets = [];
        $fileUid = Str::uuid()->toString();
        $validatedData['file_uid'] = $fileUid;
        $validatedData['status'] = '1';

        if ($request->hasFile('file')) {
            $asset = $request->file('file'); // Get the single file
            $filename = Str::random(20).'-'.time() . '.' . $asset->getClientOriginalExtension();
            $directory = 'free_materials';

            // Ensure the directory exists and set permissions
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
                chmod(storage_path('app/public/' . $directory), 0775);
            }

            $path = $asset->storeAs($directory, $filename, 'public');
            $assetPath = Storage::url($path);
            $banner_url = $assetPath;
            $validatedData['file_url'] = $banner_url;
        }

        $create = FreeMaterial::create($validatedData);
        if($create){
            return response()->json([
                'message'=>'Free Material Created Successfully!',
                'type'=>'success'
            ]);
        }else{
            $this->deleteImage($validatedData['file_url']);
            return response()->json([
                'message'=>'Something went wrong, try again later!',
                'type'=>'error'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FreeMaterial $freeMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($file_uid)
    {
        checkUserType();
        $data['page_type'] = 'freeMaterialEdit'; 
        $data['data'] = FreeMaterial::where('file_uid', $file_uid)->first(); 
        return view('admin.free_material.editFreeMaterial', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FreeMaterial $freeMaterial)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, $category_uid)
    {
        $Program = Program::where('category_uid' , $category_uid)->first();

        if($Program){

            if($Program->status == '1')
                $status = '0';
            else if($Program->status == '0')
                $status = '1';

            $delete = Program::where('category_uid' , $category_uid)->update(['status' => $status]);

            if($delete){
                return response()->json([
                    'message'=>'Program Status Updated Successfully!',
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
                'message'=>'Invalid Program Unique ID!',
                'type'=>'error'
            ]);
        }
    }

    public function getAssets($file_uid){

        $html = 'No Assets Found!, Please Upload some.';
        $fileData = FreeMaterial::select('file_uid', 'file_og_name', 'file_url')->where('file_uid' , $file_uid)->first();

        
        if(!empty($fileData->file_url)){

            $html = '';
            $assets = "<a class='mb-3' target='_blank' href='".env('ASSET_URL').$fileData->file_url."' alt='' style='padding:10px;border: 1px solid #000;'>$fileData->file_og_name</a>";
            $html .= "<div class='mb-3' style='display:flex;align-items: center;justify-content: center;width: 100%;'>$assets</div>";

            return response()->json([
                'message' => 'program Assets Found!',
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
    }

    public function addAssets(Request $request){

        $validatedData = $request->validate([
            'file_uid' => 'required|string',
            'file' => 'required|file|mimes:pdf,jpeg,png,jpg,webp,PNG,JPG|max:20480',
        ]);

        // Check if file exists
        if (!$request->hasFile('file')) {
            return response()->json([
                'message' => 'Please select at least 1 file!',
                'type' => 'error'
            ]);
        }
        
        $fileData = FreeMaterial::where('file_uid' , $validatedData['file_uid'])->first(); 

        if (!$fileData) {
            return response()->json([
                'message' => 'Free Material not found!',
                'type' => 'error'
            ]);
        }

        // Delete the old image if it exists
        if ($fileData->file_url) {
            $oldImagePath = str_replace('/storage/', '', $fileData->file_url);
            if (Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
        }

        // Handle new file upload
        $asset = $request->file('file'); // Get the single file
        $filename = Str::random(20).'-'.time() . '.' . $asset->getClientOriginalExtension();
        $directory = 'free_materials';

        // Ensure the directory exists and set permissions
        if (!Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory);
            chmod(storage_path('app/public/' . $directory), 0775);
        }

        $path = $asset->storeAs($directory, $filename, 'public');
        $assetPath = Storage::url($path);
        $banner_url = $assetPath;
        $fileData->file_url = $assetPath;
        $update = $fileData->save(); // Save the changes

        if($update){
            return response()->json([
                'message'=>'Free Material Updated Successfully!',
                'type'=>'success'
            ]);
        }else{
            return response()->json([
                'message'=>'Something went wrong, try again later!',
                'type'=>'error'
            ]);
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
}

