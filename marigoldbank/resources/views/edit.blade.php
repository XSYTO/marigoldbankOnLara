@include('top')
<section class="header">
    <div class="welcome">
        <h1>Marigold<span style="color:black;">Bank</span></h1>
        <img src="../marigold1.png" alt="icon" class="">
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
        <h1>Sąskaita</h1>
    </div>
    <div class="clientTable">
        <div class="clientListPrivate">
            <div class="ListPrivate">
                {{$account->accountNumber}} {{$account->firstname}} {{$account->lastname}}
                
            </div>
            <div class="ListPrivateA">
                Likutis: € {{number_format($account->cash , 2)}}
                @isset($message3)
                {!!$message3!!}
                @endisset
                @if($account->cash >= 1000000)
                    <span style='color:red'>Auksinis Klientas :D</span>
                @endif
            </div>
            
            @if(Auth::user()->role > 4)
            <div class="ListPrivateB">
                <form action="{{route('accounts_delete', $account)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="clientBtnD">Ištrinti</button>
                </form>
            </div>
            @endif

        </div>
    </div>
    <div class="clientTable yellowClients">
        <h1>Pridėti lėšas</h1>
    </div>
    <div class="clientTable">
        <div class="addOrRem">
            <form action="{{route('accounts_update', $account)}}" method="post">
                <span class="sumInput">Suma :</span>&emsp;<input type="number" name="cash">
                @csrf
                @method('put')
                <button class="clientBtn" type="submit">Patvirtinti</button>
            </form>
        </div>
        @isset($message1)
            {!!$message1!!}
        @endisset
    </div>
    <div class="clientTable yellowClients">
        <h1>Nuskaičiuoti lėšas</h1>
    </div>
    <div class="clientTable">
        <div class="addOrRem">
            <form action="{{route('accounts_update', $account)}}" method="post">
                <span class="sumInput">Suma :</span>&emsp;<input type="number" name="cash_out">
                @csrf
                @method('put')
                <button class="clientBtn" type="submit">Patvirtinti</button>
            </form>
        </div>
        @isset($message)
            {!!$message!!}
        @endisset
        @isset($message2)
            {!!$message2!!}
        @endisset
        @isset($message4)
            {!!$message4!!}
        @endisset
    </div>
</section>
@include('footer')
