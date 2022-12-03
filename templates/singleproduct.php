<div class="columns is-multiline is-centered">
    <div class="column is-4">
        <div class="card p-2">
            <div class="card-image">
                <figure class="image is-square">
                    <img src="assets/pic/<?= $product['img'] ?>" alt="Placeholder image">
                </figure>
            </div>
        </div>
    </div>
    <div class="column is-11 is-7-desktop">
        <div class="card" style="height:100%">
            <div class="pb-2 card-content is-flex is-flex-direction-column is-justify-content-space-between" style="height:100%">
                <div class="content has-text-centered">
                    <p class="title is-6 mb-2 has-text-primary">
                        <?= $product['title'] ?>
                    </p>
                </div>
                <div class="content has-text-centered is-flex-grow-1">
                    <p class="title is-6 mb-2" style="height:55px;">
                        <?= $product['description'] ?>
                    </p>
                </div>
                <div class="content has-text-centered">
                    <p class="title is-6 mb-2">
                    <p class="has-text-info">
                        <?= $product['price'] ?> &#8381;
                    </p>
                    </p>
                </div>
                <div class="content has-text-centered">
                    <button class="button is-danger is-outlined product " data-id="<?= $product['id'] ?>">
                        <span class="icon is-small">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                        <span>В корзину</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['customer'])) : ?>
    <div class="columns mt-2 mb-5">
        <div class="column is-12 has-text-right is-flex is-justify-content-center is-align-items-center">
            <form action="rate.php" method="POST" class="has-background-primary-light p-3 has-text-right is-flex is-justify-content-end is-align-items-center">
                <span class="mr-5">
                    Оцените данный товар:
                </span>
                1<input type="radio" name="rate" value="1" class="mr-3 ml-1">
                2<input type="radio" name="rate" value="2" class="mr-3 ml-1">
                3<input type="radio" name="rate" value="3" class="mr-3 ml-1">
                4<input type="radio" name="rate" value="4" class="mr-3 ml-1">
                5<input type="radio" name="rate" value="5" class="mr-3 ml-1">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>" >
                <input class="button is-small" type="submit">
            </form>
        </div>
    </div>
<?php endif ?>