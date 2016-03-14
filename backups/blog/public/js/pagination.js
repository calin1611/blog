$(document).ready(function() {
$("#target-content").load("app/views/pagination.php?page=1");
    $("#pagination li").on('click',function(e){
    e.preventDefault();
        $("#target-content").html('loading...');
        $("#pagination li").removeClass('active');
        $(this).addClass('active');
        var pageNum = this.id;
        $("#target-content").load("app/views/pagination.php?page=" + pageNum);
    });
});
