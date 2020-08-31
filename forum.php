<?php
include('includes/header.php');
//  for add comment 
if(isset($_POST['submit'])){
    $comment = htmlentities($_POST['comment']);
    $idUser = $_POST['idUser'];
    $idPostF = $_POST['idPostF'];
    $alert;
    if(empty($comment)){
        $alert ='ecrire votre message';
    }else{
        $sql1 = " INSERT INTO comment(idUser, idPostF, comment) VALUES ('$idUser','$idPostF','$comment')";
        if(query($sql1)){
            redirect('forum.php');
        }else{
            echo "Error: " . $sql . " " . mysqli_error($con);
        }
    }
}

    
?>
<div class="container">
    <h1 class="expirense">Posez votre question ou partagez votre expérience avec la famille de wasit</h1>
    <!-- <div class="fixed-action-btn"> -->
        <?php 
        if ((isset($_SESSION['log']) && $_SESSION['log']=true)) { 
    echo '<button class="btn btn-primary fixed-bottom"><a href="addquestion.php"><i class="fa fa-question-circle mr-1"></i>ajoute un post</a></button>';
        }else{
            echo '<button class="btn btn-primary fixed-bottom"><a href="login.php"><i class="fa fa-question-circle mr-1"></i>ajoute un post</a></button>';
        }
?>
        <div class="row">
            
            <?php 
            
                // for display forum post 
                $sql = " SELECT * FROM postforum";
                $result = query($sql);
                // print_r($result);
               //    if result more than 0
                if (mysqli_num_rows($result)>0):
                    while($post = mysqli_fetch_array($result)):
                
                    
            ?>
            <div class="col-lg-12">
                <div class="accordion" id="accordionExample">
                    <div class="card _card">
                        <div class="card-header _card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link _btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <!-- display post -->
                            <?php echo $post['post']?>
                            </button>
                        </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <?php 
                            // for display comment 
                            $idPostF = $post['idPostF'];
                            $sql = " SELECT * FROM comment WHERE idPostF = $idPostF";
                            $resultComment = query($sql);
                            if(mysqli_num_rows($resultComment)>0):
                                while($commentes = mysqli_fetch_array($resultComment)):
                                    echo  '<div class="card-body _card-body border-bottom">'.$commentes['comment'].'</div>' ;
                                endwhile;
                            endif;
                            ?>
                        </div>
                        
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body _card-body">
                            <!-- form for send comment to db  -->
                            <form action="forum.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-pill btn-lg" name="comment" placeholder="commentaire">
                                </div>
                                    <input type="hidden" name="idPostF" value="<?php echo $post['idPostF']?>">
                                    <input type="hidden" name="idUser" value="<?php echo $_SESSION['id'] ?>">
                                    <?php
                                    if ((isset($_SESSION['log']) && $_SESSION['log']=true)) {
                                  echo  '<button class="btn btn-primary btn-block rounded-pill btn-lg text-uppercase" type="submit" name="submit">ajout un commentaire</button>';
                                    }else{
                                        echo  '<button class="btn btn-primary btn-block rounded-pill btn-lg text-uppercase" ><a href="login.php">ajout un commentaire</a></button>';

                                    }
?>

                                
                            </form>
                        </div>
                        
                        
                    </div>
                    
                </div>
                
            </div> 
        
        </div>
        <?php
    endwhile;
    endif; 
        ?>
    </div>
</div>

<?php
    

include('includes/footer.php');
?>

        <!-- second question  -->
        <!-- <div class="col-lg-12">
            <div class="accordion" id="accordionExample">
                <div class="card _card">
                    <div class="card-header _card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link _btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        salam l5ot bit nsawalkom 3la sanya wach mzn
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body _card-body border-bottom">
                        ah mzn a5oya
                    </div>
                    <div class="card-body _card-body">
                        ah sawal 3la taman
                    </div>
                    </div>
                </div>
            </div>   
        </div>-->

