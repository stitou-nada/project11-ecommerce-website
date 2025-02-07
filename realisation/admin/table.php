<?php 
  
  include 'gestion.php';
  $gestion = new Gestion ; 
  $data = $gestion->afficher();


  
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Forms</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link rel="stylesheet" href="css/costumer.css">
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>
<!-- 
<body class="animsition">
    <div class="page-wrapper">
         HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
           
            <div>
            <div class="menu-sidebar__content  js-scrollbar1 ">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                           
                        <li>
                            <a href="table.php">
                                <i class="fas fa-table"></i>Tableau</a>
                        </li>
                        <li class="active">
                            <a class="aIN" href="Ajoute.php">
                                <i class="far fa-check-square"></i>Insérer</a>
                        </li>
                        
                        </li>
                     
                    </ul> 
                </nav>
            </div>
            <nav  class="navbar-sidebar">
              <ul  class="list-unstyled navbar__list">
                     
                    <a href="../nd-admin/login-signUp/login.php">
                    <i class="far fa-arrow-right-from-bracket"></i>Logout</a>
                        
                    
             </ul>
            </nav>    
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
           
         <!-- PAGE CONTAINER-->
       

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div>
           <h1 class="titre text-center ">
           <strong>TABLEAU DES PRODUITS</strong>
           </h1>
       </div>
         
                        <div class="row rowTable">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped ">
                                        <thead>
                                            <tr>
                                                <th>NOM PRODUIT</th>
                                                <th>CATEGORIE</th>
                                                <th>UNIT SOLD</th>
                                                <th>QUANTITE DE STOCK</th>
                                                <th>ACTION</th>
                                            </tr>
                                          
                                     
                                        </thead>
                                        <tbody>
                                        <?php  foreach ($data as $value ) {
                    
                    ?>
                                            <tr>
                                                
                                                      <td><?php echo $value->getNom_Produit() ?></td>
                                                      <td><?php echo $value->getNom_Categorie() ?></td>
                                                      <td><?php echo $value->getPrix() ?></td>
                                                      <td><?php echo $value->getQuantite_stock() ?></td>
                                                
                                                
                                                <td> 
                                                    <a href="modifier.php?id=<?php echo $value -> getId_Produit() ?>">Editer</a>
                                                    <a href="suprimer.php?id=<?php echo $value -> getId_Produit() ?>" ><i class="far fa-trash-alt fa-pen-to-square tm-product-delete-icon"></i></a>
                                                </td>
                                            </tr>
                                           
                                               <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <a
                  href="ajoute.php"
                  class="btn btn-primary btn-block text-uppercase mb-3">Ajouter nouvelle produit </a>
                                                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
     <!-- liste categorie -->
     <?php $categorieData = $gestion->afficherCategorie() 
       
       ?>
        <div class="page-container">
            <!-- HEADER DESKTOP-->
           
         <!-- PAGE CONTAINER-->
       

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div>
           <h1 class="titre text-center ">
           <strong>TABLEAU DES CATEGORIE</strong>
           </h1>
       </div>
         
                        <div class="row rowTable">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped ">
                                        <thead>
                                            <tr>
                                                <th>NOM Categorie</th>
                                               
                                                <th>ACTION</th>
                                            </tr>
                                    
                                        </thead>
                                        <tbody>
                                        <?php 
                foreach ($categorieData as $value){
                  ?>
                                            <tr>
                                                
                                                      <td><?php echo $value-> getNom_Categorie() ?></td>
                                                      <td> <a href="suprimerCategorie.php?id=<?php echo $value -> getId_Produit() ?>" ><i class="far fa-trash-alt fa-pen-to-square tm-product-delete-icon"></i></a></td>
                                                      
                                                
                                                
                                        
                                            </tr>
                                           
                                               <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <a
                                href="ajouter-categorie.php"
                                class="btn btn-primary btn-block text-uppercase  col-lg-12 ">Ajouter nouvelle categorie</a>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
