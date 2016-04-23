$('document').ready(function(e) {
  $('form').on('submit', function(e) {
    e.preventDefault();

    var dataToSend = new FormData();
    dataToSend.append("file",file.files[0]);

    var myForm = $("#postForm").serializeArray();
    dataToSend.append("title",myForm[0].value);
    dataToSend.append("body",myForm[1].value);


    // Read the uploaded file
    var reader = new FileReader();
    reader.readAsDataURL(file.files[0]);
    reader.onload = function(e) {
      window.uploadedFile = e.target.result;
    };

    $.ajax({
      xhr: function(){
        $('.progress').toggleClass('hidden');
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener("progress",function(e){
          if (e.lengthComputable){
            var percentComplete = (e.loaded / e.total) * 100;
            $(".progress-bar").width(percentComplete+"%").attr('aria-valuenow', percentComplete);
          }
        });
        return xhr;

      },
      url: 'http://localhost/blog/post/postArticle',
      type: 'POST',
      data: dataToSend,
      processData: false, //ALWAYS false when uploading
      contentType: false, //ALWAYS false when uploading
      success: function(resp) {
        $("#previewing").attr("src", "");
        var status = $('#status');
        status.removeClass();
        status.addClass('alert alert-success animated fadeIn').html("<b>Success!</b> The article has been submitted for approval.<br> Would you like to <a href='http://localhost/blog/post'>post a new article</a>?");
        $(".progress").addClass('animated fadeOut');
        // $("#previewing").addClass('animated fadeOut');

        //Clear form
        // $('#title').val('');
        // $('#body').val('');
        // $('#file').val('');
      },
      error: function (resp) {
        var status;
        if (resp.responseText === 'wrong filetype') {
          status = $('#status');
          status.removeClass();
          status.addClass('alert alert-warning animated fadeIn').html("<b>Warning</b>: Please upload pictures only (.gif, .png, .jpg)");
        } else {
          status = $('#status');
          status.removeClass();
          status.addClass('alert alert-danger animated fadeIn').html("<b>ERROR</b>: Please fill in the form.");
        }
      }
    });
  });

  $('#file').on('change', function (e) {
    var fileName = e.target.value;

    //Check if the file is an image (.gif, .png, .jpg, .jpeg)
    if ((fileName.indexOf('.gif') !== -1) || (fileName.indexOf('.jpg') !== -1) || (fileName.indexOf('.jpeg') !== -1) || (fileName.indexOf('.png') !== -1)) {
      // $('.submit').attr('disabled', false);

      // Show selected image
      var reader = new FileReader();
      reader.readAsDataURL(file.files[0]);
      reader.onload = function(e) {
        window.uploadedFile = e.target.result;
        $("#previewing").attr("src", window.uploadedFile);
      };

    } else {
      var status = $('#status');
      status.removeClass();
      status.addClass('alert alert-warning animated fadeIn').html("<b>Warning</b>: Please upload pictures only (.gif, .png, .jpg)");
    }
  });
});
