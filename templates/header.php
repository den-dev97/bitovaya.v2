<header class="columns is-multiline mt-3">
    <div class="column is-12">
        <nav class="level">
            <div class="level-left ml-3">
                <div class="level-item">
                    <p class="subtitle is-5">
                        <strong class="has-text-success">Б</strong>ытовая <strong class="has-text-danger">Т</strong>ехника -
                        <span class="is-size-6">Интернет - магазин</span>
                    </p>
                </div>
            </div>
            <div class="level-right">
                <p class="level-item">
                    <a href="cart.php" class="button is-info is-inverted">
                        <span class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                        <span>Корзина </span>
                        <span id="cart">(0)</span>
                    </a>
                </p>
                <?php if (isset($_SESSION['customer'])) : ?>
                    <p class="level-item has-text-danger">
                        <?= $_SESSION['customer']['name'] ?>
                    </p>
                    <p class="level-item has-text-success">
                        <?= $_SESSION['customer']['email'] ?>
                    </p>
                    <p class="level-item">
                        <a href="./logout.php" class="button is-info is-inverted"> <span class="icon">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            <span>Выход</span>
                        </a>
                    </p>
                <?php else : ?>
                    <p class="level-item">
                        <a href="./login.php" class="button is-info is-inverted"> <span class="icon">
                                <i class="fas fa-user"></i>
                            </span>
                            <span>Вход</span>
                        </a>
                    </p>
                    <p class="level-item">
                        <a href="./signup.php" class="button is-info is-inverted"> <span class="icon">
                                <i class="fas fa-lock"></i>
                            </span>
                            <span>Регистрация</span>
                        </a>
                    </p>
                <?php endif ?>
            </div>
        </nav>
    </div>
    <div class="column is-12">
        <form action="index.php" method="POST">
            <div class="columns">
                <div class="column is-10">
                    <input name="search" type="text" class="input has-background-primary-light has-text-dark" placeholder="найти товар">
                </div>
               <div class="column is-2">
                    <button type="submit" class="is-fullwidth button has-background-primary-light has-text-dark">Поиск</button>
                </div>
            </div>
        </form>
    </div>
    <div class="column is-12">
        <hr class="m-0 p-0">
    </div>
    <div class="column is-12 is-flex is-justify-content-flex-start">
        <a href="index.php" class="button is-success is-inverted">Главная</a>
        <a href="./shop.php" class="button is-success is-inverted">Магазин</a>
        <a href="./about.php" class="button is-success is-inverted">О нас</a>
        <a href="./contacts.php" class="button is-success is-inverted">Контакты</a>
        <a href="./news.php" class="button is-success is-inverted">Наши новости</a>
    </div>
</header>