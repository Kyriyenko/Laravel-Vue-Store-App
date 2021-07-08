<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function show(){
        return Review::all();
    }

    public function deleteComment(Request $request){
        Review::find($request->id)->delete();

        $result = [
            'status' => true,
            'message' => 'contact deleted',
        ];

        return $result;
    }

    public function sendComment(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'status'=>false,
                'errors'=>  $validator->messages()
            ];
        }

        $comment = new  Review([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);

        $comment->save();

        return [
            'status' => true,
            'message' => 'your comment has been sent',
            'record'=> $comment->toArray()
        ];
    }

}
