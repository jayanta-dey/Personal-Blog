<?php
namespace App\Http\Controllers\Home;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Carbon\Carbon;


class PortfolioController extends Controller
{
    public function AllPortfolio()
   {
    $portfolio = Portfolio::latest()->get();
    return view('admin.portfolio.all_portfolio', compact('portfolio'));
   }

   public function AddPortfolio()
   {
    return view('admin.portfolio.add_portfolio');
   }

   public function StorePortfolio(Request $request)
   {
    $request->validate([
        'portfolio_name' => 'required',
        'portfolio_title' => 'required',
        'portfolio_image' => 'required',
    ],[
        'portfolio_name.required' => 'Please Enter Portfolio Name.',
        'portfolio_title.required' => 'Please Select Portfolio title',
    ]);
 
        $manager = new ImageManager(new Driver());
        $image = $request-> file('portfolio_image');
        $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
        $img = $manager ->read ($request->file('portfolio_image'));
        $img = $img->resize(1020,519);
        $img->toJpeg(80)->save(base_path('public/upload/portfolio_image/'.$name_gen));
        $save = 'upload/portfolio_image/' . $name_gen;

     Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $save,
            'created_at' => Carbon::now(),
        ]);
        
        
        $notification = array(
            'message' => 'Portfolio Inserted With Image Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    return redirect()->route('all.portfolio')->with('success', 'Portfolio Inserted Successfully');

   }




   
}

