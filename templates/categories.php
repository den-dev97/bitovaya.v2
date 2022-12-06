<aside class="menu">
    <p class="menu-label">
        Категории
    </p>
    <ul class="menu-list">
        <?php foreach(getCategories() as $category):?>
            <li><a data-cat=<?=$category['id']?>><?=$category['title']?></a></li>
        <?php endforeach ?>
    </ul>
</aside>