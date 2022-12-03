<?php foreach ($news as $k => $v) : ?>
    <div class="box">
        <div class="columns is-centered">
            <div class="column is-12 has-text-centered is-size-4">
                <?=$v['title']?>
            </div>
        </div>
        <div class="columns is-centered">
            <div class="column is-6">
                <img src="assets/pic/news/<?= $v['img'] ?>" alt="">
            </div>
            <div class="column is-6">
                <?=$v['txt']?>
            </div>
        </div>
        <div class="columns is-centered">
            <div class="column is-12 has-text-right">
                <?=$v['dt']?>
            </div>
        </div>
    </div>
<?php endforeach ?>