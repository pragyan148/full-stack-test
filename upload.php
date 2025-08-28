<?php
require 'db.php';
$id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
$tab_name = $_POST['tab_name'] ?? '';
$slide_title = $_POST['slide_title'] ?? null;
$slide_description = $_POST['slide_description'] ?? null;
$slide_order = isset($_POST['slide_order']) ? (int)$_POST['slide_order'] : 0;


if (!empty($_FILES['image']['name'])) {
$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$targetDir = __DIR__ . '/uploads';
if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);
$fileName = uniqid('img_') . '.' . $ext;
$targetPath = $targetDir . '/' . $fileName;
move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
$image_path = 'uploads/' . $fileName;
} else {
$image_path = null;
}


if ($id) {
if ($image_path) {
$sql = "UPDATE slides SET tab_name=?, slide_title=?, slide_description=?, image_path=?, slide_order=? WHERE id=?";
$pdo->prepare($sql)->execute([$tab_name, $slide_title, $slide_description, $image_path, $slide_order, $id]);
} else {
$sql = "UPDATE slides SET tab_name=?, slide_title=?, slide_description=?, slide_order=? WHERE id=?";
$pdo->prepare($sql)->execute([$tab_name, $slide_title, $slide_description, $slide_order, $id]);
}
} else {
$sql = "INSERT INTO slides (tab_name, slide_title, slide_description, image_path, slide_order) VALUES (?, ?, ?, ?, ?)";
$pdo->prepare($sql)->execute([$tab_name, $slide_title, $slide_description, $image_path, $slide_order]);
}
header('Location: admin.php');
exit;
