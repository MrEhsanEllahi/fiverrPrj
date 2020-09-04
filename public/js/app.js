$(document).ready(function () {
  $(".alert").fadeTo(2000, 500).slideUp(500, function () {
    $("#success-alert").slideUp(500);
  });

  $('.selectpicker').selectpicker();

  $('#needBS').on('changed.bs.select', function (e) {
    var selected = e.target.value;
    if (selected === 'Job') {
      $('#jobDetails').show();
    } else {
      $('#jobDetails').hide();
    }
  });
});
