<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function getNews(){
        return News::all();
    }

    public function deleteNews(Request $request){
        News::find($request->id)->delete();
        $result = [
            'status' => true,
            'message' => 'news deleted',
        ];
        return $result;
    }

    public function addNews(Request $request){

        $news = new  News([
            'title' => $request->title,
            'description' => $request->body,
            'img'=>'default'
        ]);

        $news->save();

        return [
            'status' => true,
            'message' => 'News created',
        ];
    }
}
