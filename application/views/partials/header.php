<!DOCTYPE html>
<html>
<head>
	
	<title><?php echo $title_for_layout; ?>mysite.com</title>
	
	<?php if(isset($includes_for_layout['css']) AND count($includes_for_layout['css']) > 0): ?>
		<?php foreach($includes_for_layout['css'] as $css): ?>

			<link rel="stylesheet" type="text/css" href="<?php echo $css['file']; ?>"<?php echo ($css['options'] === NULL ? '' : ' media="' . $css['options'] . '"'); ?>>

		<?php endforeach; ?>
	<?php endif; ?>
	
	<?php if(isset($includes_for_layout['js']) AND count($includes_for_layout['js']) > 0): ?>
		<?php foreach($includes_for_layout['js'] as $js): ?>

			<?php if($js['options'] !== NULL AND $js['options'] == 'header'): ?>

				<script type="text/javascript" src="<?php echo $js['file']; ?>"></script>

			<?php endif; ?>

		<?php endforeach; ?>
	<?php endif; ?>
	
	
</head>
<body>
<div class="container">