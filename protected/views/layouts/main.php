<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/galleries/slideshow/css/craftyslide.css" />
	
	<script src="http://code.jquery.com/jquery-1.6.3.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/galleries/slideshow/js/craftyslide.js"></script>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="main">
	<div class="preview">
		<div class="gallery" id="myGallery">
			<div id="slideshow">
			  <ul>
				 <?php 
					foreach (glob("images/*.jpg") as $filename) 
					{
						$size = getimagesize($filename);
						$width = $size[0];
						$height = $size[1];
						
						/**
						 TODO: перенести все в js
						 подгонять размер изображения под размер div`а
						 */
						
						if ($width >= $height)
						{
							$width = 500;
						
							$coeff = $width / $size[0];
							$height *= $coeff;
							
							echo "<li>";
							echo "<img style='position:relative;' width='$width' height='$height' src='$filename' />";
							echo "</li>";
						} // if
						else
						{
							$height = 500;
							$coeff = $height / $size[1];
							$width *= $coeff;
							
							echo "<li>";
							echo "<img style='position:relative;' width='$width'  height='$height' src='$filename' />";
							echo "</li>";
						} // else
						
					} // foreach
				 ?>
				
			  </ul> 
			 
			</div> 
		</div>
	</div>

<!--	<div class="empty">
		Пустой блок
	</div> -->
	<div class="logo" >
	<!--	<img src="logo.png" width="20%" height="20%"> -->
	</div>
	<div class="info_block">
		<div class="container" id="page">
			
			<div id="header">
				<div id="logo"><?php /*echo CHtml::encode(Yii::app()->name);*/ ?></div>
			</div><!-- header -->

			<div id="mainmenu">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Главная', 'url'=>array('/site/index')),
						array('label'=>'Портфолио', 'url'=>array('/site/portfolio'), 'visible'=>true),
						array('label'=>'Услуги', 'url'=>array('/site/services'), 'visible'=>true),
						array('label'=>'Контакты', 'url'=>array('/site/contact'), 'visible'=>true),
						//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
			</div><!-- mainmenu -->
			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
				)); ?><!-- breadcrumbs -->
			<?php endif?>

			<?php echo $content; ?>

			<div class="clear"></div>
			
		</div><!-- page -->
	</div>
	<div class="push">
	</div>
</div>
<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Владимир Трифонов<br/>
		8-9№№-№№№-№№-№№<br/>
		
</div><!-- footer -->
</div>
</body>

<script>
  $("#slideshow").craftyslide({
	  'width': document.getElementById('myGallery').offsetWidth,
	  'height': document.getElementById('myGallery').offsetHeight,
	  'pagination': false,
	  'fadetime': 2000,
	  'delay': 3000
  });
</script>
</html>
