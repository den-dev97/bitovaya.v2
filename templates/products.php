    <?php foreach ($products as $product) : ?>
        <div class="column is-three-quarters-mobile is-two-thirds-tablet is-half-desktop is-one-third-widescreen is-one-quarter-fullhd">
            <a href="./singleproduct.php?id=<?= $product['id'] ?>">
                <div class="card p-2">
                    <div class="card-image">
                        <figure class="image is-square">
                            <img class="product-img" src="assets/pic/<?= $product['img'] ?>" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content p-1 my-1">
                        <div>
                            <p class="product-price">
                                <?= $product['price'] ?> &#8381;
                                <span class="grade">
                                    <?=getAvgEstimates($product['id'])?> / 5
                                    <i class="star-icon"></i>
                                </span>
                            </p>
                            <p class="product-name" >
                                <?= $product['title'] ?>
                            </p>
                        </div>
                    </div>
                    <footer class="is-flex is-justify-content-center mb-2">
                        <button class="button is-light product has-text-white has-background-primary button-to-cart" data-id="<?= $product['id'] ?>">
                            <span class="icon is-small">
                                <i class="icon-add-to-cart"></i>
                            </span>
                            <span>В корзину</span>
                        </button>
                    </footer>
                    <?php if($product['sale']):?>
                        <div class="sale">
                            <figure class="image is-square">
                                <img src="../assets/pic/sale.png">
                            </figure>
                        </div>
                    <?php endif ?>
                    <?php if($product['popular']):?>
                        <div class="bestseller">
                            <figure class="image is-square">
                                <img src="../assets/pic/like.png">
                            </figure>
                        </div>
                    <?php endif ?>
                </div>
            </a>
        </div>
    <?php endforeach ?>