                     <form action="{{ route('unfollow', $person->username) }}" method="post" class="mr-2">
                        @csrf

                        <button type="submit" class="btn btn-sm btn-outline-primary">
                           Dejar de seguir
                        </button>
                     </form>

                     @unless ($user->is_followed_by($person))
                        <form action="{{ route('invite', $person->username) }}" method="post" class="mr-2">
                           @csrf
                           
                           <button type="submit" class="btn btn-sm btn-outline-success">
                              Invitar
                           </button>
                        </form>
                     @endunless