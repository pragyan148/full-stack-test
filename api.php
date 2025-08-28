<?php
require 'db.php';
$tab = $_GET['tab'] ?? null;
if ($tab) {
$stmt = $pdo->prepare('SELECT * FROM slides WHERE tab_name=? ORDER BY slide_order, id');
$stmt->execute([$tab]);
$data = $stmt->fetchAll();
header('Content-Type: application/json');
echo json_encode($data);
exit;
}
$stmt = $pdo->query('SELECT * FROM slides ORDER BY tab_name, slide_order, id');
$rows = $stmt->fetchAll();
$out = [];
foreach ($rows as $r) $out[$r['tab_name']][] = $r;
header('Content-Type: application/json');
print json_encode($out);
