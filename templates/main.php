<main class="columns has-background-white-ter mt-3">
    <div class="column is-narrow" style="width:200px">
        <?= $categories ?>
    </div>
    <div class="column">
        <div class="columns">
            <div class="column is-12 is-flex is-justify-content-center">
                <form action="/" method="POST" id="sorting">
                    <div class="select is-rounded is-info is-hovered">
                        <select name="price" class="has-text-justify">
                            <option value="">Цена</option>
                            <option value="up">По возрастанию</option>
                            <option value="down">По убыванию</option>
                        </select>
                    </div>
                    <div class="select is-rounded is-info is-hovered ml-1">
                        <select name="stock" class="has-text-justify">
                            <option value="">Акции</option>
                            <option value="popular">Хит продаж</option>
                            <option value="sale">Скидка</option>
                        </select>
                    </div>
                    <!--<div class="select is-rounded is-info is-hovered ml-1">
                        <select name="gender" class="has-text-justify">
                            <option value="">Пол</option>
                            <option value="female">Женский</option>
                            <option value="male">Мужской</option>
                            <option value="all">Для всех</option>
                        </select>
                    </div>-->
                </form>
            </div>
        </div>
        <div class="columns is-multiline is-centered" id="products">
            <?= $products ?>
        </div>
    </div>
</main>
<div class="columns is-multiline mt-3 is-centered">
    <div class="column box h is-5">
        <p class="has-text-centered">
            <span class="icon has-text-info">
                <i class="fas fa-2x fa-car"></i>
            </span>
        </p>
        <p class="has-text-centered">
            <span class="is-size-4 has-text-weight-bold has-text-success">Доставка</span>
        </p>
        <p class="has-text-centered">
            <span class="is-size-5">Доставка по городу бесплатно <br> при сумме заказа от 3000 руб.</span>
        </p>
    </div>
    <div class="column box h is-5 ml-2">
        <p class="has-text-centered">
            <span class="icon has-text-info">
                <i class="fas fa-2x fa-camera-retro"></i>
            </span>
        </p>
        <p class="has-text-centered">
            <span class="is-size-4 has-text-weight-bold has-text-success">Фото перед отправкой</span>
        </p>
        <p class="has-text-centered">
            <span class="is-size-5">При отправке вашего товара <br> менеджеры сделают фото заказа.</span>
        </p>
    </div>
    <div class="column box h is-5">
        <p class="has-text-centered">
            <span class="icon has-text-info">
                <i class="fas fa-2x fa-phone-volume"></i>
            </span>
        </p>
        <p class="has-text-centered">
            <span class="is-size-4 has-text-weight-bold has-text-success">Поддержка</span>
        </p>
        <p class="has-text-centered">
            <span class="is-size-5">Поддержка доступна <br> в будние дни с 8:00 до 21:00</span>
        </p>
    </div>
    <div class="column box h is-5 ml-2">
        <p class="has-text-centered">
            <span class="icon has-text-info">
                <i class="far fa-2x fa-credit-card"></i>
            </span>
        </p>
        <p class="has-text-centered">
            <span class="is-size-4 has-text-weight-bold has-text-success">Оплата</span>
        </p>
        <p class="has-text-centered">
            <span class="is-size-5">При покупках доступны <br> различные способы оплаты.</span>
        </p>
    </div>
</div>