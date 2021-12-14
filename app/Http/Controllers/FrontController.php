<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Tour;
use App\User;
use Wave\Post;
use Wave\Category;
use Carbon\Carbon;
use Cart;

class FrontController extends Controller
{
    public function aboutUs () {
        return view('about');
    }
    public function support () {
        return view('support');
    }

    public function news () {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(6);
        $categories = Category::all();

    	$seo = [
    		'seo_title' => 'Blog',
            'seo_description' => 'Our Blog',
       	];
        return view('news',compact('posts', 'categories', 'seo'));
    }

    public function events () {
      $now = Carbon::now();
      $events = Event::orderBy('created_at', 'DESC')->where('end_date', '<', $now)->paginate(6);


    	$seo = [
    		'seo_title' => 'Events',
        'seo_description' => 'Our Events',
       	];
        return view('events',compact('events',  'seo'));
    }

    public function hotTour () {
        $tours = Tour::where('type', '<>', 10)->orWhereNull('type')->orderBy('created_at', 'DESC')->paginate(6);

    	$seo = [
    		'seo_title' => 'Tours',
            'seo_description' => 'Our Tours',
       	];
        return view('hot-tour',compact('tours',  'seo'));
    }

    public function contact () {
        return view('contact');
    }

    public function franchize () {
        return view ('franchize');
    }

    public function guestInfo() {
        return view('guest-info');
    }

    public function useTerms() {
        return view('use-terms');
    }

    public function privacyPolicy() {
        return view('privacy-policy');
    }
    public function favorites() {


        if (!Cart::isEmpty()) {
          $cart = Cart::getContent();
        }else{
          $cart = null;
        }
        $cart = Cart::getContent();
        return view('theme::guides.favorites', compact('cart'));
      }




    public function addToCart(Request $request)
    {
      if($request){

        $cart = Cart::getContent();

            foreach ($cart as $c) {
              if ($request->product_id ==$c->id) {
                Cart::remove($request->product_id);
                $rid = $request->product_id;
                $guide = User::find($request->product_id);

              }
            }

        if(!isset($rid)){
          $guide = User::find($request->product_id);
          $price = 0;
          $attr = ['image'=>$guide->avatar];
          Cart::add(
            array(
              'id' => $guide->id, // inique row ID
              'name' => $guide->name,
              'price' => $price,
              'image' => $guide->avatar,
              'quantity' => 1,
              'attributes' => $attr,
          )
        );
        }

          $cart = Cart::getContent();
          $cartTotal = 0;
          $rid = null;
          foreach ($cart  as  $ct ) {
            $cartTotal++ ;
          };


        //$cartTotal = Cart::getTotalQuantity();
            return response()->json(['count' => $cartTotal, 'name' => $guide->name, 'rid'=>$rid]);
      }
}


  public function removeCart(Request $request)
  {
    if($request){
      Cart::remove($request->id);
      $cartTotal = Cart::getTotalQuantity();
          return response()->json(['count' => $cartTotal]);
    }
  }

}
