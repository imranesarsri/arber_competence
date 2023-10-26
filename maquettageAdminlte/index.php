<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maquettage</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/logo.png" alt="AdminLTELogo" height="60" width="60">
        </div>


        <!-- Navbar -->

        <?php include_once "./Navbar.php"; ?>



        <!-- Main Sidebar Container -->

        <?php include_once "./Sidebar.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">

                </div>
            </div>




            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title ">Gestion Des Competences :</h3>


                            <div class="card-tools">
                                <a href="./Ajoute.php" type="button" class="btn btn-success">Ajouter</a>


                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="card-body p-0" style="display: block;">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>

                                        <th>
                                            Code
                                        </th>
                                        <th>
                                            Références
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
                                    <tr>
                                        <td>
                                            Maquettae
                                        </td>
                                        <td>
                                            C1
                                        </td>
                                        <td>
                                            Maquetter une application mobile.
                                        </td>
                                        <td>
                                            Descripion
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm " href="./Modifier.php">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            base de donnees
                                        </td>
                                        <td>
                                            C2
                                        </td>
                                        <td>
                                            Manipuler une base de donnees - perfectionnement.
                                        </td>
                                        <td>
                                            Descripion
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm " href="./Modifier.php">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            back-end
                                        </td>
                                        <td>
                                            C3
                                        </td>
                                        <td>
                                            Developper la gestion dun projet information .
                                        </td>
                                        <td>
                                            Descripion
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm " href="./Modifier.php">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            gestion
                                        </td>
                                        <td>
                                            C4
                                        </td>
                                        <td>
                                            Collaborer a la gestion dun projet informatique.
                                        </td>
                                        <td>
                                            Descripion
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm " href="./Modifier.php">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Mobile Native
                                        </td>
                                        <td>
                                            C5
                                        </td>
                                        <td>
                                            Developper une application mobile native.
                                        </td>
                                        <td>
                                            Descripion
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm " href="./Modifier.php">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tests
                                        </td>
                                        <td>
                                            C6
                                        </td>
                                        <td>
                                            Preparer et exceter les plans da tests dune appl.
                                        </td>
                                        <td>
                                            Descripion
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm " href="./Modifier.php">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Deploiement
                                        </td>
                                        <td>
                                            C7
                                        </td>
                                        <td>
                                            preparer et executer le deploiement dune applicat.
                                        </td>
                                        <td>
                                            Descripion
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm " href="./Modifier.php">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </section>




        </div>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

</body>

</html>