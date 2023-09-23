function ratescroll() {
    const element11 = document.getElementById("ratings-box");
    element11.scrollIntoView();
}
function hidecallnum() {
    var x = document.getElementById("callus-num");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
$(document).ready(function () {
    $('.rate-input:radio').click(function () {
        var webRates = this.value;
        $('.ratings-container').html('<div class="d-flex align-items-center"><span class="rating-text me-2">Thank you for rating us ' + webRates + ' </span> <i style="color: #FFC27A;" class="fa fa-star fs-2"></i><div>');
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "/sendrating",
            data: { 'star': webRates },
            type: 'POST',
            success: function (result) {
                // console.log(result);
            }
        });
    });
});
$(document).ready(function () {
    $('#hide-ratecard-btn').click(function () {
        $('#hide-ratecard-btn').hide();
        $('#hide-ratecard').animate({ marginRight: '-=110px' });
    });
});

// ------------ For Review Carousel ---------------
$(document).ready(function () {
    $('#owlreview').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            },
            1150: {
                items: 4
            },
            1250: {
                items: 5
            }
        }
    })
});

//  JS for search bar on the navbar starts --------------------
var searchNavInput = document.getElementById('searchNavInput');
$(document).ready(function () {
    $("#navSearchBtn").click(function () {
        $("#navSearchInp").slideToggle(400);
    });
    $("#closeTheNav").click(function () {
        $("#navSearchInp").slideUp(400);
        searchNavInput.value = "";
        $("#searchEmpty").hide();
        $("#searchNavList").slideUp(400);
    });
});

searchNavInput.addEventListener("input", function () {
    if (searchNavInput.value.length > 2) {
        $("#searchNavList").slideDown(400);
        $("#searchEmpty").show();
        $("#searchEmpty").click(function () {
            searchNavInput.value = "";
            $("#searchNavList").slideUp(400);
            $("#searchEmpty").hide();
        });
    }
    else {
        $("#searchNavList").slideUp(400);
        $("#searchEmpty").hide();
    }
});
//  JS for search bar on the navbar ends -------

// JS for Notifications --------
$(document).ready(function () {
    setTimeout(function () {
        $("#notificationContainer").slideDown(400);
    }, 3000);
    setTimeout(function () {
        $("#notificationBox4").slideDown(400);
    }, 3000);
    setTimeout(function () {
        $("#notificationBox3").slideDown(400);
    }, 5000);
    setTimeout(function () {
        $("#notificationBox2").slideDown(400);
        $("#notificationBox4").slideUp(400);
    }, 7000);
    setTimeout(function () {
        $("#notificationBox1").slideDown(400);
        $("#notificationBox3").slideUp(400);
    }, 10000);
    $("#closeNotification1").click(function () {
        $("#notificationBox1").slideUp(400);
    });
    $("#closeNotification2").click(function () {
        $("#notificationBox2").slideUp(400);
    });
    $("#closeNotification3").click(function () {
        $("#notificationBox3").slideUp(400);
    });
    $("#closeNotification4").click(function () {
        $("#notificationBox4").slideUp(400);
    });
    $("#closeNotificationContainer").click(function () {
        $("#notificationContainer").slideUp(400);
    });
});
