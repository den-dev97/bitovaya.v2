<main class="columns mb-5 is-centered is-mobile">
    <div class="column is-8-mobile is-5-tablet is-4-desktop is-3-fullhd has-background-primary box">
        <form action="./admin.php" method="POST">
            <p class="title is-6 has-text-centered">Вход администратора</p>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Логин" name="login" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="password" placeholder="Пароль" name="password" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <button type="submit" class="button is-danger is-fullwidth">
                        Вход
                    </button>
                </p>
            </div>
        </form>
    </div>
</main>