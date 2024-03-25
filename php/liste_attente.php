<?php
require_once "../includes/db_connexion.php";
require_once "../includes/gestionrdv.php";
$title = "Liste d'attente";
$sql = "SELECT * FROM liste_attente";
$req = $connexion->query($sql);
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
$title = "Liste d'attente";
include_once "../includes/header.php";

?>
<section id="dashboard">


    <h1 class="intro">Liste d'attente :</h1>
    <div class="table-responsive p-3">

        <table class="table">
                <thead class="table-primary">
                    <th>Numero</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Editer</th>
                    <th>Annuler</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($rows as $row) {
                    ?>
                        <tr>

                            <td><?= $row['id_attente'] ?></td>
                            <td><?= $row['nom'] ?></td>
                            <td><?= $row['prenom'] ?></td>
                            <td class="col-3"><?= $row['email'] ?></td>
                            <td><?= $row['date_rdv'] ?></td>
                            <td ><?= $row['heure_rdv'] ?></td>
                            <td class="last-td"><a class="act act2" href="edition.php?editer=<?=$row['id_patient']?>&attente=<?=$row['id_attente']?>">Editer</a></td>
                            <td class="last-td"><a class="act act1" href="?annuler=<?=$row['id_attente']?>">Annuler</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>


<?php
require_once "../includes/footer.php";
?>