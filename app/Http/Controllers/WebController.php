<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutAchievement;
use App\Models\Certification;
use App\Models\Contact;
use App\Models\CustomerReview;
use App\Models\Gallery;
use App\Models\GalleryType;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SliderImage;
use App\Models\UsefulCategory;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;


class WebController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $slider_images = SliderImage::where('active', 1)->orderBy('id', 'desc')->get();
        $contacts = Contact::where('active', 1)->orderBy('id', 'desc')->get();
        $customer_reviews = CustomerReview::where('active', 1)->orderBy('id', 'desc')->get();
        $product_categories = ProductCategory::where('active', 1)->orderBy('id', 'desc')->get();
        $products = Product::where('active', 1)->orderBy('id', 'desc')->get();
        return view('Web.index', compact('customer_reviews', 'product_categories', 'products', 'contacts','slider_images'));
    }

    public function webUsefulLink() {
        $usefulCategories = UsefulCategory::where('active', 1)->orderBy('id', 'desc')->get();
        return view('Web.usefulLinks', compact('usefulCategories'));
    }

    public function webNews() {
        $news = News::where('active', 1)->orderBy('id', 'desc')->get();
        return view('Web.webNews', compact('news'));
    }

    public function webNewsDetails($id) {
        $news = News::where('active', 1)->where('id', '!=', $id)->orderBy('id', 'desc')->get();
        $new = News::where('id', $id)->first();
        return view('Web.webNewsDetails', compact('new', 'news'));
    }

    public function webCertifications() {
        $certifications = Certification::where('active', 1)->orderBy('id', 'desc')->get();
        return view('Web.webCertifications', compact('certifications'));
    }

    public function webContact() {
        $contacts = Contact::where('active', 1)->orderBy('id', 'desc')->get();
        return view('Web.webContact', compact('contacts'));
    }

    public function webAbout() {
        $abouts = About::where('active', 1)->orderBy('id', 'desc')->get();
        $aboutAchievement = AboutAchievement::where('active', 1)->first();
        return view('Web.webAbout', compact('abouts', 'aboutAchievement'));
    }

    public function webProductDetails($id) {
        $product = Product::where('id', $id)->first();
        $products = Product::where('active', 1)->where('id', '!=', $id)->where('product_category_id', '=', $product->product_category_id)->limit(3)->orderBy('id', 'desc')->get();
        return view('Web.webProductDetails', compact('product', 'products'));
    }

    public function webGallery() {
        $galleryTypes = GalleryType::where('active', 1)->get();
        return view('Web.webGallery', compact('galleryTypes'));
    }

    public function webProductCategories() {
        $product_categories = ProductCategory::where('active', 1)->orderBy('id', 'desc')->get();
        $products = Product::where('active', 1)->orderBy('id', 'desc')->get();
        return view('Web.webProductCategory', compact('product_categories', 'products'));
    }

    public function galleryTypeImages(Request $request) {
        $id = $request->input('id');
        $galleries = Gallery::where('gallery_type_id', $id)->where('active', 1)->get();
        $view = View::make('Web.webGalleryTypeImages')->with('galleries', $galleries)->render();
        return response()->json(['view' => $view]);
    }

    public function webProductSearch(Request $request) {
        $products = array();
        $flag = 0;
        $valueToSearch = $request->input('value');
        $valueToSearch = trim($valueToSearch);
        if ($valueToSearch != '') {
            $products = Product::where('arabic_name', 'like', "%$valueToSearch%")->orWhere('english_name', 'like', "%$valueToSearch%")->get();
        }
        if ($valueToSearch == '') {
            $products = Product::orderBy('id', 'desc')->paginate(10);
        }
        if (empty($products)) {
            $flag = 1;
        }
        $product_categories = ProductCategory::where('active', 1)->get();
        $view = View::make('Web.webProductSearch')->with('products', $products)->with('product_categories', $product_categories)->render();
        return response()->json(['flag' => $flag, 'view' => $view]);
    }

    public function sendMessage(Request $request) {

//        $data = $request->all();
//        dd($data);
//        Mail::send('emails.test', $data, function ($message) {
//            dd($data);
//            $message->to('dev.yahiamomtaz@gmail.com','nourhan')->subject('hello student');
////             $message->to('dev.YahiaMomtaz@gmail.com','nourhan')->subject('hello student');
//        });
//

        $data = $request->all();
        $mailMessage =$data['message'];
        Mail::send('emails.test', ['mailMessage' =>$mailMessage ], function($message) use ( $data ) {
            $message->to('dev.yahiamomtaz@gmail.com', 'nourhan')->subject($data ['name']."(".$data ['email'].")");
        });
    }

    public function webProductCategory($id) {
        $product_categories = ProductCategory::where('active', 1)->where('id', '!=', $id)->get();
        $product_category = ProductCategory::where('id', $id)->first();
        return view('Web.webProduct', compact('product_category', 'product_categories'));
    }

}
