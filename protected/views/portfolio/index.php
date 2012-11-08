<?php
	$this->pageTitle=Yii::app()->name;
	
    $filePath = "";//Yii::app()->request->baseUrl;
    switch ($category)
    {
        case INDEX:
        {
            showCategories($category);
            break;
        } // case Index

        case WEDDING:
        {
            $filePath .= "images/weddings";
            break;
        } // case WEDDING

        case PORTRAIT:
        {
            $filePath .= "images/portraits";
            break;
        } // PORTRAIT

        case KIDS:
        {
            showCategories($category);
            break;
        } // case KIDS

        case KIDS_BABY:
        {
            $filePath .= "images/babies";
            break;
        } // case KIDS_BABY

        case KIDS_1_3:
        {
            $filePath .= "images/kids_one_three";
            break;
        } // case KIDS_BABY

        case KIDS_3_13:
        {
            $filePath .= "images/kids_three_up";
            break;
        } // case KIDS_3_13

        case FAMILY:
        {
            $filePath .= "images/family";
            break;
        } // case FAMILY

        case DIFFERENT:
        {
            $filePath .= "images/different";
            break;
        } // case FAMILY

        default:
        {
            break;
        } // def
    } // switch

    if ($filePath != "")
    {
        //echo "yep!";
        showPhotoTable($filePath);
    } // if
    else
    {
        // top-level menus, don`t show table with photos
    } // else

function showCategories($type)
{
    $allCat = array('Свадьбы' => Yii::app()->getUrlManager()->createUrl('/portfolio/weddings'),
                    'Портреты' => Yii::app()->getUrlManager()->createUrl('/portfolio/portraits'),
                    'Дети' => Yii::app()->getUrlManager()->createUrl('/portfolio/kids'),
                    'Семейное фото' => Yii::app()->getUrlManager()->createUrl('/portfolio/family'),
                    'Разное' => Yii::app()->getUrlManager()->createUrl('/portfolio/different'));

    $kidCat = array('Младенцы' => Yii::app()->getUrlManager()->createUrl('/portfolio/babies'),
                    'Дети от 1 до 3 лет' => Yii::app()->getUrlManager()->createUrl('/portfolio/oneThree'),
                    'Дети от 3 до 13 лет' => Yii::app()->getUrlManager()->createUrl('portfolio/threeUp'));
    echo <<< _END
    <div id="categories">
        <ul align='center'>
_END;
    if ($type == INDEX)
    {
       printCategories($allCat);
    } // if
    else
    {
       printCategories($kidCat);
    } // else
    echo <<< _END
        </ul>
    </div>
_END;
} // showCategories

function printCategories($array)
{
    foreach ($array as $key=>$value)
    {
        echo "<li ><a href='$value'>$key</a></li>";
    } // foreach
}

function showPhotoTable($filePath)
{
    $count = 0;
    //echo $filePath;
    echo "<table>";
    echo "<tr>";

    $theme = (isset(Yii::app()->request->cookies['dynamicTheme']->value))
        ? Yii::app()->request->cookies['dynamicTheme']->value
        : "dark";

    $borderColor = ($theme == "dark") ? "#ffffff" : "#000000";

    foreach (glob($filePath."/thumbs/*.jpg") as $filename)
    {
        $size = getimagesize($filename);
        $width = $size[0];
        $height = $size[1];

        $ref =  Yii::app()->getUrlManager()->createUrl('/portfolio/showGallery', array("filepath" => $filePath, "initial" => $count));

        if ($width >= $height)
        {
            $width = 150;

            $coeff = $width / $size[0];
            $height *= $coeff;
            $height = 100;

            echo "<td align='center' width='150px' >";
            echo "<a href='$ref' style='margin:0'>";
            echo "<img width='$width' height='$height' src='$filename' style='margin:0;border:1px solid $borderColor'/>";
            echo "</a>";
            echo "</td>";
        } // if
        else
        {
            $height = 100;
            $coeff = $height / $size[1];
            $width *= $coeff;
            echo "<td align='center' width='150px' >";
            echo "<a href='$ref' style='margin:0'>";
            echo "<img width='$width'  height='$height' src='$filename' style='margin:0;border:1px solid $borderColor'/>";
            echo "</a>";
            echo "</td>";
        } // else

        $count++;
        if ($count % 4 == 0)
        {
            echo "</tr><tr>";
        } // if
    } // foreach
    echo "</tr>";
    echo "</table>";
} // showPhotoTable
?>