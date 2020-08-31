<?php
include('includes/header.php');
$category = $_GET['cat'];
$result = show_product_with_cat($con,$category);

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
                                    <span class="_date" id="date"><?php echo $row['date'] ?></span>
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

    <?php endwhile; ?>

   

</div>
<div class="scrollup">
       <i class="fa fa-chevron-up fa-3x scroll-up"></i> 
    </div>

<?php
include('includes/footer.php')
?>