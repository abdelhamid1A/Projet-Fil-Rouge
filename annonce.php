<?php
include('includes/header.php');
if(isset($_POST['submit'])){
    $alert = [];
    $errors= [];
    // image info 
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_error = $_FILES['image']['error'];
    // end image info 
    $titre = htmlentities($_POST['titre']);
    $prix = htmlentities($_POST['prix']);
    $ville = htmlentities($_POST['ville']);
    $description = htmlentities($_POST['description']);
    $telephone = htmlentities($_POST['telephone']);
    $category = htmlentities($_POST['category']);
    $idUser = ($_SESSION['id']);
    // verfiy input if empty 
      if(empty($image_name)){
          $alert = 'ajoute l\'image ';
        }
      elseif(empty($titre)){
          $alert = 'ajoute le titre ';
        }
      elseif(empty($prix)){
          $alert = 'ajoute le prix ';
        }
      elseif(empty($ville)){
          $alert = 'ajoute la ville ';
        }
      elseif(empty($description)){
          $alert = 'ajoute votre decription facilite de trouve votre vehicule ';
        }
      elseif(empty($telephone)){
          $alert = 'ecrire votre telephone ';
        }
      
      else{
        //   array for valid extention imag 
          $allowedExtention = array('jpg','png','gif','jpeg');
        //   convert name of image to array separeted with '.' for extract the extention 
          $imageExtention = (explode('.',$image_name));
        //   take the last item in array 
          $imageExtentionEnd =strtolower(end($imageExtention));
        //   verfiy file upload extention if = extention valid 
          if (! in_array($imageExtentionEnd,$allowedExtention)) {
              $errors = 'ce type d\'image est invalide';
          }else{
                // take the last id in data base 
                $lastId = " SELECT MAX(idPostV) FROM postvehicule; ";
                $resul = query($lastId); 
                //   print_r($resul);
                $rep = mysqli_fetch_assoc($resul);
                $lastIdValue = $rep['MAX(idPostV)'];
                // concatination the image_name with the last id in database for upload image with name defirent 
                $imgNewName = $lastIdValue . $image_name ;
                //   die(print_r($imgNewName));
                // verify size of image 
                if($image_size > 1000000){
                    $errors = 'la taille de votre image est tres grand';
                }
                else{
                    $sql = " INSERT INTO postvehicule (image,titre,prix,ville,description,telephone,idUser,category) VALUES ('$imgNewName','$titre','$prix','$ville','$description','$telephone','$idUser','$category')";
                    
                    if(query($sql)){
                        echo '<div class="alert alert-success"">votre compte est bien enregiste</div>';
                        move_uploaded_file($image_temp, $_SERVER['DOCUMENT_ROOT'] .'\rougefin\upload\\' . $imgNewName);
                        redirect('index.php');
                    }else{
                        echo '<div class="alert alert-danger">votre compte n\'est pas enregiste</div>';
                        echo "Error: " . $sql;
                    }
                }
           }
          
      }
        
              
              
  
   }
   if ($_SESSION['log']=true):
       
   
//    echo ($_SESSION['id']);
?>
    <div class="container mt-5">
       <form action="" method="post" class="form-group" enctype="multipart/form-data">
           <div class="bg-white px-3 rounded-lg shadow-lg">
           <?php  
              if(!empty($alert)){
               echo '<div class="alert alert-danger text-center">'.$alert.'</div>';
              }
              if (!empty($errors)) {
                echo '<div class="alert alert-danger text-center">'.$errors.'</div>';
              }
               ?>
                <h3 class="text-body  text-center">ajoute une annonce</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">titre</label>
                        <input type="text" class="form-control" name="titre" style="text-transform:uppercase;">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">prix</label>
                        <input type="number" class="form-control " name="prix">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">ville</label>
                        <input type="text" class="form-control" name="ville" style="text-transform: lowercase;">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">telephone</label>
                        <input type="number" class="form-control" name="telephone">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">description</label>
                        <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>

                <div class="form-row d-flex ">
                <div class="form-group col-md-12">
                    <select class="custom-select" id="inputGroupSelect01" name="category">
                        <option selected value="voitur">voitur</option>
                        <option value="moto">moto</option>
                    </select>
                </div> 

                </div>

                <div class="form-row d-flex ">
                <div class="form-group col-md-12">
                        <button class="btn btn-primary mx-auto d-flex align-items-center justify-content-center" type="submit" name="submit">lanez votre annonce</button>
                </div> 

                </div>
            </div>
       </form>
    </div>
<?php
else:
    redirect('login.php');
endif;
include('includes/footer.php');
?>