<h1>
    {{ $priceUser->pu_keyword }}<br>

    기준가 <small>{{ number_format($priceUser->pu_price) }}</small><br>
    현재 최저가 <small>{{ number_format($priceUser->ePrice) }}</small>
</h1>

<hr/>
<p>
    <a href="http://www.enuri.com/mobilefirst/search.jsp?keyword={{ urlencode($priceUser->pu_keyword) }}" target="_blnak">{{ $priceUser->pu_keyword }}</a><br>
    <small>{{ $priceUser->created_at }}</small>
</p>
<hr/>

<footer>
    이메일은 {{ config('app.url') }} 에서 보냈습니다.
</footer>