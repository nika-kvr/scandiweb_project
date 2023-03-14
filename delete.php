<?php
include "productsConfig.php";

$record = new productsConfig();


if(isset($_POST['products_delete_btn'])){
    $all_id = $_POST['prod_delete_id'];
    $extract_id = implode(',', $all_id);

    $record->delete($extract_id);
    header("Location: index.php");

}

?>