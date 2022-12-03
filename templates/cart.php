<main class="columns mt-3 is-centered">
    <div class="column is-8">
        <table class="table is-fullwidth is-bordered has-text-centered">
            <thead>
                <tr>
                    <th>Код товара</th>
                    <th>Название</th>
                    <th>Стоимость, руб.</th>
                    <th>Количество, шт</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            <tbody>
                <?php $amount = 0; ?>
                <?php foreach ($products as $product) : ?>
                    <?php $amount += $product['count'] * $product['product']['price'] ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['product']['title'] ?></td>
                        <td class="price"><?= $product['product']['price'] ?></td>
                        <td class="count"><?= $product['count'] ?></td>
                        <td>
                            <button class="button ajx" data-id="<?= $product['id'] ?>">x</button>
                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Общая стоимость</th>
                    <th colspan="2"><span class="amount"><?= $amount ?></span> &#8381;</th>
                    <th><button class="button" id="popup">Оформить</button></th>
                </tr>
            </tfoot>
        </table>
    </div>
</main>
<div class="modal">
    <div class="modal-background"></div>
    <div class="modal-content box p-5">
        <form action="/order.php" method="POST">
            <p class="title is-6 has-text-centered">Оформление заказа</p>
            <div class="field">
                <label class="label">Ваше имя</label>
                <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Имя" <?php if($name) echo "value='$name'"?> required name="name">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <label class="label">Номер телефона</label>
                <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Телефон" <?php if($phone) echo "value='$phone'"?> required name="phone">
                    <span class="icon is-small is-left">
                        <i class="fas fa-phone"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <label class="label">Email</label>
                <p class="control has-icons-left">
                    <input class="input" type="email" placeholder="Email" <?php if($email) echo "value='$email'"?> required name="email">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <label class="label">Комментарий к заказу</label>
                <p class="control has-icons-left">
                    <textarea class="textarea  has-fixed-size" rows="3" name="comment"></textarea>
                </p>
            </div>
            <div class="field">
                <label class="label">Форма оплаты</label>
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
                <label class="label">Выбрано товаров: <span id="f_count"></span></label>
                <label class="label">На сумму: <span id="f_amount"></span></label>
            </div>
            <div class="field">
                <p class="control">
                    <button class="button is-success is-outlined is-fullwidth">
                        Оформить
                    </button>
                </p>
            </div>
        </form>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
</div>