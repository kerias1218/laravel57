<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$articles = \App\Article::with('user')->get();
        $articles = \App\Article::with('user')->latest()->paginate(3);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return __METHOD__ .' create';
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(\App\Http\Requests\ArticlesRequest $request) {

        $article =\App\User::find(1)->articles()->create($request->all());

        if(!$article) {
            return back()->with('flash_message','글이 저장되지 않았습니다.')
                ->withInput();
        }



        event(new \App\Events\ArticlesEvent($article));

        return redirect(route('articles.index'))->with('flash_message','저장되었습니다.');
    }

    public function storeOld(Request $request)
    {
        $rules = [
            'title'=>['required'],
            'content'=>['required','min:10'],
        ];

        $messages = [
            'title.required' => '제목은 필수 입력 항목',
            'content.required' => '본문은 필수 입력 항목',
            'content.min' => '본문은 최소 :min 글자 이상 필요',
        ];


        $this->validate($request, $rules, $messages);

        $article = \App\User::find(1)->articles()
            ->create($request->all());

        if(! $article) {
            return back()->with('flash_message','글이 저장되지 않았습니다.')
                ->withInput();
        }

        return redirect(route('articles.index'))
            ->with('flash_message','글이 저장되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return __METHOD__ .' show '.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return __METHOD__ .' edit '.$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return __METHOD__ .' update '.$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return __METHOD__ .' destory '.$id;
    }
}
