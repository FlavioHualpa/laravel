<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Calibri;
    }

    .search-box {
      width: 500px;
      margin: 30px auto;
      border: 1px solid #ddd;
      border-radius: 6px;
      background-color: #f0f0e0;
      position: relative;
    }

    .search-box .caption {
      background-color: #00c0c0;
      color: white;
      border-radius: 6px 6px 0 0;
      padding: 6px 10px;
      font-size: 20px;
    }

    .search-box input {
      width: calc(100% - 20px);
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 6px 10px;
      margin: 10px;
      outline: none;
      box-shadow: inset 0 0 6px #d8d8d8;
      font-size: 20px;
    }

    .search-box .search-list {
      display: none;
      top: calc(100% + 5px);
      position: absolute;
      width: 500px;
      margin: auto;
      border: 1px solid #ddd;
      background-color: #f8f8e8;
    }
  </style>
</head>
<body>
  <div class="search-box">
    <div class="caption">Busca un usuario</div>
    <input type="text">
    <div class="search-list"></div>
  </div>
  <script>
    let list = document.querySelector('.search-list');
    let input = document.querySelector('[type=text]');
    input.onkeyup = updateList;
    
    function updateList() {
      let ac = new XMLHttpRequest();
      let query = input.value.trim();

      list.innerHTML = null;

      if (query) {
        ac.onreadystatechange = () => {
          if (ac.readyState == ac.DONE) {
            let resultArray = JSON.parse(ac.response);
            let filteredArray = resultArray.filter(
              (element) => 
                (element.first_name.indexOf(query) != -1) ||
                (element.last_name.indexOf(query) != -1) ||
                (element.email.indexOf(query) != -1)
            );

            filteredArray.forEach(
              (element) => {
                let p = document.createElement('p');
                p.innerText = `${element.first_name}, ${element.last_name}, ${element.email}`;
                list.appendChild(p);
              }
            );

            list.style.display = (filteredArray.length) ? 'block' : 'none';
          }
        };
      }
      else {
        list.style.display = 'none';
      }

      ac.open('get', 'http://localhost/sites/ayudarnos/usersapi.php', true);
      ac.send();
    }
  </script>
</body>
</html>