<?php
require 'db.php';
// fetch slides grouped by tab
$stmt = $pdo->query("SELECT * FROM slides ORDER BY tab_name, slide_order, id");
$rows = $stmt->fetchAll();

// group
$tabs = [];
foreach ($rows as $r) {
    $tabs[$r['tab_name']][] = $r;
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Slides</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
  <h2>Manage Slides</h2>
  <div class="row">
    <div class="col-md-6">
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="">
        <div class="mb-3">
          <label>Tab name</label>
          <input name="tab_name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Title</label>
          <input name="slide_title" class="form-control">
        </div>
        <div class="mb-3">
          <label>Description</label>
          <textarea name="slide_description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
          <label>Order</label>
          <input name="slide_order" type="number" class="form-control" value="0">
        </div>
        <div class="mb-3">
          <label>Image (required)</label>
          <input name="image" type="file" class="form-control" accept="image/*" required>
        </div>
        <button class="btn btn-primary">Add Slide</button>
      </form>
    </div>
    <div class="col-md-6">
      <h4>Existing slides</h4>
      <?php foreach ($tabs as $tname => $slides): ?>
        <h5 class="mt-3"><?php echo htmlspecialchars($tname); ?></h5>
        <ul class="list-group">
          <?php foreach ($slides as $s): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <strong><?php echo htmlspecialchars($s['slide_title']); ?></strong>
                <div class="small text-muted"><?php echo htmlspecialchars($s['slide_description']); ?></div>
              </div>
              <div>
                <a href="edit.php?id=<?php echo $s['id']; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                <a href="delete.php?id=<?php echo $s['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete slide?')">Delete</a>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
