	<head>
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




include "gestion.php";
// Trouver tous les employés depuis la base de données 
$gestion = new gestion();
//afficher dans input
if(isset($_GET['id'])){
    $afficherData = $gestion->afficherProduit($_GET['id']);
}

// modifier les donnes
// if(!empty($_POST)){
//     $id = $_POST['id'];
//     $nom = $_POST['nom'];
//     $prenom = $_POST['prenom'];
//     $Date_de_naissance = $_POST['Date_de_naissance'];
//     $gestionEmployes->Modifier($id,$nom,$prenom,$Date_de_naissance);
//     header('Location: index.php');
// }
?>


<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form method="POST" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Produit
                    </label>
                    <input
                      id="name"
                      name="nom_produit"
                      type="text"
                      class="form-control validate"
                      required
                      value="<?php echo $afficherData ->getNom_Produit() ?>"
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Prix
                    </label>
                    <input
                      id="name"
                      name="prix"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >Description</label
                    >
                    <textarea
                      class="form-control validate"
                      rows="3"
                      required
					   name="description"
                    ></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="category"
                      >Category</label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="category"
					  name="categorie_produit"
                    >
                    <option selected>Select category</option>
                    <?php  foreach($data as $value){ ?>
                      <option value="<?= $value->getId_Categorie()?>"><?= $value->getNom_Categorie();} ?> </option>
                      
                      
                    </select>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="expire_date"
                            >Expire Date
                          </label>
                          <input
                            id="expire_date"
                            name="date_d'expiration"
                            type="date"
                            class="form-control validate"
                            data-large-mode="true"
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Quantite de stock
                          </label>
                          <input
                            id="stock"
                            name="quantite_stock"
                            type="text"
                            class="form-control validate"
                            required
                          />
                        </div>
                  </div>
                  
              </div>
              <!-- <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById('fileInput').click();"
                  ></i>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <input id="fileInput" type="file" style="display:none;" />
                  <input
                    type="button"
                    class="btn btn-primary btn-block mx-auto"
                    value="UPLOAD PRODUCT IMAGE"
                    onclick="document.getElementById('fileInput').click();"
                  />
                </div> -->
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>