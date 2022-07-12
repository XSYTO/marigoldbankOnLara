@include('top')
<section class="header">
    <div class="welcome">
        <h1>Marigold<span style="color:black;">Bank</span></h1>
        <img src="../marigold1.png" alt="icon" class="">
    </div>
    <div class="links">
        <a href="../home">Pagrindinis</a>
        <a href="../clients">Klientų sarašas</a>
        <a href="../register">Registruoti nauja sąskaitą</a>
        <a href="../login">Prisijungti</a>
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
            </div>
            <div class="ListPrivateB">
                <form action="{{route('accounts_delete', $account)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="clientBtnD">Ištrinti</button>
                </form>
            </div>
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
    </div>
</section>
@include('footer')
