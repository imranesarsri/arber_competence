<?php
$CompetenceBLO = new CompetenceBLO;
$Competences = $CompetenceBLO->GetAllCompetence();

?>

<?php
ob_start()
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Gestion Des Competences :</h3>
        <div class="card-tools">
            <a href="./index.php?Page=Ajouter" type="button" class="btn btn-success">Ajouter</a>
        </div>
    </div>
    <div class="card-body p-0" style="display: block;">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th>
                        Références
                    </th>
                    <th>
                        Code
                    </th>
                    <th>
                        Nom
                    </th>
                    <th>
                        Descripion
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($Competences as $Competence) :
                ?>
                    <tr>
                        <td>
                            <?= $Competence->getReference() ?>
                        </td>
                        <td>
                            <?= $Competence->getCode() ?>
                        </td>
                        <td>
                            <?= $Competence->getNom() ?>
                        </td>
                        <td>
                            <?= $Competence->getDescription() ?>
                        </td>
                        <td style="width: 120px">
                            <a class="btn btn-info btn-sm " href="./index.php?Page=Modifier&ID=<?= $Competence->getId() ?>">
                                <i class="fas fa-pencil-alt">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="./index.php?Page=Supprimer&ID=<?= $Competence->getId() ?>">
                                <i class="fas fa-trash">
                                </i>
                            </a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

</div>

<?php
$Content = ob_get_clean();
include_once "./Client/Layout.php";
