<?php
session_start();
include 'db.php'; 

$query = htmlspecialchars($_GET['query']);
$results = [];

if (!empty($query)) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ? OR description LIKE ?");
    $searchTerm = "%" . $query . "%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="search.css">
</head>
<body>
    <h2>Hasil Pencarian untuk "<?php echo $query; ?>"</h2>
    
    <?php if (empty($results)): ?>
        <p>Tidak ada hasil ditemukan.</p>
    <?php else: ?>
        <div class="product_results">
            <?php foreach ($results as $product): ?>
                <div class="product_card">
                    <h3><?php echo $product['name']; ?></h3>
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" />
                    <p><?php echo $product['description']; ?></p>
                    <span class="price"><?php echo 'Rp' . number_format($product['price'], 0, ',', '.'); ?></span>
                    <button class="add_to_cart">Add To Cart</button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <p><a href="index.php">Kembali ke Home</a></p>
</body>
</html>
