<head>
    <style>
        .editlink {
            color:white;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 1rem;
            padding-right: 1rem;
            --tw-bg-opacity: 1;
            background-color: rgb(15 48 94/ var(--tw-bg-opacity));
            border-radius: 0.25rem;
        }
        .imp {
            color:white;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 1rem;
            padding-right: 1rem;
            --tw-bg-opacity: 1;
            background-color: rgb(15 48 94/ var(--tw-bg-opacity));
            border-radius: 0.25rem;
        }
    </style>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h1 class="text-2xl font-bold">{{ __('Proyectos') }}</h1>
                        <a target="_blank" href="{{ route('proyectos.imprimir') }}" class="imp">Imprimir reporte de proyectos</a>
                        <a href="{{ route('proyectos.create') }}" class="bg-indigo-500 hover:bg-indigo-700 text-black font-bold py-2 px-4 rounded">+ Crear proyecto</a>
                    </div>
                    <div class="mt-4">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2">{{ __('Nombre') }}</th>
                                    <th class="px-4 py-2">{{ __('Fuente de Fondos') }}</th>
                                    <th class="px-4 py-2">{{ __('Acciones') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @forelse ($proyecto as $proyectos)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $proyectos->NombreProyecto }}</td>
                                        <td class="border px-4 py-2">{{ $proyectos->fuenteFondos }}</td>
                                        <td class="border px-4 py-2" style="width: 260px">
 
                                        <a href="{{ route('proyectos.edit', $proyectos) }}" class="editlink">{{ __('Editar') }}</a>
                                        
                                            <form action="{{ route('proyectos.destroy', $proyectos) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                            <br>
                                                <button style="margin-top:10px;" type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">{{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-red-400 text-black text-center">
                                        <td colspan="3" class="border px-4 py-2">{{ __('No hay proyectos para mostrar') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            @if ($proyecto->hasPages())
                                <tfoot class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <td colspan="3" class="border px-4 py-2">
                                            {{ $proyecto->links() }}
                                        </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>