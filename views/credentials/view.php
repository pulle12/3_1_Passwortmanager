<div class="container">
    <h2>Zugangsdaten anzeigen</h2>

    <p>
        <a class="btn btn-primary" href="../update.php?id=<?= $model->getId() ?>">Aktualisieren</a>
        <a class="btn btn-danger" href="../delete.php?id=<?= $model->getId() ?>">Löschen</a>
        <a class="btn btn-default" href="index.php">Zurück</a>
    </p>

    <table class="table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Name</th>
            <td><?= $model->getName() ?></td>
        </tr>
        <tr>
            <th>Domäne</th>
            <td><?= $model->getDomain() ?></td>
        </tr>
        <tr>
            <th>CMS-Benutzername</th>
            <td><?= $model->getCmsUsername() ?></td>
        </tr>
        <tr>
            <th>CMS-Passwort</th>
            <td><?= $model->getCmsPassword() ?></td>
        </tr>
        </tbody>
    </table>
</div> <!-- /container -->