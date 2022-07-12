@include('top')
@include('header')
</section>
<section class="containerClients">
    <div class="clientTable yellowClients">
        <h1>Klientų sarašas</h1>
    </div>
    <div class="clientTable">
        <div class="clientList">
            @forelse($accounts as $account)
            <div class="clientListRow">
                <div class="clientListLine">Klientas:{{$account->id}} || {{$account->firstname}} {{$account->lastname}} || Saskaita:{{$account->accountNumber}} || Likutis: € {{number_format($account->cash , 2)}}</div>
                <div class="clientListLineBtn"><a class="clientBtnR" href="{{route('accounts_add', $account)}}">Redaguoti sąskaitą</a></div>
            </div>
            <hr>
            <br>
            @empty
            <h2>No accounts!</h2>
            @endforelse
        </div>
    </div>
</section>
@include('footer')
