<?php 
require 'gallery/Gallery.php';

$gallery = new Gallery();
$gallery->setPath('gallery/images/');

$images = $gallery->getImages();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/gallery.css"/>
	<title>Image Gallery</title>
</head>
<body>
	<div class="container">
		<h1>Image Gallery</h1>
		<?php if($images): ?>
			<div class="gallery cf">
				<?php foreach($images as $image): ?>
					<div class="gallery-item">
						<a href="<?php echo $image['full']; ?>"><img src="<?php echo $image['thumb']; ?>" alt=""></a>
					</div>
				<?php endforeach; ?>
			</div>
		<?php else: ?>
			<p style="text-align: center;">There are no images.</p>
		<?php endif; ?>
	</div>
</body>
</html>