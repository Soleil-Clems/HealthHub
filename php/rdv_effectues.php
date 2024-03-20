<?php
require_once "../includes/db_connexion.php";
$title = "Rendez-vous éffectués";
$sql = "SELECT * FROM liste_succes";
$req = $connexion->query($sql);
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
$title = "Dashboard";
include_once "../includes/header.php";

?>
<section id="dashboard">


    <h1 class="intro">Rendez-vous effectués:</h1>
    <div class="table-responsive p-3">

        <table class="table">
            <thead class="table-primary">
                <th>Id </th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Date</th>
                <th>Heure</th>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                ?>
                    <tr>

                        <td><?= $row['id_succes'] ?></td>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['prenom'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['date_rdv'] ?></td>
                        <td><?= $row['heure_rdv'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>


<?php
require_once "../includes/footer.php";
?>