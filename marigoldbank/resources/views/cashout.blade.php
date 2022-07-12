@include('top');
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
        <div class="clientList">
            Klientas: {{$account->firstname}} {{$account->lastname}}
            <div>
                Likutis: {{$account->cash}}
            </div>
        </div>
    </div>
    <div class="clientTable yellowClients">
        <h1>Nuskaičiuoti lėšas</h1>
    </div>
    <div class="clientTable">
        <div class="addOrRem">
            <form action="{{route('accounts_update2', $account)}}" method="post">
                Suma:&emsp;<input type="number" name="out" min="1" max="{{$account->cash}}">
                @csrf
                @method('put')
                <button class="clientBtn" type="submit">Patvirtinti</button>
            </form>
        </div>
    </div>
</section>
@include('footer');
