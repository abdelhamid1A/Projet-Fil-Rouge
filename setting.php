<?php
  include('includes/header.php');
          
            if ((isset($_SESSION['log']) && $_SESSION['log']=true)) {
             
              $idUser = $_SESSION['id'];
              $sql = " SELECT * FROM client WHERE idUser = $idUser";
              $result = query($sql);
              $info = mysqli_fetch_array($result);
              if(isset($_POST['bt'])){
                $telephone = $_POST['telephone'];
                $ville = $_POST['ville'];
                $sql = " UPDATE client SET ville='$ville', telephone ='$telephone' WHERE idUser='$idUser'";
                  if(query($sql)){
                    redirect('setting.php');
                  }else{
                    echo '<div class="alert alert-danger">you can\'t update youe info now</div>';
                  }
                
              }



              ?>


  <!-- end nav  -->
     




     <div class="container mt-5">

     	
     	<div class="row">
  
   

     		<div class="col-lg-12 mb-5">
   
    
   <div class="form-group">
    <label >fisrtName</label>
    <input type="text" class="form-control"  value="<?php echo $info['nom']?>">
    
  </div>  			
  <div class="form-group">
    <label >Last Name</label>
    <input type="text" class="form-control" value="<?php echo $info['prenom']?>" >
   
  </div>
  <div class="form-group">
    <label >Email address</label>
    <input type="email" class="form-control" value="<?php echo $info['email']?>" disabled>
    
  </div>
  <form action="" method="POST">
  <div class="form-group">
    <label>Téléphone: </label><h6 style="display:inline" class="text-secondary"> tu peux changer voter numero de telephone  </h6>
    <input type="text" class="form-control" value="<?php echo $info['telephone']?>" name="telephone"  >
  </div>
  <div class="form-group">
    <label >ville :</label><h6 style="display:inline;" class="text-secondary"> tu peux changer la ville  </h6>
    <input type="text" class="form-control" value="<?php echo $info['ville']?>" name="ville" >
  </div>

  
  
  <button type="submit" class="btn btn-primary btn-lg d-block mx-auto " name="bt">Submit</button>
</form>
 
  





 </div>

     	</div>
     	
     </div>

<?php
 include('includes/footer.php');
 ?>






















    
  

        <?php
          }else{

            header('Location:login.php');
            exit();
          }


        ?>


    
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

   <script>
    let pa= document.getElementById('pass');


   pa.onfocus= function () {
     	
     	pa.type="text";
     }
   pa.onblur= function () {
     	
     	pa.type="password";
     }

   

   

</script> -->


</body>

</html>
