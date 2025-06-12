
<div class="form-group">
    <label class="fw-bold text-dark mb-2" for="name">Nama</label>
    <input id="name" type="text" name="name" value="{{  old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama">

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label class="fw-bold text-dark mb-2" for="image">Gambar / Ikon</label>
    <input id="image" type="file" name="image" class="form-control @error('image') is-invalid @enderror">

    @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

