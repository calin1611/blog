$( document ).ready(function() {
  $("#signup").on("click", function () {

    var alertDiv = $(".alert");
    var username = $("#username").val();
    var password = $("#password").val();
    var password2 = $("#password2").val();
    var error;

    $.ajax({
      url: "http://localhost/blog/signup",
      type: "POST",
      data: {
        username: username,
        password: password,
        password2: password2,
        signup: 'signup'
      },
      success: function () {
        if ($("#password").val() != $("#password2").val()) {
          error.push("password");
          alertDiv.addClass("alert-danger").text("The passwords don't matchZZZZZZZZZZ.");
        }

      }
    });


  });
});
