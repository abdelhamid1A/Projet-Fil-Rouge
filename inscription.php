<?php
include('includes/header.php');
if(isset($_POST['submit'])){
  $alert = [];
  $nom = htmlentities($_POST['nom']);
  $prenom = htmlentities($_POST['prenom']);
  $email = htmlentities($_POST['email']);
  $password = htmlentities(password_hash($_POST['password'],PASSWORD_DEFAULT));
  $ville = htmlentities($_POST['ville']);
  $telephone = htmlentities($_POST['telephone']);
    if(empty($nom)){
        $alert = 'ecrire votre nom ';
      }
    elseif(empty($prenom)){
        $alert = 'ecrire votre prenom ';
      }
    elseif(empty($email)){
        $alert = 'ecrire votre email ';
      }
    elseif(empty($password)){
        $alert = 'ecrire votre mot de passe ';
      }
    elseif(empty($ville)){
        $alert = 'ecrire votre ville ';
      }
    elseif(empty($telephone)){
        $alert = 'ecrire votre telephone ';
      }
    
    else{
    

        $sql = " INSERT INTO client VALUES ('','$nom','$prenom','$email','$password','$ville','$telephone')";
        if(query($sql)){
            echo '<div class="alert alert-success"">votre compte est bien enregiste</div>';
            redirect('index.php');
        }else{
            echo '<div class="alert alert-danger">votre compte n\'est pas enregiste</div>';
            echo "Error: " . $sql;
        }
        
    }
      
            
            

 }
?>
     <!-- start body  -->
     <div class="login-container d-flex align-items-center justify-content-center mt-5">
       <form action="inscription.php" method="POST">
       <?php  
              if(!empty($alert)){
                echo '<div class="alert alert-danger">'.$alert.'</div>';
              }
        ?>
         <div class="form-group">
           <input type="text" class="form-control rounded-pill btn-lg" name="nom" placeholder="nom">
         </div>

         <div class="form-group">
           <input type="text" class="form-control rounded-pill btn-lg" name="prenom" placeholder="prenom">
         </div>

         <div class="form-group">
           <input type="text" class="form-control rounded-pill btn-lg" name="email" placeholder="email">
         </div>

         <div class="form-group">
           <input type="password" class="form-control rounded-pill btn-lg" name="password" placeholder="mot de passe" id="password" onkeyup="passwordVerify()" onfocusin="watchPassword()" onfocusout="hidePassword()">
         </div>

         <div class="form-group">
           <input type="text" class="form-control rounded-pill btn-lg" name="ville" placeholder="ville">
         </div>

         <div class="form-group">
           <input type="number" class="form-control rounded-pill btn-lg" name="telephone" placeholder="telephone" maxlength="10">
         </div>

         <button class="btn btn-primary btn-block rounded-pill btn-lg text-uppercase" name="submit" type="submit">Inscri</button>
         <p class="mt-3 font-weight-normal">Vous avez déjà un compte ?<a href="login.php"> Connectez ici :)</a></p>
       </form>
     </div>
  <script>
  function passwordVerify(){
      var password = document.getElementById("password").value;
      var pass     = document.getElementById("password");
        console.log(password);
        if(password.match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})")){
          pass.style.borderColor = '#2CB33E';
        }else{
          pass.style.borderColor = '#F81F2E';
        }
  }

  function watchPassword(){
    var pass = document.getElementById("password");     
        pass.type ="text";
  }
  
  function hidePassword(){
    var pass = document.getElementById("password");
        pass.type ="password";   
  }
  
  </script>   
<?php
include('includes/footer.php')
?>
