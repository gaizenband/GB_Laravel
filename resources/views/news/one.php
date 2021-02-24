<?php
include(__DIR__ . '/../mainMenu.php');
include('publicMenu.php');
?>
<main>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Новости</h1>
        </div>
    </div>
    <div class="container card mb-3">
        <div class="card-body">
            <h5 class="card-title"><?=$news['title']?></h5>
            <p class="card-text"><?=$news['text']?></p>
        </div>
    </div>

</main>
</body>
</html>
