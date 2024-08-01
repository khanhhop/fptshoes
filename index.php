<?php
    session_start();
    $is_homepage = true;
    require_once ('component/header.php');
?>


    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm đặc trưng</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <?php 
                                $sql_str = "SELECT * FROM danh_muc order by ten_dm";
                                $result = mysqli_query($conn, $sql_str);
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <li data-filter=".<?=$row['ten_dm']?>"><?=$row['ten_dm']?></li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
            <?php 
                $sql_str = "SELECT san_pham.id_sp, san_pham.ten_sp, san_pham.anh, san_pham.gia, danh_muc.ten_dm as tendm 
                            FROM san_pham 
                            JOIN danh_muc ON san_pham.id_dm = danh_muc.id_dm";
                $result = mysqli_query($conn, $sql_str);
                while($row = mysqli_fetch_assoc($result)){
                    $anh_arr = explode(';', $row['anh']);
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix <?=$row['tendm']?>">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="<?= "img/" . $anh_arr[0] ?>">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="shop-details.php?id=<?= $row['id_sp'] ?>"><?= $row['ten_sp'] ?></a></h6>
                        <h5><?= number_format($row['gia'], 0, ',', '.') . '₫' ?></h5>
                    </div>
                </div>
            </div>
            <?php } ?>

            </div>
        </div>
    </section>
    <!-- Featured Section End -->


    <!-- Latest Product Section Begin -->
    
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    
    <!-- Blog Section End -->

<?php 
    require_once('component/footer.php');
?>