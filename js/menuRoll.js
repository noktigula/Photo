$(document).ready(
function()
{
	$('ul li > div').mouseenter(
		function()
		{
            if(!($(this).parent().attr("class") == "active"))
            {
                    roll($(this));
            }//if
		} // handler
	); //mousenter property
	
	function stepOne(param)
	{
		param.animate(
			{ top:'+=25' }, 150, function(){}
					  );
	} // stepOne
	
	function stepTwo(param)
	{
		param.animate(
			{opacity:0, top:'-=50'}, 1, function(){}
		);
	} // stepTwo
	
	function stepThree(param)
	{
		param.animate(
			{opacity:1, top:"+=25"}, 150, function(){}
		);
	} // stepThree
	
	function roll(param)
	{
		//for (var i = 0; i <  2; ++i)
		//{
			stepOne(param);
			stepTwo(param);
			stepThree(param);
		//} // for
	} // roll
});