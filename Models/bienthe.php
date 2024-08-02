<?php 
function postBienThe($ten_bienthe,$id_sp,$kich_co,$mau_sac,$gia,$so_luong_trong_kho,$so_luong_da_ban){

  $sql = "INSERT INTO `bien_the`( `ten_bienthe`, `id_sp`, `kich_co`, `mau_sac`, `gia`, `so_luong_trong_kho`, `so_luong_da_ban`) VALUES 
  (?,?,?,?,?,?,?)";
  return pdo_execute($sql,$ten_bienthe,$id_sp,$kich_co,$mau_sac,$gia,$so_luong_trong_kho,$so_luong_da_ban);
}
function getAllBienThe(){
    $sql = "SELECT bt.*,sp.ten_sp FROM bien_the as bt LEFT JOIN san_pham as sp ON bt.id_sp = sp.id_sp";
   return pdo_query($sql);
}
function getBienTheById($id){
    $sql = "SELECT * FROM `bien_the` WHERE id_bienthe = ?";
   return pdo_query_one($sql, $id);
}
function updateBienThe($id,$ten_bienthe,$id_sp,$kich_co,$mau_sac,$gia,$so_luong_trong_kho,$so_luong_da_ban){
    $sql = "UPDATE `bien_the` SET `id_bienthe`=?,`ten_bienthe`=?,`id_sp`=?,
    `kich_co`=?,`mau_sac`=?,
    `gia`=?,`so_luong_trong_kho`=?,`so_luong_da_ban`=? WHERE id_bienthe=?";
   return pdo_query_one($sql,$ten_bienthe,$id_sp,$kich_co,$mau_sac,$gia,$so_luong_trong_kho,$so_luong_da_ban,$id);
}
function deleteBienThe($id){
    $sql = "DELETE FROM `bien_the` WHERE id_bienthe=?";
   return pdo_query_one($sql, $id);
}
?>