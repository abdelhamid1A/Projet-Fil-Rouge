<?php
if ((isset($_SESSION['logadmin']) && $_SESSION['logadmin']=true)) {  
  if(isset($_POST['submit'])){
    $alert = [];
    
    // image info 
    $image_name = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $idAdmin = $_SESSION['id'];
    // end image info 
    if(empty($image_name)){
        $alert = 'ajoute l\'image ';
      }else{
           // take the last id in data base 
           $sql = "DELETE FROM ads";
           query($sql);
           $lastId = " SELECT MAX(idAds) FROM ads; ";
           $resul = query($lastId);
        //   die(print_r($resul)); 
           //   print_r($resul);
           $rep = mysqli_fetch_assoc($resul);
           $lastIdValue = $rep['MAX(idAds)'];
           // concatination the image_name with the last id in database for upload image with name defirent 
           $imgNewName = $lastIdValue . $image_name ;
           $sql = " INSERT INTO ads (idAdmin,image,active) VALUES ('$idAdmin','$imgNewName',1)";
        
        if(query($sql)){
            
            move_uploaded_file($image_temp, $_SERVER['DOCUMENT_ROOT'] .'\rouge\ads\\' . $imgNewName);
            redirect('index.php');
        }else{
            echo '<div class="alert alert-danger">votre compte n\'est pas enregiste</div>';
            echo "Error: " . $sql;
        }
    }
  }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group col-md-6">
        <label for="">image</label>
        <input type="file" class="form-control rounded-pill btn-lg" name="image">
    </div>
    <div class="form-group col-md-12">
            <button class="btn btn-primary " type="submit" name="submit">lanez votre annonce</button>
    </div> 
</form>
