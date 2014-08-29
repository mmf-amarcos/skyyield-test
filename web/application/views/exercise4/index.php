<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

  <script src="<?php echo base_url('js/analytics.js') ?>"></script>
  
</head>
<body>
<h1><?php echo $page_title ?></h1>

<ul>
  <li><a href="<?php echo site_url('exercise4') ?>">Index</a></li>
  <?php for ($i = 1; $i <= 10; $i++):?>
    <li><a href="<?php echo site_url('exercise4/page/'.$i) ?>">Page <?php echo $i ?></a></li>
  <?php endfor; ?>
</ul>

</body>
</html>
