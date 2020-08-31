<?php
include('includes/header.php');
if ((isset($_SESSION['logadmin']) && $_SESSION['logadmin']==true)) {
  
    $sql = " SELECT * FROM postforum";
    $result = query($sql);
    ?>
    <div class="container-fluid">
        <div class="row">
          <nav class="col-md-2 col-sm-12 shadow-lg d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                
                <li class="nav-item">
                  <a class="nav-link" href="?page=adminforum">
                    forum Post
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?page=ads">

                    advertising
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?page=nbrpost">
                    nombre des annonces 
                  </a>
                </li>
                

              </ul>



            </div>
          </nav>

          <main role="main" class="col-md-10 col-sm-12  px-4">
            <div
              class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h2 class="text-primary">Bienvenue dans le tableau de bord</h2>
            </div>

              <br>
              <br>
            

    <?php
        if(@$_GET['page']){
            $url = $_GET['page'] . ".php";
            if(is_file($url)){
                include( $url);
            }else{
                echo 'page not found';
                // print_r($url);
            }
        }else{
            include('ads.php');
        }
    ?>








          
          </main>
        </div>
      </div>

    <?php
    include('includes/footer.php');
      }else{
        echo '<div class="text-center mt-5">
        <span style="font-weight: bolder;font-size:24px">404</span>
      </div>';
      
      }
    ?>