
  

document.addEventListener('DOMContentLoaded', function() {
  var checkbox = document.getElementById('zgoda');
  var submitButton = document.getElementById('submit-btn');
  var form = document.querySelector('#formularz-kontaktowy form'); // Zakładając, że formularz ma unikalne ID.
  var checkboxLabel = document.querySelector('label[for="zgoda"]'); // Zakładając, że label jest dla checkboxa 'zgoda'.

  checkbox.addEventListener('change', function() {
      submitButton.disabled = !this.checked;
      if(this.checked) {
          checkbox.classList.remove('error');
          checkboxLabel.classList.remove('error-label');
      }
  });

  form.addEventListener('submit', function(event) {
      if (!checkbox.checked) {
          checkbox.classList.add('error');
          checkboxLabel.classList.add('error-label');
          event.preventDefault(); 
      }
  });
});

$(document).ready(function() {
    $('.card').click(function() {
        $(this).toggleClass('flipped');

        $('.card').not(this).removeClass('flipped');
    });
});

$(document).ready(function() {
    var bottomReached = false;
  
    $(window).scroll(function() {
      if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        if (!bottomReached) {
          bottomReached = true;
          setTimeout(function() {
            $(".slogan-kontakt").css({
              'visibility': 'visible',
              'opacity': '1'
            });
          }, 2000);
        }
      } else {
        bottomReached = false;
        $(".slogan-kontakt").css({
          'visibility': 'hidden',
          'opacity': '0'
        });
      }
    });
  });
  








