{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.frontend')
@section('content')
<div class="body">
    <div role="main" class="main">

        <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <a href="/"><img alt="Porto" width="100" height="90" data-sticky-width="82" data-sticky-height="40" data-sticky-top="0" src="{{ url('frontend/img/demos/logopemkot.png') }}"></a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container py-4">

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-7">
                    <h2 class="font-weight-bold text-5 mb-0">Register</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label class="form-label text-color-dark text-3">Alamat Email Aktif<span class="text-color-danger">*</span></label>
                                <input id="email" type="email" class="form-control form-control-lg text-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label text-color-dark text-3">Password <span class="text-color-danger">*</span></label>
                                <input id="password" type="password" class="form-control form-control-lg text-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label text-color-dark text-3">Confirm Password <span class="text-color-danger">*</span></label>
                                <input id="password-confirm" type="password" class="form-control form-control-lg text-4" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label class="form-label text-color-dark text-3">Nama Lengkap<span class="text-color-danger">*</span></label>
                                <input id="name" type="text" class="form-control form-control-lg text-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label text-color-dark text-3">NIK<span class="text-color-danger">*</span></label>
                                <input type="number" name="nik" id="nik" value="{{ old('nik') }}" class="form-control @error('nik') is-invalid @enderror form-control-lg text-4" required autocomplete>
                                @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label text-color-dark text-3">Nomor HP<span class="text-color-danger">*</span></label>
                                <input type="number" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror form-control-lg text-4" required>

                                @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label class="form-label text-color-dark text-3">Tipe Pelanggan <span class="text-color-danger">*</span></label>
                                <div class="custom-select-1">
                                    <select id="id_tipe_pelanggan" class="form-select form-control h-auto py-2" name="id_tipe_pelanggan" required>
                                 
                                      @foreach ($tipe_pelanggan as $tp)
                                      <option value="{{ $tp->id }}">{{ $tp->tipe }}</option>
                                      @endforeach
                                    </select>

                                    @error('id_tipe_pelanggan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <label class="form-label text-color-dark text-3">Keterangan</label>
                                <input type="text" name="keterangan" value="{{ old('keterangan') }}" class="form-control form-control-lg text-4 @error('keterangan') is-invalid @enderror">

                                @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label class="form-label text-color-dark text-3">Alamat<span class="text-color-danger">*</span></label>
                                <textarea type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror form-control-lg text-4" required></textarea>

                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="form-group col">
                                <button type="submit" class="btn btn-primary btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

