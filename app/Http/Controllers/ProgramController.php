<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkUserType();
        $data['data'] = Program::orderBy('id','desc')->get();
        $data['page_type'] = 'programAll'; 
        return view('admin.program.managePrograms', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_type'] = 'programAdd'; 
        return view('admin.program.addProgram', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'slug' => 'unique:programs|required|string',
            'duration' => 'required',
            'short_description' => 'required',
            'age_group' => 'required',
            'duration_for_week' => 'required',
            'long_description' => 'required|nullable',
            'activities' => 'required|nullable',
            'learning_areas' => 'required|nullable',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'seo_keywords' => 'nullable',
            'banner' => 'required|file|mimes:jpeg,png,jpg,webp,PNG,JPG|max:20480',
        ]);

        $banner_url = '';
        $programUid = Str::uuid()->toString();

        if ($request->hasFile('banner')) {
            $asset = $request->file('banner'); // Get the single file
            $filename = Str::random(20) . '.' . $asset->getClientOriginalExtension();
            $directory = 'program_assets/' . $programUid;

            // Ensure the directory exists and set permissions
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
                chmod(storage_path('app/public/' . $directory), 0775);
            }

            $path = $asset->storeAs($directory, $filename, 'public');
            $assetPath = Storage::url($path);
            $banner_url = $assetPath;
            $validatedData['banner'] = $banner_url;
        }

        if ($request->hasFile('page_banner')) {
            $asset = $request->file('page_banner'); // Get the single file
            $filename = Str::random(20) . '.' . $asset->getClientOriginalExtension();
            $directory = 'program_assets/' . $programUid;

            // Ensure the directory exists and set permissions
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
                chmod(storage_path('app/public/' . $directory), 0775);
            }

            $path = $asset->storeAs($directory, $filename, 'public');
            $assetPath = Storage::url($path);
            $page_banner_url = $assetPath;
            $validatedData['page_banner'] = $page_banner_url;
        }


        $validatedData['program_uid'] = $programUid;
        $validatedData['status'] = '1';

        // ✅ Generate Schema.org JSON-LD dynamically
        $schemaData = $this->createProgramSchema($validatedData);
        $validatedData['schema'] = json_encode($schemaData);
        $create = Program::create($validatedData);
        if($create){
            return response()->json([
                'message'=>'Program Created Successfully!',
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
    public function show(Program $Program)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($program_uid)
    {
        $data['page_type'] = 'programEdit'; 
        $data['data'] = Program::where('program_uid', $program_uid)->first(); 
        return view('admin.program.editProgram', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $program_uid)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'slug' => 'unique:programs|required|string',
            'duration' => 'required',
            'short_description' => 'required',
            'age_group' => 'required',
            'duration_for_week' => 'required',
            'long_description' => 'required|nullable',
            'activities' => 'required|nullable',
            'learning_areas' => 'required|nullable',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'seo_keywords' => 'nullable',
        ]);

        $program = Program::where('program_uid' , $program_uid)->first();
        $validatedData['banner'] = $program->banner;
        $schemaData = $this->createProgramSchema($validatedData);
        $new_schema = json_encode($schemaData);

        // Compare existing schema with new schema
        if ($program->schema !== $new_schema) {
            $program->schema = $new_schema;
        }
        
        $update = $program->update($validatedData);
        if($update){
            return response()->json([
                'message'=>'Program Updated Successfully!',
                'type'=>'success'
            ]);
        }else{
            return response()->json([
                'message'=>'Something went wrong, try again later!',
                'type'=>'error'
            ]);
        }
    }  

    public function getAssets($column = 'banner', $program_uid){

        if($column != 'page_' && $column != 'banner'){
            return response()->json([
                'message' => 'Invalid Request!',
                'type' => 'error',
                'html' => ''
            ]);
        }

        $style = 'width:285px;height: 190px;';
        if($column == 'page_'){
            $column = 'page_banner';
            $style = 'width: 500px; height: auto; aspect-ratio: 1920 / 400;';
        }

        $html = 'No Assets Found!, Please Upload some.';
        $program = Program::select('program_uid', $column)->where('program_uid' , $program_uid)->first();

        
        if(!empty($program->$column)){

            $html = '';
            $assets = "<img class='mb-3' src='".env('ASSET_URL').$program->$column."' alt='' style='".$style."border: 1px solid #000;'>";
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
            'program_uid' => 'required|string',
            'asset' => 'required|file|mimes:jpeg,png,jpg|max:20480',
            'update_type' => 'required|string'
        ]);

        // Check if file exists
        if (!$request->hasFile('asset')) {
            return response()->json([
                'message' => 'Please select at least 1 file!',
                'type' => 'error'
            ]);
        }
        
        
        $column_name = $request->update_type == 'page_' ? 'page_banner' : 'banner';
        $program = Program::where('program_uid' , $validatedData['program_uid'])->first(); 

        if (!$program) {
            return response()->json([
                'message' => 'Program not found!',
                'type' => 'error'
            ]);
        }

        // Delete the old image if it exists
        if ($program->$column_name) {
            $oldImagePath = str_replace('/storage/', '', $program->$column_name);
            if (Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
        }

        // Handle new file upload
        $asset = $request->file('asset');
        $filename = Str::random(20) . '.' . $asset->getClientOriginalExtension();
        $directory = 'program_assets/' . $validatedData['program_uid'];

        // Ensure the directory exists
        if (!Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory);
            chmod(storage_path('app/public/' . $directory), 0775);
        }

        // Store the file
        $path = $asset->storeAs($directory, $filename, 'public');
        $assetPath = Storage::url($path);

        // Update program with new asset URL
        $program->$column_name = $assetPath;
        $update = $program->save(); // Save the changes

        if($update){
            return response()->json([
                'message'=>'Program Assets Updated Successfully!',
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
    public function delete(Request $request, $program_uid)
    {
        $Program = Program::where('program_uid' , $program_uid)->first();

        if($Program){

            if($Program->status == '1')
                $status = '0';
            else if($Program->status == '0')
                $status = '1';

            $delete = Program::where('program_uid' , $program_uid)->update(['status' => $status]);

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

    public function deleteAssets($category_uid, $key){
        // remove image from Program DB
        $programDetails = Program::select('program_assets')->where('category_uid', $category_uid)->first();
        
        if($programDetails && isset($programDetails->program_assets)){
            $assetsArr = json_decode($programDetails->program_assets, true);

            if(isset($assetsArr[$key])){
                $imagePath = $assetsArr[$key]['path']; // Specify the image path

               
                if ($this->deleteImage($imagePath)) {

                    unset($assetsArr[$key]);
                    $newArr = json_encode($assetsArr);
                    Program::where('category_uid', $category_uid)->update(['program_assets' => $newArr]);

                    return response()->json([
                        'message'=>'Program Asset deleted Successfully!',
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

    private function createProgramSchema($validatedData){
        return [
            "@context" => "https://schema.org",
            "@type" => "Course",
            "name" => $validatedData['name'],
            "description" => $validatedData['short_description'],
            "provider" => [
                "@type" => "Organization",
                "name" => "Dumpty Humpty",
                "url" => url('/')
            ],
            "educationalLevel" => "preschool", // Moved to the Course level
            "typicalAgeRange" => $validatedData['age_group'], // Changed from "ageRange"
            "occupationalCategory" => "Early Childhood Education",
            "programPrerequisites" => "None",
            "hasCourseInstance" => [
                "@type" => "CourseInstance",
                "courseMode" => "inPerson",
                "location" => [
                    "@type" => "Place",
                    "name" => "School"
                ],
                "offers" => [
                    "@type" => "Offer",
                    "price" => "Paid",
                    "priceCurrency" => "INR",
                    "availability" => "https://schema.org/InStock",
                    "url" => url('/programs/' . $validatedData['slug'])
                ]
            ],
            "image" => env('ASSET_URL').$validatedData['banner']
        ];
    }

    
}
