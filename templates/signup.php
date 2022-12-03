<main class="columns mt-3 is-centered is-mobile">
    <div class="column is-8-mobile is-5-tablet is-4-desktop is-3-fullhd box">
        <form action="./signup.php" method="POST">
            <p class="title is-6 has-text-centered">Форма регистрации</p>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Имя" name="name" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="email" placeholder="Email" name="email" required>
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
                    <button type="submit" class="button is-success is-outlined is-fullwidth">
                        Регистрация
                    </button>
                </p>
            </div>
        </form>
    </div>
</main>