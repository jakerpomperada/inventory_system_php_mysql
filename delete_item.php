<?php
require_once "Item.php";
$item = new Item();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($item->deleteItem($id)) {
        header("Location: index.php");
    } else {
        echo "Error deleting item.";
    }
}
?>
