// Book Effects and page turning

jQuery(document).ready(function(){
  $("#book").turn({
                width: 800,
                height: 700,
                autoCenter: true
            });
  $("#book").turn("next");
            
});