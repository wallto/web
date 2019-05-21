$(function() {

	//SVG Fallback
	/*if(!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function() {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};*/

	//E-mail Ajax Send
	//Documentation & Example: https://github.com/agragregra/uniMail
	/*
	$("form").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", //Change
			data: th.serialize()
		}).done(function() {
			alert("Thank you!");
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});
*/

	//Chrome Smooth Scroll
	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	};


	


	$("img, a").on("dragstart", function(event) { event.preventDefault(); });
	
});

$(window).load(function() {
    var qrcode = new QRCode("qrcode");

    function makeCode () {      
        var elText = document.getElementById("qrcode-text");
        
        if (!elText.value) {
            alert("Input a text");
            elText.focus();
            return;
        }
        
        qrcode.makeCode(elText.value);
    }

    makeCode();

    $("#qrcode-text").
        on("blur", function () {
            makeCode();
        }).
        on("keydown", function (e) {
            if (e.keyCode == 13) {
                makeCode();
            }
        });
/*
	$(".loader_inner").fadeOut();
	$(".loader").delay(400).fadeOut("slow");
*/

	/*//masonry
    var $container = $(".masonry-container");
    $container.imagesLoaded(function () {
        $container.masonry({
            columnWidth: ".item",
            itemSelector: ".item"
        });
        $(".item").imagefill();
    });
    $(".gitem").imagefill();*/
});

$(".close").click(function() {
    $(this).parent('.notification').remove();
});

$(".walletGroup .walletGroupPrew").click(function() {
    $(this).toggleClass("active");
    $(this).next().toggleClass("active");
    //$(this + ".openButton").toggleClass("active");
});

$(function () {
    $('.popup-modal').magnificPopup({
        type: 'inline',
        closeBtnInside: true
    });
});
/* Parallax
        $.fn.parallax = function(resistance, mouse) {
          $el = $(this);
          TweenLite.to($el, 0.2, {
            x: -((mouse.clientX - window.innerWidth / 2) / resistance),
            y: -((mouse.clientY - window.innerHeight / 2) / resistance)
          });
        };

        $(document).mousemove(function(e) {
          $(".background").parallax(-100, e);
          $(".title").parallax(50, e);
          });
*/