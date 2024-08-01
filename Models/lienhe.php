<?php 
function postLienHe($ten_dm){

  $sql = "INSERT INTO `lien_he`(`ten`, `email`, `sdt`, `tin_nhan`) VALUES (?,?,?,?)";
  pdo_execute($sql,$ten_dm);
}
function getAllLienHe(){
    $sql = "SELECT * FROM `lien_he` WHERE 1";
   return pdo_query($sql);
}
function getLienHeById($id){
    $sql = "SELECT * FROM `lien_he` WHERE id_lienhe = ?;";
   return pdo_query_one($sql, $id);
}
function updateLienHe($id,$ten_dm){
    $sql = "UPDATE `danh_muc` SET `ten_dm`= ? WHERE id_dm = ?";
   return pdo_query_one($sql,$ten_dm, $id);
}
function deleteLienHe($id){
    $sql = "DELETE FROM `danh_muc` WHERE id_dm =?";
   return pdo_query_one($sql, $id);
}
?>