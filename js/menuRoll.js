$(document).ready(
function()
{
	$('ul li div').mouseenter(
		function()
		{
			roll($(this));
		} // handler
	); //mousenter property
	
	function stepOne(param)
	{
		param.animate(
			{ top:'+=50' }, 100, function(){}
					  );
	} // stepOne
	
	function stepTwo(param)
	{
		param.animate(
			{opacity:0, top:'-=100'}, 1, function(){}
		);
	} // stepTwo
	
	function stepThree(param)
	{
		param.animate(
			{opacity:1, top:"+=50"}, 100, function(){}
		);
	} // stepThree
	
	function roll(param)
	{
		for (var i = 0; i <  2; ++i)
		{
			stepOne(param);
			stepTwo(param);
			stepThree(param);
		} // for
	} // roll
});