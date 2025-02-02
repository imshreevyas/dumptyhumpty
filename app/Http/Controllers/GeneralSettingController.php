<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->checkUserType($request);
        $data['settings'] = GeneralSetting::paginate(15);
        $data['page_type'] = 'AllSettings';
        return view('admin.general_setting.manageGeneralSettings', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkUserType($request);
        $validatedData = $request->validate([
            'name' => 'required|string',
            'value' => 'required|string',
            'short_desc' => 'nullable|string',
        ]);

        $create = GeneralSetting::create($validatedData);
        if($create){
            return response()->json([
                'message'=>'General Setting Created Successfully!',
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
    public function show(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {  
        $this->checkUserType($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->checkUserType($request);
        $validatedData = $request->validate([
            'name' => 'required|string',
            'value' => 'required|string',
            'short_desc' => 'nullable|string',
        ]);

        $update = GeneralSetting::where('id', $id)->update($validatedData);
        if($update){
            return response()->json([
                'message'=>'General Setting Updated Successfully!',
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
    public function destroy(Request $request, $id = 0)
    {
        $this->checkUserType($request);
        if($id == 0){
            return response()->json([
                'message'=>'Something went wrong, try again later!',
                'type'=>'error'
            ]);
        }
        
        $deleted = GeneralSetting::where('id', $id)->delete();
        if($deleted){
            return response()->json([
                'message'=>'General Setting Deleted Successfully!',
                'type'=>'success'
            ]);
        }else{
            return response()->json([
                'message'=>'Something went wrong, try again later!',
                'type'=>'error'
            ]);
        }
    }

    public function checkUserType(Request $request){
        // Check User Type and Redirect
        if($request->session()->has('user_type') && $request->session()->get('user_type') != 'admin')
          return redirect()->route('adminlogin');
    }
}
