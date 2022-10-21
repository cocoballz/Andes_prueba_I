<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }} Entrada de Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                        
                        <input type="hidden" class="form-control" name="opc" id="opc" value="{{($opc != 0 )? $opc : 0}}" >
                        @csrf()
                        <div class="form-floating mb-3">
                            <input required type="text" class="form-control" name="entr_title" id="entr_title" placeholder="Titulo de la entrada" value="{{ old('entr_title',$datos->titulo)}}">
                            <label for="entr_title">Titulo del post*</label>
                        </div>
                        <div class="form-floating">
                            <textarea  required  class="form-control" placeholder="detalle aqui su post mx:2300 caracteres" name="descripcion" id="descripcion" style="height: 100px">{{ old('descripcion',$datos->descripcion)}}</textarea>
                            <label for="descripcion">Descripcion*.</label>
                        </div>
                        <br>
                        <hr>
                        <label>Imagen*</label>
                        <div class="input-group mb-3">
                            <input  type="file" class="form-control" name="File01" id="File01">
                        </div>

                        <button class="btn" style="background-color: darkseagreen;" type="submit">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
