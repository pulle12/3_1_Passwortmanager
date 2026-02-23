<div class="container">
    <div class="row">
        <h2>Passwortmanager 2.0</h2>
    </div>
    <div class="row">
        <p>
            <a href="index.php?r=credentials/create" class="btn btn-success">Erstellen <span class="glyphicon glyphicon-plus"></span></a>
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
            <tbody>
            <?php

            foreach ($model as $c) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($c->getName()) . "</td>"; //htmlspecialchars im Video nicht verwendet aber wichtig gegen XSS
                echo "<td>" . htmlspecialchars($c->getDomain()) . "</td>";
                echo "<td>" . htmlspecialchars($c->getCmsUsername()) . "</td>";
                echo "<td>" . htmlspecialchars($c->getCmsPassword()) . "</td>";
                echo "<td>";
                echo "<a class='btn btn-info' href='index.php?r=credentials/view&id=" . $c->getId() . "'><span class='glyphicon glyphicon-eye-open'></span></a>";
                echo "&nbsp;";
                echo "<a class='btn btn-primary' href='index.php?r=credentials/update&id=" . $c->getId() . "'><span class='glyphicon glyphicon-pencil'></span></a>";
                echo "&nbsp;";
                echo "<a class='btn btn-danger' href='index.php?r=credentials/delete&id=" . $c->getId() . "'><span class='glyphicon glyphicon-remove'></span></a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->