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
        <a href="clients">Klientų sarašas</a>
        <a href="registerClient">Registruoti nauja sąskaitą</a>
        <a href="login">Prisijungti</a>
    </div>
</section>
<section class="container">
    <img src="icons8-merchant-account-96.png" alt="icon" class="img pulse">
    <div class="formParent yellow">
        <h1>Darbuotojo registracija</h1>
    </div>
    <div></div>
    <div class="formParent">
        <form method="POST" action="{{ route('register') }}" class="form">
        @csrf
            <label for="firstname">Vardas :</label>
            <input id="name" type="text" class="forminput form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
             </span>
            @enderror
            
            <label for="email">El.paštas :</label>
            <input id="email" type="email" class="forminput form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="password">Slaptažodis :</label>
            <input id="password" type="password" class="forminput form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="password-confirm">Slaptažodis :</label>
            <input id="password-confirm" type="password" class="forminput form-control" name="password_confirmation" required autocomplete="new-password">

            <label for="role">Teises :</label>
            <select name="role" id="role">
            <option value="2" selected="selected">Vadybininkas</option>
            <option value="1" selected="selected">Vyr.Vadybininkas</option>
            </select>


            <p class="center"> <input style="vertical-align: baseline" type="checkbox" name="agree">Sutinkate su klientų, duomenų informacijos saugumų <a href="#">Terms & Privacy</a>.</p><br>
                <input type="hidden" name="_method" value="post">

            <button type="submit" name="submit" class="registerbtnAdmin">Registruoti</button>
            </div>
        </form>
        {{-- @isset($message2)
            {!!$message2!!}
        @endisset --}}
    </div>
</section>
@include('footer')
</body>
</html>