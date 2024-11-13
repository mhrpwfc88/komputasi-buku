<!-- resources/views/kategori/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
</head>
<body>
    <h1>Tambah Kategori</h1>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="keterangan">Keterangan:</label>
            <textarea id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
            @error('keterangan') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
            @error('status') <span>{{ $message }}</span> @enderror
        </div>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
