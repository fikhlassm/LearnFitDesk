@extends('layouts.app')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,700;1,9..144,300&display=swap');

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
        --blue:      #2563EB;
        --blue-dark: #1D4ED8;
        --blue-soft: #EFF6FF;
        --slate-900: #0F172A;
        --slate-700: #334155;
        --slate-600: #475569;
        --slate-400: #94A3B8;
        --slate-200: #E2E8F0;
        --slate-100: #F1F5F9;
        --white:     #ffffff;
        --green:     #10B981;
        --red:       #EF4444;
        --font-sans: 'Plus Jakarta Sans', sans-serif;
        --font-display: 'Fraunces', serif;
    }

    html { scroll-behavior: smooth; }
    body { font-family: var(--font-sans); color: var(--slate-900); background: var(--white); -webkit-font-smoothing: antialiased; }

    .container { max-width: 1180px; margin: 0 auto; padding: 0 24px; }

    /* ─── BUTTONS ─── */
    .btn {
        display: inline-flex; align-items: center; gap: 8px;
        font-family: var(--font-sans); font-weight: 600; font-size: 14px;
        border-radius: 10px; cursor: pointer; text-decoration: none;
        transition: all 0.2s ease; border: none; white-space: nowrap;
    }
    .btn--primary { background: var(--blue); color: #fff; padding: 10px 20px; }
    .btn--primary:hover { background: var(--blue-dark); transform: translateY(-1px); box-shadow: 0 4px 16px rgba(37,99,235,.28); }
    .btn--ghost { background: transparent; color: var(--slate-600); padding: 10px 18px; border: 1.5px solid var(--slate-200); }
    .btn--ghost:hover { border-color: var(--blue); color: var(--blue); }
    .btn--lg { padding: 14px 28px; font-size: 15px; border-radius: 12px; }
    .btn--full { width: 100%; justify-content: center; }

    /* ─── BADGES ─── */
    .section-badge {
        display: inline-block; background: var(--blue-soft); color: var(--blue);
        font-size: 11px; font-weight: 700; letter-spacing: .1em;
        padding: 5px 12px; border-radius: 20px; text-transform: uppercase; margin-bottom: 12px;
    }

    /* ─── NAVBAR ─── */
    .navbar {
        position: sticky; top: 0; z-index: 100;
        background: rgba(255,255,255,.92);
        backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--slate-200);
    }
    .navbar__inner { display: flex; align-items: center; height: 68px; gap: 40px; }
    .navbar__brand { display: flex; align-items: center; gap: 10px; text-decoration: none; }
    .navbar__brand-name { font-family: var(--font-display); font-size: 20px; font-weight: 700; color: var(--slate-900); }
    .navbar__links { display: flex; list-style: none; gap: 4px; margin-left: auto; }
    .navbar__link { font-size: 14px; font-weight: 500; color: var(--slate-600); text-decoration: none; padding: 8px 14px; border-radius: 8px; transition: color .2s, background .2s; }
    .navbar__link:hover, .navbar__link--active { color: var(--blue); background: var(--blue-soft); }
    .navbar__actions { display: flex; gap: 8px; }
    .navbar__hamburger { display: none; flex-direction: column; gap: 5px; background: none; border: none; cursor: pointer; padding: 6px; margin-left: auto; }
    .navbar__hamburger span { display: block; width: 22px; height: 2px; background: var(--slate-900); border-radius: 2px; transition: all .25s; }
    .navbar__mobile { display: none; flex-direction: column; padding: 12px 24px 20px; gap: 4px; border-top: 1px solid var(--slate-100); }
    .navbar__mobile .navbar__link { display: block; padding: 10px 14px; }
    .navbar__mobile-actions { display: flex; gap: 8px; margin-top: 12px; }
    .navbar__mobile.is-open { display: flex; }

    /* ─── PAGE HERO ─── */
    .page-hero {
        background: linear-gradient(160deg, #f0f6ff 0%, #fff 70%);
        padding: 72px 0 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid var(--slate-200);
    }
    .page-hero__dots {
        position: absolute; top: 30px; right: 40px;
        display: grid; grid-template-columns: repeat(5,1fr); gap: 10px;
        opacity: .12; pointer-events: none;
    }
    .page-hero__dots-l {
        position: absolute; bottom: 20px; left: 30px;
        display: grid; grid-template-columns: repeat(5,1fr); gap: 10px;
        opacity: .10; pointer-events: none;
    }
    .page-hero__dots span, .page-hero__dots-l span {
        width: 5px; height: 5px; border-radius: 50%; background: var(--blue); display: block;
    }
    .page-hero__breadcrumb {
        display: flex; align-items: center; justify-content: center; gap: 8px;
        font-size: 13px; color: var(--slate-400); margin-bottom: 20px;
    }
    .page-hero__breadcrumb a { color: var(--blue); text-decoration: none; font-weight: 500; }
    .page-hero__breadcrumb a:hover { text-decoration: underline; }
    .page-hero__title {
        font-family: var(--font-display);
        font-size: clamp(36px, 5vw, 60px);
        font-weight: 700; color: var(--slate-900); line-height: 1.1; margin-bottom: 16px;
    }
    .page-hero__title em { font-style: italic; color: var(--blue); }
    .page-hero__desc { font-size: 16px; color: var(--slate-600); line-height: 1.75; max-width: 520px; margin: 0 auto; }

    /* ─── CONTACT SECTION ─── */
    .contact { padding: 80px 0 100px; }

    .contact__grid {
        display: grid;
        grid-template-columns: 1fr 1.6fr;
        gap: 56px;
        align-items: start;
    }

    /* ── Info panel (kiri) ── */
    .contact__info-title {
        font-family: var(--font-display);
        font-size: clamp(22px, 2.5vw, 30px);
        font-weight: 700;
        color: var(--slate-900);
        line-height: 1.25;
        margin: 12px 0 14px;
    }
    .contact__info-desc { font-size: 15px; color: var(--slate-600); line-height: 1.75; margin-bottom: 36px; }

    .contact__channels { display: flex; flex-direction: column; gap: 14px; margin-bottom: 40px; }
    .contact__channel {
        display: flex; gap: 14px; align-items: center;
        background: var(--slate-100);
        border: 1px solid var(--slate-200);
        border-radius: 14px;
        padding: 16px 18px;
        text-decoration: none;
        transition: box-shadow .2s, transform .2s, background .2s;
    }
    .contact__channel:hover { background: #fff; box-shadow: 0 4px 16px rgba(37,99,235,.10); transform: translateY(-2px); }
    .contact__channel-icon {
        width: 44px; height: 44px; min-width: 44px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
    }
    .contact__channel-label { font-size: 11px; font-weight: 700; color: var(--slate-400); letter-spacing: .06em; text-transform: uppercase; margin-bottom: 2px; }
    .contact__channel-value { font-size: 14px; font-weight: 600; color: var(--slate-900); }

    /* Social links */
    .contact__social-title { font-size: 13px; font-weight: 700; color: var(--slate-400); letter-spacing: .06em; text-transform: uppercase; margin-bottom: 12px; }
    .contact__socials { display: flex; gap: 10px; }
    .contact__social-btn {
        width: 40px; height: 40px;
        border-radius: 10px;
        background: var(--slate-100);
        border: 1px solid var(--slate-200);
        display: flex; align-items: center; justify-content: center;
        transition: background .2s, transform .2s, box-shadow .2s;
        text-decoration: none;
    }
    .contact__social-btn:hover { background: var(--blue); border-color: var(--blue); transform: translateY(-2px); box-shadow: 0 4px 12px rgba(37,99,235,.25); }
    .contact__social-btn:hover svg path,
    .contact__social-btn:hover svg rect,
    .contact__social-btn:hover svg circle { stroke: #fff; }
    .contact__social-btn:hover svg .fill-on-hover { fill: #fff; stroke: none; }

    /* ── Form panel (kanan) ── */
    .contact__form-card {
        background: #fff;
        border: 1px solid var(--slate-200);
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 4px 32px rgba(15,23,42,.06);
    }
    .contact__form-title { font-family: var(--font-display); font-size: 22px; font-weight: 700; color: var(--slate-900); margin-bottom: 6px; }
    .contact__form-sub { font-size: 14px; color: var(--slate-600); margin-bottom: 28px; line-height: 1.6; }

    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .form-group { display: flex; flex-direction: column; gap: 6px; margin-bottom: 18px; }
    .form-label { font-size: 13px; font-weight: 600; color: var(--slate-700); }
    .form-label span { color: var(--blue); margin-left: 2px; }

    .form-input, .form-select, .form-textarea {
        font-family: var(--font-sans);
        font-size: 14px;
        color: var(--slate-900);
        background: var(--slate-100);
        border: 1.5px solid var(--slate-200);
        border-radius: 10px;
        padding: 11px 14px;
        width: 100%;
        outline: none;
        transition: border-color .2s, background .2s, box-shadow .2s;
        appearance: none;
    }
    .form-input::placeholder, .form-textarea::placeholder { color: var(--slate-400); }
    .form-input:focus, .form-select:focus, .form-textarea:focus {
        border-color: var(--blue);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(37,99,235,.10);
    }
    .form-textarea { resize: vertical; min-height: 130px; line-height: 1.6; }

    /* Select wrapper */
    .form-select-wrap { position: relative; }
    .form-select-wrap::after {
        content: '';
        position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
        width: 0; height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid var(--slate-400);
        pointer-events: none;
    }
    .form-select { padding-right: 36px; cursor: pointer; }

    /* Submit */
    .form-submit { margin-top: 8px; }
    .btn--submit {
        background: var(--blue);
        color: #fff;
        padding: 14px 28px;
        font-size: 15px;
        border-radius: 12px;
        font-weight: 700;
        width: 100%;
        justify-content: center;
        border: none;
        cursor: pointer;
        transition: background .2s, transform .2s, box-shadow .2s;
    }
    .btn--submit:hover { background: var(--blue-dark); transform: translateY(-1px); box-shadow: 0 6px 20px rgba(37,99,235,.30); }
    .btn--submit:active { transform: translateY(0); }
    .btn--submit:disabled { opacity: .65; cursor: not-allowed; transform: none; }

    /* ─── SUCCESS STATE ─── */
    .form-success {
        display: none;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 24px 0 8px;
        gap: 16px;
    }
    .form-success__icon {
        width: 72px; height: 72px;
        border-radius: 50%;
        background: #DCFCE7;
        display: flex; align-items: center; justify-content: center;
        animation: popIn .4s cubic-bezier(.175,.885,.32,1.275) forwards;
    }
    .form-success__title { font-family: var(--font-display); font-size: 22px; font-weight: 700; color: var(--slate-900); }
    .form-success__desc { font-size: 14px; color: var(--slate-600); line-height: 1.7; max-width: 320px; }
    @keyframes popIn { from { transform: scale(0); opacity: 0; } to { transform: scale(1); opacity: 1; } }

    /* ─── FAQ ─── */
    .faq { padding: 0 0 80px; }
    .faq__header { text-align: center; margin-bottom: 48px; }
    .faq__title { font-family: var(--font-display); font-size: clamp(24px, 3vw, 36px); font-weight: 700; color: var(--slate-900); margin-bottom: 12px; }
    .faq__desc { font-size: 15px; color: var(--slate-600); }

    .faq__list { max-width: 720px; margin: 0 auto; display: flex; flex-direction: column; gap: 12px; }
    .faq__item {
        background: var(--slate-100);
        border: 1px solid var(--slate-200);
        border-radius: 14px;
        overflow: hidden;
        transition: box-shadow .2s;
    }
    .faq__item.is-open { background: #fff; box-shadow: 0 4px 20px rgba(37,99,235,.08); border-color: #BFDBFE; }

    .faq__question {
        display: flex; align-items: center; justify-content: space-between; gap: 16px;
        padding: 18px 20px;
        cursor: pointer;
        font-size: 15px; font-weight: 600; color: var(--slate-900);
        user-select: none;
        background: none; border: none; width: 100%; text-align: left;
        font-family: var(--font-sans);
    }
    .faq__question:hover { color: var(--blue); }
    .faq__icon {
        width: 28px; height: 28px; min-width: 28px;
        background: var(--slate-200);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        transition: background .2s, transform .3s;
    }
    .faq__item.is-open .faq__icon { background: var(--blue); transform: rotate(45deg); }
    .faq__item.is-open .faq__icon svg path { stroke: #fff; }

    .faq__answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height .35s ease, padding .35s ease;
        padding: 0 20px;
        font-size: 14px; color: var(--slate-600); line-height: 1.75;
    }
    .faq__item.is-open .faq__answer { max-height: 300px; padding: 0 20px 18px; }

    /* ─── MAP CARD ─── */
    .contact__map-card {
        background: linear-gradient(135deg, var(--blue-soft) 0%, #DBEAFE 100%);
        border-radius: 20px;
        padding: 28px;
        margin-top: 16px;
    }
    .contact__map-label { font-size: 11px; font-weight: 700; color: var(--blue); letter-spacing: .1em; text-transform: uppercase; margin-bottom: 8px; }
    .contact__map-title { font-size: 16px; font-weight: 700; color: var(--slate-900); margin-bottom: 4px; }
    .contact__map-addr { font-size: 13px; color: var(--slate-600); line-height: 1.6; margin-bottom: 16px; }
    .contact__map-frame {
        border-radius: 12px;
        overflow: hidden;
        height: 160px;
        background: var(--slate-200);
        display: flex; align-items: center; justify-content: center;
        color: var(--slate-400); font-size: 13px;
        position: relative;
    }
    .contact__map-frame iframe { width: 100%; height: 100%; border: none; display: block; }

    /* ─── FOOTER ─── */
    .footer { background: var(--slate-900); padding: 36px 0; }
    .footer__inner { display: flex; align-items: center; justify-content: space-between; gap: 24px; flex-wrap: wrap; }
    .footer__brand { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; }
    .footer__tagline { font-size: 13px; color: var(--slate-400); }
    .footer__copy { font-size: 13px; color: var(--slate-400); }
    .footer .navbar__brand-name { color: #fff; }

    /* ─── ANIMATE ─── */
    [data-animate] { opacity: 0; transform: translateY(20px); transition: opacity .6s ease, transform .6s ease; transition-delay: var(--delay, 0ms); }
    [data-animate="fade-left"] { transform: translateX(20px); }
    [data-animate].is-visible { opacity: 1; transform: none; }

    /* ─── RESPONSIVE ─── */
    @media (max-width: 1024px) { .contact__grid { gap: 40px; } }
    @media (max-width: 768px) {
        .contact__grid { grid-template-columns: 1fr; }
        .form-row { grid-template-columns: 1fr; }
        .contact__form-card { padding: 28px 20px; }
        .navbar__links, .navbar__actions { display: none; }
        .navbar__hamburger { display: flex; }
        .footer__inner { flex-direction: column; text-align: center; }
    }
</style>

{{-- NAVBAR --}}
<nav class="navbar">
    <div class="container navbar__inner">
        <a href="/" class="navbar__brand">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
                <rect width="28" height="28" rx="8" fill="#2563EB"/>
                <path d="M8 10h12M8 14h8M8 18h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span class="navbar__brand-name">LearnFit</span>
        </a>
        <ul class="navbar__links">
            <li><a href="/" class="navbar__link">Beranda</a></li>
            <li><a href="/#fitur" class="navbar__link">Fitur</a></li>
            <li><a href="{{ route('about') }}" class="navbar__link">Tentang Kami</a></li>
            <li><a href="{{ route('contact') }}" class="navbar__link navbar__link--active">Kontak</a></li>
        </ul>
        <div class="navbar__actions">
            <a href="/login" class="btn btn--ghost">Masuk</a>
            <a href="/register" class="btn btn--primary">Daftar</a>
        </div>
        <button class="navbar__hamburger" id="hamburger" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>
    </div>
    <div class="navbar__mobile" id="mobileMenu">
        <a href="/" class="navbar__link">Beranda</a>
        <a href="/#fitur" class="navbar__link">Fitur</a>
        <a href="{{ route('about') }}" class="navbar__link">Tentang Kami</a>
        <a href="{{ route('contact') }}" class="navbar__link navbar__link--active">Kontak</a>
        <div class="navbar__mobile-actions">
            <a href="/login" class="btn btn--ghost">Masuk</a>
            <a href="/register" class="btn btn--primary">Daftar</a>
        </div>
    </div>
</nav>

{{-- PAGE HERO --}}
<div class="page-hero">
    <div class="page-hero__dots">
        @for($r = 0; $r < 4; $r++) @for($c = 0; $c < 5; $c++)<span></span>@endfor @endfor
    </div>
    <div class="page-hero__dots-l">
        @for($r = 0; $r < 4; $r++) @for($c = 0; $c < 5; $c++)<span></span>@endfor @endfor
    </div>
    <div class="container" data-animate="fade-up">
        <div class="page-hero__breadcrumb">
            <a href="/">Beranda</a>
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                <path d="M5 3l4 4-4 4" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Kontak</span>
        </div>
        <span class="section-badge">Hubungi Kami</span>
        <h1 class="page-hero__title">Ada yang Bisa<br><em>Kami Bantu?</em></h1>
        <p class="page-hero__desc">
            Tim kami siap menjawab pertanyaanmu. Kirim pesan dan kami akan
            merespons dalam waktu 1×24 jam kerja.
        </p>
    </div>
</div>

{{-- CONTACT MAIN --}}
<section class="contact" id="kontak">
    <div class="container contact__grid">

        {{-- KIRI: Info Kontak --}}
        <div data-animate="fade-up">
            <span class="section-badge">Info Kontak</span>
            <h2 class="contact__info-title">Kami Senang<br>Mendengarmu</h2>
            <p class="contact__info-desc">
                Punya pertanyaan, masukan, atau butuh bantuan? Pilih salah satu cara
                di bawah ini untuk menghubungi kami.
            </p>

            <div class="contact__channels">
                <a href="mailto:halo@learnfit.id" class="contact__channel">
                    <div class="contact__channel-icon" style="background:#EFF6FF">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <rect x="2" y="4" width="20" height="16" rx="3" stroke="#2563EB" stroke-width="1.8"/>
                            <path d="M2 8l10 6 10-6" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div>
                        <p class="contact__channel-label">Email</p>
                        <p class="contact__channel-value">halo@learnfit.id</p>
                    </div>
                </a>

                <a href="https://wa.me/6281234567890" target="_blank" class="contact__channel">
                    <div class="contact__channel-icon" style="background:#F0FDF4">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.978-1.418A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2z" stroke="#10B981" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.5 9.5s.5-1 1.5-1 2 1 2 1.5-1 1.5-1 1.5 1.5 2.5 3 3.5c0 0 .5-1 1.5-1s1.5 1 1.5 1.5-.5 1.5-1.5 1.5S9 16.5 8.5 9.5z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div>
                        <p class="contact__channel-label">WhatsApp</p>
                        <p class="contact__channel-value">+62 812-3456-7890</p>
                    </div>
                </a>

                <a href="#" class="contact__channel">
                    <div class="contact__channel-icon" style="background:#FFF7ED">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="#F97316" stroke-width="1.8"/>
                            <path d="M12 8v4l3 3" stroke="#F97316" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div>
                        <p class="contact__channel-label">Jam Operasional</p>
                        <p class="contact__channel-value">Senin–Jumat, 09.00–17.00 WIB</p>
                    </div>
                </a>

                <a href="#" class="contact__channel">
                    <div class="contact__channel-icon" style="background:#FFF1F2">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke="#EF4444" stroke-width="1.8"/>
                            <circle cx="12" cy="9" r="2.5" stroke="#EF4444" stroke-width="1.8"/>
                        </svg>
                    </div>
                    <div>
                        <p class="contact__channel-label">Alamat</p>
                        <p class="contact__channel-value">Jl. Sudirman No. 12, Jakarta Pusat</p>
                    </div>
                </a>
            </div>

            {{-- Sosial Media --}}
            <p class="contact__social-title">Ikuti Kami</p>
            <div class="contact__socials">
                <a href="#" class="contact__social-btn" title="Instagram">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <rect x="2" y="2" width="20" height="20" rx="5" stroke="#64748B" stroke-width="1.8"/>
                        <circle cx="12" cy="12" r="4" stroke="#64748B" stroke-width="1.8"/>
                        <circle cx="17.5" cy="6.5" r="1" fill="#64748B"/>
                    </svg>
                </a>
                <a href="#" class="contact__social-btn" title="Twitter / X">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path d="M4 4l16 16M4 20L20 4" stroke="#64748B" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </a>
                <a href="#" class="contact__social-btn" title="LinkedIn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <rect x="2" y="2" width="20" height="20" rx="4" stroke="#64748B" stroke-width="1.8"/>
                        <path d="M7 10v7M7 7v.5" stroke="#64748B" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M11 17v-4c0-1.5 1-2 2-2s2 .5 2 2v4" stroke="#64748B" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M11 10v7" stroke="#64748B" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </a>
                <a href="#" class="contact__social-btn" title="YouTube">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <rect x="2" y="5" width="20" height="14" rx="4" stroke="#64748B" stroke-width="1.8"/>
                        <path d="M10 9l5 3-5 3V9z" stroke="#64748B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <a href="#" class="contact__social-btn" title="TikTok">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path d="M9 12a4 4 0 104 4V4a5 5 0 005 5" stroke="#64748B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>

            {{-- Map card --}}
            <div class="contact__map-card" style="margin-top:32px">
                <p class="contact__map-label">Lokasi Kami</p>
                <p class="contact__map-title">Kantor LearnFit</p>
                <p class="contact__map-addr">Jl. Jend. Sudirman No. 12,<br>Jakarta Pusat, DKI Jakarta 10220</p>
                <div class="contact__map-frame">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613!3d-6.208763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJl.%20Jend.%20Sudirman%2C%20Jakarta!5e0!3m2!1sid!2sid!4v1710000000000"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        {{-- KANAN: Form --}}
        <div data-animate="fade-left">
            <div class="contact__form-card">
                <h3 class="contact__form-title">Kirim Pesan</h3>
                <p class="contact__form-sub">Isi formulir di bawah dan tim kami akan menghubungimu segera.</p>

                {{-- Form --}}
                <form id="contactForm" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="nama">Nama Lengkap <span>*</span></label>
                            <input class="form-input" type="text" id="nama" name="nama" placeholder="Contoh: Budi Santoso" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email <span>*</span></label>
                            <input class="form-input" type="email" id="email" name="email" placeholder="kamu@email.com" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="telepon">Nomor WhatsApp</label>
                            <input class="form-input" type="tel" id="telepon" name="telepon" placeholder="+62 812 xxxx xxxx">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="topik">Topik <span>*</span></label>
                            <div class="form-select-wrap">
                                <select class="form-select form-input" id="topik" name="topik" required>
                                    <option value="" disabled selected>Pilih topik...</option>
                                    <option value="pertanyaan">Pertanyaan Umum</option>
                                    <option value="teknis">Bantuan Teknis</option>
                                    <option value="kerjasama">Kerja Sama / Partnership</option>
                                    <option value="media">Media & Pers</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="subjek">Subjek <span>*</span></label>
                        <input class="form-input" type="text" id="subjek" name="subjek" placeholder="Tuliskan subjek pesanmu..." required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="pesan">Pesan <span>*</span></label>
                        <textarea class="form-textarea" id="pesan" name="pesan" placeholder="Tuliskan pesanmu di sini..." required></textarea>
                    </div>

                    <div class="form-submit">
                        <button type="submit" class="btn--submit" id="submitBtn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M22 2L11 13M22 2L15 22l-4-9-9-4 20-7z" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Kirim Pesan
                        </button>
                    </div>
                </form>

                {{-- Success state --}}
                <div class="form-success" id="formSuccess">
                    <div class="form-success__icon">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path d="M8 16l5 5 11-10" stroke="#10B981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h4 class="form-success__title">Pesan Terkirim!</h4>
                    <p class="form-success__desc">Terima kasih sudah menghubungi kami. Tim LearnFit akan merespons dalam 1×24 jam kerja.</p>
                    <button onclick="resetForm()" class="btn btn--ghost btn--lg" style="margin-top:8px">Kirim Pesan Lain</button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="faq">
    <div class="container">
        <div class="faq__header" data-animate="fade-up">
            <span class="section-badge">FAQ</span>
            <h2 class="faq__title">Pertanyaan yang Sering Ditanyakan</h2>
            <p class="faq__desc">Tidak menemukan jawabanmu? Kirim pesan langsung ke kami di atas.</p>
        </div>

        <div class="faq__list" data-animate="fade-up">
            @php
                $faqs = [
                    ['q' => 'Apakah LearnFit gratis untuk digunakan?', 'a' => 'Ya! LearnFit memiliki paket gratis yang sudah cukup lengkap untuk memulai perjalanan belajarmu. Untuk fitur premium seperti analisis mendalam dan sesi bimbingan, tersedia paket berbayar yang sangat terjangkau.'],
                    ['q' => 'Bagaimana cara LearnFit menentukan gaya belajarku?', 'a' => 'LearnFit menggunakan tes singkat berbasis psikologi kognitif yang hanya membutuhkan sekitar 10–15 menit. Hasilnya akan memberikan profil belajarmu secara detail beserta rekomendasi metode yang paling efektif.'],
                    ['q' => 'Apakah LearnFit cocok untuk semua usia?', 'a' => 'LearnFit dirancang untuk pelajar SMP, SMA, mahasiswa, hingga profesional yang ingin meningkatkan kemampuan belajarnya. Konten dan rekomendasi disesuaikan dengan jenjang dan tujuan belajarmu.'],
                    ['q' => 'Berapa lama saya akan mendapat respons setelah mengirim pesan?', 'a' => 'Tim kami berkomitmen untuk merespons setiap pesan dalam waktu 1×24 jam kerja (Senin–Jumat, 09.00–17.00 WIB). Untuk pertanyaan mendesak, kamu bisa menghubungi kami melalui WhatsApp.'],
                    ['q' => 'Apakah data saya aman di LearnFit?', 'a' => 'Keamanan data pengguna adalah prioritas utama kami. Seluruh data disimpan dengan enkripsi dan tidak pernah dibagikan kepada pihak ketiga tanpa izin eksplisit dari pengguna.'],
                ];
            @endphp

            @foreach($faqs as $i => $faq)
                <div class="faq__item" id="faq-{{ $i }}">
                    <button class="faq__question" onclick="toggleFaq({{ $i }})">
                        {{ $faq['q'] }}
                        <span class="faq__icon">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                                <path d="M7 2v10M2 7h10" stroke="#64748B" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </button>
                    <div class="faq__answer">{{ $faq['a'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer class="footer">
    <div class="container footer__inner">
        <div class="footer__brand">
            <a href="/" class="navbar__brand">
                <svg width="24" height="24" viewBox="0 0 28 28" fill="none">
                    <rect width="28" height="28" rx="8" fill="#2563EB"/>
                    <path d="M8 10h12M8 14h8M8 18h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <span class="navbar__brand-name">LearnFit</span>
            </a>
            <p class="footer__tagline">Temukan gaya belajarmu yang paling efektif bersama kami.</p>
        </div>
        <p class="footer__copy">&copy; {{ date('Y') }} LearnFit. All rights reserved.</p>
    </div>
</footer>

<script>
    // ── Hamburger ──
    document.getElementById('hamburger').addEventListener('click', () => {
        document.getElementById('mobileMenu').classList.toggle('is-open');
    });

    // ── Scroll animations ──
    const observer = new IntersectionObserver(entries => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('is-visible'); });
    }, { threshold: 0.12 });
    document.querySelectorAll('[data-animate]').forEach(el => observer.observe(el));

    // ── FAQ accordion ──
    function toggleFaq(index) {
        const item = document.getElementById('faq-' + index);
        const isOpen = item.classList.contains('is-open');
        document.querySelectorAll('.faq__item').forEach(i => i.classList.remove('is-open'));
        if (!isOpen) item.classList.add('is-open');
    }

    // ── Contact form ──
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const btn = document.getElementById('submitBtn');

        // Simple validation
        const required = this.querySelectorAll('[required]');
        let valid = true;
        required.forEach(field => {
            field.style.borderColor = '';
            if (!field.value.trim()) {
                field.style.borderColor = '#EF4444';
                field.style.boxShadow = '0 0 0 3px rgba(239,68,68,.12)';
                valid = false;
            }
        });
        if (!valid) return;

        // Loading state
        btn.disabled = true;
        btn.innerHTML = `
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" style="animation:spin .7s linear infinite">
                <circle cx="12" cy="12" r="10" stroke="rgba(255,255,255,.3)" stroke-width="2"/>
                <path d="M12 2a10 10 0 0110 10" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            Mengirim...`;

        // Simulate submit (ganti dengan fetch('/contact', {...}) untuk backend nyata)
        setTimeout(() => {
            document.getElementById('contactForm').style.display = 'none';
            const success = document.getElementById('formSuccess');
            success.style.display = 'flex';
        }, 1500);
    });

    function resetForm() {
        const form = document.getElementById('contactForm');
        const success = document.getElementById('formSuccess');
        const btn = document.getElementById('submitBtn');
        form.reset();
        form.style.display = '';
        success.style.display = 'none';
        btn.disabled = false;
        btn.innerHTML = `
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                <path d="M22 2L11 13M22 2L15 22l-4-9-9-4 20-7z" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Kirim Pesan`;
    }
</script>

<style>
    @keyframes spin { to { transform: rotate(360deg); } }
</style>

@endsection