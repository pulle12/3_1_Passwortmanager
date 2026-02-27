<div class="container">
    <h2>Zugangsdaten löschen</h2>

    <form class="form-horizontal" action="index.php?r=credentials/delete&id=<?= $model->getId() ?>" method="post">
        <input type="hidden" name="id" value="<?= $model->getId() ?>"/>
        <p class="alert alert-error">Wollen Sie die Zugangsdaten von <?= $model->getName()  ?> / <?= $model->getDomain() ?> wirklich löschen?</p>
        <div class="form-actions">
            <button type="submit" class="btn btn-danger">Löschen</button>
            <a class="btn btn-default" href="index.php?r=credentials/index">Abbruch</a>
        </div>
    </form>

</div>