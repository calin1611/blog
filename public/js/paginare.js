$(document).ready(function () {
  function getNoArticles() {
    $.ajax({
        url: "http://localhost/blog/articles/countArticles",
        success: function(data) {
            console.log(data);
            noArticles = data;
        }

    });
  }
  getNoArticles();
  var noArticles;
  // var pages = getNoArticles() / 3;
  // console.log(pages);
  console.log(noArticles);
});
