<?php 
function postDanhMuc($ten_dm){

  $sql = "INSERT INTO `ma_giam_gia`( `ten_dm`) VALUES (?)";
  pdo_execute($sql,$ten_dm);
}
function getAllDanhMuc(){
    $sql = "SELECT * FROM `ma_gg` WHERE 1";
   return pdo_query($sql);
}
function getDanhMucById($id){
    $sql = "SELECT * FROM `ma_giam_gia` WHERE id_magg = ?;";
   return pdo_query_one($sql, $id);
}
function updateDanhMuc($id,$ten_dm){
    $sql = "UPDATE `ma_giam_gia` SET  `ma`= ? WHERE id_magg = ?";
   return pdo_query_one($sql,$ten_dm, $id);
}
function deleteDanhMuc($id){
    $sql = "DELETE FROM `ma_giam_gia` WHERE id_magg =?";
   return pdo_query_one($sql, $id);
}
?>