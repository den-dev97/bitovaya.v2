    <?php foreach ($products as $product) : ?>
        <div class="column is-three-quarters-mobile is-two-thirds-tablet is-half-desktop is-one-third-widescreen is-one-quarter-fullhd">
            <a href="./singleproduct.php?id=<?= $product['id'] ?>">
                <div class="card p-2 has-background-white-bis">
                    <div class="card-image">
                        <figure class="image is-square">
                            <img src="assets/pic/<?= $product['img'] ?>" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content p-1 my-1">
                        <div class="content has-text-centered is-flex is-flex-direction-column is-justify-content-space-between">
                            <p class="title is-6" style="height:80px;">
                                <?= $product['title'] ?>
                            </p>
                            <p>
                                Оценок: <?=getNumberEstimates($product['id'])?>
                                Средняя: <?=getAvgEstimates($product['id'])?>
                            </p>
                            <p class="has-text-info">
                                <?= $product['price'] ?> &#8381;
                            </p>
                        </div>
                    </div>
                    <footer class="is-flex is-justify-content-center mb-2">
                        <button class="button is-light product has-text-white has-background-primary" data-id="<?= $product['id'] ?>">
                            <span class="icon is-small">
                                <i class="fas fa-shopping-cart"></i>
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