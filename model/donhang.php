<?php
function getspbt($id_sp,$id_size,$id_mau){
    $sql="SELECT id_bt FROM spbienthe WHERE id_sp='$id_sp' AND id_size='$id_size' AND id_mau='$id_mau'";
   return pdo_query_one($sql);
        
} 
?>