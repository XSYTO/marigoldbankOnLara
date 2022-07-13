<section class="container">
    <img src="icons8-merchant-account-96.png" alt="icon" class="img pulse">
    <div class="formParent yellow">
        <h1>Atidaryti sąskaitą</h1>
    </div>
    <div></div>
    <div class="formParent">
        <form action="{{route('accounts_store')}}" method="post" class="form"required>
            <label for="firstname">Vardas :</label>
            <input class="forminput" type="text" id="firstname" name="firstname"required>

            <label for="lastname">Pavardė :</label>
            <input class="forminput" type="text" id="lastname" name="lastname"required>

            <label for="password">Slaptažodis :</label>
            <input class="forminput"  type="password" id="password" name="password"required>
            
            <label for="email">El.paštas :</label>
            <input class="forminput" type="email" name="email" value="{{$email}}" required>

            <label for=" address">Adresas :</label>
            <input class="forminput" type="address" id="address" name="address" value="{{$address}}"required>

            <label for="phone">Telefonas :</label>
            <input class="forminput" type="tel" id="phone" name="phone" value="{{$phone}}"required><br><br>
            <div>
                <p class="center"> <input style="vertical-align: baseline" type="checkbox" name="agree"required> Atidarydamas sąskaitą klientas sutinka su mūsų <a href="#">Terms & Privacy</a>.</p><br>
                <input type="hidden" name="_method" value="post">
            @csrf
                <button type="submit" name="submit" class="registerbtn">Registruoti</button>
            </div>
        </form>
        {{-- @isset($message2)
            {!!$message2!!}
        @endisset --}}
    </div>
</section>
