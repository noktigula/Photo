$(document).ready(
function()
{
	$('ul li a').mouseenter(
		function()
		{
			$(this).animate(
				{ fontSize: 32 }, 1000, reverse
								);
		}); //mousenterr property
		
	$('ul li a').mouseleave(
		function()
		{
			//alert('mouse leave');
			$(this).animate(
				{fontSize:16}, 1000, function(){}
								);
		} // handler
	);
	
	function reverse()
	{
		$(this).animate(
				{fontSize:9}, 1000, function(){}
								);
	} // reverse
});