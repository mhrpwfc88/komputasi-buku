<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Kategori') }}
        </h2>
    </x-slot>
    <div class="pt-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('kategori.index') }}">
                    <button class="bg-gray-900 hover:bg-white hover:text-black text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </button>
                </a>
                <div id='recipients' class="p-8 mt-6 lg:mt-0 text-white  dark:bg-gray-800 rounded shadow ">
                    <form>
                        @csrf
                        @method('PUT')
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4"
                                    for="my-textfield">
                                    Nama
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input disabled class="form-input block w-full text-black focus:bg-gray-500 rounded-md"
                                    id="nama" name="nama" type="text"
                                    value="{{ old('nama', $kategori->nama) }}">
                            </div>
                        </div>
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-white font-bold  md:text-left mb-3 md:mb-0 pr-4"
                                    for="my-textfield">
                                    keterangan
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input disabled class="form-input block w-full text-black focus:bg-gray-500 rounded-md"
                                    id="keterangan" name="keterangan" type="text"
                                    value="{{ old('keterangan', $kategori->keterangan) }}">
                            </div>
                        </div>
                        <div class="md:flex mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4"
                                    for="my-select">
                                    Status
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <select disabled id="status"
                                    class="form-select text-black block w-full rounded-md focus:bg-gray-500"
                                    name="status">
                                    <option value="aktif"
                                        {{ old('status', $kategori->status) == 'aktif' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="nonaktif"
                                        {{ old('status', $kategori->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>


</x-app-layout>
