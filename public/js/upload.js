$('document').ready(function(e) {
  $('form').on('submit', function(e) {
    e.preventDefault();

    // Varianta 1
    // var myForm = $('#uploadimage');
    // var dataToSend = new FormData(myForm[0]);

    // Varianta 2
    var dataToSend = new FormData();
    dataToSend.append("file",file.files[0]);

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
      },
      error: function () {
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
