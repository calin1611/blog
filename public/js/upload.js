$('document').ready(function(e) {
  $('form').on('submit', function(e) {
    e.preventDefault();

    // Varianta 1
    var myForm = $('#postForm');
    // var dataToSend = new FormData(myForm[0]);

    // Varianta 2
    var dataToSend = new FormData();
    dataToSend.append("file",file.files[0]);

    var formTitle = $("#postForm")[0].title.value;
    // dataToSend.append("title",formTitle);

    var formBody = $("#postForm")[0].body.value;
    // dataToSend.append("body",formBody);

    var arr = $("#postForm").serializeArray();
    dataToSend.append("title",arr[0].value);
    dataToSend.append("body",arr[1].value);


    // Read the uploaded file
    var reader = new FileReader();
    reader.readAsDataURL(file.files[0]);
    reader.onload = function(e) {
      window.uploadedFile = e.target.result;
    };

    // Set loading text
    $('#loading').html('loading...');

    $.ajax({
      xhr: function(){
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener("progress",function(e){
          if (e.lengthComputable){
            var percentComplete = (e.loaded / e.total) * 100;
            $("#myBar").width(percentComplete+"%");
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
        $("#previewing").attr("src",window.uploadedFile);

        // $("#title").val('');
        // $("#body").val('');
        $('#status').attr('class', 'alert alert-success').html("<b>Success!</b> The article has been submitted for approval.");

      },
      error: function () {
        //tell the error
        $('#status').attr('class', 'alert alert-danger').html("<b>ERROR</b>: Please fill in the form.");
        console.error('FAILED!');
      },
      complete: function () {
        $('#loading').html('');
      }

    });
  });

  $('#file').on('change', function (e) {
    var fileName = e.target.value;
    if ((fileName.indexOf('.gif') !== -1) || (fileName.indexOf('.jpg') !== -1) || (fileName.indexOf('.png') !== -1)) {
      console.log('Tăt îi bine.');
      $('.submit').attr('disabled', false);
    } else {
      console.log('Please upload an IMAGE');
      $('#file-validation').css('display', 'inline-block');
    }
  });
});
