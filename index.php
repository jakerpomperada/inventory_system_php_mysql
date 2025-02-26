<?php
require_once "Item.php";
$item = new Item();
$items = $item->getAllItems();
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System Using OOP in PHP and MySQL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2 class="mb-3">Inventory System Using OOP in PHP and MySQL</h2>
    <a href="add_item.php" class="btn btn-primary mb-3">Add New Item</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $row): ?>
                <?php $itemTotal = $row['quantity'] * $row['price']; ?>
                <?php $totalPrice += $itemTotal; ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= number_format($itemTotal, 2) ?></td>
                    <td>
                        <a href="update_item.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Update</a>
                        <a href="delete_item.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h4 class="text-end">Total Price: <strong><?= number_format($totalPrice, 2) ?></strong></h4>

    <footer class="text-center mt-4 p-3 bg-primary text-white">
    <p class="mb-0">&copy; 2025 by Dr. Jake Rodriguez Pomperada, PhD. All Rights Reserved.</p>
</footer>

</body>
</html>
