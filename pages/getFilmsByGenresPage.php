<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Films</title>
  <script>
const ajax = new XMLHttpRequest();

function get(){
    let name = document.getElementById("name").value;
    ajax.onreadystatechange = update;
    ajax.open("GET", "../scripts/getFilmsByGenres.php?name="+ name);
    
    ajax.send(null);
}

  function update(){
    if(ajax.readyState === 4){
      if(ajax.status === 200){
        var text = document.getElementById('text');
        text.innerHTML = ajax.responseText;
      }
    }
  }
</script>
</head>
<body>
<?php
include("../scripts/dbConnect.php");

$genreSql = 'SELECT `title` FROM `genre`';

echo '<form method="get">';

echo "<select id ='name'><option> Выбрать жанр </option>";

foreach($db->query($genreSql) as $row) {
    echo "<option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
}

echo "</select>";
echo '<input type="button" onclick = "get()" value="ОК"><br>';
echo "</form>";
?>
<table style="border: 1px solid"><tr><th> Film </th></tr>
<tbody id = "text"></tbody>
</body>
</html>



