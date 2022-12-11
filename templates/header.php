<header class="header">
    <nav class="nav">
        <a href="index.php" class="nav-item" title="Главная">
            <i class="index-page-icon"></i>
            bytovaya
        </a>
        <div class="nav-item search-input">
            <form class="search-form" action="index.php" method="POST">
                <input class="search" type="search" placeholder="Поиск" name="search" id="search">
                <button type="submit" class="search-button">
                    <i class="search-icon"></i>
                </button>
            </form>
        </div>
        <a href="cart.php" class="nav-item">
            <i class="cart-icon"></i>
            Корзина
            <span id="cart">(0)</span>
        </a>
        <?php if (isset($_SESSION['customer'])): ?>
            <span style="white-space:nowrap ;">
                <?= $_SESSION['customer']['name'] ?>
            </span>
                <a href="./logout.php" class="nav-item">
                    <i class="icon-logout"></i>
                    Выход
                </a>
                <?php else: ?>
                <a href="./login.php" class="nav-item">
                    <i class="icon-enter"></i>
                    Вход
                </a>
                <a href="./signup.php" class="nav-item">
                    <i class="icon-reg "></i>
                    Регистрация
                </a>
                <?php endif ?>
    </nav>
</header>