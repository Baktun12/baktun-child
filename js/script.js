// Book Effects and page turning

jQuery(document).ready(function() {
       $("#book").turn({
                width: 600,
                height: 500,
                autoCenter: true
            });
  
});

function on() {
  document.getElementById("overlay").style.display = "block";
    $("#book").turn("next");

}

function off() {
  document.getElementById("overlay").style.display = "none";
}

