<?php
require_once "../includes/db_connexion.php";
require_once "../includes/gestionrdv.php";
$title = "Edition";
include_once "../includes/header.php";

?>

    <section id="form-section">
        <div class="container py-5" id="form">
            <h2>Edition</h2>
            <form action="" method="post">
                <div class="input-group my-2">
                    <label for="nom" class="labelt">Maladie</label>
                    <input type="text" class="input" placeholder="Entrez le nom de la maladie" name="maladie" id="nom"><br>
                </div>
                <div class="input-group my-2">
                    <label for="prenom" class="input-group-text">Causes</label>
                    <input type="text" class="input" placeholder="Entrez les causes de la maladie" name="cause" id="prenom"><br>
                </div>

                <div class="input-group my-2">
                    <label for="psw1" class="input-group-text">Presciptions</label>
                    
                    <textarea class="textarea" placeholder="Entrez les medicaments prescrits" id="psw1" name="prescription" id="" ></textarea>
                </div>
                <div class="input-group my-2">
                    <label for="psw2" class="input-group-text">Montant</label>
                    <input type="number" class="input" placeholder="Montant a payer" name="montant" id="psw2"><br>
                </div>

                <input type="submit" name="diagnostique" value="Etablir" class="btn  btn-primary">
            </form>
        </div>
        </div>


    </section>






<?php
include_once "../includes/footer.php"

?>