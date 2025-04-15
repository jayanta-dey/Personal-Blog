<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;




class HomeAboutController extends Controller
{
    public function HomeAbout()
    { 
        $abouts = About::find(1);
        return view('admin.about_page.about_page_all',compact('abouts'));
    } //end method HomeAbout
    
    
    public function AboutUpdate(Request $request)

    {   
      
      
        $about = $request->id;
        if($request->file('about_image')){
            $manager = new ImageManager(new Driver());
            $image = $request-> file('about_image');
            $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
            $img = $manager ->read ($request->file('about_image'));
            $img = $img->resize(523,605);
            $img->toJpeg(80)->save(base_path('public/upload/about_page_image/'.$name_gen));
            $save = 'upload/about_page_image/' . $name_gen;

            About::findOrFail($about)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save,
               
            ]);
            
            
            $notification = array(
                'message' => 'About Page Updated With Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{
            About::findOrFail($about)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'About Page Updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }


    } 

    public function HomeMainAbout()
    { 
        $abouts = About::find(1);
        return view('frontend.about',compact('abouts'));
    } //end method HomeAbout


    public function AboutMultiImage()
    {
        return view('admin.about_page.about_multi_image');
    }
}

//end controller
