<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\OpeningHour;
use App\Models\About;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\Item;
use App\Models\Testimonial;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Media;

class FrontendController extends Controller
{
    public function index()
    {
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $abouts = About::all();
        $categories = Categories::all();
        $subcategories = SubCategories::all();
        $testimonials = Testimonial::all();
        $banners = Banner::all();
        $gallery = Gallery::all();
        $specialItems = Item::where('is_special', 'yes')->get();
        return view('frontend.index', compact('settings','openinghours', 'abouts','categories','subcategories','testimonials', 'banners','specialItems','gallery'));
    }

    public function menu()
    {
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $categories = Categories::all();
        $subcategories = SubCategories::all();
        return view('frontend.menu',compact('settings','openinghours','categories','subcategories'));
    }
    public function about()
    {
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $abouts = About::all();
        return view('frontend.about',compact('settings','openinghours','abouts'));
    }
    public function booktable()
    {
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        return view('frontend.booktable',compact('settings','openinghours'));
    }
    public function detail($id)
    {
        $items = Item::where('subcategory_id', $id)->get();
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $categories = Categories::all();
        $subcategories = SubCategories::all();

        return view('frontend.detail',compact('settings','openinghours','categories','subcategories','items'));
    }

    public function gallery()
    {
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $gallerys = Gallery::all();

        return view('frontend.gallery',compact('settings','openinghours','gallerys'));
    }

    public function media()
    {
        $settings = Settings::all();
        $openinghours = OpeningHour::all();
        $medias = Media::all();

        return view('frontend.media',compact('settings','openinghours','medias'));
    }
}
