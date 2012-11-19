<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

    <?php
    //echo "<br />in main, ";
    //echo Yii::app()->params['currentTheme'];
    $theme = (isset(Yii::app()->request->cookies['dynamicTheme']->value))
             ? Yii::app()->request->cookies['dynamicTheme']->value
             : "dark";

    if ($theme == "dark")
    {
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <?php
    } // if
    else if ($theme == "white")
    {

        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main-white.css" />
        <?php
    }
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <script type='text/javascript' src="http://code.jquery.com/jquery-1.6.3.min.js"></script>
    <script type='text/javascript' src="js/changeTheme.js"></script>

    <?php
        if (Yii::app()->controller->id != "portfolio" && Yii::app()->controller->action->id != "services")
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
   /* echo <<< _END
   <!--  <div>

      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="780" height="420">
        <param name="movie" value="sounds/fon1.swf" />

        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="sounds/fon1.swf" width="780" height="420">

        <!--[if !IE]>-->
        </object>
        <!--<![endif]-->

      </object>

    </div> -->
_END; */
?>

<?php
if (Yii::app()->controller->id != "portfolio" && Yii::app()->controller->action->id != "services")
{
    // Design for 2-column view (without gallery)
    echo <<< _END
    <div class="main">
        <div class="preview">
            <div class="gallery" id="myGallery">
                <div id="slideshow">
                  <ul>
_END;
                        foreach (glob("images/slideshow/*.jpg") as $filename)
                        {

                            $size = getimagesize($filename);
                            $width = $size[0];
                            $height = $size[1];

                            /**
                             TODO: перенести все в js
                             подгонять размер изображения под размер div`а
                            */
                           // if ($width >= $height)
                            //{
                                /*$width = 500;

                                $coeff = $width / $size[0];
                                $height *= $coeff;*/

                                echo "<li>";
                                echo "<img style='position:relative;' width='$width' height='$height' src='$filename' />";
                                echo "</li>";
                            //} // if
                            //else
                            //{
                               /* $height = 500;
                                $coeff = $height / $size[1];
                                $width *= $coeff; */

                              //  echo "<li>";
                              //  echo "<img style='position:relative;'  src='$filename' />";
                                //echo "</li>";
                            //} // else
                        } // foreach
    $theme = (isset(Yii::app()->request->cookies['dynamicTheme']->value))
        ? Yii::app()->request->cookies['dynamicTheme']->value
        : "dark";

    $changeThemeTo = ($theme == "dark") ? '#ffffff' : '#000000';
    $newTheme = ($theme == "dark") ? "white" : "dark";
    echo <<< _END
                  </ul>

                </div> <!-- slideshow -->
            </div> <!-- gallery -->
        </div> <!--preview-->
        <div class="logo" >

            <table height='100%'>
                <tr height='75%'>
                    <td width='90%'></td>
                    <td width='10%'></td>
                </tr>
                <tr height='25%'>
                    <td  width='90%' align='right'>Сменить тему</td>
                    <td  align='left'  width='10%'>
                        <form method='post'>
                        <input type='hidden' value='$newTheme' name='change' />
                        <input type='submit' value = " " class='themeChange' style='background:$changeThemeTo;'/>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <div class="info_block">
            <div class="container" id="page">

                <div id="header">

                </div><!-- header -->

                <div id="mainmenu">
_END;
                $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                        array('label'=>'Главная', 'url'=>array('/site/index'), 'id'=>'olololo'),
                        array('label'=>'Портфолио', 'url'=>array('/portfolio/index'), 'items'=>array(
                            array('label'=>'Свадьбы', 'url'=>array('/portfolio/weddings')),
                            array('label'=>'Портретная съемка', 'url'=>array('/portfolio/portraits')),
                            array('label'=>'Дети', 'url'=>array('/portfolio/kids'), 'items'=>array(
                                array('label'=>'Младенцы', 'url'=>array('/portfolio/babies')),
                                array('label'=>'Дети от 1 до 3 лет', 'url'=>array('/portfolio/onethree')),
                                array('label'=>'Дети от 3 до 13 лет', 'url'=>array('/portfolio/threeup')),
                            )//3rd menu - kids
                            ), // end of 'portfolio' item
                            array('label'=>'Семейное фото', 'url'=>array('/portfolio/family')),
                            array('label'=>'Разное', 'url'=>array('/portfolio/different')),
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

    $date = date('Y');
    echo <<< _END

                 <div class="clear"></div>

            </div><!-- page -->

        <div class='themeChangeWrapper'>

        </div>
        </div> <!-- info block -->

        <div class="push">
        </div>
    </div><!-- main -->
    </div>
     <div id="footer">
        Copyright &copy; $date Vladimir Trifonov<br/>
        8-909-990-89-59<br/>
    </div><!-- footer -->
_END;
} // if
else
{
    $theme = (isset(Yii::app()->request->cookies['dynamicTheme']->value))
        ? Yii::app()->request->cookies['dynamicTheme']->value
        : "dark";

    $changeThemeTo = ($theme == "dark") ? '#ffffff' : '#000000';
    $newTheme = ($theme == "dark") ? "white" : "dark";
    echo <<< _END
    <div class="main">
        <div class="logo" >
           <table height='100%'>
                <tr height='75%'>
                    <td width='90%'></td>
                    <td width='10%'></td>
                </tr>
                <tr height='25%'>
                    <td  width='90%' align='right'>Сменить тему</td>
                    <td  align='left'  width='10%'>
                        <form method='post'>
                        <input type='hidden' value='$newTheme' name='change' />
                        <input type='submit' value = " " class='themeChange' style='background:$changeThemeTo;'/>
                        </form>
                    </td>
                </tr>
            </table>
        </div> <!-- logo -->
        <div class="info_block_gallery">
            <div class="container_gallery" id="page">
                <div id="mainmenu_gallery">
_END;
                     $this->widget('zii.widgets.CMenu',array(
                         'items'=>array(
                             array('label'=>'Главная', 'url'=>array('/site/index'), 'id'=>'olololo'),
                             array('label'=>'Портфолио', 'url'=>array('/portfolio/index'), 'items'=>array(
                                 array('label'=>'Свадьбы', 'url'=>array('/portfolio/weddings')),
                                 array('label'=>'Портретная съемка', 'url'=>array('/portfolio/portraits')),
                                 array('label'=>'Дети', 'url'=>array('/portfolio/kids'), 'items'=>array(
                                     array('label'=>'Младенцы', 'url'=>array('/portfolio/babies')),
                                     array('label'=>'Дети от 1 до 3 лет', 'url'=>array('/portfolio/oneThree')),
                                     array('label'=>'Дети от 3 до 13 лет', 'url'=>array('/portfolio/threeUp')),
                                 )//3rd menu - kids
                                 ), // end of 'portfolio' item
                                 array('label'=>'Семейное фото', 'url'=>array('/portfolio/family')),
                                 array('label'=>'Разное', 'url'=>array('/portfolio/different')),
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
    $galleryStyle = "'width:75%;'";
    //if(Yii::app()->controller->action->id == "services")
    if(Yii::app()->controller->action->id != "showGallery")
    {
         echo "<div class='gallery_wrapper'>";
        $galleryStyle = "'width:90%;height:100%;overflow-Y:auto;'";
    } // if

    echo <<< _END
               <div class='gallery_gallery' style=$galleryStyle id='gallery_gallery'>
_END;
                    echo $content;
    echo <<< _END
                </div> <!-- container_gallery -->
_END;
    //if(Yii::app()->controller->action->id == "services")
    if(Yii::app()->controller->action->id != "showGallery")
    {
        echo "</div>";
    } // if
    echo <<< _END
                <div class="clear_gallery">
                </div><!--clear_gallery-->

            </div><!-- page -->

            <div class='themeChangeWrapper'>
            </div> <!--theme change wrapper>
        </div>
        <div class="push_gallery">
        </div> <!--push gallery>
    </div> <!-- main-->

     <div id="footer">
        Copyright &copy; $date Vladimir Trifonov<br/>
        8-909-990-89-59<br/>
    </div><!-- footer -->
_END;
} // else if gallery
?>
</body>

<?php
if (Yii::app()->controller->id != "portfolio" && Yii::app()->controller->action->id != "services")
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
  /* echo <<< _END
    <script>

    $(function()
   {
        $('#fotorama').fotorama(
        {
        width:document.getElementById('gallery_gallery').offsetWidth,
        height:document.getElementById('gallery_gallery').offsetHeight,
        navBackground:'black',
        background:'black',
        fullscreenIcon:true,
        preload:4
        });
    });

    </script>
_END; */
} // else
?>

</html>
