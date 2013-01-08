<?php

function getMaxPhotoNumber($photoArr)
{
    $max = 0;
    foreach($photoArr as $photo)
    {
        $parts = explode("/", $photo);
        $number = array_pop($parts);
        $pos = strpos($number, ".");
        //echo "pos = ".$pos;
        $number = substr($number, 0, $pos);
        //echo $number." ";
        $number = intval($number);
        if ($number > $max)
        {
            $max = $number;
        } // if
    } // foreach

    return $max;
} // sortPath

/**
 * Created by JetBrains PhpStorm.
 * User: Noktigula
 * Date: 04.11.12
 * Time: 1:15
 * To change this template use File | Settings | File Templates.
 */

//echo $initial;
echo "<div id='fotorama'>";
//$initial--;
$photoArr = glob($filepath."/*.jpg");
$max = getMaxPhotoNumber($photoArr);
for ($i = 1; $i <= $max; ++$i)
{
    $filename = $filepath."/".$i.".jpg";
    if(file_exists($filename))
    {
        echo "<img src='$filename'/>";
    } // if file exists
}
//foreach (glob($filepath."/*.jpg") as $filename)
//{
//  echo "<img src='$filename'/>";
//} // foreach
echo "</div>";

echo "</body>";

$theme = (isset(Yii::app()->request->cookies['dynamicTheme']->value))
    ? Yii::app()->request->cookies['dynamicTheme']->value
    : "dark";

    $bg = ($theme == "dark") ? "'black'" : "'white'";
    $preload = 4;
echo <<< _END
    <script>

    $(function() {
        $('#fotorama').fotorama({
        width:document.getElementById('gallery_gallery').offsetWidth,
        height:document.getElementById('gallery_gallery').offsetHeight,
        navBackground:$bg,
        background:$bg,
        fullscreenIcon:true,
        preload:$preload,
        startImg:$initial
        });
    });

    </script>
_END;
echo "<body>";
?>