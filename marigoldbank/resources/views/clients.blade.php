@include('top')
<section class="header">
    <div class="welcome">
        <h1>Marigold<span style="color:black;">Bank</span></h1>
        <img src="marigold1.png" alt="icon" class="">
    </div>
    <div class="links">
        <a href="{{route('home')}}">Pagrindinis</a>
        <a href="{{route('accounts_index')}}">Klientų sarašas</a>
        <a href="{{route('accounts_create')}}">Registruoti nauja sąskaitą</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Atsijungti</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
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
