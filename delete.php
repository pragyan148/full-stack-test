<?php
require 'db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id) {
$stmt = $pdo->prepare('SELECT image_path FROM slides WHERE id=?');
$stmt->execute([$id]);
$row = $stmt->fetch();
if ($row && !empty($row['image_path']) && file_exists(__DIR__ . '/' . $row['image_path'])) {
@unlink(__DIR__ . '/' . $row['image_path']);
}
$pdo->prepare('DELETE FROM slides WHERE id=?')->execute([$id]);
}
header('Location: admin.php');
exit;
