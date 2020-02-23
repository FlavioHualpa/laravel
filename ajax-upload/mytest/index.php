<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ajax data retrieval</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
  </script>
</head>
<body>
  <div class="container">
    <h1>Leyendo datos asincrónicamente</h1>
    <a href="" class="btn v-space" id="add-btn">Leer datos</a>

    <table>
      <thead id="table-header">
        <tr>
          <th>#</th>
          <th>Descripción</th>
          <th>Precio</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody id="table-body">
      </tbody>
    </table>

  </div>

  <script>

    $(document).ready(

      function() {

        let ordinal = 0;

        $('#add-btn').click(
          
          function (ev) {

            const formData = new FormData();
          
            ev.preventDefault();
            ordinal++;
            formData.append('ordinal', ordinal);

            $.ajax({
              url: 'fetch.php',
              method: 'post',
              data: { ordinal: ordinal },
              success: function(data) {
                $('#table-body').append(data);
              }
            });

          }

        );

      }

    );

    function removeRow(sender)
    {
      const rowId = sender.getAttribute('data-rowId');
      $('#' + rowId).remove();
      event.preventDefault();
    }

  </script>

</body>
</html>
