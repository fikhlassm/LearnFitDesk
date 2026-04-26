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
    .btn--primary { background: var(--blue); color: #fff; padding: 10px 20px; }
    .btn--primary:hover { background: var(--blue-dark); transform: translateY(-1px); box-shadow: 0 4px 16px rgba(37,99,235,.28); }
    .btn--ghost { background: transparent; color: var(--slate-600); padding: 10px 18px; border: 1.5px solid var(--slate-200); }
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

    /* ─── PAGE HERO (About header) ─── */
    .page-hero {
        background: linear-gradient(160deg, #f0f6ff 0%, #fff 70%);
        padding: 72px 0 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid var(--slate-200);
    }
    .page-hero__dots {
        position: absolute;
        top: 30px; right: 40px;
        display: grid;
        grid-template-columns: repeat(5,1fr);
        gap: 10px;
        opacity: .12;
        pointer-events: none;
    }
    .page-hero__dots-l {
        position: absolute;
        bottom: 20px; left: 30px;
        display: grid;
        grid-template-columns: repeat(5,1fr);
        gap: 10px;
        opacity: .10;
        pointer-events: none;
    }
    .page-hero__dots span,
    .page-hero__dots-l span {
        width: 5px; height: 5px;
        border-radius: 50%;
        background: var(--blue);
        display: block;
    }
    .page-hero__breadcrumb {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 13px;
        color: var(--slate-400);
        margin-bottom: 20px;
    }
    .page-hero__breadcrumb a { color: var(--blue); text-decoration: none; font-weight: 500; }
    .page-hero__breadcrumb a:hover { text-decoration: underline; }
    .page-hero__title {
        font-family: var(--font-display);
        font-size: clamp(36px, 5vw, 60px);
        font-weight: 700;
        color: var(--slate-900);
        line-height: 1.1;
        margin-bottom: 16px;
    }
    .page-hero__title em { font-style: italic; color: var(--blue); }
    .page-hero__desc {
        font-size: 16px;
        color: var(--slate-600);
        line-height: 1.75;
        max-width: 520px;
        margin: 0 auto;
    }

    /* ─── ABOUT SECTION ─── */
    .about {
        position: relative;
        padding: 80px 0 64px;
        background: #fff;
        overflow: hidden;
    }
    .about__dots-deco {
        position: absolute;
        bottom: 80px; left: -10px;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 10px;
        opacity: 0.25;
        pointer-events: none;
    }
    .about__dots-deco span { width: 5px; height: 5px; border-radius: 50%; background: var(--blue); display: block; }

    /* Layout 2 kolom */
    .about__inner {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 64px;
        align-items: center;
        margin-bottom: 64px;
    }

    /* Kiri */
    .about__title {
        font-family: var(--font-display);
        font-size: clamp(28px, 3.5vw, 40px);
        font-weight: 700;
        color: var(--slate-900);
        line-height: 1.2;
        margin: 12px 0 16px;
    }
    .about__desc { font-size: 15px; color: var(--slate-600); line-height: 1.75; margin: 0 0 36px; max-width: 460px; }

    /* Value cards */
    .about__values { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .about-value {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        background: var(--slate-100);
        border: 1px solid var(--slate-200);
        border-radius: 14px;
        padding: 16px;
        transition: box-shadow 0.2s ease, transform 0.2s ease;
    }
    .about-value:hover { box-shadow: 0 4px 16px rgba(37,99,235,.08); transform: translateY(-2px); background: #fff; }
    .about-value__icon {
        width: 40px; height: 40px; min-width: 40px;
        background: var(--blue-soft);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .about-value__title { font-size: 14px; font-weight: 600; color: var(--slate-900); margin: 0 0 4px; }
    .about-value__desc { font-size: 13px; color: var(--slate-600); margin: 0; line-height: 1.5; }

    /* Kanan: stats card */
    .about__card {
        background: linear-gradient(135deg, var(--blue-soft) 0%, #DBEAFE 100%);
        border-radius: 24px;
        padding: 28px;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }
    .about__stats-row { display: flex; gap: 12px; }
    .about__stat-box {
        flex: 1;
        background: #fff;
        border-radius: 14px;
        padding: 18px 16px;
        border: 1px solid var(--slate-200);
        transition: transform 0.2s ease;
    }
    .about__stat-box:hover { transform: translateY(-2px); }
    .about__stat-num { display: block; font-family: var(--font-display); font-size: 28px; font-weight: 700; color: var(--blue); line-height: 1; }
    .about__stat-lbl { display: block; font-size: 11px; color: var(--slate-400); font-weight: 500; margin-top: 6px; letter-spacing: 0.02em; }
    .about__mission { background: var(--blue); border-radius: 16px; padding: 20px; color: #fff; }
    .about__mission-label { font-size: 10px; font-weight: 700; letter-spacing: .12em; opacity: .75; margin: 0 0 8px; }
    .about__mission-text { font-size: 14px; line-height: 1.65; margin: 0; font-style: italic; }

    /* ─── STORY SECTION ─── */
    .about__story {
        background: var(--slate-100);
        border-radius: 24px;
        padding: 48px;
        margin-bottom: 64px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        align-items: center;
    }
    .about__story-title {
        font-family: var(--font-display);
        font-size: clamp(22px, 2.5vw, 32px);
        font-weight: 700;
        color: var(--slate-900);
        line-height: 1.25;
        margin: 12px 0 16px;
    }
    .about__story-text { font-size: 15px; color: var(--slate-600); line-height: 1.8; margin-bottom: 16px; }
    .about__timeline { display: flex; flex-direction: column; gap: 16px; }
    .about__timeline-item { display: flex; gap: 16px; align-items: flex-start; }
    .about__timeline-dot {
        width: 36px; height: 36px; min-width: 36px;
        background: var(--blue);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 700;
        color: #fff;
    }
    .about__timeline-year { font-size: 12px; font-weight: 700; color: var(--blue); margin-bottom: 2px; }
    .about__timeline-desc { font-size: 14px; color: var(--slate-600); line-height: 1.5; }

    /* ─── TEAM ─── */
    .about__team-wrap { border-top: 1px solid var(--slate-200); padding-top: 56px; }
    .about__team-header { margin-bottom: 40px; }
    .about__team-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
    .about__member {
        background: #fff;
        border: 1px solid var(--slate-200);
        border-radius: 20px;
        padding: 32px 20px;
        text-align: center;
        transition: box-shadow .25s ease, transform .25s ease;
    }
    .about__member:hover { box-shadow: 0 8px 24px rgba(37,99,235,.10); transform: translateY(-4px); }
    .about__avatar {
        width: 64px; height: 64px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: 700;
        color: #fff;
        margin: 0 auto 14px;
    }
    .about__member-name { font-size: 15px; font-weight: 600; color: var(--slate-900); margin: 0 0 4px; }
    .about__member-role { font-size: 13px; color: var(--slate-400); margin: 0; }
    .about__member-divider {
        width: 36px; height: 3px;
        background: var(--blue);
        border-radius: 2px;
        margin: 14px auto 0;
        opacity: 0;
        transition: opacity .25s;
    }
    .about__member:hover .about__member-divider { opacity: 1; }

    /* ─── CTA BOTTOM ─── */
    .cta-bottom { background: linear-gradient(135deg, var(--blue) 0%, #1E40AF 100%); padding: 72px 0; }
    .cta-bottom__inner { display: flex; align-items: center; justify-content: space-between; gap: 40px; flex-wrap: wrap; }
    .cta-bottom__title { font-family: var(--font-display); font-size: clamp(22px, 3vw, 32px); font-weight: 700; color: #fff; margin-bottom: 10px; }
    .cta-bottom__desc { font-size: 15px; color: rgba(255,255,255,.75); line-height: 1.6; }

        /* ─── FOOTER ─── */
        .footer { background: var(--slate-900); padding: 36px 0; }
    .footer__inner { display: flex; align-items: center; justify-content: space-between; gap: 24px; max-width: 1180px; margin: 0 auto; padding: 0 24px; }
    .footer__brand { display: flex; align-items: center; gap: 10px; text-decoration: none; flex-shrink: 0; }
    .footer__brand-name { font-family: var(--font-display); font-size: 20px; font-weight: 700; color: #fff; }
    .footer__tagline { font-size: 13px; color: var(--slate-400); white-space: nowrap; flex: 1; }
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
        .about__inner { gap: 40px; }
        .about__story { gap: 32px; }
    }
    @media (max-width: 768px) {
        .about { padding: 56px 0 48px; }
        .about__inner { grid-template-columns: 1fr; gap: 40px; margin-bottom: 48px; }
        .about__values { grid-template-columns: 1fr; }
        .about__story { grid-template-columns: 1fr; padding: 32px 24px; }
        .about__team-grid { grid-template-columns: repeat(2, 1fr); }
        .navbar__links, .navbar__actions { display: none; }
        .navbar__hamburger { display: flex; }
        .cta-bottom__inner { flex-direction: column; text-align: center; }
    }
    @media (max-width: 480px) {
        .footer__inner { flex-direction: column; text-align: center; }
        .footer__nav { justify-content: center; }
        .about__team-grid { grid-template-columns: 1fr; }
        .about__stats-row { flex-direction: column; }
    }
</style>

{{-- NAVBAR --}}
<nav class="navbar">
    <div class="container navbar__inner">
        <a href="/" class="navbar__brand">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="28" height="28" rx="8" fill="#2563EB"/>
                <path d="M8 10h12M8 14h8M8 18h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span class="navbar__brand-name">LearnFit</span>
        </a>

        <ul class="navbar__links">
            <li><a href="/" class="navbar__link">Beranda</a></li>
            <li><a href="/#fitur" class="navbar__link">Fitur</a></li>
            <li><a href="{{ route('about') }}" class="navbar__link navbar__link--active">Tentang Kami</a></li>
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
        <a href="/" class="navbar__link">Beranda</a>
        <a href="/#fitur" class="navbar__link">Fitur</a>
        <a href="{{ route('about') }}" class="navbar__link navbar__link--active">Tentang Kami</a>
        <a href="/#kontak" class="navbar__link">Kontak</a>
        <div class="navbar__mobile-actions">
            <a href="/login" class="btn btn--ghost">Masuk</a>
            <a href="/register" class="btn btn--primary">Daftar</a>
        </div>
    </div>
</nav>

{{-- PAGE HERO --}}
<div class="page-hero">
    <div class="page-hero__dots">
        @for($r = 0; $r < 4; $r++)
            @for($c = 0; $c < 5; $c++)<span></span>@endfor
        @endfor
    </div>
    <div class="page-hero__dots-l">
        @for($r = 0; $r < 4; $r++)
            @for($c = 0; $c < 5; $c++)<span></span>@endfor
        @endfor
    </div>
    <div class="container" data-animate="fade-up">
        <div class="page-hero__breadcrumb">
            <a href="/">Beranda</a>
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                <path d="M5 3l4 4-4 4" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Tentang Kami</span>
        </div>
        <span class="section-badge">Tentang Kami</span>
        <h1 class="page-hero__title">Kami Ada untuk<br><em>Masa Depanmu</em></h1>
        <p class="page-hero__desc">
            LearnFit lahir dari keyakinan bahwa setiap orang memiliki cara belajar yang unik.
            Kami hadir untuk membantu kamu menemukan metode yang paling efektif dan personal.
        </p>
    </div>
</div>

{{-- ABOUT MAIN --}}
<section class="about" id="tentang">
    <div class="about__dots-deco">
        @for($r = 0; $r < 4; $r++)
            @for($c = 0; $c < 5; $c++)<span></span>@endfor
        @endfor
    </div>

    <div class="container about__inner">

        {{-- Kiri: Nilai --}}
        <div class="about__content" data-animate="fade-up">
            <span class="section-badge">Nilai Kami</span>
            <h2 class="about__title">Mengapa Memilih<br>LearnFit?</h2>
            <p class="about__desc">
                Kami percaya pendidikan yang baik dimulai dari memahami diri sendiri.
                LearnFit menggabungkan ilmu kognitif dengan teknologi modern.
            </p>

            <div class="about__values">
                <div class="about-value">
                    <div class="about-value__icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L2 7l10 5 10-5-10-5z" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 17l10 5 10-5M2 12l10 5 10-5" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="about-value__title">Berbasis Riset</h4>
                        <p class="about-value__desc">Metode kami dirancang dari penelitian ilmu kognitif dan psikologi pendidikan.</p>
                    </div>
                </div>

                <div class="about-value">
                    <div class="about-value__icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="#2563EB" stroke-width="1.8"/>
                            <path d="M8 12a4 4 0 018 0" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round"/>
                            <circle cx="12" cy="10" r="2" fill="#2563EB"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="about-value__title">Personal & Adaptif</h4>
                        <p class="about-value__desc">Rekomendasi belajar yang terus berkembang sesuai progres dan kebutuhanmu.</p>
                    </div>
                </div>

                <div class="about-value">
                    <div class="about-value__icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="about-value__title">Terpercaya</h4>
                        <p class="about-value__desc">Dipercaya lebih dari 12.000 pelajar aktif di seluruh Indonesia.</p>
                    </div>
                </div>

                <div class="about-value">
                    <div class="about-value__icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <polyline points="4 17 9 12 13 16 22 7" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <line x1="4" y1="21" x2="20" y2="21" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="about-value__title">Hasil Nyata</h4>
                        <p class="about-value__desc">98% pengguna melaporkan peningkatan nilai dan motivasi belajar.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kanan: Stats & Misi --}}
        <div class="about__visual" data-animate="fade-left">
            <div class="about__card">
                <div class="about__stats-row">
                    <div class="about__stat-box">
                        <span class="about__stat-num">2021</span>
                        <span class="about__stat-lbl">Tahun Berdiri</span>
                    </div>
                    <div class="about__stat-box">
                        <span class="about__stat-num">12K+</span>
                        <span class="about__stat-lbl">Pelajar Aktif</span>
                    </div>
                </div>
                <div class="about__stats-row">
                    <div class="about__stat-box">
                        <span class="about__stat-num">50+</span>
                        <span class="about__stat-lbl">Kota di Indonesia</span>
                    </div>
                    <div class="about__stat-box">
                        <span class="about__stat-num">4.9 ★</span>
                        <span class="about__stat-lbl">Rating Pengguna</span>
                    </div>
                </div>
                <div class="about__mission">
                    <p class="about__mission-label">MISI KAMI</p>
                    <p class="about__mission-text">
                        "Memberdayakan setiap pelajar Indonesia untuk mencapai potensi terbaiknya
                        melalui pendidikan yang personal dan berbasis data."
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Story & Timeline --}}
    <div class="container" data-animate="fade-up">
        <div class="about__story">
            <div>
                <span class="section-badge">Kisah Kami</span>
                <h2 class="about__story-title">Berawal dari<br>Sebuah Pertanyaan</h2>
                <p class="about__story-text">
                    LearnFit lahir ketika dua mahasiswa bertanya: "Mengapa cara belajar yang sama tidak bekerja
                    untuk semua orang?" Dari pertanyaan sederhana itu, kami membangun platform yang memahami
                    bahwa setiap pelajar itu unik.
                </p>
                <p class="about__story-text">
                    Dengan dukungan riset psikologi pendidikan dan teknologi AI, kami terus berkembang
                    menjadi platform belajar personal terpercaya di Indonesia.
                </p>
            </div>
            <div class="about__timeline">
                <div class="about__timeline-item">
                    <div class="about__timeline-dot">21</div>
                    <div>
                        <p class="about__timeline-year">2021 — Lahirnya Ide</p>
                        <p class="about__timeline-desc">LearnFit didirikan oleh dua mahasiswa UI dengan visi pendidikan personal.</p>
                    </div>
                </div>
                <div class="about__timeline-item">
                    <div class="about__timeline-dot">22</div>
                    <div>
                        <p class="about__timeline-year">2022 — Beta Launch</p>
                        <p class="about__timeline-desc">Diluncurkan ke 500 pelajar pertama dan mendapat respons luar biasa.</p>
                    </div>
                </div>
                <div class="about__timeline-item">
                    <div class="about__timeline-dot">23</div>
                    <div>
                        <p class="about__timeline-year">2023 — Ekspansi Nasional</p>
                        <p class="about__timeline-desc">Berkembang ke 50+ kota dengan 10.000+ pengguna aktif.</p>
                    </div>
                </div>
                <div class="about__timeline-item">
                    <div class="about__timeline-dot">24</div>
                    <div>
                        <p class="about__timeline-year">2024 — AI Integration</p>
                        <p class="about__timeline-desc">Mengintegrasikan AI untuk rekomendasi yang semakin personal dan akurat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tim --}}
    <div class="container about__team-wrap">
        <div class="section-header about__team-header" data-animate="fade-up">
            <span class="section-badge">Tim Kami</span>
            <h2 class="section-title">Orang-orang di Balik LearnFit</h2>
            <p class="section-desc">Kami adalah tim yang bersemangat membangun pendidikan yang lebih baik untuk Indonesia.</p>
        </div>

        <div class="about__team-grid">
            @php
                $team = [
                    ['initials' => 'AR', 'name' => 'Andi Rachman',    'role' => 'CEO & Co-founder',  'gradient' => 'linear-gradient(135deg, #667eea, #764ba2)', 'delay' => 0],
                    ['initials' => 'SP', 'name' => 'Siti Pratiwi',    'role' => 'Head of Product',    'gradient' => 'linear-gradient(135deg, #2563EB, #0891b2)', 'delay' => 100],
                    ['initials' => 'DH', 'name' => 'Dika Hermawan',   'role' => 'Lead Engineer',      'gradient' => 'linear-gradient(135deg, #10b981, #0891b2)', 'delay' => 200],
                    ['initials' => 'NR', 'name' => 'Nina Rahayu',     'role' => 'UX Designer',        'gradient' => 'linear-gradient(135deg, #f093fb, #f5576c)', 'delay' => 300],
                    ['initials' => 'BW', 'name' => 'Bayu Wicaksono',  'role' => 'Data Scientist',     'gradient' => 'linear-gradient(135deg, #4facfe, #00f2fe)', 'delay' => 400],
                    ['initials' => 'FA', 'name' => 'Fira Aulia',      'role' => 'Marketing Lead',     'gradient' => 'linear-gradient(135deg, #fa709a, #fee140)', 'delay' => 500],
                ];
            @endphp

            @foreach($team as $member)
                <div class="about__member" data-animate="fade-up" style="--delay: {{ $member['delay'] }}ms">
                    <div class="about__avatar" style="background: {{ $member['gradient'] }}">
                        {{ $member['initials'] }}
                    </div>
                    <p class="about__member-name">{{ $member['name'] }}</p>
                    <p class="about__member-role">{{ $member['role'] }}</p>
                    <div class="about__member-divider"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-bottom">
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
        <a href="/" class="footer__brand">
            <svg width="24" height="24" viewBox="0 0 28 28" fill="none">
                <rect width="28" height="28" rx="8" fill="#2563EB"/>
                <path d="M8 10h12M8 14h8M8 18h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span class="footer__brand-name">LearnFit</span>
        </a>
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