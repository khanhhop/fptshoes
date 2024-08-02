<?php 
ob_start();
@include_once('./Models/pdo.php');
@include_once('./Models/danhmuc.php');
@include_once('./Models/sanpham.php');
@include_once('./Models/lienhe.php');
@include_once('./Models/bienthe.php');
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
                    if(check_name('ten_dm',$_POST['name'],'danh_muc')){
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
                    if(check_name('ten_dm',$_POST['name'],'danh_muc')){
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
                        // var_dump($danhMuc);
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
                    if(check_name('ten_sp',$_POST['ten'],'san_pham')){
                        $check = false;
                        $error['ten']='Tên đã tồn tại !';
                    }else{
                    $ten = $_POST['ten'];

                    }
    
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
            // var_dump($sanPham);
            extract($sanPham);
            @include_once('Views/sanpham/edit.php');
            break;
        case 'san-pham-update':
            
            $error = [];
            $check = true;
            if(isset($_POST['submit']) ){
                if(isset($_POST["ten_sp"]) && $_POST["ten_sp"]){
                    
                    $name = $_POST["ten_sp"];
                             
                }else{
                    $check = false;
                    $error["ten_sp"]='Bạn không được để trống';
    
                }
                if(isset($_POST['mo_ta']) && $_POST['mo_ta']){
                    $moTa = $_POST['mo_ta'];
                        
                    }else{
                        $check = false;
                        $error['mo_ta']='Bạn không được để trống';
        
                    }
                    if(!empty($_FILES['anh']['name'])){
                        $image = $_FILES['anh']['name'];
                        $tmp_name = $_FILES['anh']['tmp_name'];
                        $path_upload = './image/';
                        move_uploaded_file($tmp_name, $path_upload.$image);
                    }else {
                        $image = null;
                    }
    
                    if(isset($_POST['chat_lieu']) && $_POST['chat_lieu']){
                        $chatLieu = $_POST['chat_lieu'];
                            
                        }else{
                            $check = false;
                            $error['chat_lieu']='Bạn không được để trống';
            
                        }
                    if(isset($_POST['id_dm']) && $_POST['id_dm']){
                        $id_dm = $_POST['id_dm'];
                            
                        }else{
                            $check = false;
                            $error['id_dm']='Bạn không được để trống';
            
                        }
    
                if($check == true){
                    updateSanPham($_GET['id'],$id_dm,$image,$name,$moTa,$chatLieu);
                header('Location: index.php?act=san-pham-list');  
                    }else{
                     
                        $id = isset($_GET['id'])? $_GET['id'] : 0;
                        $sanPham = getSanPhamById($id);
                        $danhMuc = getAllDanhMuc();
                        extract($sanPham);
                        @include_once('Views/sanpham/edit.php');         
                    }
                }
            // @include_once('Views/sanpham/list.php');
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
        // case 'lien-he-add':
            @include_once('Views/lienhe/add.php');
            break;
        // case 'lien-he-post':
        //     $error = [];  
        //     $check = true;
        //     if(isset($_POST['submit']) ){
        //         if(empty($_POST['ten']) ){
        //             $check = false;
        //             $error['ten']='Bạn không được để trống';
        //         }else{
        //             if(check_name('ten',$_POST['ten'],'lien_he')){
        //                 $check = false;
        //                 $error['ten']='Tên đã tồn tại !';
        //             }else{
        //             $ten = $_POST['ten'];
        //             }
        //         }

        //         if(isset($_POST['email']) && $_POST['email']){
        //         $email = $_POST['email'];
        //         }
        //         else{
        //             $check = false;
        //             $error['email']='Bạn không được để trống';
        //         }

        //         if(isset($_POST['sdt']) && $_POST['sdt']){
        //         $sdt = $_POST['sdt'];
        //         }else{
        //             $check = false;
        //             $error['sdt']='Bạn không được để trống';
        //         }

        //         if(isset($_POST['tin_nhan']) && $_POST['tin_nhan']){
        //         $tin_nhan = $_POST['tin_nhan'];
        //         }else{
        //             $check = false;
        //             $error['tin_nhan']='Bạn không được để trống';
        //         }
                
        //         if($check == true){
        //         postLienHe($ten,$email,$sdt,$tin_nhan);
        //         header('Location: index.php?act=lien-he-list');
            
        //         }else{
        //             @include_once('Views/lienhe/add.php');
        //         }


        //         // header('Location: index.php');
        //     }
            
        //     break;
        // case 'lien-he-edit':
        //     $id = isset($_GET['id'])? $_GET['id'] : 0;
        //     $lienHe = getLienHeById($id);
        //     extract($lienHe);
        //     @include_once('Views/lienhe/edit.php');
        //     break;
        // case 'lien-he-update':
        //     $error = [];
        //     $check = true;
        //     if(isset($_POST['submit']) ){
        //         if(isset($_POST['ten']) && $_POST['ten']){
        //             $ten = $_POST['ten'];
        //         }else{
        //             $check = false;
        //             $error['ten']='Bạn không được để trống';
        //         }
          
        //         if(isset($_POST['email']) && $_POST['email']){
        //             $email = $_POST['email'];
        //         }else{
        //             $check = false;
        //             $error['email']='Bạn không được để trống';
        //         }
        //         if(isset($_POST['sdt']) && $_POST['sdt']){
        //             $sdt = $_POST['sdt'];
        //         }else{
        //             $check = false;
        //             $error['sdt']='Bạn không được để trống';
        //         }
        //         if(isset($_POST['tin_nhan']) && $_POST['tin_nhan']){
        //             $tin_nhan = $_POST['tin_nhan'];
        //         }else{
        //             $check = false;
        //             $error['tin_nhan']='Bạn không được để trống';
        //         }
        //         if($check == true){
        //             updateLienHe($_GET['id'],$ten,$email,$sdt,$tin_nhan);
        //         header('Location: index.php?act=lien-he-list');
        //             }else{
        //                 $id = isset($_GET['id'])? $_GET['id'] : 0;
        //                 $lienHe = getLienHeById($id);
        //                 // var_dump($lienHe);
        //                 extract($lienHe);
        //                 @include_once('Views/lienhe/edit.php');
        //             }
        //         }
        //     break;
        // case 'lien-he-delete':
        //     deleteLienHe($_GET['id']);
        //     header('Location: index.php?act=lien-he-list');
        //     break;
//mã giảm giá
        case 'ma-giam-gia-list':
            $listGG= getAllMaGiamGia();
            @include_once('Views/magiamgia/list.php');
            break;
        case 'ma-giam-gia-add':
            @include_once('Views/magiamgia/add.php');
            break;
        case 'ma-giam-gia-post':
            $error = [];  
                $check = true;
                if(isset($_POST['submit']) ){
                    if(isset($_POST['ma']) && $_POST['ma']){
                    if(check_name('ma',$_POST['ma'],'ma_gg')){
                        $check = false;
                        $error['ma']='Tên đã tồn tại !';
                    }else{
                    $ma = $_POST['ma'];

                    }
                    }else{
                        $check = false;
                        $error['ma']='Bạn không được để trống';
        
                    }
                    if(isset($_POST['phantram_giam']) && $_POST['phantram_giam']){
                        if(check_name('phantram_giam',$_POST['phantram_giam'],'ma_gg')){
                            $check = false;
                            $error['phantram_giam']='Tên đã tồn tại !';
                        }else{
                        $phantram_giam = $_POST['phantram_giam'];
    
                        }
                        }else{
                            $check = false;
                            $error['phantram_giam']='Bạn không được để trống';
            
                        }
                    
                    if($check == true){
                        postMaGiamGia($ma,$phantram_giam);
                    header('Location: index.php?act=ma-giam-gia-list');
                
                    }else{
                        @include_once('Views/magiamgia/add.php');
                    }
    
    
                    // header('Location: index.php');
                }
                
            break;
        case 'ma-giam-gia-edit':
            $id = isset($_GET['id'])? $_GET['id'] : 0;
            $giamGia = getMaGiamGiaById($id);
            
            extract($giamGia);
            @include_once('Views/magiamgia/edit.php');
            break;

        case 'ma-giam-gia-update':
            $error = [];
            $check = true;
            if(isset($_POST['submit']) ){
                if(isset($_POST['ma']) && $_POST['ma']){
                    $ma = $_POST['ma'];
                }else{
                    $check = false;
                    $error['ma']='Bạn không được để trống';
                }
            if(isset($_POST['submit']) ){
                if(isset($_POST['phantram_giam']) && $_POST['phantram_giam']){
                    $phantram_giam = $_POST['phantram_giam'];
                }else{
                    $check = false;
                    $error['phantram_giam']='Bạn không được để trống';
                }
                if($check == true){
                    updateMaGiamGia($_GET['id'],$ma,$phantram_giam);
                header('Location: index.php?act=ma-giam-gia-list');
                    }else{
                        $id = isset($_GET['id'])? $_GET['id'] : 0;
                        $giamGia= getMaGiamGiaById($id);
                        // var_dump($danhMuc);
                        extract($giamGia);
                        @include_once('Views/magiamgia/edit.php');
                        
                    }
                }
            }
            // @include_once('Views/magiamgia/list.php');
            break;

        case 'ma-giam-gia-delete':
            deleteMaGiamGia($_GET['id']);
            header('Location: index.php?act=ma-giam-gia-list');
            break;
//quản lý hóa đơn
        case 'quan-ly-hoa-don-list':
            $listHD= getAllHoaDon();
            @include_once('Views/quanlyhoadon/list.php');
            break;
        // case 'quan-ly-hoa-don-add':
        //     break;
        // case 'quan-ly-hoa-don-post':
        //     break;
        // case 'quan-ly-hoa-don-edit':
        //     break;
        // case 'quan-ly-hoa-don-update':
        //     break;
        // case 'quan-ly-hoa-don-delete':
        //     break;
// bien the
        case 'bien-the-list':
            $listBT = getAllBienThe();
            // var_dump($listDM);
            @include_once('Views/bienthe/list.php');
            break;
        case 'bien-the-add':
            @include_once('Views/bienthe/add.php');
            break;
        case 'bien-the-post':
            $error = [];  
            $check = true;
            if(isset($_POST['submit']) ){
                
                // if(isset($_POST['ten_bienthe'])&& $_POST['ten_bienthe'] ){
                //     if(check_name('ten_bienthe',$_POST['ten_bienthe'],'bien_the')){
                //         $check = false;
                //         $error['ten_bienthe']='Tên đã tồn tại !';
                //     }else{
                //     $ten_bienthe = $_POST['ten_bienthe'];
                //     }
                    
                // }else{
                //     $check = false;
                //     $error['ten_bt1']='Bạn không được để trống';

                // }
                if(isset($_POST['kich_co']) && $_POST['kich_co']){
                $kich_co = $_POST['kich_co'];
                    
                }else{
                    $check = false;
                    $error['kich_co']='Bạn không được để trống';

                }
                
                if(isset($_POST['mau_sac']) && $_POST['mau_sac']){
                    $mau_sac = $_POST['mau_sac'];
                        
                    }else{
                        $check = false;
                        $error['mau_sac']='Bạn không được để trống';

                    }
                if(isset($_POST['gia']) && $_POST['gia']){
                    $gia = $_POST['gia'];
                        
                    }else{
                        $check = false;
                        $error['gia']='Bạn không được để trống';

                    }
                if(isset($_POST['so_luong_trong_kho']) && $_POST['so_luong_trong_kho']){
                    $so_luong_trong_kho = $_POST['so_luong_trong_kho'];
                        
                    }else{
                        $check = false;
                        $error['so_luong_trong_kho']='Bạn không được để trống';

                    }
                if(isset($_POST['so_luong_da_ban']) && $_POST['so_luong_da_ban']){
                    $so_luong_da_ban = $_POST['so_luong_da_ban'];
                        
                    }else{
                        $check = false;
                        $error['so_luong_da_ban']='Bạn không được để trống';

                    }
                if(isset($_POST['id_sp']) && $_POST['id_sp']){
                    $id_sp = $_POST['id_sp'];
                        
                    }else{
                        $check = false;
                        $error['id_sp']='Bạn không được để trống';

                    }

                if($check == true){
                    $ten_bienthe = getSanPhamById($id_sp)['ten_sp'] . " màu " . $mau_sac . " size " .$kich_co;
                    postBienThe($ten_bienthe,$id_sp,$kich_co,$mau_sac,$gia,$so_luong_trong_kho,$so_luong_da_ban);
                    header('Location: index.php?act=bien-the-list');

                }else{
                    @include_once('Views/bienthe/add.php');
                }
            }


            break;
        case 'bien-the-edit':
            $id = isset($_GET['id'])? $_GET['id'] : 0;
            $danhMuc = getDanhMucById($id);
            extract($danhMuc);
            @include_once('Views/danhmuc/edit.php');
            break;
        case 'bien-the-update':
            $error = [];
            $check = true;
            if(isset($_POST['submit']) ){
                if(isset($_POST['name']) && $_POST['name']){
                    if(check_name('ten_dm',$_POST['name'],'danh_muc')){
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
                header('Location: index.php?act=bien-the-list');
                    }else{
                        $id = isset($_GET['id'])? $_GET['id'] : 0;
                        $danhMuc = getDanhMucById($id);
                        // var_dump($danhMuc);
                        extract($danhMuc);
                        @include_once('Views/danhmuc/edit.php');
                        
                    }
                }
            @include_once('Views/danhmuc/list.php');
            break;
        case 'bien-the-delete':
    deleteDanhMuc($_GET['id']);
    header('Location: index.php?act=danh-muc-list');
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