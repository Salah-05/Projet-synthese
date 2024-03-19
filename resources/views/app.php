<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocomplete Example</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
<form action="#">                                
    <input type="search" id="search" name="search" placeholder="Search...">
</form>

<script>
  $( function() {
    var availableTags = [];
    $.ajax({
        method: "GET",
        url: "autocomplete",
      
        success: function(response){
            console.log(response);
            autocomplete(response)
        }
    })
    function autocomplete(availableTags){
        $( "#search" ).autocomplete({
        source: availableTags
    });
    }
  } );
  </script>
</body>
</html>
