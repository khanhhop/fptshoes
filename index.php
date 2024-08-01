<?php 
ob_start();
@include_once('./Models/pdo.php');
@include_once('./Models/danhmuc.php');
@include_once('./Models/sanpham.php');
@include_once('./Models/lienhe.php');
// @include_once('./Models/bienthe.php');
@include_once('./Models/magiamgia.php');
// @include_once('./Models/khachhang.php');
@include_once('./Models/quanlyhoadon.php');
// @include_once('./Models/slider.php');


@include_once('Views/header.php');
if(isset($_GET['act']) && $_GET['act']){
    $act = $_GET['act'];
    switch($act){

// danh mục
        case 'danh-muc-list':
            $listDM = getAllDanhMuc();
            // var_dump($listDM);
            @include_once('Views/danhmuc/list.php');
            break;
        case 'danh-muc-add':
            @include_once('Views/danhmuc/add.php');
            break;
        case 'danh-muc-post':
            
                $error = [];  
                $check = true;
                if(isset($_POST['submit']) ){
                    if(isset($_POST['name']) && $_POST['name']){
                    if(check_name($_POST['name'],'danh_muc')){
                        $check = false;
                        $error['name']='Tên đã tồn tại !';
                    }else{
                    $name = $_POST['name'];

                    }
                    }else{
                        $check = false;
                        $error['name']='Bạn không được để trống';
        
                    }
                    
                    if($check == true){
                    postDanhMuc($name);
                    header('Location: index.php?act=danh-muc-list');
                
                    }else{
                        @include_once('Views/danhmuc/add.php');
                    }
    
    
                    // header('Location: index.php');
                }
                break;
        case 'danh-muc-edit':
            $id = isset($_GET['id'])? $_GET['id'] : 0;
            $danhMuc = getDanhMucById($id);
            extract($danhMuc);
            @include_once('Views/danhmuc/edit.php');
            break;
        case 'danh-muc-update':
            $error = [];
            $check = true;
            if(isset($_POST['submit']) ){
                if(isset($_POST['name']) && $_POST['name']){
                    if(check_name($_POST['name'],'danh_muc')){
                        $check = false;
                        $error['name']='Tên đã tồn tại !';
                    }else{
                    $name = $_POST['name'];

                    }
                    
                }else{
                    $check = false;
                    $error['name']='Bạn không được để trống';
    
                }
                if($check == true){
                    updateDanhMuc($_GET['id'],$name);
                header('Location: index.php?act=danh-muc-list');
                        
    
    
                    }else{
                        $id = isset($_GET['id'])? $_GET['id'] : 0;
                        $danhMuc = getDanhMucById($id);
                        var_dump($danhMuc);
                        extract($danhMuc);
                        @include_once('Views/danhmuc/edit.php');
                        
                    }
                }
            @include_once('Views/danhmuc/list.php');
            break;
        case 'danh-muc-delete':
            deleteDanhMuc($_GET['id']);
            header('Location: index.php?act=danh-muc-list');
            break;

// sản phẩm
        case 'san-pham-list':
            $listSP = getAllSanPham();
            @include_once('Views/sanpham/list.php');
            break;
        case 'san-pham-add':
                    $danhMuc = getAllDanhMuc();

            @include_once('Views/sanpham/add.php');
           
            
            break;
        case 'san-pham-post':
            $error = [];  
            $check = true;
            if(isset($_POST['submit']) ){
                
                if(empty($_POST['ten']) ){
                    $check = false;
                    $error['ten']='Bạn không được để trống';
                }else{
                    if(check_name($_POST['ten'],'danh_muc')){
                        $check = false;
                        $error['ten']='Tên đã tồn tại !';
                    }else{
                    $ten = $_POST['ten'];

                    }
    
                }
                if(isset($_POST['gia']) && $_POST['gia']){
                $gia = $_POST['gia'];
                    
                }else{
                    $check = false;
                    $error['gia']='Bạn không được để trống';
    
                }
                if(isset($_POST['moTa']) && $_POST['moTa']){
                $moTa = $_POST['moTa'];
                    
                }else{
                    $check = false;
                    $error['moTa']='Bạn không được để trống';
    
                }
                if(!empty($_FILES['anh']['name'])){
                    $anh = $_FILES['anh']['name'];
                    $tmp_name = $_FILES['anh']['tmp_name'];
                    $path_upload = './image/';
                    move_uploaded_file($tmp_name, $path_upload.$anh);
                }else {
                    $check = false;
                    $error['anh']='Bạn không được để trống';
                }

                if(isset($_POST['chatLieu']) && $_POST['chatLieu']){
                    $chatLieu = $_POST['chatLieu'];
                        
                    }else{
                        $check = false;
                        $error['chatLieu']='Bạn không được để trống';
        
                    }
                if(isset($_POST['id_dm']) && $_POST['id_dm']){
                    $id_dm = $_POST['id_dm'];
                        
                    }else{
                        $check = false;
                        $error['tendanhmuc']='Bạn không được để trống';
        
                    }

                if($check == true){
                    postSanPham($id_dm,$anh,$ten,$moTa,$chatLieu);
                    header('Location: index.php?act=san-pham-list');

                    

                }else{
                    $danhMuc = getAllDanhMuc();
                    @include_once('Views/sanpham/add.php');
                }
            }


            break;
        case 'san-pham-edit':
            $id = isset($_GET['id'])? $_GET['id'] : 0;
            $sanPham = getSanPhamById($id);
            $danhMuc = getAllDanhMuc();
            var_dump($danhMuc);
            var_dump($sanPham);
            extract($sanPham);
            @include_once('Views/sanpham/edit.php');
            break;
        case 'san-pham-update':
            $error = [];
            $check = true;
            if(isset($_POST['submit']) ){
                if(isset($_POST['name']) && $_POST['name']){
                    if(check_name($_POST['name'],'danh_muc')){
                        $check = false;
                        $error['name']='Tên đã tồn tại !';
                    }else{
                    $name = $_POST['name'];

                    }
                    
                }else{
                    $check = false;
                    $error['name']='Bạn không được để trống';
    
                }
                if($check == true){
                    updateDanhMuc($_GET['id'],$name);
                header('Location: index.php?act=san-pham-list');
                        
    
    
                    }else{
                        $id = isset($_GET['id'])? $_GET['id'] : 0;
                        $sanPham = getSanPhamById($id);
                        extract($sanPham);
                        @include_once('Views/sanpham/edit.php');
                        
                    }
                }
            @include_once('Views/sanpham/list.php');
            break;
        case 'san-pham-delete':
            deleteSanPham($_GET['id']);
            header('Location: index.php?act=san-pham-list');
            break;
//liên hệ
        case 'lien-he-list':
            $listLH = getAllLienHe();
            // var_dump($listLH);
            @include_once('Views/lienhe/list.php');
            break;
        case 'lien-he-add':
            break;
        case 'lien-he-post':
            break;
        case 'lien-he-edit':
            break;
        case 'lien-he-update':
            break;
        case 'lien-he-delete':
            break;
//mã giảm giá
        case 'ma-giam-gia-list':
            $listGG= getAllMaGiamGia();
            @include_once('Views/magiamgia/list.php');
            break;
        case 'ma-giam-gia-add':
            break;
        case 'ma-giam-gia-post':
            break;
        case 'ma-giam-gia-edit':
            break;
        case 'ma-giam-gia-update':
            break;
        case 'ma-giam-gia-delete':
            break;
//quản lý hóa đơn
        case 'quan-ly-hoa-don-list':
            $listHD= getAllHoaDon();
            @include_once('Views/quanlyhoadon/list.php');
            break;
        case 'quan-ly-hoa-don-add':
            break;
        case 'quan-ly-hoa-don-post':
            break;
        case 'quan-ly-hoa-don-edit':
            break;
        case 'quan-ly-hoa-don-update':
            break;
        case 'quan-ly-hoa-don-delete':
            break;
// ngoại lệ           
            default:
            @include_once('Views/home.php');
         break;
    }

} else {@include_once('Views/home.php');

}



@include_once('Views/footer.php');
ob_flush();
?>