<?php
include("class/Location.php")

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LRDHG</title>
    <link rel="icon" type="image/x-icon" href="assets/img/2000522.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/style_config.css" rel="stylesheet" />
    <link href="css/style_connexion.css" rel="stylesheet" />

</head>
<style>
    .div {

        display: flex;
        justify-content: center;
        flex-direction: row;

    }
</style>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php#page-top">LRDHG</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="co_inscr/inscription.php#inscription">Inscription</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#config">Config</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#signup">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="formulaire.php#location">Reservation</a></li>                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">LRDHG</h1>
                    
                    <a class="btn btn-primary" href="index.php#config">Les config</a>
                    <a class="btn btn-primary" href="creataccounte.php#inscription">Créer votre compte</a>
                </div>
            </div>
        </div>
    </header>
    <section class="pricing_part padding_top" id="location">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_tittle text-center">
                        <h2 style="font-size:35px">Reservation</h2>
                        <?php
                        try {
                            $ipserver = "*";
                            $nomBase = "*";
                            $loginPrivilege = "*";
                            $passPrivilege = "*";
                            $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);
                        ?>
                            <?php
                            $requete = "select * from pcloc";
                            $resultat = $GLOBALS["pdo"]->query($requete);

                            $tabpcloc = $resultat->fetchALL();
                            ?>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6" style="width:500px">
                    <div class="single_pricing_part">
                        <form action="" method="post">

                            <div class="div1">

                                <p><?php
                                    foreach ($tabpcloc as $pcloc) {

                                        if (isset($_GET["id"]) && $_GET["id"] == $pcloc["id"]) {
                                            echo '<label>' . $pcloc["Marque"] . " " . $pcloc["Model"] . '</label>';
                                            echo '<input type="hidden" value ="' . $pcloc["id"] . '" name="idpcloc" required>';
                                        } else {
                                            //echo '<option value ="' . $pcloc["id"] . '">' . $pcloc["Marque"] . " " . $pcloc["Model"] . "</option>";
                                            //echo "titi";
                                        }
                                    }
                                    ?></p>

                                <?php

                                if (!isset($_GET["id"])) {
                                ?>
                                    <p><select name="idpcloc">
                                            <?php
                                            foreach ($tabpcloc as $pcloc) {

                                                echo '<option value ="' . $pcloc["id"] . '">' . $pcloc["Marque"] . " " . $pcloc["Model"] . "</option>";
                                            }
                                            ?>
                                        </select></p>
                                <?php
                                }
                                ?>
                            </div>

                            <?php
                            $requetes = "select * from client";
                            $resultats = $GLOBALS["pdo"]->query($requetes);
                            $tabclient = $resultats->fetchALL();
                            ?>
                            <div class="div2">
                                
                            <p><select name="idClient">

                                        <?php
                                        foreach ($tabclient as $client) {
                                            
                                            echo '<option value ="' . $client["id"] . '">' . $client["nom"] . " " . $client["prenom"] . "</option>";
                                        }
                                        ?>

                                    </select></p>
                            </div>

                            <p>
                            <div><input type="date" name="laDate" required></div>
                            </p>
                            <div><input type="submit" id='submit' value="Confirmer une location" name="Valider" class="btn_2" required></div>
                        </form>
                    <?php
                            if (isset($_POST["Valider"])) {

                                $newLocation = new Location(null,null,null);
                                $newLocation->newLocation( $_POST["idClient"] , $_POST["idpcloc"] ,$_POST["laDate"]);


                                //echo "Tu as choisi le " . $_POST["idpcloc"] . " id client = " . $_POST["idClient"] . " date = " . $_POST["laDate"];
                                
                            }
                        } catch (Exception  $error) {
                            echo $error->getMessage();
                        }

                    ?>
                    </div>
                </div>
            </div>
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black" id="signup" style="padding-top:400px">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">146 Bd de Saint-Quentin, 80090 Amiens</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">equipedebg@gmail.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">0612345678</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="https://github.com/Hautemaniere/td_BDD"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Tom LEFEVRE, Edouard HAUTEMANIERE 2023 | SN1 La Providence Amiens</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>