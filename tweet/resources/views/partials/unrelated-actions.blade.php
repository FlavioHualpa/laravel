                     <form action="{{ route('follow', $person->username) }}" method="post" class="mr-2">
                        @csrf
                        
                        <button type="submit" class="btn btn-sm btn-outline-primary">
                           Seguir
                        </button>
                     </form>

                     <form action="{{ route('invite', $person->username) }}" method="post" class="mr-2">
                        @csrf
                        
                        <button type="submit" class="btn btn-sm btn-outline-success">
                           Invitar
                        </button>
                     </form>