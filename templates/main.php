<main class="main">
    <div class="main-inner">
        <?= $categories ?>
    </div>
    <div class="column">
        <div class="columns">
            <div class="is-flex selects">
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
                </form>
            </div>
        </div>
        <div class="columns is-multiline" id="products">
            <?= $products ?>
        </div>
    </div>
</main>