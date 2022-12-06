<main class="main">
    <div>
        <?php foreach ($news as $k => $v) : ?>
                    <div class="columns is-centered">
                        <div class="column is-12 has-text-centered is-size-4">
                            <?=$v['title']?>
                        </div>
                    </div>
                    <div >
                        <img class="news-ing" src="assets/pic/news/<?= $v['img'] ?>" alt="">
                        <?=$v['txt']?>
                    </div>
                    <div class="columns is-centered">
                        <div class="column is-12 has-text-right">
                            <?=$v['dt']?>
                        </div>
                    </div>
        <?php endforeach ?>
    </div>
</main>
