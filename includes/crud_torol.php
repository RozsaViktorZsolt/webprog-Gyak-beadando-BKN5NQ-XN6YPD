<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    try {
        $sql = "DELETE FROM versenyzok WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        header("Location: index.php?oldal=crud");
        exit;
    } catch (PDOException $e) {
        die("Hiba a törlés során: " . $e->getMessage());
    }
}
?>
