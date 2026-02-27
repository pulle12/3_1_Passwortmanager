<div class="container">
    <div class="row">
        <h2>Zugangsdaten bearbeiten</h2>
    </div>

    <form class="form-horizontal" action="update.php?id=<?= $c->getId() ?>" method="post">

        <div class="row">
            <div class="col-md-5">
                <div class="form-group required ">
                    <label class="control-label">Name *</label>
                    <input type="text" class="form-control" name="name" maxlength="32"
                           value="<?= htmlspecialchars($c->getName()) ?>">
                    <?php if (!empty($c->getErrors()['name'])): ?>
                        <div class="help-block"><?= $c-getErrors()['name'] ?></div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group required ">
                    <label class="control-label">Domäne *</label>
                    <input type="text" class="form-control" name="domain" maxlength="128"
                           value="<?= htmlspecialchars($c->getDomain()) ?>">
                    <?php if (!empty($c->getErrors()['domain'])): ?>
                        <div class="help-block"><?= $c-getErrors()['domain'] ?></div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="form-group required ">
                    <label class="control-label">CMS-Benutzername *</label>
                    <input type="text" class="form-control" name="cms_username" maxlength="64"
                           value="<?= htmlspecialchars($c->getCmsUsername()) ?>">
                    <?php if (!empty($c->getErrors()['cms_username'])): ?>
                        <div class="help-block"><?= $c-getErrors()['cms_username'] ?></div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group required ">
                    <label class="control-label">CMS-Passwort *</label>
                    <input type="text" class="form-control" name="cms_password" maxlength="64"
                           value="<?= htmlspecialchars($c->getCmsPassword()) ?>">
                    <?php if (!empty($c->getErrors()['cms_password'])): ?>
                        <div class="help-block"><?= $c-getErrors()['cms_password'] ?></div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Aktualisieren</button>
            <a class="btn btn-default" href="index.php">Abbruch</a>
        </div>
    </form>

</div> <!-- /container -->