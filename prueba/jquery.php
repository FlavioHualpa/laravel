<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>Document</title>
</head>
<body>
  <h2>Pinamar</h2>
  <h2>Ostende</h2>
  <h2>Valeria del Mar</h2>
  <h2>Cariló</h2>
  <p id="data"></p>
</body>
<script>
  var head = $("h2")
  console.log(head)
  head.css("color", "red")
  head.html("## PINAMAR ##")

  var ajax = new XMLHttpRequest()
  ajax.onreadystatechange = function () {
    if (ajax.readyState == ajax.DONE && ajax.status == 200) {
      $("#data").text(ajax.response)
    }
  }

  ajax.open(
    "get",
    "https://jsonplaceholder.typicode.com/users",
    true
  )

  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")

  ajax.send("nombre=Ada&apellido=Lovelace&curso=Fullstack")
</script>
</html>
