
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
    <label class="fw-bold text-dark mb-2" for="email">Email</label>
    <input id="email" type="email" name="email" value="{{  old('email') }}"  class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">

    @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label class="fw-bold text-dark mb-2" for="password">Password</label>
    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password">

    @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label class="fw-bold text-dark mb-2" for="avatar">Foto Profile</label>
    <input id="avatar" type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">

    @error('avatar')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

