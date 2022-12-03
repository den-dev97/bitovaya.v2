<main class="columns mt-3 is-centered is-mobile">
    <?php if($alert):?>
        <p class="has-text-success is-size-3">
            Новость добавлена на сайт
        </p>
    <?php else: ?>
    <div class="column is-5 box" style="background-color: blueviolet;">
        <form action="./adm_news.php" method="POST" enctype="multipart/form-data">
            <p class="title is-6 has-text-centered has-text-white">Добавить новость</p>
            <div class="field">
                <label for="" class="has-text-white">Заголовок новости</label>
                <p class="control">
                    <input class="input" type="text" placeholder="" name="title" required>
                </p>
            </div>
            <div class="field">
                <label for="" class="has-text-white">Текст новости</label>
                <p class="control">
                    <textarea class="textarea" name="txt" id="" cols="30" rows="5">

                    </textarea>
                </p>
            </div>
            <div class="field">
                <label for="" class="has-text-white">Фото</label>
                <p class="control">
                    <input type="file" name="img" style="color:white;">
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <button type="submit" class="button is-white is-outlined is-fullwidth">
                        Добавить новость
                    </button>
                </p>
            </div>
        </form>
    </div>
    <?php endif ?>
</main>