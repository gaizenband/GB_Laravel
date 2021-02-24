<?php
include(__DIR__ . '/../mainMenu.php');
include('publicMenu.php');
?>
<main>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Категории новостей</h1>
        </div>
    </div>
    <div class="container d-flex justify-content-around">
        <?php foreach ($categories as $item): ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?=$item['title']?></h5>
                    <a href="<?=route('news.news', $item['id'])?>" class="btn btn-primary">Вперед!</a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</main>
</body>
</html>
