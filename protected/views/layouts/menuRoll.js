alert('included!');
$(document).ready(
function()
{
	alert('included!');
	$('ul li a').mouseenter(
		alert('mouseenter!');
		$this.animate(
			{marginTop:25}, 500, reverse
		); // animate
	); // mouseenter
	
	function reverse()
	{
		$this.animate(
			{marginTop:25}, 500, function()
		); // animate
	}//reverse
}); // ready handler