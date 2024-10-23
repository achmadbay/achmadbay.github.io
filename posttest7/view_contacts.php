<?php
include 'db.php';

$sql = "SELECT * FROM contacts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kontak</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <div class="contdk">
        <h1>Daftar Kontak</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Pesan</th>
                <th>File</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";

                    // Tampilkan file yang di-upload
                    if (!empty($row["file_name"])) {
                        echo "<td><a href='uploads/" . $row["file_name"] . "' target='_blank'>Lihat File</a></td>";
                    } else {
                        echo "<td>Tidak ada file</td>";
                    }

                    echo "<td>" . $row["created_at"] . "</td>";
                    echo '<td>
                            <a href="edit_contact.php?id=' . $row["id"] . '" class="btn edit-btn"><i class="bx bx-edit"></i></a> 
                            <a href="delete_contact.php?id=' . $row["id"] . '" class="btn delete-btn" onclick="return confirm(\'Apakah Anda yakin ingin menghapus kontak ini?\')"><i class="bx bx-trash"></i></a>
                          </td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada data ditemukan</td></tr>";
            }
            ?>
        </table>
        <a href="index.html" class="btn kembali-btn"><i class="bx bx-arrow-back"></i></a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
