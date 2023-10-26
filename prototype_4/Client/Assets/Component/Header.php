<?php

ob_start();
?>

<nav class="navbar navbar-expand-lg px-5 navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" Business-bs-toggle="collapse" Business-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php?Page=Chart">Chart</a>
                </li>

            </ul>
            <a class="btn btn-success" href="./index.php?Page=Add">Add</a>

        </div>
    </div>
</nav>

<?php
$Header = ob_get_clean();
?>