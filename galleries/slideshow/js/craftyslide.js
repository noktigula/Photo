/*
* Craftyslide
* Created by: Abid Din - http://craftedpixelz.co.uk
* Version: 1.0
* Copyright: Crafted Pixelz
* License: MIT license
* Updated: 7th June 2011
*/
(function ($) {
    $.fn.craftyslide = function (options) {

        // Defaults
        var defaults = {
            "width": 600,
            "height": 600,
            "pagination": true,
            "fadetime": 350,
            "delay": 5000
        };

        var options = $.extend(defaults, options);

        return this.each(function () {

            // Vars
            var $this = $(this);
            var $slides = $this.find("ul li");

            $slides.not(':first').hide();

            // Pagination
            function paginate() {
                $this.append("<ol id='pagination' />");
                
                var i = 1;
                $slides.each(function () {
                    $(this).attr("id", "slide" + i);
                    $("#pagination").append("<li><a href='#slide" + i + "'>" + i + "</a></li>");
                    i++;
                });
                
                $("#pagination li a:first").addClass("active");
            }

            // Add captions
            function captions() {
                $slides.each(function () {
                    $caption = $(this).find("img").attr("title");
                    if ($caption !== undefined) {
                        $(this).prepend("<p class='caption'>" + $caption + "</p>");
                    }
                    $slides.filter(":first").find(".caption").css("bottom", 0);
                });
            }

            // Manual mode
            function manual() {
                var $pagination = $("#pagination li a");
                $pagination.click(function (e) {
                    e.preventDefault();
                    var $current = $(this.hash);
                    if ($current.is(":hidden")) {
                        $slides.fadeOut(options.fadetime);
                        $current.fadeIn(options.fadetime);
                        $pagination.removeClass("active");
                        $(this).addClass("active");
                        $(".caption").css("bottom", "-37px");
                        $current.find(".caption").delay(300).animate({
                            bottom: 0
                        }, 300);
                    }
                });
            }

            // Auto mode
            function auto() {
                setInterval(function () {
                    $slides.filter(":first-child").fadeOut(options.fadetime).next("li").fadeIn(options.fadetime).end().appendTo("#slideshow ul");

                    $slides.each(function () {
                        if ($slides.is(":visible")) {
                            $(".caption").css("bottom", "-37px");
                            $(this).find(".caption").delay(300).animate({
                                bottom: 0
                            }, 300);
                        }
                    });

                }, options.delay);
            }

            // Width
            $this.width(options.width);
            //var w = $this.find("ul, li img").width(500);			
			
            // Height
            $this.height(options.height);
           // var h = $this.find("ul, li").height;//(0/*options.height*/);

			var img = jQuery.makeArray(document.getElementsByTagName("img"));
			for(var i = 0; i < img.length; ++i)
			{
                if(img[i].parentNode.tagName == 'LI')
                {
                    var width = img[i].width;
                    var height = img[i].height;
                    //alert("image w="+w+" h="+h);

                    if (width >= height)
                    {
                        //alert(i + " image width before: " + width);
                        width = 0.98 * options.width;
                        //alert(i + " image width after: " + width);
                        var coeff = width / img[i].width;
                        height *= coeff;
                    } // if
                    else
                    {
                        height = 0.98 * options.width;

                        var coeff = height / img[i].height;
                        width *= coeff;
                    } // else

                    img[i].width = width;
                    img[i].height = height;

                    var hCenter = (0.5 * options.height);
                    var imgHCenter = (0.5 * height);
                    var $hh = (hCenter - imgHCenter) + 'px';
                    //alert("hCenter = " + hCenter + " imgCenter = " + imgHCenter + " hh = " + $hh);
                    //alert("hCenter=" + hCenter + "\nimgHCenter=" + imgHCenter + "\nmarginTop="+$hh);
                    img[i].style.marginTop = $hh;

                    var wCenter = (0.5 * options.width);
                    var imgWCenter = (0.5 * width);
                    var $ww = (wCenter - imgWCenter) + 'px';
                    //alert("wCenter=" + wCenter + "\nimgWCenter=" + imgWCenter + "\nmarginLeft="+$ww);
                    img[i].style.marginLeft = $ww;
                } // if
			} // for 
			
            // Check Boolean values
            if (options.pagination === true) {
                paginate();
            } else {
                auto();
            }

            captions(); manual();

        });
    };
})(jQuery);