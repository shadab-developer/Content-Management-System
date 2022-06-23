$(document).ready(function () {
  $("#summernote").summernote();
});

$(document).ready(function () {
  $("#selectAllBoxes").click(function (event) {
    if (this.checked) {
      $(".selectBoxes").each(function () {
        this.checked = true;
      });
    } else {
      $(".selectBoxes").each(function () {
        this.checked = false;
      });
    }
  });
});
