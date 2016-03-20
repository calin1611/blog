$( document ).ready(function() {
  function getArticles() {
    $.ajax({
      url: "http://localhost/blog/admin/getJson",
      success: function(data) {
        //console.log(json);
        var table = '';
        for (var i=0; i<data.length; i++) {
          table += '<tr><td>' + data[i].title + '</td>';
          table += '<td class="buttons-td">';
            table += '<button class="btn btn-default admin-btn" data-edit-id="' + data[i].id + '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
            table += '<button class="btn btn-danger admin-btn" data-delete-id="' + data[i].id + '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
          table += '</td></tr>';
        }

        $('#articlesTbl').html(table);
      }

    });
  }

  getArticles();

  $('#articlesTbl').on('click', '[data-edit-id]', function() {
    //console.log($(this).data('edit-id'));
    $.ajax({
      url: "http://localhost/blog/admin/getArticle/?id=" + $(this).data('edit-id'),
      method: "PUT",
      success: function( data ) {
        console.log(data);
          $('input[name=title]').val(data.title);
          $('textarea').val(data.body);
          $('input[name=id]').val(data.id);
      }
    });
  });

  $('#articlesTbl').on('click', '[data-delete-id]', function() {
    $.ajax({
      url: "http://localhost/blog/admin/deleteArticle/?id=" + $(this).data('delete-id'),
      method: "DELETE",
      data: {id: $(this).data("delete-id")},
      success: function( data ) {
        getArticles();
      }
    });
  });

  $('input[type=button]').on('click', function() {
    $('#articleForm [name]').val('');
  });

  $('input[type=submit]').on('click', function() {
    var articleForm = $('#articleForm');
      if($('input[name=id]').val() !== '') {
        $.ajax({
          url: "http://localhost/blog/admin/updateArticle",
          data: articleForm.serialize(),
          type: 'json',
          method: 'POST',
          success: function(data) {
            articleForm[0].reset();
            getArticles();
          }
        });
      } else {
       $.ajax({
         url: "http://localhost/blog/admin/addArticle",
         data: articleForm.serialize(),
         method: 'POST',
         success: function(data) {
           articleForm[0].reset();
           getArticles();
         }
       });
     }
  });
});
