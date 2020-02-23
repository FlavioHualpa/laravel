          <span class="subheading">
            Solicitud de reserva
          </span>
          <span class="subheading">
            Del {{ $reservation->check_in->format('d-m-Y') }} al {{ $reservation->check_out->format('d-m-Y') }}, {{ $reservation->passengers }} pasajeros
          </span>
          <h2>
            Seleccione su habitación
          </h2>

          @foreach ($rooms as $room)
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  @php $reservation->room_id = $room->id; @endphp
                  <input type="radio" aria-label="Radio button for following text input" name="room_id" value="{{ $room->id }}" style="cursor: pointer; transform: scale(1.5);" {{ $loop->first ? 'checked' : '' }} data-reservation="{{ $reservation }}">
                </div>
              </div>
              <input type="text" class="form-control" aria-label="Text input with radio button" value="{{ $reservation->description() }}" disabled>
            </div>
          @endforeach

          <a href="{{ route('room.choose') }}" class="btn btn-success mt-4" id="reserve-btn">Reservar</a>

          <form action="{{ route('room.prepare') }}" method="post" id="reservation-form">
            @csrf
            <input type="hidden" name="reservation-data" id="reservation-data">
          </form>
