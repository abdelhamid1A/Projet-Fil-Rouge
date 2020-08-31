<?php
include('includes/header.php');
$search = $_POST['titre'];
$category = $_POST['category'];
$ville = $_POST['ville'];
// $search = $_POST['search'];
// print_r($search);
$sql = "SELECT * FROM postvehicule WHERE titre LIKE '%$search%' AND category LIKE '%$category%' AND ville LIKE '%$ville%'";
$result = query($sql);
if (mysqli_num_rows($result)>0):
    // die(print_r(mysqli_num_rows($result)));

?>
<div class="container">
    <?php while($row = mysqli_fetch_array($result)) :?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="postCard mt-5 bg-white rounded pl-4 pr-4 pb-4 pb-4 pt-2">
                <div class="row">
                    <div class="col-lg-7 col-sm-12">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="upload/<?php echo $row['image'] ?>" alt="" class="img-fluid img-thumbnail mx-auto d-block rounded position-relative _moveTop shadow-lg">
                            </div>
                            <div class="col-md-12">
                                <div class="_day">
                                    <span class="_date"><?php echo $row['date'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="pb-2 mb-2 border-bottom">
                                    <div class="_blogTitle font-weight-bold h5"><?php echo $row['titre'] ?></div>
                                    <div class="badge badge-pill mt-2 bg-primary text-white d-inline-flex align-items-center ">
                                    <i class="fa fa-phone mr-1"></i><?php echo $row['telephone'] ?>
                                    </div>
                                    <div class="badge badge-pill mt-2 bg-primary text-white d-inline-flex align-items-center ">
                                    <i class="fa fa-map-marker mr-1"></i><?php echo $row['ville'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="_content mt-2">
                                  <?php echo $row['description'] ?>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button class="btn btn-primary"><?php echo $row['prix'] ?> DH</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
    endwhile;
    else : 
        echo '<div class="container"><div class="alert alert-success text-center mt-5">aucun vihecule a ete trouve</div></div>';
    endif; ?>

    <!-- <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="postCard mt-5 bg-white rounded pl-4 pr-4 pb-4 pb-4 pt-2">
                <div class="row">
                    <div class="col-lg-7 col-sm-12">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="../img/kaw.jpg" alt="" class="img-fluid img-thumbnail mx-auto d-block rounded position-relative _moveTop shadow-lg">
                            </div>
                            <div class="col-md-12">
                                <div class="_day">
                                    <span class="_date">5</span>july
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="pb-2 mb-2 border-bottom">
                                    <div class="_blogTitle font-weight-bold h5">kawasaki Z1000 sogumi</div>
                                    <div class="badge badge-pill mt-2 bg-primary text-white d-inline-flex align-items-center ">
                                    <i class="fa fa-phone"> </i>  0612345678
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="_content mt-2">
                                Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button class="btn btn-primary"><a href="#">voir plus</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</div>
<?php
include('includes/footer.php')
?>