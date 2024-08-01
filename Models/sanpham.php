<?php 
function postSanPham($id_dm,$anh,$ten_sp,$mo_ta,$chat_lieu){

  $sql = "INSERT INTO `san_pham`(`id_dm`, `anh`, `ten_sp`, `mo_ta`, `chat_lieu`) VALUES (?,?,?,?,?)";
  return pdo_execute($sql,$id_dm,$anh,$ten_sp,$mo_ta,$chat_lieu);

}

function getAllSanPham(){
    $sql = "SELECT sp.*,dm.ten_dm FROM san_pham as sp JOIN danh_muc as dm ON sp.id_danhmuc = dm.id_dm";
   return pdo_query($sql);
}
function getSanPhamById($id){
    $sql = "SELECT * FROM `san_pham` WHERE id_sp = ?;";
   return pdo_query_one($sql, $id);
}

function updateSanPham($id,$ten_dm){
    $sql = "UPDATE `san_pham` SET `ten_dm`= ? WHERE id_sp = ?";
   return pdo_query_one($sql,$ten_dm, $id);
}
function deleteSanPham($id){
    $sql = "DELETE FROM `san_pham` WHERE id_sp =?";
   return pdo_query_one($sql, $id);
}
?>