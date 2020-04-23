                     @unless ($user->is_following($person))
                        <form action="{{ route('follow', $person->username) }}" method="post" class="mr-2">
                           @csrf

                           <button type="submit" class="btn btn-sm btn-outline-primary">
                              Seguir
                           </button>                           
                        </form>
                     @endunless