$('document').ready(function() {

  //if the page is stored in sessionStorage, go to it. If not, go to the first page
  if (sessionStorage.getItem('page')) {
    getPage(sessionStorage.getItem('page'));
  } else {
    getPage(1);
  }

});

$('.pagination').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div

  // Save page to sessionStorage
  sessionStorage.setItem('page', this.id);

  // Go to the page
  getPage(this.id);
});

function getPage(elem) {
  var page = elem; // Page number is the id of the 'a' element

  var pagination = ''; // Init pagination

  var data = {page: page, per_page: 8}; // Create JSON which will be sent via Ajax
  // the number of articles per page: per_page = 4.

  $.ajax({ // jQuery Ajax
    method: 'POST',
    url: 'http://localhost/blog/articles/paginate', // URL to the PHP file which will insert new value in the database
    data: data, // We send the data string
    dataType: 'json', // Json format
    timeout: 3000,
    success: function(data) {
      $('#articleArea').html(data.articleList); // We update the articleArea DIV with the article list

      // Pagination system
      if (page == 1) pagination += '<li class="disabled"><span aria-hidden="true">Newest</span></li><li class="disabled"><span aria-hidden="true">&laquo;</span></li>';
      else pagination += '<li><a href="#" id="1" aria-label="Newest">Newest</a></li><li><a href="#" id="' + (page - 1) + '" aria-label="Previous"><span aria-label="Next" aria-hidden="true">&laquo;</span></a></li>';

      for (var i=parseInt(page)-3; i<=parseInt(page)+3; i++) {
        if (i >= 1 && i <= data.numPage) {
          pagination += '<li';
          if (i == page) pagination += ' class="active"><span>' + i + '</span>';
          else pagination += ' ><a href="#" id="' + i + '">' + i + '</a>';
          pagination += '</li>';
        }
      }

      if (page == data.numPage) pagination += '<li class="disabled"><span aria-label="Next" aria-hidden="true">&raquo;</span></li><li class="disabled"><span aria-hidden="true">Oldest</span></li>';
      else pagination += '<li><a href="#" id="' + (parseInt(page) + 1) + '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><li><a href="#" id="' + data.numPage + '" >Oldest</a></li>';

      $('.pagination').html(pagination); // We update the pagination DIV
    },
    error: function() {
    }
  });
}
