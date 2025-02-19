<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkUserType();
        $data['data'] = Faq::orderBy('id','desc')->paginate(1);
        $data['page_type'] = 'faqAll'; 
        return view('admin.faq.manageFaqs', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkUserType();
        $data['page_type'] = 'faqAdd'; 
        return view('admin.faq.addFaq', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $assets = [];
        $faqUid = Str::uuid()->toString();
        $validatedData['faq_uid'] = $faqUid;
        $validatedData['status'] = '1';

        $create = Faq::create($validatedData);
        if($create){
            return response()->json([
                'message'=>'Faq Created Successfully!',
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
    public function show(faq $faq)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($faq_uid)
    {
        checkUserType();
        $data['page_type'] = 'faqEdit'; 
        $data['data'] = Faq::where('faq_uid', $faq_uid)->first(); 
        return view('admin.faq.editFaq', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $faq_uid)
    {
        // Validation
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $update = Faq::where('faq_uid',$faq_uid)->update($validatedData);
        if($update){
            return response()->json([
                'message'=>'faq Updated Successfully!',
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
    public function delete(Request $request, $faq_uid)
    {
        $faq = Faq::where('faq_uid' , $faq_uid)->first();

        if($faq){

            if($faq->status == '1')
                $status = '0';
            else if($faq->status == '0')
                $status = '1';

            $delete = Faq::where('faq_uid' , $faq_uid)->update(['status' => $status]);

            if($delete){
                return response()->json([
                    'message'=>'faq faq Status Updated Successfully!',
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
                'message'=>'Invalid faq Unique ID!',
                'type'=>'error'
            ]);
        }
    }

    public function checkUserType(Request $request){
        // Check User Type and Redirect
        if($request->session()->has('user_type') && $request->session()->get('user_type') != 'admin')
          return redirect()->route('index');
    }
}
