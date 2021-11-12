<!-- Books Item -->
<div class="col-sm-6 m-sm-4">
    <div class="card text-center">
        <div class="card-body">
            <h2 class="card-title"><?= $model->title ?></h2>
            <p class="card-text"><b>Автор:</b> <?= $model->author ?></p>
            <p class="card-text"><b>Жанр:</b> <?= $model->genre->genre ?></p>
            <p class="card-text"><b>Страниц:</b> <?= $model->pages ?></p>
        </div>
    </div>
</div>
