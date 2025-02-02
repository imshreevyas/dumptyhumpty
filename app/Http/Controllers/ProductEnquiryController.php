<?php

namespace App\Http\Controllers;

use App\Models\ProductEnquiry;
use Illuminate\Http\Request;

class ProductEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_type'] = 'productsEnquiryAll'; 
        $data['productEnquiry'] = ProductEnquiry::orderBy('id','desc')->get();
        return view('admin.product.enquiries', $data);
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
    public function store(Request $request, $send_details_on_email = FALSE)
    {
        $validatedData = $request->validate([
            'product_uid' => 'required',
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email:rfc,dns',
            'message' => 'required',
        ]);

        $add = ProductEnquiry::create($validatedData);
        if($add){

            if($send_details_on_email){
                // Send All Details on Email 
            }


            return response()->json([
                'message'=>'Product Enquiry Sent Successfully!',
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
    public function show(productEnqiry $productEnqiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(productEnqiry $productEnqiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, productEnqiry $productEnqiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(productEnqiry $productEnqiry)
    {
        //
    }
}
