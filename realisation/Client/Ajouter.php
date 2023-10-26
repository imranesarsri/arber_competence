<?php


if (isset($_POST['BtnAjouter'])) {
    try {
        $References     = $_POST['References'];
        $Code           = $_POST['Code'];
        $Nom            = $_POST['Nom'];
        $Description    = $_POST['Description'];

        $Competence = new Competence(null, $References, $Code, $Nom, $Description);

        $CompetenceBLO = new CompetenceBLO;
        $CompetenceBLO->AddCompetence($Competence);
        $Errors = $CompetenceBLO->getErrorsMassegs();
        if (empty($Errors)) {
            header("location:index.php");
        }
    } catch (Exception $e) {
        $Errors = $e->getMessage();
    }
}

?>

<?php
ob_start()
?>


<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Ajouter Compétence</h3>
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
                <label for="exampleInputCode">Code</label>
                <input type="text" name="Code" class="form-control" id="exampleInputCode" placeholder="Enter Code">
            </div>
            <div class="form-group">
                <label for="exampleInputReferences">Références <span class="text-danger">*</span></label>
                <input type="text" name="References" class="form-control" id="exampleInputReferences"
                    placeholder="Enter Références">
            </div>

            <div class="form-group">
                <label for="exampleInputNom">Nom <span class="text-danger">*</span></label>
                <input type="text" name="Nom" class="form-control" id="exampleInputNom" placeholder="Enter Nom">
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="Description" id="description" class="form-control" cols="30" rows="10"
                    placeholder="Enter description">
                </textarea>
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" name="BtnAjouter" class="btn btn-success">Ajouter</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php
$Content = ob_get_clean();
include_once "./Client/Layout.php";