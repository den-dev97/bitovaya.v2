<div class="columns">
    <div class="column is-12">
        <a href="adm_news.php">
            Добавить новость
        </a>
    </div>
</div>
<?php if($orders): ?>
<div class="columns p-3 m-3 is-centered box is-multiline bgb">
    <p class="column is-12 has-text-centered has-text-danger is-uppercase has-text-weight-semibold">
        Заказы
    </p>
    <div class="column is-12">
        <table class="table is-fullwidth is-bordered has-text-centered" id="table_orders">
            <thead>
                <tr>
                    <th>Номер заказа</th>
                    <th>Клиент</th>
                    <th>Телефон</th>
                    <th>Метод оплаты</th>
                    <th>Сумма</th>
                    <th>Комментарий</th>
                    <th>Состав заказа</th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach ($orders as $k => $v) : ?>
                        <tr>
                            <td><?= $v['o_id'] ?></td>
                            <td><?= $v['name'] ?></td>
                            <td><?= $v['phone'] ?></td>
                            <td><?= $v['pay_method'] ?></td>
                            <td><?= $v['amount'] ?></td>
                            <td><?php echo $v['comment'] === '' ? 'Нет' : $v['comment']; ?></td>
                            <td>
                                <?php foreach ($v['order_content'] as $ok => $ov) : ?>
                                    <p class="has-background-grey-lighter mb-2"><?= $ov['title'] ?>-<?= $ov['count'] ?>шт.</p>
                                <?php endforeach ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif ?>
<div class="columns p-3 m-3 box is-multiline bgb">
    <p class="column is-12 has-text-centered has-text-danger is-uppercase has-text-weight-semibold">
        Добавление нового товара
    </p>
    <form id="add_form" action="../ajax/admin/load_product.php" class="column" method="POST" enctype="multipart/form-data">
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Название</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="text" placeholder="Название товара" name="title">
                        <span class="icon is-small is-left">
                            <i class="fas fa-heading"></i>
                        </span>
                    </p>
                    <p class="help is-danger"></p>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label">
                <label class="label">Описание товара</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded">
                        <textarea class="textarea is-link" placeholder="Полное описание товара" name="description"></textarea>
                    </p>
                    <p class="help is-danger"></p>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Категория</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded">
                        <div class="select is-fullwidth">
                            <select name="category">
                                <?php foreach (getCategories() as $category) : ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Цена</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <input class="input" type="number" min="0" name="price">
                    </div>
                    <p class="help is-danger"></p>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Изображение</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <label class="upload" for="img">
                            <i class="fa fa-upload" aria-hidden="true"></i>
                        </label>
                        <input type="file" id="img" name="img" accept=".jpg, .jpeg, .png" style="display:none">
                        <table id="preview" class="table is-bordered is-fullwidth mt-3" style="display:none">
                            <tr>
                                <td id="preview_img"></td>
                                <td id="preview_filename"></td>
                                <td id="preview_filesize"></td>
                                <td style="width:50px">
                                    <button type="button" id="preview_delete" class="button">
                                        <span class="icon is-small">
                                            <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <p class="help is-danger"></p>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label">
                <label class="label">Опции</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <input class="is-checkradio has-background-color is-white" id="popular" type="checkbox" name="popular" value="1">
                    <label for="popular">Хит продаж</label>
                    <input class="is-checkradio has-background-color is-white" id="sale" type="checkbox" name="sale" value="1">
                    <label for="sale">Распродажа</label>
                </div>
            </div>
        </div>
        <div class="field is-horizontal mt-5 is-hidden">
            <div class="field-label">
                <label class="label">Для кого</label>
            </div>
            <div class="field-body">
                <div class="field is-narrow">
                    <div class="control">
                        <input class="is-checkradio has-background-color is-white" id="female" type="radio" name="gender" value="female">
                        <label for="female">Женщины</label>
                        <input class="is-checkradio has-background-color is-white" id="male" type="radio" name="gender" value="male">
                        <label for="male">Мужчины</label>
                        <input class="is-checkradio has-background-color is-white" id="all" type="radio" name="gender" value="all" checked>
                        <label for="all">Для всех</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label">
                <!-- Left empty for spacing -->
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <button id="add_btn" type="submit" class="button is-primary">
                            Добавить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="columns mt-3 is-centered">
    <div class="column is-12">
        <table class="table is-fullwidth is-bordered has-text-centered" id="table_products" style="display:none">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Описание</th>
                    <th>Категория</th>
                    <th>Цена, руб.</th>
                    <th>Распродажа</th>
                    <th>Хит продаж</th>
                    <th>Для кого</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
