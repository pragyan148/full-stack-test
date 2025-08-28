<?php ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Slider Layout</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container py-4">
<div class="row g-3 align-items-start" id="slider-app">
<div class="col-lg-3" id="col1">
<div id="tabs-wrapper"></div>
</div>
<div class="col-lg-6" id="col2">
<div id="slider-wrapper"></div>
</div>
<div class="col-lg-3 d-none d-lg-block" id="col3">
<div id="image-box" class="ratio ratio-1x1 border rounded"></div>
</div>
</div>
</div>
<script src="assets/js/main.js"></script>
</body>
</html>
