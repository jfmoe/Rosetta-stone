$(document).ready(function(){
    $("#btn").on("click",function(){
        $.get("getstar.php",{article_id:$("#btn").val()},function(data){
            $("#result").text(data);
        });
    });
});