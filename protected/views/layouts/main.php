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

    <script type='text/javascript' src="http://code.jquery.com/jquery-1.6.3.min.js"></script>

    <?php
        if (Yii::app()->controller->action->id != "portfolio")
        {
            ?>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/galleries/slideshow/css/craftyslide.css" />
        	<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/galleries/slideshow/js/craftyslide.js"></script>
            <?php
        } // if
        else
        {
            ?>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/galleries/fotorama.css" />
        	<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/galleries/fotorama.js"></script>
            <?php
        } // else
    ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>
<?php
	$cs = Yii::app()->clientScript;
	if ($cs)
	{
		$cs->registerScriptFile('js/'.'menuRoll.js'); 
	} // if $cs
?>

<?php
if (Yii::app()->controller->action->id != "portfolio")
{
    // Design for 2-column view (without gallery)
    echo <<< _END
    <div class="main">
        <div class="preview">
            <div class="gallery" id="myGallery">
                <div id="slideshow">
                  <ul>
_END;
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
    echo <<< _END
                  </ul>

                </div>
            </div>
        </div>
        <div class="logo" >
        <!--	<img src="logo.png" width="20%" height="20%"> -->
        </div>
        <div class="info_block">
            <div class="container" id="page">

                <div id="header">

                </div><!-- header -->

                <div id="mainmenu">
_END;
                     $this->widget('zii.widgets.CMenu',array(
                        'items'=>array(
                            array('label'=>'Главная', 'url'=>array('/site/index')),
                            array('label'=>'Портфолио', 'url'=>array('/site/portfolio'), 'items'=>array(
                                array('label'=>'Свадьбы', 'url'=>array('/site/category1')),
                                array('label'=>'Портретная съемка', 'url'=>array('/site/category1')),
                                array('label'=>'Дети', 'url'=>array('/site/category1'), 'items'=>array(
                                    array('label'=>'Младенцы', 'url'=>array('site/kids1')),
                                    array('label'=>'Дети от 1 до 3 лет', 'url'=>array('site/kids1')),
                                    array('label'=>'Дети от 3 до 13 лет', 'url'=>array('site/kids1')),
                                    )//3rd menu - kids
                                ), // end of 'portfolio' item
                                array('label'=>'Семейное фото', 'url'=>array('/site/category1')),
                                array('label'=>'Разное', 'url'=>array('/site/category1')),
                            ), 'visible'=>true), // 2nd menu
                            array('label'=>'Услуги', 'url'=>array('/site/services'), 'visible'=>true),
                            array('label'=>'Контакты', 'url'=>array('/site/contact'), 'visible'=>true),
                            //array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                        ),
                    ));

                echo "</div><!-- mainmenu -->";
              /*  if(isset($this->breadcrumbs))
                {
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                    ));
                }  // breadcrumbs -->*/

                echo "<br />".$content;
    echo <<< _END
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
_END;
} // if
else
{
    echo <<< _END
    <div class="main">
        <div class="logo" >
        <!--	<img src="logo.png" width="20%" height="20%"> -->
        </div>
        <div class="info_block_gallery">
            <div class="container_gallery" id="page">
                <div id="mainmenu_gallery">
_END;
                     $this->widget('zii.widgets.CMenu',array(
                         'items'=>array(
                             array('label'=>'Главная', 'url'=>array('/site/index'), 'id'=>'olololo'),
                             array('label'=>'Портфолио', 'url'=>array('/site/portfolio'), 'items'=>array(
                                 array('label'=>'Свадьбы', 'url'=>array('/site/category1')),
                                 array('label'=>'Портретная съемка', 'url'=>array('/site/category1')),
                                 array('label'=>'Дети', 'url'=>array('/site/category1'), 'items'=>array(
                                     array('label'=>'Младенцы', 'url'=>array('site/kids1')),
                                     array('label'=>'Дети от 1 до 3 лет', 'url'=>array('site/kids1')),
                                     array('label'=>'Дети от 3 до 13 лет', 'url'=>array('site/kids1')),
                                 )//3rd menu - kids
                                 ), // end of 'portfolio' item
                                 array('label'=>'Семейное фото', 'url'=>array('/site/category1')),
                                 array('label'=>'Разное', 'url'=>array('/site/category1')),
                             ), 'visible'=>true), // 2nd menu
                             array('label'=>'Услуги', 'url'=>array('/site/services'), 'visible'=>true),
                             array('label'=>'Контакты', 'url'=>array('/site/contact'), 'visible'=>true),
                             //array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                         ),
                     ));

                echo "</div><!-- mainmenu -->";
                echo "<br />";
               /* if(isset($this->breadcrumbs))
                {
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                    ));
                }  // breadcrumbs -->*/
    echo <<< _END
               <div class='gallery_gallery' id='gallery_gallery'>
                   <div id='fotorama'>
_END;
                     foreach (glob("images/*.jpg") as $filename)
                     {
                        echo "<img src='$filename'/>";
                     } // foreach

    echo <<< _END
                   </div>
                </div>

                <div class="clear_gallery"></div>

            </div><!-- page -->
        </div>
        <div class="push_gallery">
        </div>
    </div>
    <div id="footer">
            Copyright &copy; <?php echo date('Y'); ?> Владимир Трифонов<br/>
            8-9№№-№№№-№№-№№<br/>

    </div><!-- footer -->
    </div>
_END;
} // else if gallery
?>
</body>

<?php
if (Yii::app()->controller->action->id != "portfolio")
{
    echo <<< _END
    <script>
      $("#slideshow").craftyslide({
          'width': document.getElementById('myGallery').offsetWidth,
          'height': document.getElementById('myGallery').offsetHeight,
          'pagination': false,
          'fadetime': 2000,
          'delay': 3000
      });
    </script>
_END;
} // if
else
{
    echo <<< _END
    <script>

    $(function() {
        $('#fotorama').fotorama({
        width:document.getElementById('gallery_gallery').offsetWidth,
        height:document.getElementById('gallery_gallery').offsetHeight,
        navBackground:'black',
        background:'black',
        fullscreenIcon:true,
        });
    });

    </script>
_END;
} // else
?>

</html>
