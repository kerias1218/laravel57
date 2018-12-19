<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }

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
        $article = new \App\Article;

        return view('articles.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(\App\Http\Requests\ArticlesRequest $request) {

        //$article =\App\User::find(1)->articles()->create($request->all());
        $article = $request->user()->articles()->create($request->all());

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
    public function show(\App\Article $article)
    {
        //return __METHOD__ .' show '.$id;
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\app\Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\ArticlesRequest $request, \App\Article $article)
    {
        //return __METHOD__ .' update '.$id;
        $article->update($request->all());
        //아래 오류 발생
        //flash()->sucess('수정하신 내용을 저장 완료');


        return redirect(route('articles.show', $article->id))
            ->with('flash_message','수정하신 내용 저장 완료');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();
        return response()->json([],204);
    }
}
