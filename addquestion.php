<?php
include('includes/header.php');
if(isset($_POST['submit'])):
    $alert;
    $post = htmlentities($_POST['post']);
    $idUser = ($_SESSION['id']);
    if(empty($post)){
     $alert = 'ecrire votre qustion';
    }else{
        $sql = "INSERT INTO postforum(idUser,post) VALUES ('$idUser','$post')";
        if(query($sql)){
            redirect('forum.php');
        }else{
            echo "Error: " . $sql . " " . mysqli_error($con);
        }
        
    }
endif;    
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-5 mb-5 bg-white p-5 shadow-lg rounded">
            <?php
            if(!empty($alert)){
                echo '<div class="alert alert-danger rounded">ecrire votre qustion</div>';
            }
            
            ?>
            <form action="addquestion.php" method="post">
                <div class="form-group">
                <textarea type="text" class="form-control text-center rounded-pill btn-lg shdow-lg" name="post" placeholder="ecrire votre post"></textarea>
                </div>
                <button class="btn btn-primary btn-block rounded-pill btn-lg text-uppercase" name="submit" type="submit">poster</button>
                
            </form>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>