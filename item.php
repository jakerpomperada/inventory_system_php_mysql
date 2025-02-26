<?php
require_once "db.php";

class Item {
    private $conn;
    private $table = "items";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllItems() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addItem($name, $quantity, $price) {
        $query = "INSERT INTO " . $this->table . " (name, quantity, price) VALUES (:name, :quantity, :price)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":quantity", $quantity);
        $stmt->bindParam(":price", $price);
        return $stmt->execute();
    }

    public function updateItem($id, $name, $quantity, $price) {
        $query = "UPDATE " . $this->table . " SET name=:name, quantity=:quantity, price=:price WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":quantity", $quantity);
        $stmt->bindParam(":price", $price);
        return $stmt->execute();
    }

    public function deleteItem($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>
