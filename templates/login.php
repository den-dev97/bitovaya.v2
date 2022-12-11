<main class="main  is-centered is-align-items-center">
    <div class="column is-8-mobile is-5-tablet is-4-desktop is-3-fullhd box modal-window custom-form ">
        <form action="./login.php" method="POST">
            <p class="title is-6 has-text-centered" style="color: white;" >Авторизация</p>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="email" placeholder="Email" name="email" required>
                </p>
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="password" placeholder="Пароль" name="password" required>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <button type="submit" class="button is-fullwidth">
                        Вход
                    </button>
                </p>
            </div>
        </form>
    </div>
</main>