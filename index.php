<?php

include('includes/header.php');
$sql = " SELECT * FROM ads WHERE active=1";
$result = query($sql);
$row = mysqli_fetch_array($result);

?>
     <!-- start body  -->
     <div class="par">
        <p>Achat et vente très facile avec Wasit</p>
      </div>
     <div class="container mt-5">
       
     <div>

       <form  action="filter.php" method="post" style="background-color: white;padding: 40px;border-radius: 30px">
  <div class="form-row">
    <div class="form-group col-md-4">
      <input type="text" name="titre"  placeholder="Rechercher" class="form-control" style="border-radius: 30px">
    </div>
    <div class="form-group col-md-4">
      <input type="text" name="ville"  placeholder="Ville" class="form-control" style="border-radius: 30px" >
    </div>

    <div class="form-group col-md-4">
    
      <select id="inputState" name="category" class="form-control" style="border-radius: 30px">
         <option value="moto" selected>moto</option>
          <option value="voitur">voiture</option>
      </select>
    </div>
   
   </div>
  <button type="submit" class="btn btn-danger d-block mx-auto " style="border-radius: 30px">Rechecher</button>
  
</form>

</div>  


       

     </div>
     <!-- end filter  -->
     <!-- start ads  -->
     <div class="ads">
<?php 
echo ' <img src="ads/'.$row['image'].'" class="card-img-top" alt="...">'
?>
     </div>
     <!-- end ads  -->
     <!-- start category  -->
     <div class="category align-items-center justify-content-center ">
      <p class="parcat">Choisissez une catégorie</p>
        <div class="row align-items-center justify-content-center vb">
          <div class="col-md-6 col-12 align-items-center justify-content-center">
            <div class="card" style="width: 100%;">
              <img src="img/car.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Voiture</h5>
                <a href="search.php?cat=voitur" class="btn btn-primary">plus</a>
              </div>
            </div>
          </div>
          <!-- <div class="col-md-2 col-12 section"></div> -->
          <div class="col-md-6  col-12 align-items-center justify-content-center">
            <div class="card" style="width: 100%;">
              <img src="img/moto.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Moto</h5>
                <a href="search.php?cat=moto" class="btn btn-primary">plus</a>
              </div>
            </div>
          </div>
        </div>
      </div>
     <!-- end gategoru  -->
     <!-- start populair brand  -->
     <div class="par">
      <p>Recherches populaires</p>
    </div>
   <div class="search container">
     
     <div class="filter row">
      <button><a href="#">KAWASAKI Z 750</a></button>
      <button><a href="#">YAMAHA R1</a></button>
      <button><a href="#">GSX-R 1000</a></button>
      <button><a href="#">SANYA FICE R50</a></button>
      <button><a href="#">Volkswagen Tiguan</a></button>
      <button><a href="#">DACIA</a></button>
      <button><a href="#">renault</a></button>
      <button><a href="#">mercedes</a></button>
      <button><a href="#">toyota</a></button>
     </div>
   </div>
     <!-- end populaire brand  -->
     <!-- end body  -->

 <!-- start footer  -->
 <?php
 include('includes/footer.php');
 ?>


