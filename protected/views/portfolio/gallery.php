<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Noktigula
 * Date: 04.11.12
 * Time: 1:15
 * To change this template use File | Settings | File Templates.
 */


echo "<div id='fotorama'>";
foreach (glob($filepath."/*.jpg") as $filename)
{
    echo "<img src='$filename'/>";
} // foreach
echo "</div>";

echo "</body>";

echo <<< _END
    <script>

    $(function() {
        $('#fotorama').fotorama({
        width:document.getElementById('gallery_gallery').offsetWidth,
        height:document.getElementById('gallery_gallery').offsetHeight,
        navBackground:'black',
        background:'black',
        fullscreenIcon:true,
        preload:4,
        startImg:$initial
        });
    });

    </script>
_END;
echo "<body>";
?>