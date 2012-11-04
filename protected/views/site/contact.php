
<?php
$this->pageTitle=Yii::app()->name;
?>

<br />

<div class="form">

<?php
    //echo $success;
    if ($success == "ok")
    {
        echo "Спасибо за проявленный интерес.<br />Я обязательно свяжусь с вами!";
    } // if
    else if ($success ==  "not_ok")
    {
        echo "К сожалению, отправить сообщение не удалось.<br />Попробуйте связаться со мной другим способом.";
    } // else
    else
    {
        $ref = Yii::app()->getUrlManager()->createUrl('/site/sendMail');
        echo <<< _END
        <form action='$ref' method='post'>
        <table>
        <tr>
        <td align='right'>Имя</td><td><input type='text' name='name'></td>
        </tr>
        <tr>
        <td align='right'>E-mail</td><td><input type='text' name='from'></td>
        </tr>
        <tr>
        <td align='right' valign='top'>Сообщение</td><td><textarea rows='10' cols='50' name='message'></textarea></td>
        </tr>
        <tr>
        <td></td><td align='left'><input type='submit' value='Отправить'>
        </tr>
        </table>
        </form>
_END;
    } // else
?>


</div><!-- form -->
