<?php 
// function postHoaDon($ten_dm){

//   $sql = "INSERT INTO `ma_giam_gia`( `ten_dm`) VALUES (?)";
//    return pdo_execute($sql,$ten_dm);
// }
function getAllHoaDon(){
    $sql = "SELECT * FROM `quan_ly_hd` WHERE 1";
   return pdo_query($sql);
}
function getHoaDonById($id){
    $sql = "SELECT * FROM `ma_giam_gia` WHERE id_magg = ?;";
   return pdo_query_one($sql, $id);
}
// function updateHoaDon($id,$ten_dm){
//     $sql = "UPDATE `ma_giam_gia` SET  `ma`= ? WHERE id_magg = ?";
//    return pdo_execute($sql,$ten_dm, $id);
// }
// function deleteHoaDon($id){
//     $sql = "DELETE FROM `ma_giam_gia` WHERE id_magg =?";
//    return pdo_query_one($sql, $id);
// }
?>