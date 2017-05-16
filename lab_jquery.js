$(document).ready(function(){           
  var diag = $('#dialog');
  diag.hide();

  var resX = false;
  var resY = false;

  $("#sb").click(function(e){
    $("#sb").hide();
    $('#dialog').show();
  });

  $("#close").click(function(e) {
    diag.hide();
    $('#sb').show();
  });

  $("body").mouseup(function(e) {
    resX = false;
    resY = false;
  });

  $("#frame-grip-height").mousedown(function(e) {
    e.preventDefault();
    resX = true;
  });

  $("#frame-grip-width").mousedown(function(e) {
    e.preventDefault();
    resY = true;
  });

  $("body").mousemove(function(e) {
      if(resX === true) {
        
        var origHeightFrame = diag.height();
        var origPosYGrip = $("#frame-grip-height").offset().top;
        var gripHeight = $("#frame-grip-height").height();
        //diag.width(diag.width()+10);
        //console.log("aici");
        diag.height(e.pageY - origPosYGrip + origHeightFrame - gripHeight);
      }
      if(resY === true) {
        
        var origHeightFrame = diag.width();
        var origPosYGrip = $("#frame-grip-width").offset().left;
        var gripHeight = $("#frame-grip-width").width();
        //diag.width(diag.width()+10);
        //console.log("aici");
        diag.width(e.pageX - origPosYGrip + origHeightFrame - gripHeight);
      }
  });
});
