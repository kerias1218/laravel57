<?php

namespace App\Listeners;


class lowestPriceMailListener
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
     * @param  lowestPrice  $event
     * @return void
     */
    public function handle($priceUsers)
    {
        dump('이벤트받음222');
        dump($priceUsers->toArray());
    }
}
