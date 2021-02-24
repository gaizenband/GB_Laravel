<?php
include(__DIR__ . '/../mainMenu.php');
include('publicMenu.php');
?>
<main>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Новости из выбранной категории</h1>
        </div>
    </div>
    <div class="container d-flex justify-content-around">
    <?php foreach ($news as $item): ?>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?=$item['title']?></h5>
                <p class="card-text"><?=$item['text']?></p>
                <a href="<?=route('news.newsOne', [$item['category_id'], $item['id']])?>" class="btn btn-primary">Вперед!</a>
            </div>
        </div>
    <?php endforeach;?>
    </div>

</main>
</body>
</html>
