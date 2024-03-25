<?php
require_once "../includes/db_connexion.php";

$sql = "SELECT * FROM user WHERE lvl=0";
$req = $connexion->query($sql);
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
$title = "Dashboard";
require_once "../includes/header.php";
?>
<section id="dashboard">


    <h1 class="intro">Liste des patients :</h1>
    <div class="table-responsive p-3">

        <table class="table">
            <thead class="table-dark">
                <th>Id </th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Date de naissance</th>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                ?>
                    <tr>

                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nom'] ?></td>
                        <td ><?= $row['prenom'] ?></td>
                        <td ><?= $row['email'] ?></td>
                        <td ><?= $row['naissance'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</section>
<?php
require_once "../includes/footer.php";
?>