@extends('layouts.app')

@section('content')

<style>
    /* ===== GOOGLE FONTS ===== */
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,700;1,9..144,300&display=swap');

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
        --blue:      #2563EB;
        --blue-dark: #1D4ED8;
        --blue-soft: #EFF6FF;
        --slate-900: #0F172A;
        --slate-600: #475569;
        --slate-400: #94A3B8;
        --slate-200: #E2E8F0;
        --slate-100: #F1F5F9;
        --white:     #ffffff;
        --font-sans: 'Plus Jakarta Sans', sans-serif;
        --font-display: 'Fraunces', serif;
    }

    html { scroll-behavior: smooth; }

    body {
        font-family: var(--font-sans);
        color: var(--slate-900);
        background: var(--white);
        -webkit-font-smoothing: antialiased;
    }

    .container {
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* ─── BUTTONS ─── */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-family: var(--font-sans);
        font-weight: 600;
        font-size: 14px;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
        border: none;
        white-space: nowrap;
    }
    .btn--primary {
        background: var(--blue);
        color: #fff;
        padding: 10px 20px;
    }
    .btn--primary:hover { background: var(--blue-dark); transform: translateY(-1px); box-shadow: 0 4px 16px rgba(37,99,235,.28); }
    .btn--ghost {
        background: transparent;
        color: var(--slate-600);
        padding: 10px 18px;
        border: 1.5px solid var(--slate-200);
    }
    .btn--ghost:hover { border-color: var(--blue); color: var(--blue); }
    .btn--lg { padding: 14px 28px; font-size: 15px; border-radius: 12px; }
    .btn--white { background: #fff; color: var(--blue); padding: 14px 28px; font-size: 15px; border-radius: 12px; font-weight: 700; }
    .btn--white:hover { background: var(--blue-soft); transform: translateY(-1px); }

    /* ─── SECTION COMMON ─── */
    .section-badge {
        display: inline-block;
        background: var(--blue-soft);
        color: var(--blue);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .1em;
        padding: 5px 12px;
        border-radius: 20px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }
    .section-header { text-align: center; margin-bottom: 56px; }
    .section-title {
        font-family: var(--font-display);
        font-size: clamp(28px, 3.5vw, 42px);
        font-weight: 700;
        color: var(--slate-900);
        line-height: 1.2;
        margin-bottom: 14px;
    }
    .section-desc { font-size: 16px; color: var(--slate-600); line-height: 1.7; max-width: 560px; margin: 0 auto; }

    /* ─── NAVBAR ─── */
    .navbar {
        position: sticky;
        top: 0;
        z-index: 100;
        background: rgba(255,255,255,.92);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--slate-200);
    }
    .navbar__inner {
        display: flex;
        align-items: center;
        height: 68px;
        gap: 40px;
    }
    .navbar__brand {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }
    .navbar__brand-name {
        font-family: var(--font-display);
        font-size: 20px;
        font-weight: 700;
        color: var(--slate-900);
    }
    .navbar__links {
        display: flex;
        list-style: none;
        gap: 4px;
        margin-left: auto;
    }
    .navbar__link {
        font-size: 14px;
        font-weight: 500;
        color: var(--slate-600);
        text-decoration: none;
        padding: 8px 14px;
        border-radius: 8px;
        transition: color .2s, background .2s;
    }
    .navbar__link:hover, .navbar__link--active { color: var(--blue); background: var(--blue-soft); }
    .navbar__actions { display: flex; gap: 8px; }
    .navbar__hamburger {
        display: none;
        flex-direction: column;
        gap: 5px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 6px;
        margin-left: auto;
    }
    .navbar__hamburger span {
        display: block;
        width: 22px;
        height: 2px;
        background: var(--slate-900);
        border-radius: 2px;
        transition: all .25s;
    }
    .navbar__mobile {
        display: none;
        flex-direction: column;
        padding: 12px 24px 20px;
        gap: 4px;
        border-top: 1px solid var(--slate-100);
    }
    .navbar__mobile .navbar__link { display: block; padding: 10px 14px; }
    .navbar__mobile-actions { display: flex; gap: 8px; margin-top: 12px; }
    .navbar__mobile.is-open { display: flex; }

    /* ─── HERO ─── */
    .hero {
        position: relative;
        padding: 100px 0 80px;
        overflow: hidden;
        background: linear-gradient(160deg, #f8faff 0%, #fff 60%);
    }
    .hero__dots-deco {
        position: absolute;
        bottom: 60px; left: -10px;
        display: grid;
        grid-template-columns: repeat(5,1fr);
        gap: 10px;
        opacity: .18;
        pointer-events: none;
    }
    .hero__dots-deco-r {
        position: absolute;
        top: 40px; right: 20px;
        display: grid;
        grid-template-columns: repeat(5,1fr);
        gap: 10px;
        opacity: .13;
        pointer-events: none;
    }
    .hero__dots-deco span,
    .hero__dots-deco-r span {
        width: 5px; height: 5px;
        border-radius: 50%;
        background: var(--blue);
        display: block;
    }
    .hero__inner {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 64px;
        align-items: center;
    }
    .hero__badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--blue-soft);
        color: var(--blue);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .1em;
        padding: 6px 14px;
        border-radius: 20px;
        margin-bottom: 20px;
    }
    .hero__title {
        font-family: var(--font-display);
        font-size: clamp(38px, 5vw, 62px);
        font-weight: 700;
        line-height: 1.1;
        color: var(--slate-900);
        margin-bottom: 20px;
    }
    .hero__title em { font-style: italic; color: var(--blue); }
    .hero__desc {
        font-size: 16px;
        color: var(--slate-600);
        line-height: 1.75;
        margin-bottom: 36px;
        max-width: 440px;
    }
    .hero__cta { margin-bottom: 32px; }
    .hero__dots { display: flex; gap: 8px; }
    .dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        background: var(--slate-200);
        transition: all .3s;
    }
    .dot--active { background: var(--blue); width: 24px; border-radius: 4px; }

    /* Hero visual */
    .hero__visual { display: flex; justify-content: center; }
    .hero__img-wrapper {
        position: relative;
        width: 100%;
        max-width: 480px;
    }
    .hero__img {
        width: 100%;
        border-radius: 24px;
        display: block;
        box-shadow: 0 24px 60px rgba(37,99,235,.12);
    }
    .hero__img-fallback {
        background: linear-gradient(135deg, var(--blue-soft), #DBEAFE);
        border-radius: 24px;
        padding: 48px 32px;
        text-align: center;
        color: var(--slate-600);
        font-size: 13px;
        line-height: 1.7;
        box-shadow: 0 24px 60px rgba(37,99,235,.1);
    }
    .hero__img-fallback svg { display: block; margin: 0 auto 16px; }
    .hero__badge-card {
        position: absolute;
        bottom: 16px;
        right: 16px;
        background: #fff;
        border-radius: 14px;
        padding: 14px 18px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 8px 32px rgba(37,99,235,.14);
        animation: float 3s ease-in-out infinite;
        width: fit-content;
    }
    .badge-card__title { font-size: 12px; font-weight: 700; color: var(--slate-900); margin-bottom: 2px; }
    .badge-card__sub { font-size: 11px; color: var(--slate-400); }
    @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-6px); } }

    /* ─── FEATURES ─── */
    .features {
        padding: 40px 0 72px;
        background: var(--white);
    }
    .features__grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .feature-card {
        background: var(--slate-100);
        border: 1px solid var(--slate-200);
        border-radius: 20px;
        padding: 28px 24px;
        transition: box-shadow .25s, transform .25s;
    }
    .feature-card:hover {
        box-shadow: 0 8px 28px rgba(37,99,235,.10);
        transform: translateY(-4px);
        background: #fff;
    }
    .feature-card__icon {
        width: 48px; height: 48px;
        background: var(--blue-soft);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
    }
    .feature-card__title {
        font-size: 16px;
        font-weight: 700;
        color: var(--slate-900);
        margin-bottom: 8px;
    }
    .feature-card__desc { font-size: 14px; color: var(--slate-600); line-height: 1.6; }

    /* ─── TESTIMONIALS ─── */
    .testimonials { padding: 80px 0; background: var(--slate-100); }
    .testimonials__grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 48px;
    }
    .testi-card {
        background: #fff;
        border: 1px solid var(--slate-200);
        border-radius: 20px;
        padding: 28px 24px;
        display: flex;
        flex-direction: column;
        gap: 16px;
        transition: box-shadow .25s, transform .25s;
    }
    .testi-card:hover { box-shadow: 0 8px 28px rgba(37,99,235,.10); transform: translateY(-4px); }
    .testi-card--featured {
        background: var(--blue);
        border-color: var(--blue);
    }
    .testi-card--featured .testi-card__text { color: rgba(255,255,255,.9); }
    .testi-card--featured .testi-card__name { color: #fff; }
    .testi-card--featured .testi-card__role { color: rgba(255,255,255,.65); }
    .testi-card__stars { display: flex; gap: 3px; }
    .testi-card__text { font-size: 14px; color: var(--slate-600); line-height: 1.7; flex: 1; }
    .testi-card__author { display: flex; align-items: center; gap: 12px; }
    .testi-card__avatar {
        width: 40px; height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
    }
    .testi-card__name { font-size: 14px; font-weight: 600; color: var(--slate-900); margin-bottom: 2px; }
    .testi-card__role { font-size: 12px; color: var(--slate-400); }

    /* Stats bar */
    .testi-stats {
        background: #fff;
        border-radius: 20px;
        padding: 28px 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0;
        border: 1px solid var(--slate-200);
        flex-wrap: wrap;
    }
    .testi-stat { text-align: center; padding: 0 40px; }
    .testi-stat__num { display: block; font-family: var(--font-display); font-size: 28px; font-weight: 700; color: var(--blue); }
    .testi-stat__label { display: block; font-size: 12px; color: var(--slate-400); margin-top: 4px; font-weight: 500; }
    .testi-stat__divider { width: 1px; height: 40px; background: var(--slate-200); }

    /* ─── CTA BOTTOM ─── */
    .cta-bottom {
        background: linear-gradient(135deg, var(--blue) 0%, #1E40AF 100%);
        padding: 72px 0;
    }
    .cta-bottom__inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
        flex-wrap: wrap;
    }
    .cta-bottom__title {
        font-family: var(--font-display);
        font-size: clamp(22px, 3vw, 32px);
        font-weight: 700;
        color: #fff;
        margin-bottom: 10px;
    }
    .cta-bottom__desc { font-size: 15px; color: rgba(255,255,255,.75); line-height: 1.6; }

        /* ─── FOOTER ─── */
        .footer { background: var(--slate-900); padding: 36px 0; }
    .footer__inner { display: flex; align-items: center; justify-content: space-between; gap: 24px; max-width: 1180px; margin: 0 auto; padding: 0 24px; }
    .footer__brand { display: flex; align-items: center; gap: 10px; text-decoration: none; flex-shrink: 0; line-height: 1; }
    .footer__brand svg { display: block; flex-shrink: 0; }
    .footer__brand-name { font-family: var(--font-display); font-size: 20px; font-weight: 700; color: #fff; line-height: 1; }
    .footer__tagline { font-size: 13px; color: var(--slate-400); flex: 1; }
    .footer__nav { display: flex; align-items: center; gap: 1.5rem; flex-shrink: 0; }
    .footer__nav-link { font-size: 13px; color: var(--slate-400); text-decoration: none; transition: color .2s; white-space: nowrap; }
    .footer__nav-link:hover { color: #fff; }
    .footer__copy { font-size: 13px; color: var(--slate-400); white-space: nowrap; flex-shrink: 0; }

    /* ─── ANIMATE ─── */
    [data-animate] { opacity: 0; transform: translateY(20px); transition: opacity .6s ease, transform .6s ease; transition-delay: var(--delay, 0ms); }
    [data-animate="fade-left"] { transform: translateX(20px); }
    [data-animate].is-visible { opacity: 1; transform: none; }

    /* ─── RESPONSIVE ─── */
    @media (max-width: 1024px) {
        .hero__inner { gap: 40px; }
    }
    @media (max-width: 768px) {
        .hero { padding: 72px 0 60px; }
        .hero__inner { grid-template-columns: 1fr; gap: 48px; }
        .hero__badge-card { bottom: 12px; right: 12px; }
        .features__grid { grid-template-columns: 1fr; }
        .testimonials__grid { grid-template-columns: 1fr; }
        .testi-stats { gap: 16px 0; }
        .testi-stat { padding: 0 24px; }
        .testi-stat__divider { display: none; }
        .navbar__links, .navbar__actions { display: none; }
        .navbar__hamburger { display: flex; }
        .cta-bottom__inner { flex-direction: column; text-align: center; }
    }
    @media (max-width: 480px) {
        .footer__inner { flex-direction: column; text-align: center; align-items: center; }
        .footer__nav { justify-content: center; flex-wrap: wrap; }
        .footer__tagline { white-space: normal; text-align: center; }
        .hero__title { font-size: 36px; }
    }
</style>

{{-- NAVBAR --}}
<nav class="navbar">
    <div class="container navbar__inner">
        <a href="/" class="navbar__brand">
            <svg class="navbar__logo-icon" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="28" height="28" rx="8" fill="#2563EB"/>
                <path d="M8 10h12M8 14h8M8 18h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span class="navbar__brand-name">LearnFit</span>
        </a>

        <ul class="navbar__links">
            <li><a href="#" class="navbar__link navbar__link--active">Beranda</a></li>
            <li><a href="#fitur" class="navbar__link">Fitur</a></li>
            <li><a href="{{ route('about') }}" class="navbar__link">Tentang Kami</a></li>
            <li><a href="{{ route('contact') }}" class="navbar__link">Kontak</a></li>
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
        <a href="#" class="navbar__link">Beranda</a>
        <a href="#fitur" class="navbar__link">Fitur</a>
        <a href="{{ route('about') }}" class="navbar__link">Tentang Kami</a>
        <a href="#kontak" class="navbar__link">Kontak</a>
        <div class="navbar__mobile-actions">
            <a href="/login" class="btn btn--ghost">Masuk</a>
            <a href="/register" class="btn btn--primary">Daftar</a>
        </div>
    </div>
</nav>

{{-- HERO --}}
<section class="hero">
    <div class="hero__dots-deco">
        @for($r = 0; $r < 4; $r++)
            @for($c = 0; $c < 5; $c++)
                <span></span>
            @endfor
        @endfor
    </div>
    <div class="hero__dots-deco-r">
        @for($r = 0; $r < 4; $r++)
            @for($c = 0; $c < 5; $c++)
                <span></span>
            @endfor
        @endfor
    </div>

    <div class="container hero__inner">
        <div class="hero__content" data-animate="fade-up">
            <span class="hero__badge">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <line x1="0" y1="7" x2="4" y2="7" stroke="#2563EB" stroke-width="1.5"/>
                    <circle cx="7" cy="7" r="3" fill="#2563EB"/>
                </svg>
                PERSONALIZED EDUCATION
            </span>
            <h1 class="hero__title">Temukan <em>Gaya</em><br>Belajarmu</h1>
            <p class="hero__desc">
                LearnFit membantu kamu menemukan metode belajar
                yang paling efektif dan personal sesuai kepribadianmu.
            </p>
            <a href="/register" class="btn btn--primary btn--lg hero__cta">
                Mulai Sekarang
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path d="M4 9h10M10 5l4 4-4 4" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <div class="hero__dots">
                <span class="dot dot--active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>

        <div class="hero__visual" data-animate="fade-left">
            <div class="hero__img-wrapper">
                @if(file_exists(public_path('images/hero-student.png')))
                    <img src="{{ asset('images/hero-student.png') }}" alt="Student studying" class="hero__img">
                @elseif(file_exists(public_path('images/hero-student.jpg')))
                    <img src="{{ asset('images/hero-student.jpg') }}" alt="Student studying" class="hero__img">
                @else
                    <div class="hero__img-fallback">
                        <svg width="200" height="200" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="100" cy="155" rx="50" ry="30" fill="#e8d5b8"/>
                            <rect x="91" y="105" width="18" height="22" rx="6" fill="#f9c784"/>
                            <ellipse cx="100" cy="88" rx="32" ry="36" fill="#f9c784"/>
                            <path d="M68 78 Q72 44 100 40 Q128 44 132 78 Q128 60 100 58 Q72 60 68 78Z" fill="#2d1b0e"/>
                            <path d="M68 78 Q62 95 66 112 Q72 90 68 78Z" fill="#2d1b0e"/>
                            <path d="M132 78 Q138 95 134 112 Q128 90 132 78Z" fill="#2d1b0e"/>
                            <ellipse cx="88" cy="88" rx="4" ry="5" fill="#2d1b0e"/>
                            <ellipse cx="112" cy="88" rx="4" ry="5" fill="#2d1b0e"/>
                            <ellipse cx="89" cy="87" rx="1.5" ry="1.5" fill="white"/>
                            <ellipse cx="113" cy="87" rx="1.5" ry="1.5" fill="white"/>
                            <path d="M91 100 Q100 108 109 100" stroke="#c0855a" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                            <path d="M55 155 Q60 125 100 120 Q140 125 145 155Z" fill="#fff" stroke="#e2e8f0" stroke-width="1"/>
                            <rect x="40" y="168" width="120" height="10" rx="4" fill="#d4b896"/>
                            <rect x="55" y="158" width="90" height="12" rx="3" fill="#e9ecef" stroke="#dee2e6" stroke-width="1"/>
                        </svg>
                        <p>Letakkan foto hero di<br><strong>public/images/hero-student.png</strong></p>
                    </div>
                @endif

                <div class="hero__badge-card">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
                        <circle cx="11" cy="11" r="11" fill="#2563EB"/>
                        <path d="M7 11.5l3 3 5-5" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div>
                        <p class="badge-card__title">Metode Ditemukan</p>
                        <p class="badge-card__sub">Visual Learner Profile</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FEATURES --}}
<section class="features" id="fitur">
    <div class="container">
        <div class="section-header" data-animate="fade-up">
            <span class="section-badge">Fitur Unggulan</span>
            <h2 class="section-title">Semua yang Kamu Butuhkan</h2>
            <p class="section-desc">Dirancang untuk memaksimalkan potensi belajarmu dengan teknologi yang cerdas.</p>
        </div>
        <div class="features__grid">
            <div class="feature-card" data-animate="fade-up" style="--delay:0ms">
                <div class="feature-card__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="10" stroke="#2563EB" stroke-width="1.8"/>
                        <path d="M8 12a4 4 0 018 0" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round"/>
                        <circle cx="12" cy="10" r="2" fill="#2563EB"/>
                    </svg>
                </div>
                <h3 class="feature-card__title">Metode Belajar Personal</h3>
                <p class="feature-card__desc">Analisis cara efektifmu belajar berdasarkan kepribadian dan preferensi unikmu.</p>
            </div>

            <div class="feature-card" data-animate="fade-up" style="--delay:100ms">
                <div class="feature-card__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="feature-card__title">Belajar 2× Lebih Cepat</h3>
                <p class="feature-card__desc">Tingkatkan efisiensi belajarmu dengan teknik dan strategi yang tepat sasaran.</p>
            </div>

            <div class="feature-card" data-animate="fade-up" style="--delay:200ms">
                <div class="feature-card__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <polyline points="4 17 9 12 13 16 22 7" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="4" y1="21" x2="20" y2="21" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="feature-card__title">Analisis Progres Nyata</h3>
                <p class="feature-card__desc">Pantau perkembangan belajarmu secara real-time dengan dashboard yang intuitif.</p>
            </div>
        </div>
    </div>
</section>

{{-- TESTIMONIALS --}}
<section class="testimonials" id="testimoni">
    <div class="container">
        <div class="section-header" data-animate="fade-up">
            <span class="section-badge">Testimoni</span>
            <h2 class="section-title">Apa Kata Mereka?</h2>
            <p class="section-desc">Ribuan pelajar sudah menemukan metode belajar terbaik mereka bersama LearnFit.</p>
        </div>

        <div class="testimonials__grid">
            <div class="testi-card" data-animate="fade-up" style="--delay:0ms">
                <div class="testi-card__stars">
                    @for($i = 0; $i < 5; $i++)
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="#FBBF24"><path d="M8 1l1.9 3.9L14 5.6l-3 2.9.7 4.1L8 10.5l-3.7 2.1.7-4.1-3-2.9 4.1-.7z"/></svg>
                    @endfor
                </div>
                <p class="testi-card__text">"LearnFit benar-benar mengubah cara aku belajar. Sekarang aku lebih fokus dan nilai-nilaiku meningkat drastis dalam 2 bulan!"</p>
                <div class="testi-card__author">
                    <div class="testi-card__avatar" style="background: linear-gradient(135deg,#667eea,#764ba2)">A</div>
                    <div>
                        <p class="testi-card__name">Aditya Ramadhan</p>
                        <p class="testi-card__role">Mahasiswa Teknik, UI</p>
                    </div>
                </div>
            </div>

            <div class="testi-card testi-card--featured" data-animate="fade-up" style="--delay:100ms">
                <div class="testi-card__stars">
                    @for($i = 0; $i < 5; $i++)
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="#FBBF24"><path d="M8 1l1.9 3.9L14 5.6l-3 2.9.7 4.1L8 10.5l-3.7 2.1.7-4.1-3-2.9 4.1-.7z"/></svg>
                    @endfor
                </div>
                <p class="testi-card__text">"Aku sudah coba banyak platform belajar, tapi LearnFit yang paling personal. Terasa seperti punya tutor pribadi yang tahu persis bagaimana aku belajar."</p>
                <div class="testi-card__author">
                    <div class="testi-card__avatar" style="background: linear-gradient(135deg,#f093fb,#f5576c)">S</div>
                    <div>
                        <p class="testi-card__name">Sari Indah Permata</p>
                        <p class="testi-card__role">Siswa SMA, Surabaya</p>
                    </div>
                </div>
            </div>

            <div class="testi-card" data-animate="fade-up" style="--delay:200ms">
                <div class="testi-card__stars">
                    @for($i = 0; $i < 5; $i++)
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="#FBBF24"><path d="M8 1l1.9 3.9L14 5.6l-3 2.9.7 4.1L8 10.5l-3.7 2.1.7-4.1-3-2.9 4.1-.7z"/></svg>
                    @endfor
                </div>
                <p class="testi-card__text">"Platform terbaik untuk persiapan ujian. Analisis gaya belajarnya akurat banget, dan materi yang disarankan tepat sasaran!"</p>
                <div class="testi-card__author">
                    <div class="testi-card__avatar" style="background: linear-gradient(135deg,#4facfe,#00f2fe)">R</div>
                    <div>
                        <p class="testi-card__name">Rizky Pratama</p>
                        <p class="testi-card__role">Fresh Graduate, Bandung</p>
                    </div>
                </div>
            </div>

            <div class="testi-card" data-animate="fade-up" style="--delay:300ms">
                <div class="testi-card__stars">
                    @for($i = 0; $i < 4; $i++)
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="#FBBF24"><path d="M8 1l1.9 3.9L14 5.6l-3 2.9.7 4.1L8 10.5l-3.7 2.1.7-4.1-3-2.9 4.1-.7z"/></svg>
                    @endfor
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="#E2E8F0"><path d="M8 1l1.9 3.9L14 5.6l-3 2.9.7 4.1L8 10.5l-3.7 2.1.7-4.1-3-2.9 4.1-.7z"/></svg>
                </div>
                <p class="testi-card__text">"Desainnya bersih dan mudah dipakai. Fitur analisis progresnya membantu aku tahu bagian mana yang perlu lebih banyak perhatian."</p>
                <div class="testi-card__author">
                    <div class="testi-card__avatar" style="background: linear-gradient(135deg,#43e97b,#38f9d7)">N</div>
                    <div>
                        <p class="testi-card__name">Nadia Kusuma</p>
                        <p class="testi-card__role">Mahasiswa Kedokteran, UGM</p>
                    </div>
                </div>
            </div>

            <div class="testi-card" data-animate="fade-up" style="--delay:400ms">
                <div class="testi-card__stars">
                    @for($i = 0; $i < 5; $i++)
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="#FBBF24"><path d="M8 1l1.9 3.9L14 5.6l-3 2.9.7 4.1L8 10.5l-3.7 2.1.7-4.1-3-2.9 4.1-.7z"/></svg>
                    @endfor
                </div>
                <p class="testi-card__text">"Dalam 3 minggu pakai LearnFit, IPK saya naik dari 2.8 ke 3.5. Metode belajar visual yang disarankan sangat cocok sama saya!"</p>
                <div class="testi-card__author">
                    <div class="testi-card__avatar" style="background: linear-gradient(135deg,#fa709a,#fee140)">B</div>
                    <div>
                        <p class="testi-card__name">Bima Arjuna</p>
                        <p class="testi-card__role">Mahasiswa Ekonomi, Unpad</p>
                    </div>
                </div>
            </div>

            <div class="testi-card" data-animate="fade-up" style="--delay:500ms">
                <div class="testi-card__stars">
                    @for($i = 0; $i < 5; $i++)
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="#FBBF24"><path d="M8 1l1.9 3.9L14 5.6l-3 2.9.7 4.1L8 10.5l-3.7 2.1.7-4.1-3-2.9 4.1-.7z"/></svg>
                    @endfor
                </div>
                <p class="testi-card__text">"Rekomendasi ke semua teman-teman! Belajar jadi menyenangkan dan tidak terasa membebani. LearnFit benar-benar game changer."</p>
                <div class="testi-card__author">
                    <div class="testi-card__avatar" style="background: linear-gradient(135deg,#a18cd1,#fbc2eb)">D</div>
                    <div>
                        <p class="testi-card__name">Dewi Rahayu</p>
                        <p class="testi-card__role">Guru SD, Yogyakarta</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="testi-stats" data-animate="fade-up">
            <div class="testi-stat">
                <span class="testi-stat__num">12.000+</span>
                <span class="testi-stat__label">Pelajar Aktif</span>
            </div>
            <div class="testi-stat__divider"></div>
            <div class="testi-stat">
                <span class="testi-stat__num">4.9/5</span>
                <span class="testi-stat__label">Rating Rata-rata</span>
            </div>
            <div class="testi-stat__divider"></div>
            <div class="testi-stat">
                <span class="testi-stat__num">98%</span>
                <span class="testi-stat__label">Puas dengan Metode</span>
            </div>
            <div class="testi-stat__divider"></div>
            <div class="testi-stat">
                <span class="testi-stat__num">50+</span>
                <span class="testi-stat__label">Kota di Indonesia</span>
            </div>
        </div>
    </div>
</section>

{{-- CTA BOTTOM --}}
<section class="cta-bottom" id="kontak">
    <div class="container cta-bottom__inner" data-animate="fade-up">
        <div>
            <h2 class="cta-bottom__title">Siap Menemukan Cara Belajarmu?</h2>
            <p class="cta-bottom__desc">Bergabunglah dengan ribuan pelajar yang sudah merasakan manfaatnya. Gratis untuk memulai.</p>
        </div>
        <a href="/register" class="btn btn--white btn--lg">
            Mulai Gratis Sekarang
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M4 9h10M10 5l4 4-4 4" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
</section>

{{-- FOOTER --}}
<footer class="footer">
    <div class="footer__inner">
        <div class="footer__brand">
    <a href="/" style="display:flex; align-items:center; gap:10px; text-decoration:none;">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" style="display:block;">
            <rect width="28" height="28" rx="8" fill="#2563EB"/>
            <path d="M8 10h12M8 14h8M8 18h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
        </svg>
        <span class="footer__brand-name">LearnFit</span>
    </a>
    </div>
        <p class="footer__tagline">Temukan gaya belajarmu yang paling efektif bersama kami.</p>
        <nav class="footer__nav">
            <a href="/" class="footer__nav-link">Beranda</a>
            <a href="{{ route('about') }}" class="footer__nav-link">Tentang Kami</a>
            <a href="{{ route('contact') }}" class="footer__nav-link">Kontak</a>
        </nav>
        <p class="footer__copy">&copy; {{ date('Y') }} LearnFit. Hak Cipta Dilindungi.</p>
    </div>
</footer>

<script>
    // Hamburger toggle
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');
    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('is-open');
    });

    // Scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('[data-animate]').forEach(el => observer.observe(el));
</script>

@endsection