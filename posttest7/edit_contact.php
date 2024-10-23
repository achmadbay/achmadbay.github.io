<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $contact = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $stmt = $conn->prepare("UPDATE contacts SET name=?, email=?, phone=?, message=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $email, $phone, $message, $id);

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    header("Location: view_contacts.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kontak</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="contdk">
        <h1>Edit Kontak</h1>
        <form method="POST">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="<?php echo $contact['name']; ?>" required />
            <br />
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $contact['email']; ?>" required />
            <br />
            <label for="phone">Nomor Telepon:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $contact['phone']; ?>" required />
            <br />
            <label for="message">Pesan:</label>
            <textarea id="message" name="message" rows="4" required><?php echo $contact['message']; ?></textarea>
            <br />
            <button type="submit">Update</button>
            <a href="view_contacts.php">Batal</a>
        </form>
    </div>
</body>
</html>
