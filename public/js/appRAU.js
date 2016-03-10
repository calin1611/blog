$( document ).ready(function() {

  function getArticles() {
    $.ajax({
      url: "http://localhost/blog/admin/getJson",
      success: function( data ) {
        //console.log(json);
        var table = '';
        for (var i=0; i<data.length; i++) {
          table += '<tr><td>' + data[i].title + '</td><td><button data-edit-id="' + data[i].id + '">Edit</button><button>Delete</button></td></tr>';
        }
        $('#articlesTbl').html(table);
      }

    });
  }
  getArticles();

  $('#articlesTbl').on('click', '[data-edit-id]', function() {
    //console.log($(this).data('edit-id'));
    console.log('EDIT button clicked.');
    $.ajax({
      url: "http://localhost/blog/admin/getArticle/?id=" + $(this).data('edit-id'),
      success: function( data ) {
        $('input[name=title]').val(data.title);
        $('textarea').val(data.body);
        $('input[name=id]').val(data.id);
      }
    });
  });

  $("#resetForm").on("click", function () { //reset btn EU
    $("#articleForm")[0].reset();
  });

  $('input[type=button]').on('click', function() {
    $("#articleForm [name]").val("");
  });

  $('input[type=submit]').on('click', function() {
    var articleForm = $('#articleForm');
    if ( $("input[name=id]").val() !== "" ) {
      $.ajax({
        url: "http://localhost/blog/admin/updateArticle",
        data: articleForm.serialize(),
        method: 'PUT',
        success: function(data) {
          console.log('SAVE button clicked. Updated');
          getArticles();
          $("#articleForm")[0].reset();
        }
      });
    } else {
      $.ajax({
        url: "http://localhost/blog/admin/addArticle",
        data: articleForm.serialize(),
        method: 'POST',
        success: function(data) {
          console.log('SAVE button clicked. Added');
          articleForm[0].reset();
          getArticles();
        }
      });
    }
  });
});
