<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\Gallery;
use App\Models\Review;
use App\Models\User;
use App\Models\Commercial;
use App\Models\Residential;
// use App\Models\User;

class AdminController extends Controller
{

    public function adminLoginPage(){
        $data['page_type'] = 'login'; 
        return view('admin.auth.login', $data);
    }

    public function adminLoginPost(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        $credentials = request(['username', 'password']);
        if(!Auth::guard('admin')->attempt($credentials))
        return response()->json([
            'message' => 'Unauthorized',
            'type'=>'failed'
        ], 403);
        
        $request->session()->regenerate();
        session(['user_type' => 'admin']);
        
        return response()->json([
            'message'=>'welcome',
            'type'=>'success'
        ]);

    }

    public function adminDashboard(){
        checkUserType();
        $data['page_type'] = 'dashboard';
        $data['residential'] = Commercial::all()->count();
        $data['commercial'] = Commercial::all()->count();

        $data['programs_count'] = Commercial::all()->count();
        $data['enquiries_count'] = Residential::all()->count();
        $data['reviews_count'] = Residential::all()->count();
        $data['events_count'] = Residential::all()->count();
        $data['free_asset_users_count'] = Residential::all()->count();
        $data['latest_enquiry'] = Residential::all()->count();
        return view('admin.dashboard', $data);
    }

    public function adminAccountPage(){
        checkUserType();
        $data['page_type'] = 'adminAccount';
        $data['account'] = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        return view('admin.account', $data);
    }

    public function adminAccountUpdate($id){
        checkUserType();
        $validatedData = $request->validate([
            'name' => 'required|string',
            'logo' => 'file|mimes:jpeg,png,jpg,mp4,mov,avi|max:20480',
        ]);

        // if Logo set file path
        $assetPath = '';
        if($request->file('logo')){
            $filename = Str::random(20) . '.' . $request->file('logo')->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('admin', $filename);
            $assetPath = 'storage/app/' . $path;
        }

        $validatedData['logo'] = $assetPath;
        $update = Admin::where('id', $id)->update($validatedData);

        if($update){
            return response()->json([
                'message'=>'Admin updated Successfully!',
                'type'=>'success'
            ]);
        }else{
            return response()->json([
                'message'=>'Something went wrong, try again later!',
                'type'=>'error'
            ]);
        }
    }

    public function generatePassword($newPass = 'Admin@123'){
        return Hash::make($newPass);
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return Redirect::to('/admin');
    }
}