<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarigoldBank</title>
    @vite(['resources/sass/client.scss'])
    @vite(['resources/sass/account.scss'])
    @vite(['resources/sass/style.scss'])
    @vite(['resources/sass/app.scss'])
</head>
<body>
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
    @include('post.form')
    @include('footer')
</body>
</html>
