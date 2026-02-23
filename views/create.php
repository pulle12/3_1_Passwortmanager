<?php

require_once 'models/Credentials.php';

$model = new Credentials();

if(!empty($_POST)) {
    $model->setName(isset($_POST['name']) ? $_POST['name'] : '');
    $model->setDomain(isset($_POST['domain']) ? $_POST['domain'] : '');
    $model->setCmsUsername(isset($_POST['cms_username']) ? $_POST['cms_username'] : '');
    $model->setCmsPassword(isset($_POST['cms_password']) ? $_POST['cms_password'] : '');

    if($model->save()) {
        header("Location: view.php?id=" . $model->getId());
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Passwortmanager</title>

    <link rel="shortcut icon" href="/php/3_1_Passwortmanager/css/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/php/3_1_Passwortmanager/css/favicon.ico" type="image/x-icon">

    <link href="/php/3_1_Passwortmanager/css/bootstrap.css" rel="stylesheet">
    <script src="/php/3_1_Passwortmanager/js/jquery.min.js"></script>
    <script src="/php/3_1_Passwortmanager/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <h2>Zugangsdaten erstellen</h2>
    </div>

    <form class="form-horizontal" action="create.php" method="post">

        <div class="row">
            <div class="col-md-5">
                <div class="form-group required ">
                    <label class="control-label">Name *</label>
                    <input type="text" class="form-control" name="name" maxlength="32"
                           value="<?= htmlspecialchars($model->getName()) ?>">
                    <?php if (!empty($model->getErrors()['name'])): ?>
                        <div class="help-block"><?= $model-getErrors()['name'] ?></div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group required ">
                    <label class="control-label">Domäne *</label>
                    <input type="text" class="form-control" name="domain" maxlength="128"
                           value="<?= htmlspecialchars($model->getDomain()) ?>">
                    <?php if (!empty($model->getErrors()['domain'])): ?>
                        <div class="help-block"><?= $model-getErrors()['domain'] ?></div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="form-group required ">
                    <label class="control-label">CMS-Benutzername *</label>
                    <input type="text" class="form-control" name="cms_username" maxlength="64"
                           value="<?= htmlspecialchars($model->getCmsUsername()) ?>">
                    <?php if (!empty($model->getErrors()['cms_username'])): ?>
                        <div class="help-block"><?= $model-getErrors()['cms_username'] ?></div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group required ">
                    <label class="control-label">CMS-Passwort *</label>
                    <input type="text" class="form-control" name="cms_password" maxlength="64"
                           value="<?= htmlspecialchars($model->getCmsPassword()) ?>">
                    <?php if (!empty($model->getErrors()['cms_password'])): ?>
                        <div class="help-block"><?= $model-getErrors()['cms_password'] ?></div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Erstellen</button>
            <a class="btn btn-default" href="index.php">Abbruch</a>
        </div>
    </form>

</div> <!-- /container -->
</body>
</html>