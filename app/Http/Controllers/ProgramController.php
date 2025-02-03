<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
{

    public function __construct() {
        checkUserType();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            $path = $asset->storeAs('program_assets/' . $programUid, $filename);
            $assetPath = 'storage/app/' . $path;
            $banner_url = $assetPath;
        }


        $validatedData['program_uid'] = $programUid;
        $validatedData['banner'] = $banner_url;
        $validatedData['status'] = '1';

        // ✅ Generate Schema.org JSON-LD dynamically
        $schemaData = $this->createProgramSchema($validatedData);

        $validatedData['schema'] = json_encode($schemaData);

        $update = Program::create($validatedData);
        if($update){
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
    public function edit($category_uid)
    {
        $data['page_type'] = 'categoryEdit'; 
        $data['category_data'] = Program::where('category_uid', $category_uid)->first(); 
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

        $update = Program::where('category_uid',$category_uid)->update($validatedData);
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

    public function getAssets($program_uid){
        $html = 'No Assets Found!, Please Upload some.';
        $program = Program::select('program_uid','banner')->where('program_uid' , $program_uid)->first();

        
        if(!empty($program->banner)){

            $html = '';
            $assets = "<img class='mb-3' src='".env('STORAGE_URL').$program->banner."' alt='' style='width:285px;height: 190px;border: 1px solid #000;'>";
            $html .= "<hr><div class='mb-3' style='display:grid;width: 50%;'>$assets</div>";

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
            'property_assets.*' => 'required|file|mimes:jpeg,png,jpg|max:20480',
        ]);

        if(empty($request->property_assets) || count($request->property_assets) <= 0){
            return response()->json([
                'message'=>'Please select atleast 1 file!',
                'type'=>'error'
            ]);
        }


        $propertyDetails = Commercial::select('property_assets')->where('program_uid', $validatedData['program_uid'])->first();
        if($propertyDetails && isset($propertyDetails->property_assets)){
            $assetsArr = json_decode($propertyDetails->property_assets, true);
            
            $assets = count($assetsArr) > 0 ? $assetsArr : [];

            foreach ($request->file('property_assets') as $asset) {
                $type = strpos($asset->getMimeType(), 'video') === 0 ? 'video' : 'image';
            
                $filename = Str::random(20) . '.' . $asset->getClientOriginalExtension();
                $path = $asset->storeAs('property_assets/' . $validatedData['program_uid'], $filename);
                
                $assetPath = 'storage/app/' . $path;
                $assets[] = [
                    'type' => $type,
                    'path' => $assetPath,
                ];            
            }
    
            $property_assets = json_encode($assets);
            $update = Commercial::where('program_uid',$validatedData['program_uid'])->update(['property_assets' => $property_assets]);
            if($update){
                return response()->json([
                    'message'=>'Commercial program Assets Updated Successfully!',
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

    public function deleteAssets($category_uid, $key){
        // remove image from Program DB
        $propertyDetails = Program::select('property_assets')->where('category_uid', $category_uid)->first();
        
        if($propertyDetails && isset($propertyDetails->property_assets)){
            $assetsArr = json_decode($propertyDetails->property_assets, true);

            if(isset($assetsArr[$key])){
                $imagePath = $assetsArr[$key]['path']; // Specify the image path

               
                if ($this->deleteImage($imagePath)) {

                    unset($assetsArr[$key]);
                    $newArr = json_encode($assetsArr);
                    Program::where('category_uid', $category_uid)->update(['property_assets' => $newArr]);

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
                "name" => "Your Organization Name",
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
                    "url" => url('/programs/' . $validatedData['program_uid'])
                ]
            ],
            "image" => $validatedData['banner']
        ];
    }

    
}
