<?php 
function postMaGiamGia($ma,$phantram_giam){

  $sql = "INSERT INTO `ma_gg`( `ma`, `phantram_giam`) VALUES (?,?)";
  return pdo_execute($sql,$ma,$phantram_giam);

}
function getAllMaGiamGia(){
    $sql = "SELECT * FROM `ma_gg` WHERE 1";
   return pdo_query($sql);
}
function getMaGiamGiaById($id){
    $sql = "SELECT * FROM `ma_gg` WHERE id_magg = ?;";
   return pdo_query_one($sql, $id);
}

function updateMaGiamGia($id,$ma,$phantram_giam){
    // $sql = "UPDATE `san_pham` SET `ten_dm`= ? WHERE id_sp = ?";
    $sql = "UPDATE `ma_gg` SET `ma`= ?,`phantram_giam`= ? WHERE id_magg = ?";
   return pdo_execute($sql,$ma,$phantram_giam,$id);
}
function deleteMaGiamGia($id){
    $sql = "DELETE FROM `ma_gg` WHERE id_magg =?";
   return pdo_query_one($sql, $id);
}
?>