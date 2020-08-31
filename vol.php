
<?php

include('includes/header.php');


if(isset($_POST['vin'])){
  $alert = [];
  $vin = htmlentities($_POST['vin']);
  

    if(empty($vin)){
        $alert = 'Entrer votre Vin';
      }
  
    
    if(empty($alert)){
    

        $sql = " INSERT INTO postvol VALUES ('','$vin')";
        if(query($sql)){
            echo '<div class="alert alert-success"">votre compte est bien enregiste</div>';
            redirect('vol.php');
        }else{
            echo '<div class="alert alert-danger">votre compte n\'est pas enregiste</div>';
            echo "Error: " . $sql;
        }
         }
        
    }
      


?>


<?php


if(isset($_POST['submit'])){
  $msg = [];
  $ms="";
  $search = htmlentities($_POST['search_vin']);
  

    if(empty($search)){
        $msg = 'Entrer votre Vin qui tu veux rechercher';
      }
  
    
    if(empty($msg)){
    

        $sql = " SELECT * FROM postvol WHERE vin LIKE '%$search%'";
        $que =query($sql);
        $count = mysqli_num_rows($que);

        if ($count > 0) {
          $ms = '<div class="alert alert-danger mx-auto">attention ce numéro de châssis est déjà signalé</div>';

        }else{
              
              $ms ='<div class="alert alert-success mx-auto">ce numéro de châssis est jamais signalé</div>';
            
        }
         }
        
    }
      


?>


     



    <div class="container mt-5">
      
    	     <div class="row">

            <?php  
              if(!empty($alert)){
                echo '<div class="alert alert-danger mx-auto">'.$alert.'</div>';
              }


              if(!empty($msg)){
                echo $msg= '<div class="alert alert-danger mx-auto">'.$msg.'</div>';
              }
                
              if(!empty($ms)){
                echo $ms;
              }
                

        ?>

                   <div class="col-md-12">
      	                 <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Signaler</button>
                   </div>
              <div class="coform">
                 <div class="col-md-12 mt-5">  
                 
                   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
    
                         <input type="text" class="form-control rounded-pill" name="search_vin" placeholder="Entrer Vin" >
                          </div>
  
                           <button type="submit" name="submit" class="btn btn-primary d-block mx-auto mt-2 rounded-pill">rechecher</button>
                           </form>
                
                  </div>
              </div>

           </div> 

     </div> 




   <!-------------------- START MODEL -------------------->


   

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Signaler</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="form-group">
            <label  class="col-form-label">Entrer Vin:</label>
            <input type="text" name="vin" class="form-control" >
          </div>
         
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
      </div>
    </div>
  </div>
</div>







    

 <!-- start footer  -->
 <?php
 include('includes/footer.php');
 ?>


