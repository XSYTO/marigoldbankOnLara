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
<section class="container">
    <div class="img1">
        <img src="main.jpg" alt="logo">
    </div>
    <p class="inspire"><i style="text-decoration: underline #FFC500;">Geras finansų valdymas</i><br>&emsp;&emsp;&ensp;<i style="text-decoration: underline #FFC500;">tai kelias i sėkmę.</i></p>
</section>
@include('footer')
