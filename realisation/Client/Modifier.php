<?php
ob_start()
?>

<?php

if (isset($_GET['ID'])) {
    try {

        $ID = $_GET['ID'];
        $CompetenceBLO = new CompetenceBLO;
        $CompetenceData =  $CompetenceBLO->GetCompetenceByID($ID);

        if (isset($_POST['BtnModifier'])) {
            $Code           = $_POST['Code'];
            $References     = $_POST['References'];
            $Nom            = $_POST['Nom'];
            $Description    = $_POST['Description'];

            $Competence = new Competence($ID, $References, $Code, $Nom, $Description);
            $CompetenceBLO->UpdateCompetence($Competence);


            $Errors = $CompetenceBLO->getErrorsMassegs();
            if (empty($Errors)) {
                header("location:index.php");
            }
        }
    } catch (Exception $e) {
        $Errors = $e->getMessage();
    }
}

?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Modifier Compétence</h3>
    </div>



    <form method="post">
        <div class="card-body">
            <?php if (!empty($Errors)) :
                foreach ($Errors as $Error) :
            ?>
                    <div class="alert alert-danger " role="alert">
                        <?= $Error ?>
                    </div>
            <?php
                endforeach;
            endif;
            ?>
            <div class="form-group">
                <label for="Code">Code</label>
                <input type="text" name="Code" value="<?= $CompetenceData->getCode() ?>" class="form-control" id="Code" placeholder="Enter Code">
            </div>
            <div class="form-group">
                <label for="References">Références <span class="text-danger">*</span></label>
                <input type="text" name="References" value="<?= $CompetenceData->getReference() ?>" class="form-control" id="References" placeholder="Enter Références">
            </div>

            <div class="form-group">
                <label for="Nom">Nom <span class="text-danger">*</span></label>
                <input type="text" name="Nom" value="<?= $CompetenceData->getNom() ?>" class="form-control" id="Nom" placeholder="Enter Nom">
            </div>
            <div class="form-group">
                <label for="description">Descripion</label>
                <textarea name="Description" id="description" cols="30" rows="10" class="form-control"><?= $CompetenceData->getDescription() ?></textarea>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" name="BtnModifier" class="btn btn-primary">Modifier</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>

        </div>
    </form>
</div>


<?php
$Content = ob_get_clean();
include_once "./Client/Layout.php";
