<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function home(){
        return view('shop');
    }
    public function shop(){
        return view('shop');
    }
    public function about(){
        return view('about');
    }

    // Отзывы
    public function review(){
        $reviews = new Contact();
        // dd($reviews->all());
        return view('review', ['reviews' => $reviews->all()]);
    }

    public function delete($id){
        $reviews = Contact::find($id);

        $reviews->delete();
        return redirect('review');
    }

    public function review_update_check(Request $request){
        // Тестовый полигон
        $affected = DB::table('users')
            ->where('id', 1)
            ->update(['votes' => 1]);

    }

    public function update(Request $request, $id){
        $reviews = Contact::find($id);

        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:4|max:500'
        ]);

        $reviews->email = $request->input('email');
        $reviews->subject = $request->input('subject');
        $reviews->message = $request->input('message');

        $reviews->update();

        return redirect('review')->with('status', 'Data updated!');
    }

    // Так стало
    public function review_update($id){
//        $reviews = new Contact();

        // $id = $request->get('id');

        // dd($reviews->all());

        $reviews = Contact::find($id);
        return view('review_update', compact('reviews'));
    //  return view('review_update', ['reviews' => $reviews->find($id)]);
    }

    //Так было

    // public function review_update(Request $request){
    //     $reviews = new Contact();
    //     $id = $request->get('id');

    //     // dd($reviews->all());
    //     return view('review_update', ['reviews' => $reviews->find($id)]);
    // }

    public function review_check(Request $request){
        // dd($request);
        $valid = $request->validate([
            'email' => 'required|min:4|max:100|unique:contacts,email',//unique:contacts,email - Название таблицы, название поля
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:4|max:500'
        ]);

        $review = new Contact();
        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');

        $review->save();

        // return redirect()->route('/review');
        return redirect('review');
    }
    public function shopcart(){
        return view('shop-cart');
    }
    public function shopproduct(){
        return view('shop-product');
    }
}
