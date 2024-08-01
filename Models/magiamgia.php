<?php 
function postMaGiamGia($id_magg, $ma){

  $sql = "INSERT INTO `ma_gg`(`ma`) VALUES (?)";
  return pdo_execute($sql,$ma);

}
function getAllMaGiamGia(){
    $sql = "SELECT * FROM `ma_gg` WHERE 1";
   return pdo_query($sql);
}
function getMaGiamGiaById($id){
    $sql = "SELECT * FROM `san_pham` WHERE id_sp = ?;";
   return pdo_query_one($sql, $id);
}

function updateMaGiamGia($id,$ma){
    // $sql = "UPDATE `san_pham` SET `ten_dm`= ? WHERE id_sp = ?";
    $sql = "UPDATE `ma_gg` SET`ma`=? WHERE id_magg = ?";
   return pdo_query_one($sql,$ma);
}
function deleteMaGiamGia($id){
    $sql = "DELETE FROM `ma_gg` WHERE id_magg =?";
   return pdo_query_one($sql, $id);
}
?>