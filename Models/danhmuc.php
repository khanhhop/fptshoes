<?php 
function postDanhMuc($ten_dm){

  $sql = "INSERT INTO `danh_muc`( `ten_dm`) VALUES (?)";
  pdo_execute($sql,$ten_dm);
}
function getAllDanhMuc(){
    $sql = "SELECT * FROM `danh_muc` WHERE 1";
   return pdo_query($sql);
}
function getDanhMucById($id){
    $sql = "SELECT * FROM `danh_muc` WHERE id_dm = ?;";
   return pdo_query_one($sql, $id);
}
function updateDanhMuc($id,$ten_dm){
    $sql = "UPDATE `danh_muc` SET  `ten_dm`= ? WHERE id_dm = ?";
   return pdo_execute($sql,$ten_dm, $id);
}
function deleteDanhMuc($id){
    $sql = "DELETE FROM `danh_muc` WHERE id_dm =?";
   return pdo_query_one($sql, $id);
}
?>