<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{

    //single Image Upload to public Folder
    public function pubSingle()
    {
        return view('backend.pages.images.pub-single');
    }

    public function pubSingleUpload(Request $request)
    {
        // dd($request->all());

        //Full Name
        // dd($request->image->getClientOriginalName());

        //Extension
        // dd($request->image->getClientOriginalExtension());

        //size
        // dd($request->image->getSize());

        //Mime
        //dd($request->image->getMimeType());

        //valid File
        // dd($request->image->isValid());

        //check image

        // dd($request->file('image'));

        //Validation

        $this->validate($request,[

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        //Image Upload

        // $image = $request->file('image');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileNameToStore = 'photo-' . md5(uniqid()) . '-' . time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images'), $fileNameToStore);
            // $image->move(public_path('assets/uploads'), $fileNameToStore);

        }

        return redirect()->back();

        
    }


    //multiple Image Upload to public Folder
    public function pubMultiple()
    {
        return view('backend.pages.images.pub-multiple');
    }


    public function pubMultipleUpload(Request $request){
        // dd($request->all());

         //Validation

         $this->validate($request,[

            'images' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //Upload Images

        if($request->hasFile('images')){
            $images = $request->file('images');

            foreach($images as $image){

                $fileNameToStore = 'multiple-photo-' . md5(uniqid()) . '-' . time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('assets/uploads'), $fileNameToStore);

            }
        }

        return redirect()->back();
    }


      //single Image Upload to public Folder
      public function storeSingle()
      {
          return view('backend.pages.images.store-single');
      }


      public function storeSingleUpload(Request $request){

        $this->validate($request,[

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ],[
            // 'image.mimes' => 'Your Uploaded Image does not match our requirements',
            'image' => 'Your Uploaded Image does not match our requirements',
        ]);


            //Image Upload

        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileNameToStore = 'photo-' . md5(uniqid()) . '-' . time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/uploads', $fileNameToStore);
            // $image->move(public_path('assets/uploads'), $fileNameToStore);

        }

        return redirect()->back();

      }



         //Multiple Image Upload to public Folder
         public function storeMultiple()
         {
             return view('backend.pages.images.store-multiple');
         }


         public function storeMultipleUpload(Request $request){
            // dd($request->all());
    
             //Validation
    
             $this->validate($request,[
    
                'images' => 'required',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
    
            ]);
    
            //Upload Images
    
            if($request->hasFile('images')){
                $images = $request->file('images');
    
                foreach($images as $image){
    
                    $fileNameToStore = 'multiple-photo-' . md5(uniqid()) . '-' . time() . '.' . $image->getClientOriginalExtension();
    
                    $image->storeAs('public/uploads', $fileNameToStore);
    
                }
            }
    
            return redirect()->back();
        }
    
}
