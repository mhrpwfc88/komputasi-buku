<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Anda Berhasil Login!!') }}
                </div>

            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Menu
                </div>
                <a href="{{route('kategori.index')}}">
                <button class="mb-5 font-semibold ml-5 rounded-md p-3 bg-white text-gray-900 ">
                    Kategori 
                </button>
            </a>
                <a href="{{route('buku.index')}}">
                <button class="mb-5 px-4 font-semibold ml-5 rounded-md p-3 bg-white text-gray-900 ">
                    Buku 
                </button>
            </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('buku.create') }}">
                        <button class="bg-gray-900 hover:bg-white hover:text-black text-white font-bold py-2 px-4 rounded">
                            Tambah Buku
                          </button>
                    </a>
                    <div id='recipients' class="p-8 mt-6 lg:mt-0 text-white  dark:bg-gray-800 rounded shadow ">
                        @if (session('success'))
                        <p>{{ session('success') }}</p>
                        @endif
                        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th data-priority="1">Judul</th>
                                    <th data-priority="2">Deskripsi</th>
                                    <th data-priority="3">Penulis</th>
                                    <th data-priority="4">aksi</th>
                                 
                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($bukus as $buku)
                                <tr >
                                    <td>{{ $buku->nama }}</td>
                                    <td>{{ $buku->keterangan }}</td>
                                    <td>{{ $buku->status }}</td>
                                   <td>
                                        <a href="{{ route('kategori.edit', $kategori->id_kategori) }}" class="text-blue-500">
                                            <button type="submit" class="bg-gray-900 hover:bg-white hover:text-black text-white font-bold py-2 px-4 rounded">
                                                Edit
                                               </button>
                                        </a>
                                    <form id="deleteForm" action="{{ route('kategori.destroy', $kategori->id_kategori) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirmDelete();" type="submit"  class="bg-red-600 hover:bg-white hover:text-black text-white font-bold py-2 px-4 rounded">
                                           Hapus   
                                          </button>
                                    </form>
                                   </td>
                                </tr>
                                @endforeach
                
                           
                            </tbody>
            
                        </table>
            
            
                    </div>
                                       
                </div>
                
            </div>
        </div>


</x-app-layout>
