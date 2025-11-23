<?php

namespace Modules\Wishlist\App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Course\App\Models\Course;
use Modules\Wishlist\App\Models\Wishlist;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item_array = array();

        $user = Auth::guard('web')->user();

        $wishlists = Wishlist::where('user_id', $user->id)->get();

        foreach($wishlists as $wishlist){
            $item_array[] = $wishlist->item_id;
        }

        $courses = Course::with('category')->where(['status' => 'enable', 'approved_by_admin' => 'approved'])->whereIn('id', $item_array)->latest()->get();

        return view('wishlist::index', ['courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::guard('web')->user();

        $exist_item = Wishlist::where('user_id', $user->id)->where('item_id', $request->item_id)->first();

        if(!$exist_item){
            $wishlist = new Wishlist();
            $wishlist->item_id = $request->item_id;
            $wishlist->user_id = $user->id;
            $wishlist->save();

            $notify_message= trans('translate.Item added to wishlist');
            return response()->json(['message' => $notify_message, 'type' => 'added']);
        }else{

            $exist_item->delete();

            $notify_message= trans('translate.Item removed from wishlist');
            return response()->json(['message' => $notify_message,  'type' => 'removed']);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::guard('web')->user();

        Wishlist::where('user_id', $user->id)->where('item_id', $id)->delete();

        $notify_message= trans('translate.Item removed to wishlist');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }
}
