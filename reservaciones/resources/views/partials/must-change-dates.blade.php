          <span class="subheading">
            Lo sentimos, no disponemos de una habitación {{ $reservation->room_name }}
          </span>
          <span class="subheading">
            entre el {{ $reservation->check_in->format('d-m-Y') }} y el {{ $reservation->check_out->format('d-m-Y') }} ({{ $reservation->passengers }} pasajeros)
          </span>

          {{-- <span class="subheading">
            {{ session('url.intended') }}
          </span> --}}

          <h4 class="mt-5">Modifique su consulta</h4>

          @include('partials.room-selector')

          <h2 class="mt-4">Otras opciones disponibles</h2>

          @foreach ($options as $choices)
            @foreach ($choices as $choice)
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="radio" aria-label="Radio button for following text input" name="room_id" value="{{ $choice->room_id }}" style="cursor: pointer; transform: scale(1.5);" {{ $loop->first && $loop->parent->first ? 'checked' : '' }} data-reservation="{{ $choice }}">
                  </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with radio button" value="{{ $choice->description() }}" disabled>
              </div>
            @endforeach
          @endforeach

          <a href="#" class="btn btn-success mt-4" id="reserve-btn">Reservar</a>

          <form action="{{ route('room.prepare') }}" method="post" id="reservation-form">
            @csrf
            <input type="hidden" name="reservation-data" id="reservation-data">
          </form>