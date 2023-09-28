@if (auth()->check())
                        {!! Form::open(['route' => ['like.store', 'id_demanda' => $dem->id_demanda], 'method' => 'post']) !!}
                        {{ csrf_field() }}
                        {!! Form::button('Like', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                        {{$like->count()}}
                        @else
                        <p>Like on</p>
                        @endif