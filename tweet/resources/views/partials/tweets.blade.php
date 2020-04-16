      <div class="col-md-8">
         <div class="my-5">
            @foreach ($tweets as $tweet)
               <article style="border-bottom: 1px solid #c0c0c0;" class="mb-3">
                  <div class="d-flex align-items-start">
                     <img src="https:\\i.pravatar.cc\200?u={{ $tweet->user->email }}" alt="{{ $tweet->user->name }}" style="width: 40px;" class="rounded-circle mr-3">

                     <div class="d-flex flex-column">
                        <h5 class="mb-0 font-weight-bold">
                           <a href="{{ route('following', $tweet->user->username) }}">
                              {{ $tweet->user->name }}
                           </a>
                        </h5>
                        <small class="text-muted mb-2">
                           🕓 {{ now()->diffForHumans($tweet->created_at) }}
                        </small>
                        
                        <p class="lead mb-1">
                           {{ $tweet->text }}
                        </p>

                        <div class="d-flex flex-row {{ $tweet->reactions->count() > 0 ? 'mb-3' : 'mb-1' }}">
                           @foreach ($tweet->grouped_reactions as $reaction)
                              <div class="rounded-pill mr-2" style="background-color: #e0e0e0; padding: 1px 5px;" title="{{ $reaction->name }}">
                                 {{ $reaction->emoji }}
                                 {{ $reaction->count }}
                              </div>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </article>
            @endforeach
         </div>
      </div>
