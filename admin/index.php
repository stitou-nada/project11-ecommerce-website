
   <!-- https://fonts.google.com/specimen/Roboto -->
   <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>


  <?php 
  
  include 'gestion.php';
  $gestion = new Gestion ; 
  $data = $gestion->afficher();


  
  ?>


  <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">NOM PRODUIT</th>
                    <th scope="col">CATEGORIE</th>
                    <th scope="col">UNIT SOLD</th>
                    <th scope="col">QUANTITE DE STOCK</th>
                    <th scope="col">DATE D'expiration</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
  

                <?php  foreach ($data as $value ) {
                    
                ?>
                <tr>
                    <th scope="row"><input type="checkbox" /></th>
                    <td class="tm-product-name"><?php echo $value->getNom_Produit() ?></td>
                    <td ><?php echo $value->getNom_Categorie() ?></td>
                    <td><?php echo $value->getPrix() ?></td>
                    <td><?php echo $value->getQuantite_stock() ?></td>
                    <td><?php echo $value->getDate_dexpiration() ?></td>
                    <td>
                      <a href="#" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
             
             
             
                  <?php    }  ?>   
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="ajouter-produit.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
            <button class="btn btn-primary btn-block text-uppercase">
              Delete selected products
            </button>
          </div>
        </div>