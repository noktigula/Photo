
<?php
$this->pageTitle=Yii::app()->name;
?>

<h2>Вы можете связаться со мной удобным для Вас способом:</h2>

    <!-- using div cause gallerific find ul > li images -->
<table>
    <tr>
        <td>
            <table height='23px'>
                <tr>
                    <td valign="center" width="23px">
                        <img src='images/icons/phone.gif' style="width: 22px;height: 22px;" />
                    </td>
                    <td valign="center" align="left">
                        8-909-990-89-59
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <a href="http://vk.com/trifonov_vova"><img src='images/icons/button.vkontakte.png' /></a>
        </td>
    </tr>
    <tr>
        <td>
            <table height='23px'>
                <tr>
                    <td valign="center" width="23px">
                        <img src='images/icons/skype.png' width='22px' height="22px" />
                    </td>
                    <td valign="center" align="left">
                        i_truffel
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table height='23px'>
                <tr>
                    <td valign="center" width="23px">
                        <img src='images/icons/send.gif' style="width: 22px;height: 22px;" />
                    </td>
                    <td valign="center" align="left">
                        <a href="mailto:i_must@mail.ru">i_must@mail.ru</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>


<h3>либо заполнив заявку ниже</h3>
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
        <td align='right' valign='top'>Сообщение</td><td><textarea rows='10' cols='40' name='message'></textarea></td>
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
