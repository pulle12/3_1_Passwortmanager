<div class="container">
    <div class="row">
        <h2>Passwortmanager 2.0</h2>
    </div>
    <div class="row">
        <p class="form-inline">
            <a href="index.php?r=credentials/create" class="btn btn-success">Erstellen <span class="glyphicon glyphicon-plus"></span></a>

            <input id="filter" type="text" class="form-control" name="filter" maxLength="32" placeholder="Suche">

            <button id="btnSearch" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
            <button id="btnClear" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span></button>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Domäne</th>
                <th>CMS-Benutzername</th>
                <th>CMS-Passwort</th>
                <th></th>
            </tr>
            </thead>
            <tbody id="credentials">
            </tbody>
        </table>
    </div>
</div> <!-- /container -->