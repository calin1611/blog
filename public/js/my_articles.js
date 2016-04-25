window.baseURL = 'http://localhost/blog/';

$( document ).ready(function() {

  function getArticles() {
    $.ajax({
      url: "http://localhost/blog/my_articles/getJson",
      success: function(data) {
        var table = '';
        for (var i=0; i<data.length; i++) {
          table += '<tr id="row-' + data[i].id + '"><td class="title-td"><a href="' + window.baseURL + 'article?id=' + data[i].id + '">' + data[i].title + '</a></td>';
          table += '<td class="buttons-td">';
            if (data[i].status === "pending") {
              table += '<div class="btn btn-warning admin-btn appr-unappr" data-unapprove-id="' + data[i].id + '" data-toggle="tooltip" data-placement="left" title="Article unapproved"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
            } else if (data[i].status === "approved") {
              table += '<div class="btn btn-success admin-btn appr-unappr"  data-approve-id="' + data[i].id + '" data-toggle="tooltip" data-placement="left" title="Article approved"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>';
            }
            table += '<button class="btn btn-default admin-btn"  data-edit-id="' + data[i].id + '" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
            table += '<button class="btn btn-danger admin-btn" data-delete-id="' + data[i].id + '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
          table += '</td></tr>';
        }

        if (data.length === 0 ) {
          $('#articlesTbl').html("<div>:( It seems that you didn't post any articles</div>");
        } else {
          $('#articlesTbl').html(table);
        }

      }

    });
  }

  getArticles();

  // Show a tooltip that explains if the article is approved or not approved
  $('#articlesTbl').on('mouseenter', '.appr-unappr', function() {
    $(this).tooltip('show');
  });

  // Open a modal and edit the article.
  $('#articlesTbl').on('click', '[data-edit-id]', function() {
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

  // Save the changes to the article
  $('input[type=submit]').on('click', function() {
    var articleForm = $('#articleForm');
      if($('input[name=id]').val() !== '') {
        $.ajax({
          url: "http://localhost/blog/admin/updateArticle",
          data: articleForm.serialize(),
          type: 'json',
          method: 'POST',
          success: function(data) {
            $('#myModal').modal('hide');
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

  // Clear the fields of the article
  $('input[type=button]').on('click', function() {
    $('#articleForm [name]').val('');
  });

  // Delete article
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

});
