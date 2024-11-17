<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Buku') }}
        </h2>
    </x-slot>

    <div class="pt-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('buku.index') }}">
                    <button class="bg-gray-900 hover:bg-white hover:text-black text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </button>
                </a>
                <div id='recipients' class="p-8 mt-6 lg:mt-0 text-white dark:bg-gray-800 rounded shadow">
                    <form>
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label for="kategori_id" class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4">
                                    Kategori
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input type="text" id="kategori_id" class="form-input text-black block w-full rounded-md focus:bg-gray-500" value="{{ $buku->kategori->nama }}" disabled>
                            </div>
                        </div>
                        
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label for="judul" class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4">
                                    Judul
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input type="text" id="judul" class="form-input text-black block w-full rounded-md focus:bg-gray-500" value="{{ $buku->judul }}" disabled>
                            </div>
                        </div>
                        
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label for="deskripsi" class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4">
                                    Deskripsi
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <textarea id="deskripsi" rows="8" class="form-textarea text-black block w-full rounded-md focus:bg-gray-500" disabled>{{ $buku->deskripsi }}</textarea>
                            </div>
                        </div>
                        
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label for="penulis" class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4">
                                    Penulis
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input type="text" id="penulis" class="form-input text-black block w-full rounded-md focus:bg-gray-500" value="{{ $buku->penulis }}" disabled>
                            </div>
                        </div>
                        
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label for="cover" class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4">
                                    Cover
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                @if ($buku->cover)
                                    <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku" class="w-32">
                                @else
                                    <p class="text-gray-500">Tidak ada cover.</p>
                                @endif
                            </div>
                        </div>
                        
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label for="status" class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4">
                                    Status
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input type="text" id="status" class="form-input text-black block w-full rounded-md focus:bg-gray-500" value="{{ ucfirst($buku->status) }}" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
