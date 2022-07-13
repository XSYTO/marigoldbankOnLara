@include('top');
<section class="header">
    <div class="welcome">
        <h1>Marigold<span style="color:black;">Bank</span></h1>
        <img src="marigold1.png" alt="icon" class="">
    </div>
    <div class="links">
        <a href="home">Pagrindinis</a>
        <a href="clients">Klientų sarašas</a>
        <a href="registerClient">Registruoti nauja sąskaitą</a>
        <a href="register">Registruotis</a>
    </div>
</section>
    <section class="container">
        <img src="{{asset('icons8-merchant-account-96.png')}}" alt="icon" class="img pulse">
        <div class="formParent yellow">
            <h1>Prisijungti</h1>
        </div>
        <div></div>
        <div class="formParent">
             <form method="POST" action="{{ route('login') }}" class="form">
                @csrf
                <label for="email">El.paštas :</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                        </span>
                @enderror

                <label for="password">Slaptažodis :</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="privatebtn">
                    <button type="submit" name="submit" class="registerbtn">Prisijungti</button>
                </div>
            </form><br><br>
        </div>
    </section>
@include('footer');
