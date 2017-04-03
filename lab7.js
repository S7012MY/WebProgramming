var score = 0;
function rnd(max) { return Math.floor(Math.random()*(max+1)) }

function showImage(container, maxwidth, maxheight, imgsrc, imgwidth, imgheight) {
    var id = "newimage" + rnd(1000000);
    if(score < 10) {
      $(container).append(
          "<img id='" + id + "' src='" + imgsrc +
          "' style='display:block; float:left; position:absolute;" +
          "left:" + rnd(maxwidth - imgwidth) + "px;" +
          "top:"  + rnd(maxheight - imgheight) + "px'>");
      $('#' + id).fadeIn();
      $('#' + id).click(function() {
        ++score;
      });
      setTimeout(function() {
        $('#' + id).fadeOut();
      }, 3000);
    }

    return id;
}

setInterval(
    function() {
        showImage("#container", 800, 600,
                  "http://placekitten.com/" + (90 + rnd(10)) + "/" + (90 + rnd(10)),
                  100, 100);
    }, 700);
