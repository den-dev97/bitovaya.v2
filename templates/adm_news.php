<main class="main p-0">
    <?php if($alert):?>
        <p class="has-text-success is-size-3">
            Новость добавлена на сайт
        </p>
    <?php else: ?>
    <div class="column is-fullwidth box has-text-dark">
        <form action="./adm_news.php" method="POST" enctype="multipart/form-data">
            <p class="title is-6 has-text-centered ">Добавить новость</p>
            <div class="field">
                <label for="" class="">Заголовок новости</label>
                <p class="control">
                    <input class="input" type="text" placeholder="" name="title" required>
                </p>
            </div>
            <div class="field">
                <label for="" class="">Текст новости</label>
                <p class="control">
                    <textarea class="textarea " name="txt" id="" cols="30" rows="5">

                    </textarea>
                </p>
            </div>
            <div class="field">
                <label for="" class="">Фото</label>
                <p class="control">
                    <input type="file" name="img" style="color:white;">
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <button type="submit" class="button is-outlined is-fullwidth button-to-cart">
                        Добавить новость
                    </button>
                </p>
            </div>
        </form>
    </div>
    <?php endif ?>
</main>