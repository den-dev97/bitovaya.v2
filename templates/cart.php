<main class="main is-fullwidth ">
    <div class="cart-inner">
        <table class="table  is-bordered has-text-centered">
            <tbody>
                <?php $amount = 0; ?>
                <?php foreach ($products as $product) : ?>
                    <?php $amount += $product['count'] * $product['product']['price'] ?>
                    <tr>
                        <td> <img class="product-img cart-img" src="assets/pic/<?= $product['product']['img'] ?>" alt="Placeholder image"></td>
                        <td><?= $product['product']['title'] ?></td>
                        <td class="price"><?= $product['product']['price'] ?></td>
                        <td class="count"><?= $product['count'] ?>шт.</td>
                        <td>
                            <button class="button ajx" data-id="<?= $product['id'] ?>">
                                <i class="delete-icon"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
        <div class="amount-wrapper">
            <p>Общая стоимость</p>
            <p><span class="amount"><?= $amount ?></span> &#8381;</p>
            <p><button class="button checkout-button" id="popup">Оформить</button></p>
        </div>
    </div>
</main>
<div class="modal">
    <div class="modal-background"></div>
    <div class="modal-content box p-6">
        <form action="/order.php" method="POST">
            <h3 class="title is-4 has-text-centered">Оформление заказа</h3>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Имя" <?php if($name) echo "value='$name'"?> required name="name">
                </p>
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Телефон" <?php if($phone) echo "value='$phone'"?> required name="phone">
                </p>
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="email" placeholder="Email" <?php if($email) echo "value='$email'"?> required name="email">
                </p>
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <textarea placeholder="Комментарий" class="textarea  has-fixed-size" rows="3" name="comment"></textarea>
                </p>
            </div>
            <div class="field">
                <label class="">Оплата</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="pay_method" value="Наличными">
                        Наличными
                    </label>
                    <label class="radio">
                        <input type="radio" name="pay_method" value="Картой" checked>
                        Картой
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="">Товаров: <strong id="f_count"></strong></label><br>
                <label class="">Итого: <strong id="f_amount"></strong></label>
            </div>
            <div class="field">
                <p class="control">
                    <button class="button is-success is-outlined is-fullwidth button-to-cart">
                        Оформить
                    </button>
                </p>
            </div>
        </form>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
</div>