$(document).ready(function(){
    var originaltext;
    $(".el").mouseenter(function(){
        originaltext =  $("#"+this.id+"text").text();
        $("#"+this.id+"text").text("MORE INFORMATION");
    }).mouseleave(function (){
        $("#"+this.id+"text").text(originaltext);
    });
});
