<?php
require_once "item.php";
$item = new Item();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $items = $item->getAllItems();
    $selectedItem = null;

    foreach ($items as $row) {
        if ($row['id'] == $id) {
            $selectedItem = $row;
            break;
        }
    }

    if (!$selectedItem) {
        die("<div class='alert alert-danger text-center' role='alert'>Item not found.</div>");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    if ($item->updateItem($id, $name, $quantity, $price)) {
         echo "<div class='alert alert-success text-center' role='alert'>Item updated successfully!'  </div>";
       header("Refresh: 2; url=index.php");
    } else {
        echo "<div class='alert alert-danger text-center' role='alert'>Error updating item.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white text-center">
                        <h4>Update Item</h4>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $selectedItem['id'] ?>">
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <input type="text" name="name" value="<?= $selectedItem['name'] ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Quantity:</label>
                                <input type="number" name="quantity" value="<?= $selectedItem['quantity'] ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price:</label>
                                <input type="text" name="price" value="<?= $selectedItem['price'] ?>" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Update Item</button>
                                <a href="index.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
