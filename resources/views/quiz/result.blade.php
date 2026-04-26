@extends('layouts.app')

@section('content')

@php
$methods = [
    'pomodoro' => [
        'name'       => 'Pomodoro Technique',
        'tagline'    => 'Fokus penuh dalam sesi pendek yang terstruktur.',
        'desc'       => 'Kamu bekerja paling baik dalam sprint terkonsentrasi. Teknik Pomodoro membagi sesi belajar menjadi 25 menit fokus penuh diikuti 5 menit istirahat, menjaga otakmu tetap segar dan terhindar dari burnout.',
        'match'      => 91,
        'match_label'=> 'Sangat Tinggi',
        'color_main' => '#e11d48',
        'color_soft' => '#fff1f2',
        'color_mid'  => '#fecdd3',
        'color_bar'  => 'linear-gradient(90deg,#e11d48,#fb7185)',
        'color_dark' => '#be123c',
        'icon_bg'    => '#fecdd3',
        'badge_color'=> '#be123c',
        'badge_bg'   => '#ffe4e6',
        'advantages' => [
            ['icon'=>'⚡','title'=>'Anti-Burnout','desc'=>'Istirahat terstruktur mencegah kelelahan mental setelah belajar lama.'],
            ['icon'=>'📈','title'=>'Produktivitas Terukur','desc'=>'Kamu bisa melacak berapa "tomat" yang sudah diselesaikan per hari.'],
        ],
        'steps' => [
            ['num'=>'01','icon'=>'⏱️','title'=>'Set Timer 25 Menit','desc'=>'Pilih satu tugas belajar spesifik, singkirkan semua distraksi, dan mulai timer.'],
            ['num'=>'02','icon'=>'🎯','title'=>'Belajar Penuh Fokus','desc'=>'Selama 25 menit, hanya fokus pada satu topik. Jika ada gangguan, catat dan abaikan dulu.'],
            ['num'=>'03','icon'=>'☕','title'=>'Istirahat 5 Menit','desc'=>'Berdiri, regangkan badan, atau minum air. Hindari layar selama jeda singkat ini.'],
        ],
        'illus_emoji' => '🍅',
    ],
    'active_recall' => [
        'name'       => 'Active Recall',
        'tagline'    => 'Uji dirimu sendiri untuk memperkuat memori jangka panjang.',
        'desc'       => 'Kamu memproses informasi terdalam saat otak dipaksa mengambil kembali memori tanpa bantuan. Active Recall terbukti secara ilmiah meningkatkan retensi hingga 3x lebih baik dibanding membaca ulang.',
        'match'      => 94,
        'match_label'=> 'Sangat Tinggi',
        'color_main' => '#2563eb',
        'color_soft' => '#eff6ff',
        'color_mid'  => '#dbeafe',
        'color_bar'  => 'linear-gradient(90deg,#1d4ed8,#60a5fa)',
        'color_dark' => '#1e40af',
        'icon_bg'    => '#dbeafe',
        'badge_color'=> '#1e40af',
        'badge_bg'   => '#dbeafe',
        'advantages' => [
            ['icon'=>'⚡','title'=>'Retensi Cepat','desc'=>'Ingatan bertahan 3x lebih lama dibanding metode membaca ulang biasa.'],
            ['icon'=>'🔍','title'=>'Identifikasi Gap','desc'=>'Menemukan bagian materi yang belum benar-benar dikuasai dengan akurat.'],
        ],
        'steps' => [
            ['num'=>'01','icon'=>'📖','title'=>'Pelajari Materi','desc'=>'Pahami konsep dasar secara mendalam dari bacaan. Jangan hanya menghafal, tapi mengertilah konteksnya.'],
            ['num'=>'02','icon'=>'🗒️','title'=>'Buat Flashcard','desc'=>'Tulis pertanyaan dan jawaban di sisi berbeda untuk menguji diri. Gunakan bahasa yang sederhana.'],
            ['num'=>'03','icon'=>'⏰','title'=>'Kuis Berkala','desc'=>'Lakukan tes mandiri secara berkala untuk memperkuat ingatan. Gunakan sistem jeda untuk hasil optimal.'],
        ],
        'illus_emoji' => '🧠',
    ],
    'blurting' => [
        'name'       => 'Blurting Method',
        'tagline'    => 'Tuangkan semua yang kamu tahu di kertas kosong.',
        'desc'       => 'Kamu paling efektif saat menulis dan merangkum secara mandiri. Metode Blurting melatih otakmu untuk mengambil informasi secara aktif: baca materi, tutup buku, lalu tulis semua yang kamu ingat di kertas kosong.',
        'match'      => 88,
        'match_label'=> 'Tinggi',
        'color_main' => '#16a34a',
        'color_soft' => '#f0fdf4',
        'color_mid'  => '#bbf7d0',
        'color_bar'  => 'linear-gradient(90deg,#15803d,#4ade80)',
        'color_dark' => '#15803d',
        'icon_bg'    => '#bbf7d0',
        'badge_color'=> '#166534',
        'badge_bg'   => '#dcfce7',
        'advantages' => [
            ['icon'=>'✍️','title'=>'Aktif & Mandiri','desc'=>'Menulis sendiri jauh lebih efektif daripada membaca ulang secara pasif.'],
            ['icon'=>'🎯','title'=>'Temukan Celah','desc'=>'Bagian yang tidak bisa kamu tulis adalah bagian yang perlu dipelajari ulang.'],
        ],
        'steps' => [
            ['num'=>'01','icon'=>'📚','title'=>'Baca Materi Sekali','desc'=>'Baca topik yang ingin dipelajari secara seksama. Fokus pada pemahaman, bukan hafalan kata per kata.'],
            ['num'=>'02','icon'=>'📄','title'=>'Tutup Buku, Blurt!','desc'=>'Ambil kertas kosong dan tulis semua yang kamu ingat tanpa melihat sumber. Jangan sensor dirimu.'],
            ['num'=>'03','icon'=>'🔍','title'=>'Bandingkan dan Ulang','desc'=>'Buka buku kembali, temukan apa yang terlewat, lalu pelajari bagian itu lebih mendalam.'],
        ],
        'illus_emoji' => '✍️',
    ],
    'feynman' => [
        'name'       => 'Feynman Technique',
        'tagline'    => 'Ajarkan konsep sederhana seolah kamu gurunya.',
        'desc'       => 'Kamu memahami sesuatu paling dalam saat menjelaskannya ke orang lain. Teknik Feynman—dinamai dari fisikawan Richard Feynman—mengharuskan kamu menjelaskan konsep dengan bahasa sesederhana mungkin, sehingga celah pemahamanmu langsung terungkap.',
        'match'      => 96,
        'match_label'=> 'Sangat Tinggi',
        'color_main' => '#7c3aed',
        'color_soft' => '#fdf4ff',
        'color_mid'  => '#e9d5ff',
        'color_bar'  => 'linear-gradient(90deg,#6d28d9,#a78bfa)',
        'color_dark' => '#5b21b6',
        'icon_bg'    => '#e9d5ff',
        'badge_color'=> '#5b21b6',
        'badge_bg'   => '#ede9fe',
        'advantages' => [
            ['icon'=>'💡','title'=>'Pemahaman Mendalam','desc'=>'Kamu tidak bisa menjelaskan sesuatu yang tidak benar-benar kamu pahami.'],
            ['icon'=>'🗣️','title'=>'Komunikasi Efektif','desc'=>'Melatih kemampuan menjelaskan konsep kompleks dengan cara yang mudah dicerna.'],
        ],
        'steps' => [
            ['num'=>'01','icon'=>'📖','title'=>'Pelajari Konsepnya','desc'=>'Baca dan pahami topik yang ingin dikuasai. Catat poin-poin penting dengan bahasamu sendiri.'],
            ['num'=>'02','icon'=>'🧑‍🏫','title'=>'Jelaskan seperti Guru','desc'=>'Coba jelaskan konsep itu seolah kamu mengajar anak SD. Gunakan analogi dan contoh nyata.'],
            ['num'=>'03','icon'=>'🔄','title'=>'Temukan dan Perbaiki','desc'=>'Di mana kamu gagap atau bingung? Itu titik lemahmu. Kembali ke sumber dan pelajari ulang bagian itu.'],
        ],
        'illus_emoji' => '🏫',
    ],
];

$m = $methods[$result] ?? $methods['active_recall'];
@endphp

<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}

/* ─── NAVBAR ─── */
.rs-nav {
    position: sticky; top: 0; z-index: 100;
    background: rgba(255,255,255,.95);
    backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
    border-bottom: 1px solid #e2e8f0;
}
.rs-nav__inner {
    display: flex; align-items: center; justify-content: space-between;
    height: 64px; max-width: 1180px; margin: 0 auto; padding: 0 24px;
}
.rs-nav__brand { display: flex; align-items: center; gap: 9px; text-decoration: none; }
.rs-nav__name  { font-size: 18px; font-weight: 700; color: #0f172a; }
.rs-nav__actions { display: flex; align-items: center; gap: .6rem; }
.rs-btn-share {
    display: inline-flex; align-items: center; gap: .4rem;
    background: #f1f5f9; color: #475569; font-size: .78rem; font-weight: 600;
    padding: .4rem .85rem; border-radius: 99px; border: none; cursor: pointer;
    transition: background .2s, color .2s, transform .15s;
}
.rs-btn-share:hover { background: #e2e8f0; color: #0f172a; transform: translateY(-1px); }

/* ─── PAGE ─── */
.rs-page { background: #f8fafc; min-height: calc(100vh - 64px); padding-block: 2.5rem 3.5rem; }
.rs-wrap { max-width: 1180px; margin: 0 auto; padding: 0 24px; }

/* ─── HERO ─── */
.rs-hero { text-align: center; margin-bottom: 2.25rem; }
.rs-hero__eyebrow {
    display: inline-flex; align-items: center; gap: .4rem;
    font-size: .7rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase;
    padding: .28rem .75rem; border-radius: 99px; margin-bottom: .85rem;
    background: var(--badge-bg); color: var(--badge-color);
}
.rs-hero__title { font-size: clamp(1.7rem,3.5vw,2.4rem); font-weight: 800; color: #0f172a; letter-spacing: -.03em; margin-bottom: .45rem; }
.rs-hero__sub   { font-size: .9rem; color: #64748b; max-width: 480px; margin: 0 auto; line-height: 1.6; }

/* ─── MAIN GRID ─── */
.rs-main-grid { display: grid; grid-template-columns: 1fr 300px; gap: 1.25rem; margin-bottom: 2rem; align-items: start; }

/* ─── METHOD CARD ─── */
.rs-method-card {
    background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; overflow: hidden;
    box-shadow: 0 2px 16px rgba(15,23,42,.06);
    transition: box-shadow .25s, transform .2s;
}
.rs-method-card:hover { box-shadow: 0 6px 28px rgba(15,23,42,.1); transform: translateY(-2px); }
.rs-method-card__top {
    display: grid; grid-template-columns: 180px 1fr;
}
.rs-method-card__illus {
    display: flex; align-items: center; justify-content: center;
    min-height: 180px; font-size: 4.5rem; position: relative; overflow: hidden;
    background: var(--color-soft);
}
.rs-method-card__illus-blob {
    position: absolute; border-radius: 50%; opacity: .18;
}
.rs-method-card__illus-blob--1 { width:120px;height:120px;background:var(--color-main);top:-30px;right:-30px; }
.rs-method-card__illus-blob--2 { width:80px;height:80px;background:var(--color-main);bottom:-20px;left:-20px; }
.rs-method-card__illus-emoji { position: relative; z-index: 1; filter: drop-shadow(0 4px 12px rgba(0,0,0,.12)); }
.rs-method-card__body { padding: 1.5rem 1.75rem; }
.rs-badge-cocok {
    display: inline-flex; align-items: center; gap: .3rem;
    font-size: .63rem; font-weight: 700; letter-spacing: .08em;
    padding: .2rem .65rem; border-radius: 99px; margin-bottom: .6rem;
    background: var(--badge-bg); color: var(--badge-color);
}
.rs-method-card__name  { font-size: 1.5rem; font-weight: 800; color: #0f172a; letter-spacing: -.03em; margin-bottom: .55rem; }
.rs-method-card__desc  { font-size: .85rem; color: #475569; line-height: 1.65; margin-bottom: 1.1rem; }
.rs-method-card__cta   { display: flex; align-items: center; gap: .7rem; }
.rs-btn-start {
    display: inline-flex; align-items: center; gap: .45rem;
    background: var(--color-main); color: #fff; font-size: .88rem; font-weight: 600;
    padding: .65rem 1.4rem; border-radius: 99px; text-decoration: none; border: none; cursor: pointer;
    transition: filter .2s, transform .15s, box-shadow .2s;
    box-shadow: 0 4px 14px color-mix(in srgb, var(--color-main) 35%, transparent);
}
.rs-btn-start:hover { filter: brightness(1.1); transform: translateY(-2px); box-shadow: 0 6px 20px color-mix(in srgb, var(--color-main) 45%, transparent); }
.rs-btn-share-sm {
    display: inline-flex; align-items: center; justify-content: center;
    width: 38px; height: 38px; border-radius: 50%;
    border: 1.5px solid #e2e8f0; background: #fff; cursor: pointer; color: #64748b;
    transition: border-color .2s, color .2s, transform .15s;
}
.rs-btn-share-sm:hover { border-color: var(--color-main); color: var(--color-main); transform: scale(1.1); }

/* ─── ANALYSIS CARD (right) ─── */
.rs-analysis-card {
    background: #0f172a; border-radius: 20px; padding: 1.35rem 1.4rem;
    box-shadow: 0 4px 24px rgba(15,23,42,.18);
    transition: transform .2s, box-shadow .2s;
}
.rs-analysis-card:hover { transform: translateY(-2px); box-shadow: 0 8px 32px rgba(15,23,42,.24); }
.rs-analysis-card__head {
    display: flex; align-items: center; gap: .5rem;
    font-size: .65rem; font-weight: 700; letter-spacing: .1em; color: #94a3b8;
    text-transform: uppercase; margin-bottom: 1rem;
}
.rs-adv { display: flex; align-items: flex-start; gap: .7rem; margin-bottom: .85rem; }
.rs-adv__icon { font-size: 1rem; flex-shrink: 0; margin-top: .05rem; }
.rs-adv__title { font-size: .82rem; font-weight: 700; color: #f1f5f9; margin-bottom: .2rem; }
.rs-adv__desc  { font-size: .72rem; color: #94a3b8; line-height: 1.5; }
.rs-divider { height: 1px; background: #1e293b; margin: 1rem 0; }
.rs-match-label { font-size: .63rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: #64748b; margin-bottom: .4rem; }
.rs-match-num { font-size: 2rem; font-weight: 800; letter-spacing: -.04em; margin-bottom: .1rem; color: var(--color-main); }
.rs-match-lvl { font-size: .72rem; color: #94a3b8; margin-bottom: .65rem; text-align: right; margin-top: -.3rem; }
.rs-match-track { height: 7px; background: #1e293b; border-radius: 99px; overflow: hidden; }
.rs-match-bar   { height: 100%; border-radius: 99px; background: var(--color-bar); transition: width 1.2s cubic-bezier(.4,0,.2,1); }

/* ─── STEPS SECTION ─── */
.rs-steps-title { font-size: 1.2rem; font-weight: 800; color: #0f172a; letter-spacing: -.02em; margin-bottom: 1rem; }
.rs-steps-grid  { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 2.5rem; }
.rs-step-card {
    background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 1.3rem 1.2rem;
    box-shadow: 0 1px 6px rgba(15,23,42,.04);
    transition: box-shadow .25s, transform .2s, border-color .2s;
    position: relative; overflow: hidden;
}
.rs-step-card:hover { box-shadow: 0 6px 22px rgba(15,23,42,.09); transform: translateY(-3px); border-color: var(--color-mid); }
.rs-step-num {
    font-size: 2.5rem; font-weight: 800; letter-spacing: -.05em;
    color: var(--color-soft); -webkit-text-stroke: 1.5px var(--color-mid);
    line-height: 1; margin-bottom: .6rem;
}
.rs-step-head { display: flex; align-items: center; gap: .4rem; margin-bottom: .4rem; }
.rs-step-head__icon { font-size: 1rem; }
.rs-step-head__title { font-size: .9rem; font-weight: 700; color: var(--color-main); }
.rs-step-card__desc { font-size: .78rem; color: #64748b; line-height: 1.6; }

/* ─── FOOTER BADGE ─── */
.rs-footer-badge {
    display: flex; flex-direction: column; align-items: center; gap: .35rem;
    padding-block: 2rem;
}
.rs-footer-badge__top { display: flex; align-items: center; gap: .5rem; }
.rs-footer-badge__label {
    font-size: .65rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: #94a3b8;
}
.rs-footer-badge__sub { font-size: .72rem; color: #cbd5e1; }

/* ─── FOOTER ─── */
.rs-footer { background: #0f172a; padding: 36px 0; }
.rs-footer__inner {
    display: flex; align-items: center; justify-content: space-between;
    gap: 24px; flex-wrap: wrap;
    max-width: 1180px; margin: 0 auto; padding: 0 24px;
}
.rs-footer__brand { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; }
.rs-footer__brand-name { font-size: 18px; font-weight: 700; color: #fff; }
.rs-footer__tagline { font-size: 13px; color: #94a3b8; }
.rs-footer__links { display: flex; gap: 1.5rem; }
.rs-footer__link { font-size: 13px; color: #94a3b8; text-decoration: none; transition: color .2s; }
.rs-footer__link:hover { color: #fff; }
.rs-footer__copy { font-size: 13px; color: #94a3b8; }

/* ─── ENTRANCE ANIMATIONS ─── */
[data-rs] {
    opacity: 0; transform: translateY(20px);
    transition: opacity .55s ease, transform .55s ease;
    transition-delay: var(--delay, 0ms);
}
[data-rs].visible { opacity: 1; transform: none; }

/* ─── RESPONSIVE ─── */
@media(max-width:700px){
    .rs-main-grid { grid-template-columns: 1fr; }
    .rs-method-card__top { grid-template-columns: 1fr; }
    .rs-method-card__illus { min-height: 120px; }
    .rs-steps-grid { grid-template-columns: 1fr; }
    .rs-footer__inner { flex-direction: column; text-align: center; }
    .rs-footer__links { justify-content: center; }
}
</style>

<style>
:root {
    --color-main:  {{ $m['color_main'] }};
    --color-soft:  {{ $m['color_soft'] }};
    --color-mid:   {{ $m['color_mid'] }};
    --color-bar:   {{ $m['color_bar'] }};
    --color-dark:  {{ $m['color_dark'] }};
    --icon-bg:     {{ $m['icon_bg'] }};
    --badge-color: {{ $m['badge_color'] }};
    --badge-bg:    {{ $m['badge_bg'] }};
}
</style>

{{-- NAVBAR --}}
<nav class="rs-nav">
    <div class="rs-nav__inner">
        <a href="/" class="rs-nav__brand">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none">
                <rect width="28" height="28" rx="8" fill="#2563EB"/>
                <path d="M8 10h12M8 14h8M8 18h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span class="rs-nav__name">LearnFit</span>
        </a>
        <div class="rs-nav__actions">
            <button class="rs-btn-share" onclick="shareResult()">
                <svg width="13" height="13" viewBox="0 0 14 14" fill="none"><circle cx="11" cy="2.5" r="1.8" stroke="currentColor" stroke-width="1.3"/><circle cx="2.5" cy="7" r="1.8" stroke="currentColor" stroke-width="1.3"/><circle cx="11" cy="11.5" r="1.8" stroke="currentColor" stroke-width="1.3"/><path d="M4.2 6.1 L9.3 3.4 M4.2 7.9 L9.3 10.6" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
                Bagikan
            </button>
        </div>
    </div>
</nav>

<div class="rs-page">
<div class="rs-wrap">

    {{-- HERO --}}
    <div class="rs-hero" data-rs style="--delay:0ms">
        <div class="rs-hero__eyebrow">
            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"><path d="M5.5 1l1 2L9 3.5 7 5.3l.5 2.7L5.5 6.8 3 8l.5-2.7L1.5 3.5 4 3l1.5-2z" fill="currentColor"/></svg>
            Hasil Analisis LearnFit AI
        </div>
        <h1 class="rs-hero__title">Hasil Metode Belajar</h1>
        <p class="rs-hero__sub">Berdasarkan gaya belajarmu, inilah rekomendasi terbaik kami.</p>
    </div>

    {{-- MAIN GRID --}}
    <div class="rs-main-grid">

        {{-- Method card --}}
        <div class="rs-method-card" data-rs style="--delay:80ms">
            <div class="rs-method-card__top">
                <div class="rs-method-card__illus">
                    <div class="rs-method-card__illus-blob rs-method-card__illus-blob--1"></div>
                    <div class="rs-method-card__illus-blob rs-method-card__illus-blob--2"></div>
                    <span class="rs-method-card__illus-emoji">{{ $m['illus_emoji'] }}</span>
                </div>
                <div class="rs-method-card__body">
                    <span class="rs-badge-cocok">
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="none"><path d="M1.5 4l2 2 3-3" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        COCOK UNTUKMU
                    </span>
                    <h2 class="rs-method-card__name">{{ $m['name'] }}</h2>
                    <p class="rs-method-card__desc">{{ $m['desc'] }}</p>
                    <div class="rs-method-card__cta">
                        <a href="{{ route('welcome') }}" class="rs-btn-start">
                            Mulai Belajar
                            <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                        <a href="{{ route('quiz.retake') }}" class="rs-btn-start" style="background:#1e293b; border:1px solid #334155;">
                            Ikut Quiz Ulang
                            <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M13 8A5 5 0 1 1 8 3M13 3v3h-3" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                        <button class="rs-btn-share-sm" onclick="shareResult()" title="Bagikan">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><circle cx="11" cy="2.5" r="1.8" stroke="currentColor" stroke-width="1.3"/><circle cx="2.5" cy="7" r="1.8" stroke="currentColor" stroke-width="1.3"/><circle cx="11" cy="11.5" r="1.8" stroke="currentColor" stroke-width="1.3"/><path d="M4.2 6.1 L9.3 3.4 M4.2 7.9 L9.3 10.6" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Analysis card --}}
        <div class="rs-analysis-card" data-rs style="--delay:160ms">
            <div class="rs-analysis-card__head">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><rect x="1" y="1" width="12" height="12" rx="2" stroke="#64748b" stroke-width="1.2"/><path d="M4 10 V7 M7 10 V4 M10 10 V6" stroke="#64748b" stroke-width="1.3" stroke-linecap="round"/></svg>
                Analisis Keunggulan
            </div>
            @foreach($m['advantages'] as $adv)
            <div class="rs-adv">
                <div class="rs-adv__icon">{{ $adv['icon'] }}</div>
                <div>
                    <p class="rs-adv__title">{{ $adv['title'] }}</p>
                    <p class="rs-adv__desc">{{ $adv['desc'] }}</p>
                </div>
            </div>
            @endforeach
            <div class="rs-divider"></div>
            <p class="rs-match-label">Tingkat Kesesuaian</p>
            <p class="rs-match-num">{{ $m['match'] }}%</p>
            <p class="rs-match-lvl">{{ $m['match_label'] }}</p>
            <div class="rs-match-track">
                <div class="rs-match-bar" id="matchBar" style="width:0%"></div>
            </div>
        </div>

    </div>

    {{-- STEPS --}}
    <p class="rs-steps-title" data-rs style="--delay:240ms">Langkah Belajarmu</p>
    <div class="rs-steps-grid">
        @foreach($m['steps'] as $step)
        <div class="rs-step-card" data-rs style="--delay:{{ 300 + $loop->index * 80 }}ms">
            <p class="rs-step-num">{{ $step['num'] }}</p>
            <div class="rs-step-head">
                <span class="rs-step-head__icon">{{ $step['icon'] }}</span>
                <span class="rs-step-head__title">{{ $step['title'] }}</span>
            </div>
            <p class="rs-step-card__desc">{{ $step['desc'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- FOOTER BADGE --}}
    <div class="rs-footer-badge" data-rs style="--delay:520ms">
        <div class="rs-footer-badge__top">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 1l1.8 3.6L14 5.4l-3 2.9.7 4.1L8 10.5l-3.7 1.9.7-4.1L2 5.4l4.2-.8L8 1z" fill="{{ $m['color_main'] }}" stroke="{{ $m['color_main'] }}" stroke-width=".5" stroke-linejoin="round"/></svg>
            <span class="rs-footer-badge__label">Berdasarkan Hasil Analisis LearnFit AI</span>
        </div>
        <p class="rs-footer-badge__sub">Diperbarui: {{ now()->format('d M Y') }} &bull; Versi Algoritma v2.4</p>
    </div>

</div>
</div>

{{-- FOOTER --}}
<footer class="rs-footer">
    <div class="rs-footer__inner">
        <div class="rs-footer__brand">
            <a href="/" style="display:flex;align-items:center;gap:10px;text-decoration:none;">
                <svg width="24" height="24" viewBox="0 0 28 28" fill="none">
                    <rect width="28" height="28" rx="8" fill="#2563EB"/>
                    <path d="M8 10h12M8 14h8M8 18h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <span class="rs-footer__brand-name">LearnFit</span>
            </a>
            <p class="rs-footer__tagline">Temukan gaya belajarmu yang paling efektif bersama kami.</p>
        </div>
        <div class="rs-footer__links">
            <a href="#" class="rs-footer__link">Bantuan</a>
            <a href="#" class="rs-footer__link">Privasi</a>
            <a href="#" class="rs-footer__link">Syarat &amp; Ketentuan</a>
        </div>
        <p class="rs-footer__copy">&copy; {{ date('Y') }} LearnFit. Hak Cipta Dilindungi.</p>
    </div>
</footer>

<script>
(function(){
    // Intersection observer for entrance animations
    var els = document.querySelectorAll('[data-rs]');
    var obs = new IntersectionObserver(function(entries){
        entries.forEach(function(e){ if(e.isIntersecting) e.target.classList.add('visible'); });
    }, { threshold: 0.1 });
    els.forEach(function(el){ obs.observe(el); });

    // Animate match bar after a short delay
    setTimeout(function(){
        var bar = document.getElementById('matchBar');
        if(bar) bar.style.width = '{{ $m["match"] }}%';
    }, 700);
})();

function shareResult(){
    var txt = 'Metode belajar terbaikku adalah {{ $m["name"] }} berdasarkan analisis LearnFit AI! Cari tahu metode belajarmu di LearnFit.';
    if(navigator.share){
        navigator.share({ title:'Hasil Quiz LearnFit', text: txt, url: window.location.href });
    } else if(navigator.clipboard){
        navigator.clipboard.writeText(txt + ' ' + window.location.href);
        alert('Tautan dan hasil disalin ke clipboard!');
    }
}
</script>

@endsection
