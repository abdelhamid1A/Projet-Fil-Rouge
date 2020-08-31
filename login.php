<?php
  // session_start();
include('includes/header.php');

          if(isset($_POST['submit'])):
                
                
                $email = htmlentities($_POST['email']);
                $password = htmlentities($_POST['password']);
                $sql = "SELECT * FROM client WHERE email='$email'";
                $result = query($sql);
                $sql2 = "SELECT * FROM admin WHERE email='$email'";
                $result2 = query($sql2);  
 
                    // search and matching in table client 
                   if (mysqli_num_rows($result)>0) {
                       while($row = mysqli_fetch_array($result)){
                         if(password_verify($password,$row['password'])){
                              //  die($password);
                              $_SESSION['log']=true;
                              $_SESSION['user']=$row['nom'];
                              $_SESSION['id']=$row['idUser'];
                              redirect('index.php');
                              // echo '<div class="alert alert-success">mot de passe ou email est incorect</div>';
                            }else{
                              echo '<div class="alert alert-danger">mot de passe ou email est incorect</div>';
                            }
                        }
                    }
                           // search and matching in table admin
                    elseif(mysqli_num_rows($result2)>0){
                        while($row = mysqli_fetch_array($result2)){
                          if($password==$row['password']){
                            //  die($result2);
                            $_SESSION['logadmin']=true;
                            $_SESSION['admin']=$row['nom'];
                            $_SESSION['id']=$row['idAdmin'];


                            
                            redirect('admin.php');
                          }
                          else{
                            echo '<div class="alert alert-danger">email ou mot de passe incorecrt</div>';
                          }
                       }
                     }
              
                    //  if don't have any account
                    else{
                      echo '<div class="alert alert-danger">vous n\'avez pas un compte inscrire ici</div>';
                    }
            
                  
           endif;      
?>
      <div class="login-container d-flex align-items-center justify-content-center mt-5">
          <form action="login.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control rounded-pill btn-lg" name="email" placeholder="email">
            </div>

            <div class="form-group">
              <input type="password" class="form-control rounded-pill btn-lg" name="password" placeholder="mot de passe">
            </div>
            <button class="btn btn-primary btn-block rounded-pill btn-lg text-uppercase" name="submit" type="submit">connecte</button>
            <p class="mt-3 font-weight-normal">Vous n'avez pas encore de compte ?<a href="inscription.php"> Créez-en un !</a></p>
          </form>
     </div>
     
<?php
include('includes/footer.php')
?>
