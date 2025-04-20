<?php
namespace App\Http\Controllers\Home;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PortfolioController extends Controller
{
    public function AllPortfolio()
   {
    $portfolio = Portfolio::latest()->get();
    return view('admin.portfolio.all_portfolio', compact('portfolio'));
   }

}
