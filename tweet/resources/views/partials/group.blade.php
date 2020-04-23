            @forelse ($group as $person)
            <div class="col-5 border bg-white rounded m-1">
               <div class="d-flex align-items-center my-3">
                  <img src="https:\\i.pravatar.cc\200?u={{ $person->email }}" alt="{{ $person->name }}" style="width: 60px;" class="rounded mr-3">
                  <div>
                     <h3 class="mb-1">
                        <a href="{{ route('following', $person->username) }}" class="text-dark">
                           {{ $person->name }}
                        </a>
                     </h3>

                     <div class="d-flex">
                     @if ($group == $following)
                        @include('partials.follows-actions')
                     @elseif ($group == $followers)
                        @include('partials.followed-actions')
                     @elseif ($group == $unrelated)
                        @include('partials.unrelated-actions')
                     @endif
                     </div>

                  </div>
               </div>
            </div>
            @empty
               <h3>Nadie todavía</h3>
            @endforelse