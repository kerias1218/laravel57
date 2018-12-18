<?php

namespace App\Listeners;

use Mail;

class ArticlesEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  article.created  $event
     * @return void
     */

    public function handle(\App\Events\ArticlesEvent $event)
    {
        if($event->action === 'created') {
            \Log::info(sprintf('새로운 글 등록: %s',$event->article->title));

            $article = $event->article;

            Mail::send(
                'emails.articles.created',
                compact('article'),
                function($message) use ($article) {
                    $message->to('kerias@naver.com');
                    $message->subject('새글이 등록 '.$article->title);
                }
            );
        }
    }
}
