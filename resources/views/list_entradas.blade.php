<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de entradas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <table id="table_id" class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">titulo</th>
                          <th scope="col">descripcion</th>
                          <th scope="col">img</th>
                          <th scope="col">Creador</th>
                          <th scope="col">estado</th>
                          <th scope="col">creacion</th>
                          <th scope="col">Actualizacion</th>
                          <th scope="col">Opciones</th>
                      </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    @foreach($datos as $dato )
                    <tr>
                        <!--<td>{{$dato->id}}</td>-->
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dato->titulo}}</td>
                        <td>{{ \Illuminate\Support\Str::limit($dato->descripcion, 9, $end='...') }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$dato->entrada_img) }}" class="img-thumbnail" alt="..." style="width: 50px; height: 40px;">
                        </td>
                        <td>{{$dato->usuario->email}}</td>
                        <td>{{($dato->estado == 1) ? 'Activo': 'Inactivo'}}</td>
                        <td>{{$dato->created_at}}</td>
                        <td>


                            {{$dato->updated_at->diffForHumans()}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('editar',['entrada'=> $dato->id]) }}" class="btn btn-success">Editar</a>
                                    <a href="{{ route('eliminar',['entrada'=> $dato->id]) }}" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<script defer>
    $(document).ready(function() {
        $('#table_id').DataTable();
    })
</script>


</x-app-layout>
