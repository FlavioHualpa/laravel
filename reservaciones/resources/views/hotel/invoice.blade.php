<!DOCTYPE html>
<html lang="es">
  <head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ public_path('css/invoice.css') }}">
    <script src="{{ public_path('js/487b4db8ef.js') }}"></script>
  </head>

  <body>
    <div class="container">

      <header class="header">
        <div>
          <h2>
            <i class="fas fa-hotel"></i>
            {{ env('HOTEL_NAME') }}
          </h2>
          <h4>
            CUIT: 30-33333333-9
          </h4>
        </div>
        <div class="text-align-right">
          <h3>
            FACTURA Nº {{ sprintf('%04d', $invoice->branch) }}-{{ sprintf('%08d', $invoice->number) }}
          </h3>
          <h4>
            {{ $invoice->created_at->format('d-m-Y') }}
          </h4>
        </div>
      </header>

      <section class="middle-section">
        <p>
          <b>Para: </b> {{ $user->fullName() }}
        </p>
        <p>
          <b>Email: </b> {{ $user->email }}
        </p>
        <p>
          <b>Documento: </b> {{ $user->id_num }}
        </p>
      </section>

      <section class="invoice-items">
        <table width="100%">
          <tbody>
            <tr>
              <td width="5%">
                1
              </td>
              <td width="80%">
                Reserva por estadía
              </td>
              <td width="15%">
                <h4>
                  $ {{ number_format($reservation->total_price, 2, ',', '.') }}
                </h4>
              </td>
            </tr>
            <tr>
              <td>
              </td>
              <td>
                Habitación: {{ $reservation->room_name }}, Nº {{ $reservation->room_number }}
              </td>
              <td>
              </td>
            </tr>
            <tr>
              <td>
              </td>
              <td>
                Check-in: {{ $reservation->check_in->format('d-m-Y') }}
              </td>
              <td>
              </td>
            </tr>
            <tr>
              <td>
              </td>
              <td>
                Check-out: {{ $reservation->check_out->format('d-m-Y') }}
              </td>
              <td>
              </td>
            </tr>
            <tr>
              <td>
              </td>
              <td>
                Noches: {{ $reservation->nights }}
              </td>
              <td>
              </td>
            </tr>
            <tr>
              <td>
              </td>
              <td>
                Pasajeros: {{ $reservation->passengers }}
              </td>
              <td>
              </td>
            </tr>
          </tbody>
        </table>
      </section>

      <footer class="footer">
        <div>
          {{ env('HOTEL_NAME') }}
        </div>
        <div>
          203 Fake St. Mountain View
          <br>
          San Francisco, California, USA
        </div>
          	+2 392 3929 210
        <div>
        </div>
        <div>
          {{ env('MAIL_FROM_ADDRESS') }}
        </div>
      </footer>

    </div>
  </body>
</html>