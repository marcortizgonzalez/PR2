$(document).ready(function() {
    $("#open-modal").on('click', function(e) {
        e.preventDefault();
        $(this).animate({
            top: "-50%"
        }, 400, function() {
            $(".left-part, .right-part").css({
                height: $('.modal').outerHeight()
            });
            $(".left-part").animate({
                left: '50%'
            }, 600);
            $(".right-part").animate({
                right: '50%'
            }, 600, function() {
                $(".modal").animate({
                    top: 0
                });
            });
            $(".bckg-close").fadeIn();
        });
    });
    $(".bckg-close").on("click", function() {
        $(".modal").animate({
            top: "-1200px"
        }, function() {
            $(".left-part").animate({
                left: '-50%'
            }, 600);
            $(".right-part").animate({
                right: '-50%'
            }, 600, function() {
                $(".bckg-close").fadeOut();
                $("#open-modal").animate({
                    top: "5%"
                }, 400);
            });
        });
    });
});