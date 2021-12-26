// Owl Carousel Start..................



$(document).ready(function () {
    var one = $("#one");
    var two = $("#two");

    $('#customNextBtn').click(function () {
        one.trigger('next.owl.carousel');
    })
    $('#customPrevBtn').click(function () {
        one.trigger('prev.owl.carousel');
    })
    one.owlCarousel({
        autoplay: true,
        loop: true,
        dot: true,
        autoplayHoverPause: true,
        autoplaySpeed: 100,
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    two.owlCarousel({
        autoplay: true,
        loop: true,
        dot: true,
        autoplayHoverPause: true,
        autoplaySpeed: 100,
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

});








// Owl Carousel End..................



//Contact From js

$("#ContactSendBtn").click(function () {
    var contactName = $("#contactName").val();
    var contactMobile = $("#contactMobile").val();
    var contactEmail = $("#contactEmail").val();
    var contactMessage = $("#contactMessage").val();

    sendMessage(contactName, contactMobile, contactEmail, contactMessage)
})


function sendMessage(contactName, contactMobile, contactEmail, contactMessage) {


    if (contactName.length == 0) {
        $("#contactName").attr('placeholder', '**Please enter your name**').addClass('bg-warning');


    } else if (contactMobile.length == 0) {
        $("#contactMobile").attr('placeholder', '**Please enter your Mobile Number**').addClass('bg-warning');
    } else if (contactEmail.length == 0) {
        $("#contactEmail").attr('placeholder', '**Please enter your Email**').addClass('bg-warning');
    } else if (contactMessage.length == 0) {
        $("#contactMessage").attr('placeholder', '**Please enter your Message**').addClass('bg-warning');
    } else {
        axios.post("/sendmessage", { contactName: contactName, contactMobile: contactMobile, contactEmail: contactEmail, contactMessage: contactMessage })
            .then(function (response) {
                if (response.status == 200) {
                    if (response.data == 1) {
                        $("#ContactSendBtn").html("Thanks for your messgae");
                    }
                }
            })
    }

}
