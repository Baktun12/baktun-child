// Book Effects and page turning

jQuery(document).ready(function(){
  $("#book").turn({
                width: 400,
                height: 300,
                autoCenter: true
            });
   $("#book").turn("next");
            
});