$(document).ready(function() {
    $(window).scroll(function() {
        var windowHeight = $(window).height();
        var scroll = $(window).scrollTop();

        $('#opis2').each(function() {
            var position = $(this).offset().top;
            if (position < scroll + windowHeight - 100) {
                $(this).css('transform', 'translateY(0)');
                $(this).css('opacity', '1');
            }
        });

        $('#postac2').each(function() {
            var position = $(this).offset().top;
            if (position < scroll + windowHeight - 100) {
                $(this).css('transform', 'translateY(0)');
                $(this).css('opacity', '1');
            }
        });
    });
});


document.addEventListener("DOMContentLoaded", function() {
    var observer = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                var postac3 = document.getElementById('postac3');
                var opis3 = document.getElementById('opis3');
                postac3.style.transform = 'translateX(0)';
                postac3.style.opacity = '1';
                opis3.style.transform = 'translateX(0)';
                opis3.style.opacity = '1';
            }
        });
    }, { threshold: 0.1 });

    var postac3 = document.getElementById('postac3');
    observer.observe(postac3);
});

$(document).ready(function(){
    var btn = $('<button/>', {
        text: 'Do góry',
        id: 'back-to-top',
        style: 'display:none; position: fixed; bottom: 20px; right: 20px;'
    }).appendTo('body');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.show();
        } else {
            btn.hide();
        }
    });

    // Przewijanie do góry po kliknięciu
    btn.click(function() {
        $('html, body').animate({scrollTop:0}, '300');
    });
});