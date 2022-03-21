<?php session_start();
include_once("funzioni.php");?>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Paga</title>
</head>
<body>
  <div class="container center">
    <h1 class="center">Paga<br><br></h1>
  <div class="chips chips-autocomplete" id="nomi"></div>
  <form action="insert.php" method="post">
    <div id="hiddens"></div>
<input type="hidden" name="url" value="send.php">
<input type="number" name="value" min="0" step=".01" class="validate">
<button type="submit" class="waves-effect waves-light btn-large grey darken-4">Invia</button>
</form>
  </div>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script type="text/javascript">
  function stringToHash(string) {

                var hash = 0;

                if (string.length == 0) return hash;

                for (i = 0; i < string.length; i++) {
                    char = string.charCodeAt(i);
                    hash = ((hash << 5) - hash) + char;
                    hash = hash & hash;
                }

                return hash;
            }
  document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.chips-autocomplete');
  var instances = M.Chips.init(elems, {
    autocompleteOptions: {
      data:{
      <?php
      $db=db_connect();
      $result=$db->query('SELECT * FROM login_debits WHERE 1');
      while($row=$result->fetch_assoc()){
        echo '"'.$row["nome"].'": null,';
      }

       ?>
       "$$": null
     },  autocompleteOnly : true
   },
  onChipAdd: function(event) {
     var container=document.getElementById("hiddens");
     var input=document.createElement("input");
     input.type="hidden";
     input.name="idArray[]";
     input.value=event[0].M_Chips.chipsData[event[0].M_Chips.chipsData.length-1]["tag"];
     input.id=stringToHash(input.value);
     container.appendChild(input);
   },
  onChipDelete: function(event, chip){
    document.getElementById(stringToHash(chip.firstChild.data)).remove();
  }
  });
});

  </script>
</body>
</html>
