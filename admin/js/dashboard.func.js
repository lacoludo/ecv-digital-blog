$(document).ready(function(){
        $('.modal').modal();

        $(".see_comment").click(function () {
                var id = $(this).attr("id");
                $.post('comment/see_comment.php',{id:id},function(){
                        $("#commentaire_"+id).hide();
                });
        });
        $(".delete_comment").click(function () {
                var id = $(this).attr("id");
                $.post('comment/delete_comment.php',{id:id},function(){
                        $("#commentaire_"+id).hide();
                });
        });
});