/**
 * Created with JetBrains PhpStorm.
 * User: noktigula
 * Date: 07.11.12
 * Time: 15:40
 * To change this template use File | Settings | File Templates.
 */
function changeTheme()
{
    var body = jQuery.makeArray(document.getElementsByTagName('body'));
    for(var i = 0; i < body.length; ++i)
    {
        var b = body[i];
        if(b.style.background == 'black')
            b.style.background = 'white';
        else
            b.style.background = 'black';
    } // for
} // changeTheme