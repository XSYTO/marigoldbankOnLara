@include('top');
@include('header');
    <section class="container">
        <img src="icons8-money-box-96.png" alt="icon" class="img pulse">
        <div class="formParent yellow">
            <h1>Prisijungti</h1>
        </div>
        <div></div>
        <div class="formParent">
            <form action="" method="post" class="form">
                <label for="id">Vardas :</label>
                <input type="number" name="id" require>

                <label for="password">Slaptažodis :</label>
                <input type="password" name="password" require>
                <div class="privatebtn">
                    <button type="submit" name="submit" class="registerbtn">Prisijungti</button>
                </div>
            </form><br><br>
        </div>
    </section>
@include('footer');
