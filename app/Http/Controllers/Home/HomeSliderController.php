<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class HomeSliderController extends Controller
{
    
    public function HomeSlider()
    {   
        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all',compact('homeslide'));
    } //end method HomeSlider


    public function UpdateSlider(Request $request)
    {   
      
        $slide_id = $request->id;
        if($request->file('home_slide')){
            $manager = new ImageManager(new Driver());
            $image = $request-> file('home_slide');
            $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
            $img = $manager ->read ($request->file('home_slide'));
            $img = $img->resize(636,852);
            $img->toJpeg(80)->save(base_path('public/upload/home_slide_image/'.$name_gen));
            $save = 'upload/home_slide_image/' . $name_gen;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'url' => $request->url,
                'home_slide' => $save,
            ]);
            
            
            $notification = array(
                'message' => 'Home Slide Updated With Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{
            HomeSlide :: findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'url' => $request->url,
            ]);

            $notification = array(
                'message' => 'Home Slide Updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }

        


    } //end method UpdateSlider
   
} //end class HomeSliderController










/*  public function UpdateSlider(Request $request)
{   
      
    $slide_id = $request->id;
    if($request->file('home_slide')){

        $image = $request-> file('home_slide');
        $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
       // Image::make($image)->resize(636,852)->save('upload/home_slide_image/'.$name_gen);
       $image->move(public_path('upload/home_slide_image'), $name_gen);
       $save = 'upload/home_slide_image/' . $name_gen;

        HomeSlide::findOrFail($slide_id)->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'url' => $request->url,
            'home_slide' => $save,
        ]);
        
        
        $notification = array(
            'message' => 'Home Slide Updated With Image Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }else{
        HomeSlide :: findOrFail($slide_id)->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'url' => $request->url,
        ]);

        $notification = array(
            'message' => 'Home Slide Updated Without Image Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    


}*/