<main class="main is-centered is-align-items-center">
    <div class="column is-8-mobile is-5-tablet is-4-desktop is-3-fullhd  modal-window">
        <form action="./admin.php" method="POST">
            <p class="title is-6 has-text-centered is-white custom-form" style="color: white;">Вход администратора</p>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Логин" name="login" required>
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