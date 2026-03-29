@extends('layouts.app')

@section('content')

<div class="auth-page">
    <div class="auth-page__blob auth-page__blob--1"></div>
    <div class="auth-page__blob auth-page__blob--2"></div>

    <div class="auth-nav container">
        <a href="/" class="navbar__brand">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
                <rect width="28" height="28" rx="8" fill="#2563EB"/>
                <path d="M8 10h12M8 14h8M8 18h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span class="navbar__brand-name">LearnFit</span>
        </a>
        <a href="/" class="auth-nav__back">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path d="M10 12L6 8l4-4" stroke="#64748b" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Kembali ke Beranda
        </a>
    </div>

    <div class="auth-card">
        <div class="auth-card__header">
            <h1 class="auth-card__title">Selamat Datang</h1>
            <p class="auth-card__sub">Masuk ke akun LearnFit kamu.</p>
        </div>

        @if(session('success'))
        <div class="alert alert--success">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <circle cx="9" cy="9" r="8" stroke="#16a34a" stroke-width="1.5"/>
                <path d="M5.5 9l2.5 2.5 4.5-4.5" stroke="#16a34a" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert--error">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <circle cx="9" cy="9" r="8" stroke="#ef4444" stroke-width="1.5"/>
                <path d="M9 5v4M9 12v.5" stroke="#ef4444" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="auth-form">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" class="form-input {{ $errors->has('email') ? 'form-input--error':'' }}" placeholder="nama@email.com" value="{{ old('email') }}" required autocomplete="email">
                    <svg class="input-icon" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <rect x="1.5" y="3.5" width="15" height="11" rx="2" stroke="#94a3b8" stroke-width="1.5"/>
                        <path d="M1.5 6.5l7.5 5 7.5-5" stroke="#94a3b8" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>

            <div class="form-group">
                <div style="display:flex;align-items:center;justify-content:space-between;">
                    <label class="form-label" for="password">Kata Sandi</label>
                    <a href="#" class="form-link" style="font-size:.78rem">Lupa kata sandi?</a>
                </div>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" class="form-input {{ $errors->has('password') ? 'form-input--error':'' }}" placeholder="Masukkan kata sandi" required autocomplete="current-password">
                    <button type="button" class="input-icon input-icon--btn" id="togglePassword" aria-label="Lihat password">
                        <svg id="eyeShow" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M1 9s3-6 8-6 8 6 8 6-3 6-8 6-8-6-8-6z" stroke="#94a3b8" stroke-width="1.5"/>
                            <circle cx="9" cy="9" r="2.5" stroke="#94a3b8" stroke-width="1.5"/>
                        </svg>
                        <svg id="eyeHide" width="18" height="18" viewBox="0 0 18 18" fill="none" style="display:none">
                            <path d="M1 9s3-6 8-6 8 6 8 6-3 6-8 6-8-6-8-6z" stroke="#94a3b8" stroke-width="1.5"/>
                            <line x1="2" y1="2" x2="16" y2="16" stroke="#94a3b8" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            <label class="checkbox-label">
                <input type="checkbox" name="remember" id="remember" class="checkbox-input">
                <span class="checkbox-box"></span>
                <span class="checkbox-text">Ingat saya di perangkat ini</span>
            </label>

            <button type="submit" class="btn-submit">
                Masuk
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path d="M4 9h10M10 5l4 4-4 4" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </form>

        <p class="auth-card__footer">Belum punya akun? <a href="{{ route('register') }}" class="form-link form-link--bold">Daftar Sekarang</a></p>
    </div>
</div>

<script>
const toggleBtn = document.getElementById('togglePassword');
const pwInput   = document.getElementById('password');
const eyeShow   = document.getElementById('eyeShow');
const eyeHide   = document.getElementById('eyeHide');
if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
        const isHidden = pwInput.type === 'password';
        pwInput.type   = isHidden ? 'text' : 'password';
        eyeShow.style.display = isHidden ? 'none'  : 'block';
        eyeHide.style.display = isHidden ? 'block' : 'none';
    });
}
</script>

@endsection