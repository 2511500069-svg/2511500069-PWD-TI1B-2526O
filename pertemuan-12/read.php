<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';
$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
    die("Query error: " . mysqli_error($conn));
}
$no = 1;
?>

<?php
    $flash_sukses = $_SESSION['flash_sukses'] ?? '';
     $flash_error = $_SESSION['flash_error'] ?? '';

     unset($_SESSION['flash_sukses'],$_SESSION['flash_error']);
     ?>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
        <th>Created At</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($q)): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><a= href="edit.php?cid=<?= (int)$row['cid']; ?>">Edit</a></td>
            <td><?= $row['cid']; ?></td>
            <td><?= htmlspecialchars($row['cnama']); ?></td>
            <td><?= htmlspecialchars($row['cemail']); ?></td>
            <td><?= nl2br(htmlspecialchars($row['cpesan'])); ?></td>
            <td>
              <?= date("d M Y H:i:s", strtotime($row['dcreated_at'])); ?>
    </td>
        </tr>
        <?php endwhile; ?>
</table>