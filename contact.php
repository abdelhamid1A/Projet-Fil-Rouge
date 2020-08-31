<?php

include('includes/header.php');

?>
    
    <div class="container mt-5" style="width: 60%">
      <div class="row">
        
          <div class="col-12">
            


  <div class="form-group">
    <label >le nom</label>
    <input type="text" id="nom" class="form-control" placeholder="Entrer votre nom">
  </div>
  <div class="form-group">
    <label >email</label>
    <input type="email" id="email" class="form-control" placeholder="Entrer votre email">
  </div>
  <div class="form-group">
    <label >objectif</label>
    <textarea id="message" class="form-control" rows="3"></textarea>
  </div>
   <button type="submit" onclick="mes();" class="btn btn-primary d-block mx-auto">Envoyer</button>













          </div>



      </div>




    </div> 







 <!-- start footer  -->
     <div class="footer-top">
       <div class="container">
         <div class="row">
           <div class="col-md-3 col-ms-6 col-xs-12 segment-1 res">
             <h3>Wasit / وسيط</h3>
             <p>- Une plateforme de vente et achat automobile (moto /voiture) neuves ou d’occasion.<br>
              - Forum pour change l’expérience, et donnes des conseils .<br>
              - Espace de signale d'une voiture, si le cas de vol.
               .</p>
           </div>

           <div class="col-md-3 col-ms-6 col-xs-12 segment-2 res">
            <h2>Quick Link</h2>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Forum</a></li>
              <li><a href="#">vol</a></li>
              <li><a href="#">Deposer une annonce</a></li>
            </ul>
          </div>

          <div class="col-md-3 col-ms-6 col-xs-12 segment-3 res">
            <h2>social media</h2>
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
            <a href=""><i class="fa fa-linkedin"></i></a>
            <a href=""><i class="fa fa-pinterest"></i></a>
          </div>

          <div class="col-md-3 col-ms-6 col-xs-12 segment-4 res">
            <h2>contactez-nous</h2>
            <p>écrire votre email pour participer dans la famille de wasit.</p>
            <form action="" method="post">
              <input type="email" name="" id="">
              <input type="submit" value="subscribe">
            </form>
          </div>

         </div>
       </div>
     </div>
     <!-- end footer  -->

<script >
   
 

     function mes(){

      let nom = document.getElementById('nom').value;
      let email = document.getElementById('email').value;
      let message = document.getElementById('message').value;
       console.log(nom,email,message);


    if(nom != "" && email != "" && message != ""){


  
       let xhttp = new XMLHttpRequest();
       xhttp.open("POST", "email.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhttp.onload = function() {

     // let data =JSON.parse(this.responseText);
      console.log(this.responseText);

 
    }
  
  xhttp.send("nom="+nom+"&email="+email+"&message="+message);

  
       nom = document.getElementById('nom').value="";
       email = document.getElementById('email').value="";
       message = document.getElementById('message').value="";


              alert("le messsage a ete envoyer ");

      console.log("envo");
      }else{

        alert("remplir tout les champs ");
      }

  }





</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
</body>
</html>

