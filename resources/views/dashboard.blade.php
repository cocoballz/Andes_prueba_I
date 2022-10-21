<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ANDES
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3><b>PRUEBA TÉCNICA PHP</b></h3>
                    <hr><br>
                    <p>
                        <ul>
                            <li>
                                * Crear CRUD de un blog, permitiendo crear entradas con títulos, descripción e imagen de portada, en el listado de las entradas se debe mostrar la imagen en miniatura y titulo, debe permitir eliminar y editar la entrada, en el listado también debe permitir la búsqueda por título.
                            </li>
                            <li>
                                * Exponer un API tipo GET para listar las entradas creadas, el API a exponer debe contar con
                                autenticación oauth 2.0.
                            </li>
                            <br>
                            <li>
                                * Tecnologías para utilizar
                                <ul>
                                    <li>- Laravel</li>
                                    <li>- Mysql o PostgreSQL</li>
                                </ul>
                            </li>
                            <br>
                            <li>
                                * Terminada la prueba se debe cargar a un repositorio (público) GitHub y compartirnos el enlace.
                            </li>
                        </ul>
                    </p>
                    <br>
                    <hr>
                    <br>
                    <div class="alert alert-warning" role="alert">
                        Frente al punto de la Api. esta puede ser consumida por medio del link:
                        <a href="http://127.0.0.1:8000/api/list_api">127.0.0.1:8000/api/list_api</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
