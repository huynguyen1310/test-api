<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $query = Post::query();
       $query->when(request('user_id'), function ($query) {
           return $query->where('user_id',request('user_id'));
       })->when(request('trashed'), function($query) {
           return $query->onlyTrashed();
       })->get();

       $query->when(request('per_page',5), function($query,$per_page) {
           return $query->paginate($per_page);
       });

       return responder()->success($query)->respond();
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return responder()->error('bad request' , $validator->errors()->first())->respond(400);
        }

        return responder()->success(Post::create($request->all()))->respond();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if($post) {
            return responder()->success($post)->respond();
        }else {
            return responder()->error()->respond();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return responder()->error('bad request' , $validator->errors()->first())->respond(400);
        }

        $post->update($request->all());
        return responder()->success($post)->respond();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post) {
            $post->delete();
            return responder()->success()->respond();
        }else {
            return responder()->error()->respond();
        }
    }
}
