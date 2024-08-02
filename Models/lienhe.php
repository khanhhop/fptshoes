<?php 
// function postLienHe($ten,$email,$sdt,$tin_nhan){

//   $sql = "INSERT INTO `lien_he`(`ten`, `email`, `sdt`, `tin_nhan`) VALUES (?,?,?,?)";
//  return pdo_execute($sql,$ten,$email,$sdt,$tin_nhan);
// }
function getAllLienHe(){
    $sql = "SELECT * FROM `lien_he` WHERE 1";
   return pdo_query($sql);
}
function getLienHeById($id){
    $sql = "SELECT * FROM `lien_he` WHERE id_lienhe = ?;";
   return pdo_query_one($sql, $id);
}
// function updateLienHe($id,$ten,$email,$sdt,$tin_nhan){
//     $sql = "UPDATE `lien_he` SET `ten`='?',`email`='?',`sdt`='?',`tin_nhan`='?' WHERE id_lienhe = ?";
//    return pdo_execute($sql,$ten,$email,$sdt,$tin_nhan,$id);
// }
// function deleteLienHe($id){
//     $sql = "DELETE FROM `lien_he` WHERE id_lienhe =?";
//    return pdo_query_one($sql, $id);
// }
?>