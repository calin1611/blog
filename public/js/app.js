$( document ).ready(function() {
  function getArticles() {
    $.ajax({
      url: "http://localhost/blog/admin/getJson",
      success: function(data) {
        var table = '';
        for (var i=0; i<data.length; i++) {
          table += '<tr><td>' + data[i].title + '</td>';
          table += '<td class="buttons-td">';
            if (data[i].status === "pending") {
              table += '<button class="btn btn-success admin-btn" data-approve-id="' + data[i].id + '" title="Approve article"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>';
            } else if (data[i].status === "approved") {
              table += '<button class="btn btn-warning admin-btn" data-unapprove-id="' + data[i].id + '" title="Unapprove article"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
            }
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

  $('#articlesTbl').on('click', '[data-approve-id]', function() {
    console.log($(this).data('approve-id'));
    $.ajax({
      url: "http://localhost/blog/admin/approveArticle/?id=" + $(this).data('approve-id'),
      method: "POST",
      success: function( data ) {
        console.log(data);
        getArticles();
      }
    });
  });

  $('#articlesTbl').on('click', '[data-unapprove-id]', function() {
    console.log($(this).data('unapprove-id'));
    $.ajax({
      url: "http://localhost/blog/admin/unApproveArticle/?id=" + $(this).data('unapprove-id'),
      method: "POST",
      success: function( data ) {
        console.log(data);
        getArticles();
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


//-----------------------USERS-----------------------
  function getUsers() {
    $.ajax({
      url: "http://localhost/blog/admin/getUsersJson",
      success: function(data) {
        var table = '';
        for (var i=0; i<data.length; i++) {
          table += '<tr><td>' + data[i].username + '</td>';
          table += '<td class="buttons-td">';
            if (data[i].class === "user") {
              table += '<button class="btn btn-success admin-btn" data-mkadmin-id="' + data[i].id + '">User to  ADMIN</button>';
            } else if (data[i].class === "admin") {
              table += '<button class="btn btn-warning admin-btn" data-mkuser-id="' + data[i].id + '">Admin to USER</button>';
            }
            table += '<button class="btn btn-danger admin-btn" data-delete-id="' + data[i].id + '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
          table += '</td></tr>';
        }

        $('#usersTbl').html(table);
      }

    });
  }
  getUsers();


    $('#usersTbl').on('click', '[data-mkadmin-id]', function() {
      console.log($(this).data('mkadmin-id'));
      $.ajax({
        url: "http://localhost/blog/admin/mkAdmin/?id=" + $(this).data('mkadmin-id'),
        method: "POST",
        success: function( data ) {
          console.log(data);
          getUsers();
        }
      });
    });

    $('#usersTbl').on('click', '[data-mkuser-id]', function() {
      console.log($(this).data('mkuser-id'));
      $.ajax({
        url: "http://localhost/blog/admin/mkUser/?id=" + $(this).data('mkuser-id'),
        method: "POST",
        success: function( data ) {
          console.log(data);
          getUsers();
        }
      });
    });

    $('#usersTbl').on('click', '[data-delete-id]', function() {
      $.ajax({
        url: "http://localhost/blog/admin/deleteUser/?id=" + $(this).data('delete-id'),
        method: "DELETE",
        data: {id: $(this).data("delete-id")},
        success: function( data ) {
          getUsers();
        }
      });
    });

});
