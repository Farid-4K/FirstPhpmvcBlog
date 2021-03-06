$(document).ready(function() {
  $('form').submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: $(this).attr('method') || 'post',
      url: $(this).attr('action'),
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(result) {
        console.log(result);
        let json = JSON.parse(result);
        if (json.url) {
          window.location.href = '/' + json.url;
        } else {
          $('#notification').
              html(
                  '<div class="notification"><div class="notification-title z-depth-2"><div class="h5">' +
                  json.status + '</div><div class="h4">' + json.message +
                  '</div></div></div><script>$(".notification").click(function (){$(this).fadeOut(400,"swing");});</script>');
        }
      },
    });
  });
});
