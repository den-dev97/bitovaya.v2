<main class="main">
    <div class="column is-4">
        <div class="card p-2">
            <div class="card-image">
                <figure class="image is-square product-img">
                    <img class="product-img" src="assets/pic/<?= $product['img'] ?>" alt="Placeholder image">
                </figure>
            </div>
        </div>
    </div>
    <div class="column">
        <div class="" >
            <div class="pb-2  is-flex is-flex-direction-column" >
                <div class="">
                    <h3 class="is-6 mb-2 product-title">
                        <?= $product['title'] ?>
                    </h3>
                    <p class="product-price is-size-3 mb-4">
                        <?= $product['price'] ?> &#8381;
                    </p>
                </div>
                <div class="content has-text-centered">
                    <button class="button is-danger is-outlined product button-to-cart single-button" data-id="<?= $product['id'] ?>">
                        <i class="icon-add-to-cart"></i>
                        <span>В корзину</span>
                    </button>
                </div>
                <div class="single-product-info  is-flex-grow-1">
                    <p class=" is-6 mb-2" ">
                        <?= $product['description'] ?>
                    </p>
                </div>
            </div>
            <?php if (isset($_SESSION['customer'])) : ?>
                <div class="columns mt-2 mb-5">
                    <div class="column is-12 is-align-items-center">
                        <form action="rate.php" method="POST" class=" p-3 has-text-right is-flex is-justify-content-end is-align-items-center">
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
        </div>
    </div>
</main>
