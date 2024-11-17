<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Buku') }}
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
                    <form action="{{ route('buku.update', $buku->id_buku) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label for="kategori_id" class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4">
                                    Kategori
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <select name="kategori_id" id="kategori_id" class="form-select text-black block w-full rounded-md focus:bg-gray-500">
                                    <option value="" disabled>Pilih kategori</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id_kategori }}" {{ $buku->kategori_id == $kategori->id_kategori ? 'selected' : '' }}>
                                            {{ $kategori->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label for="judul" class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4">
                                    Judul
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input type="text" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" class="form-input block w-full text-black focus:bg-gray-500 rounded-md">
                                @error('judul')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label for="deskripsi" class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4">
                                    Deskripsi
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <textarea id="deskripsi" name="deskripsi" rows="8" class="form-textarea text-black block rounded-md w-full focus:bg-white">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label for="penulis" class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4">
                                    Penulis
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input type="text" id="penulis" name="penulis" value="{{ old('penulis', $buku->penulis) }}" class="form-input block w-full text-black focus:bg-gray-500 rounded-md">
                                @error('penulis')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label for="cover" class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4">
                                    Cover
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input type="file" id="cover" name="cover" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @if($buku->cover)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku" class="w-32">
                                    </div>
                                @endif
                                @error('cover')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label for="status" class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4">
                                    Status
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <select name="status" id="status" class="form-select text-black block w-full rounded-md focus:bg-gray-500">
                                    <option value="aktif" {{ old('status', $buku->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ old('status', $buku->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                                @error('status')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button type="submit" class="shadow bg-gray-200 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
