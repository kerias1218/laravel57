<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
    public function handle(\App\Events\ArticleCreated $event)
    {
        if($event->action === 'created') {
            \Log::info(sprintf(
                '새로운 포럼글이 등록: %s',
                $event->article->title
            ));
        }

    }
}
