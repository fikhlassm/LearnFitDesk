@extends('layouts.app')

@section('content')
<style>
*,*::before,*::after { box-sizing: border-box; margin: 0; padding: 0; }

/* ─── NAVBAR ─── */
.qz-nav {
    position: sticky; top: 0; z-index: 100;
    background: rgba(255,255,255,.95);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-bottom: 1px solid #e2e8f0;
}
.qz-nav__inner {
    display: flex; align-items: center; justify-content: space-between;
    height: 64px; max-width: 1180px; margin: 0 auto; padding: 0 24px;
}
.qz-nav__brand { display: flex; align-items: center; gap: 9px; text-decoration: none; }
.qz-nav__name  { font-size: 18px; font-weight: 700; color: #0f172a; }
.qz-nav__close {
    width: 36px; height: 36px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    background: #f1f5f9; border: none; cursor: pointer; color: #475569;
    transition: background .2s, color .2s, transform .15s;
    text-decoration: none;
}
.qz-nav__close:hover { background: #fee2e2; color: #dc2626; transform: rotate(90deg); }

/* ─── PROGRESS ─── */
.qz-progress-wrap {
    background: #fff; border-bottom: 1px solid #f1f5f9;
    padding: .6rem 0;
}
.qz-progress-inner { max-width: 1180px; margin: 0 auto; padding: 0 24px; }
.qz-progress-meta {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: .35rem;
}
.qz-progress-label { font-size: .72rem; font-weight: 600; color: #64748b; letter-spacing: .04em; }
.qz-progress-pct   { font-size: .72rem; font-weight: 700; color: #2563eb; }
.qz-progress-track { height: 6px; background: #e2e8f0; border-radius: 99px; overflow: hidden; }
.qz-progress-bar {
    height: 100%; border-radius: 99px;
    background: linear-gradient(90deg, #2563eb 0%, #60a5fa 100%);
    transition: width .5s cubic-bezier(.4,0,.2,1);
}

/* ─── PAGE ─── */
.qz-page {
    min-height: calc(100vh - 130px);
    background: #f8fafc;
    padding-block: 2.5rem 6rem;
}
.qz-wrap { max-width: 1180px; margin: 0 auto; padding: 0 24px; }

/* ─── STEP (question) ─── */
.qz-step { display: none; animation: stepIn .4s cubic-bezier(.4,0,.2,1) both; }
.qz-step.active { display: block; }
@keyframes stepIn {
    from { opacity: 0; transform: translateX(32px); }
    to   { opacity: 1; transform: translateX(0); }
}
.qz-step.exit { animation: stepOut .3s cubic-bezier(.4,0,.2,1) both; }
@keyframes stepOut {
    from { opacity: 1; transform: translateX(0); }
    to   { opacity: 0; transform: translateX(-32px); }
}

/* ─── QUESTION CARD ─── */
.qz-qcard {
    display: grid; grid-template-columns: 160px 1fr;
    background: #fff; border: 1px solid #e2e8f0; border-radius: 20px;
    overflow: hidden; margin-bottom: 1.5rem;
    box-shadow: 0 2px 12px rgba(15,23,42,.06);
}
.qz-qcard__illus {
    background: #eff6ff;
    display: flex; align-items: center; justify-content: center;
    padding: 1.5rem; position: relative; overflow: hidden;
}
.qz-qcard__illus::after {
    content: ''; position: absolute; inset: 0;
    background: radial-gradient(circle at 70% 70%, rgba(37,99,235,.08) 0%, transparent 70%);
    pointer-events: none;
}
.qz-qcard__svg { width: 80px; height: 80px; position: relative; z-index: 1; }
.qz-qcard__body { padding: 1.5rem 1.75rem; display: flex; flex-direction: column; justify-content: center; }
.qz-step-badge {
    display: inline-flex; align-items: center; gap: .3rem;
    font-size: .65rem; font-weight: 700; letter-spacing: .07em;
    color: #2563eb; background: #dbeafe; border-radius: 99px;
    padding: .2rem .65rem; margin-bottom: .7rem; width: fit-content;
}
.qz-qcard__q    { font-size: 1.15rem; font-weight: 700; color: #0f172a; line-height: 1.4; margin-bottom: .4rem; }
.qz-qcard__hint { font-size: .82rem; color: #64748b; line-height: 1.5; }

/* ─── OPTIONS GRID ─── */
.qz-options { display: grid; grid-template-columns: 1fr 1fr; gap: .75rem; }
.qz-opt {
    display: flex; align-items: center; gap: .85rem;
    background: #fff; border: 1.5px solid #e2e8f0;
    border-radius: 14px; padding: .9rem 1.1rem;
    cursor: pointer; text-align: left;
    transition: border-color .2s, box-shadow .2s, transform .15s, background .2s;
}
.qz-opt:hover {
    border-color: #93c5fd; box-shadow: 0 4px 16px rgba(37,99,235,.1); transform: translateY(-2px);
}
.qz-opt.selected {
    border-color: #2563eb; background: #eff6ff;
    box-shadow: 0 4px 20px rgba(37,99,235,.14); transform: translateY(-2px);
}
.qz-opt__icon {
    width: 42px; height: 42px; border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; font-size: 1.3rem; background: #f1f5f9;
    transition: background .2s;
}
.qz-opt.selected .qz-opt__icon { background: #dbeafe; }
.qz-opt__text { flex: 1; }
.qz-opt__label { font-size: .88rem; font-weight: 600; color: #0f172a; margin-bottom: .15rem; }
.qz-opt__sub   { font-size: .73rem; color: #94a3b8; line-height: 1.4; }
.qz-opt.selected .qz-opt__label { color: #1d4ed8; }
.qz-opt__check {
    width: 20px; height: 20px; border-radius: 50%;
    border: 1.5px solid #cbd5e1;
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    transition: border-color .2s, background .2s;
}
.qz-opt.selected .qz-opt__check { border-color: #2563eb; background: #2563eb; }
.qz-opt__check svg { opacity: 0; transition: opacity .15s; }
.qz-opt.selected .qz-opt__check svg { opacity: 1; }

/* ─── BOTTOM BAR ─── */
.qz-bottom {
    position: fixed; bottom: 0; left: 0; right: 0;
    background: rgba(255,255,255,.96);
    backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
    border-top: 1px solid #e2e8f0; padding: 1rem 0; z-index: 50;
}
.qz-bottom__inner {
    max-width: 1180px; margin: 0 auto; padding: 0 24px;
    display: flex; flex-direction: column; align-items: center; gap: .6rem;
}
.qz-btn-next {
    display: inline-flex; align-items: center; gap: .5rem;
    background: #2563eb; color: #fff; font-size: .92rem; font-weight: 600;
    padding: .75rem 2.5rem; border-radius: 99px; border: none; cursor: pointer;
    transition: background .2s, transform .15s, box-shadow .2s, opacity .2s;
    box-shadow: 0 4px 16px rgba(37,99,235,.25);
}
.qz-btn-next:disabled { opacity: .45; cursor: not-allowed; box-shadow: none; transform: none !important; }
.qz-btn-next:not(:disabled):hover {
    background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 6px 24px rgba(37,99,235,.35);
}
.qz-hint-pill {
    display: inline-flex; align-items: center; gap: .35rem;
    background: #f1f5f9; border-radius: 99px;
    padding: .3rem .85rem; font-size: .73rem; color: #64748b;
}

/* ─── RESPONSIVE ─── */
@media(max-width:640px){
    .qz-qcard { grid-template-columns: 1fr; min-height: unset; }
    .qz-qcard__illus { min-height: 110px; }
    .qz-qcard__body { min-height: 120px; }
    .qz-options { grid-template-columns: 1fr; }
    .qz-page { padding-block: 1.5rem 9rem; }
}
</style>

<nav class="qz-nav">
    <div class="qz-nav__inner">
        <a href="/" class="qz-nav__brand">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none">
                <rect width="28" height="28" rx="8" fill="#2563EB"/>
                <path d="M8 10h12M8 14h8M8 18h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span class="qz-nav__name">LearnFit</span>
        </a>
        <a href="{{ route('welcome') }}" class="qz-nav__close" title="Keluar Quiz">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M1 1l12 12M13 1L1 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        </a>
    </div>
</nav>

<div class="qz-progress-wrap">
    <div class="qz-progress-inner">
        <div class="qz-progress-meta">
            <span class="qz-progress-label">PROGRES QUIZ</span>
            <span class="qz-progress-pct" id="pctLabel">0%</span>
        </div>
        <div class="qz-progress-track">
            <div class="qz-progress-bar" id="progressBar" style="width:0%"></div>
        </div>
    </div>
</div>

<div class="qz-page">
<div class="qz-wrap">
<form id="quizForm" method="POST" action="{{ route('quiz.submit') }}">
@csrf

<div class="qz-step active" data-step="1">
    <div class="qz-qcard">
        <div class="qz-qcard__illus">
            <svg class="qz-qcard__svg" viewBox="0 0 80 80" fill="none">
                <circle cx="40" cy="40" r="38" fill="#dbeafe"/>
                <circle cx="40" cy="33" r="15" fill="#93c5fd" opacity=".4"/>
                <ellipse cx="34" cy="34" rx="3" ry="3.5" fill="#1e40af"/>
                <ellipse cx="46" cy="34" rx="3" ry="3.5" fill="#1e40af"/>
                <circle cx="35" cy="33" r="1" fill="white"/>
                <circle cx="47" cy="33" r="1" fill="white"/>
                <path d="M36 40 q4 3 8 0" stroke="#1e40af" stroke-width="1.8" stroke-linecap="round" fill="none"/>
                <path d="M30 52 h20 M33 57 h14" stroke="#60a5fa" stroke-width="2" stroke-linecap="round"/>
                <rect x="36" y="44" width="8" height="7" rx="2" fill="#bfdbfe"/>
                <path d="M28 33 Q40 20 52 33" stroke="#2563eb" stroke-width="2" stroke-linecap="round" fill="none"/>
            </svg>
        </div>
        <div class="qz-qcard__body">
            <span class="qz-step-badge">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none"><circle cx="4" cy="4" r="3" fill="#2563eb"/></svg>
                Soal 1 dari 7
            </span>
            <h2 class="qz-qcard__q">Bagaimana cara terbaikmu memahami materi baru?</h2>
            <p class="qz-qcard__hint">Pilih satu yang paling sesuai dengan kebiasaan belajarmu sehari-hari.</p>
        </div>
    </div>
    <div class="qz-options">
        <label class="qz-opt" data-q="q1" data-v="visual">
            <div class="qz-opt__icon">👁️</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Visual</p><p class="qz-opt__sub">Diagram, infografis, video</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q1]" value="visual" style="display:none">
        </label>
        <label class="qz-opt" data-q="q1" data-v="auditori">
            <div class="qz-opt__icon">🎧</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Auditori</p><p class="qz-opt__sub">Rekaman, diskusi kelompok</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q1]" value="auditori" style="display:none">
        </label>
        <label class="qz-opt" data-q="q1" data-v="membaca">
            <div class="qz-opt__icon">📖</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Membaca / Menulis</p><p class="qz-opt__sub">Buku teks, ringkasan materi</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q1]" value="membaca" style="display:none">
        </label>
        <label class="qz-opt" data-q="q1" data-v="kinestetik">
            <div class="qz-opt__icon">🤸</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Kinestetik</p><p class="qz-opt__sub">Praktik langsung, simulasi</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q1]" value="kinestetik" style="display:none">
        </label>
    </div>
</div>

<div class="qz-step" data-step="2">
    <div class="qz-qcard">
        <div class="qz-qcard__illus" style="background:#f0fdf4;">
            <svg class="qz-qcard__svg" viewBox="0 0 80 80" fill="none">
                <circle cx="40" cy="40" r="38" fill="#dcfce7"/>
                <circle cx="40" cy="40" r="22" stroke="#16a34a" stroke-width="2.5" fill="none"/>
                <circle cx="40" cy="40" r="16" stroke="#86efac" stroke-width="1.5" fill="none"/>
                <path d="M40 18 v4 M40 58 v4 M18 40 h4 M58 40 h4" stroke="#16a34a" stroke-width="2" stroke-linecap="round"/>
                <path d="M40 40 L40 30" stroke="#1e3a20" stroke-width="2.5" stroke-linecap="round"/>
                <path d="M40 40 L48 40" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/>
                <circle cx="40" cy="40" r="2.5" fill="#1e3a20"/>
            </svg>
        </div>
        <div class="qz-qcard__body">
            <span class="qz-step-badge" style="color:#16a34a;background:#dcfce7;">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none"><circle cx="4" cy="4" r="3" fill="#16a34a"/></svg>
                Soal 2 dari 7
            </span>
            <h2 class="qz-qcard__q">Berapa lama kamu bisa fokus belajar tanpa istirahat?</h2>
            <p class="qz-qcard__hint">Pilih durasi yang paling sering kamu alami secara alami.</p>
        </div>
    </div>
    <div class="qz-options">
        <label class="qz-opt" data-q="q2" data-v="15menit">
            <div class="qz-opt__icon">⚡</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Sekitar 15 menit</p><p class="qz-opt__sub">Butuh jeda sering, tapi produktif</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q2]" value="15menit" style="display:none">
        </label>
        <label class="qz-opt" data-q="q2" data-v="30menit">
            <div class="qz-opt__icon">🍅</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Sekitar 25–30 menit</p><p class="qz-opt__sub">Fokus, lalu istirahat singkat</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q2]" value="30menit" style="display:none">
        </label>
        <label class="qz-opt" data-q="q2" data-v="1jam">
            <div class="qz-opt__icon">⏰</div>
            <div class="qz-opt__text"><p class="qz-opt__label">45 menit – 1 jam</p><p class="qz-opt__sub">Butuh waktu untuk masuk ritme</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q2]" value="1jam" style="display:none">
        </label>
        <label class="qz-opt" data-q="q2" data-v="lebih">
            <div class="qz-opt__icon">🔥</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Lebih dari 1 jam</p><p class="qz-opt__sub">Deep focus, marathon belajar</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q2]" value="lebih" style="display:none">
        </label>
    </div>
</div>

<div class="qz-step" data-step="3">
    <div class="qz-qcard">
        <div class="qz-qcard__illus" style="background:#fff7ed;">
            <svg class="qz-qcard__svg" viewBox="0 0 80 80" fill="none">
                <circle cx="40" cy="40" r="38" fill="#fed7aa"/>
                <rect x="20" y="25" width="40" height="32" rx="6" fill="#fff" stroke="#ea580c" stroke-width="1.5"/>
                <path d="M28 35 h24 M28 41 h18 M28 47 h12" stroke="#fb923c" stroke-width="2" stroke-linecap="round"/>
                <circle cx="57" cy="27" r="8" fill="#ea580c"/>
                <path d="M53 27 l3 3 5-5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="qz-qcard__body">
            <span class="qz-step-badge" style="color:#c2410c;background:#fed7aa;">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none"><circle cx="4" cy="4" r="3" fill="#ea580c"/></svg>
                Soal 3 dari 7
            </span>
            <h2 class="qz-qcard__q">Apa yang kamu lakukan saat lupa materi yang sudah dipelajari?</h2>
            <p class="qz-qcard__hint">Reaksi spontanmu mencerminkan strategi belajarmu yang sesungguhnya.</p>
        </div>
    </div>
    <div class="qz-options">
        <label class="qz-opt" data-q="q3" data-v="baca_ulang">
            <div class="qz-opt__icon">📚</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Baca ulang catatanku</p><p class="qz-opt__sub">Kembali ke sumber aslinya</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q3]" value="baca_ulang" style="display:none">
        </label>
        <label class="qz-opt" data-q="q3" data-v="rangkum">
            <div class="qz-opt__icon">✏️</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Tulis ulang poin-poinnya</p><p class="qz-opt__sub">Rangkum tanpa lihat catatan</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q3]" value="rangkum" style="display:none">
        </label>
        <label class="qz-opt" data-q="q3" data-v="tanya">
            <div class="qz-opt__icon">🗣️</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Tanya teman atau guru</p><p class="qz-opt__sub">Minta penjelasan ulang</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q3]" value="tanya" style="display:none">
        </label>
        <label class="qz-opt" data-q="q3" data-v="latihan">
            <div class="qz-opt__icon">🎯</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Kerjakan soal latihan</p><p class="qz-opt__sub">Uji ingatan lewat praktek</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q3]" value="latihan" style="display:none">
        </label>
    </div>
</div>

<div class="qz-step" data-step="4">
    <div class="qz-qcard">
        <div class="qz-qcard__illus" style="background:#fdf4ff;">
            <svg class="qz-qcard__svg" viewBox="0 0 80 80" fill="none">
                <circle cx="40" cy="40" r="38" fill="#e9d5ff"/>
                <rect x="18" y="30" width="22" height="28" rx="4" stroke="#7c3aed" stroke-width="1.5" fill="#a855f7" fill-opacity=".2"/>
                <path d="M22 38 h14 M22 44 h10 M22 50 h12" stroke="#7c3aed" stroke-width="1.5" stroke-linecap="round"/>
                <rect x="44" y="20" width="18" height="22" rx="4" fill="#c4b5fd" fill-opacity=".5"/>
                <path d="M47 28 h12 M47 34 h8" stroke="#5b21b6" stroke-width="1.3" stroke-linecap="round"/>
                <circle cx="55" cy="56" r="10" fill="#7c3aed"/>
                <path d="M51 56 l3 3 6-6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="qz-qcard__body">
            <span class="qz-step-badge" style="color:#6d28d9;background:#ede9fe;">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none"><circle cx="4" cy="4" r="3" fill="#7c3aed"/></svg>
                Soal 4 dari 7
            </span>
            <h2 class="qz-qcard__q">Lingkungan belajar seperti apa yang paling membuatmu produktif?</h2>
            <p class="qz-qcard__hint">Tidak ada jawaban benar atau salah — percayai insting-mu.</p>
        </div>
    </div>
    <div class="qz-options">
        <label class="qz-opt" data-q="q4" data-v="tenang">
            <div class="qz-opt__icon">🤫</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Sunyi dan tenang</p><p class="qz-opt__sub">Perpustakaan, kamar sendiri</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q4]" value="tenang" style="display:none">
        </label>
        <label class="qz-opt" data-q="q4" data-v="musik">
            <div class="qz-opt__icon">🎵</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Musik instrumental</p><p class="qz-opt__sub">Lo-fi, klasik, atau white noise</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q4]" value="musik" style="display:none">
        </label>
        <label class="qz-opt" data-q="q4" data-v="ramai">
            <div class="qz-opt__icon">☕</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Suasana ramai / kafe</p><p class="qz-opt__sub">Kebisingan rendah malah membantu</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q4]" value="ramai" style="display:none">
        </label>
        <label class="qz-opt" data-q="q4" data-v="alam">
            <div class="qz-opt__icon">🌿</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Di alam terbuka</p><p class="qz-opt__sub">Taman, pantai, atau tempat segar</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q4]" value="alam" style="display:none">
        </label>
    </div>
</div>

<div class="qz-step" data-step="5">
    <div class="qz-qcard">
        <div class="qz-qcard__illus" style="background:#ecfeff;">
            <svg class="qz-qcard__svg" viewBox="0 0 80 80" fill="none">
                <circle cx="40" cy="40" r="38" fill="#cffafe"/>
                <rect x="22" y="22" width="36" height="36" rx="8" fill="#67e8f9" fill-opacity=".35"/>
                <path d="M31 40 l6 6 12-12" stroke="#0891b2" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="40" cy="40" r="13" stroke="#0891b2" stroke-width="1.5" fill="none"/>
            </svg>
        </div>
        <div class="qz-qcard__body">
            <span class="qz-step-badge" style="color:#0e7490;background:#cffafe;">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none"><circle cx="4" cy="4" r="3" fill="#0891b2"/></svg>
                Soal 5 dari 7
            </span>
            <h2 class="qz-qcard__q">Bagaimana caramu menguji seberapa baik kamu memahami suatu materi?</h2>
            <p class="qz-qcard__hint">Metode evaluasi yang kamu pilih menunjukkan gaya kognitifmu.</p>
        </div>
    </div>
    <div class="qz-options">
        <label class="qz-opt" data-q="q5" data-v="latihan">
            <div class="qz-opt__icon">📝</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Kerjakan soal latihan</p><p class="qz-opt__sub">Tes diri tanpa melihat catatan</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q5]" value="latihan" style="display:none">
        </label>
        <label class="qz-opt" data-q="q5" data-v="tutor">
            <div class="qz-opt__icon">🧑‍🏫</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Jelaskan ke orang lain</p><p class="qz-opt__sub">Kalau bisa ngajarin, berarti paham</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q5]" value="tutor" style="display:none">
        </label>
        <label class="qz-opt" data-q="q5" data-v="tulis_ulang">
            <div class="qz-opt__icon">🗒️</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Tulis ulang tanpa referensi</p><p class="qz-opt__sub">Lembar kosong jadi ujian sesungguhnya</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q5]" value="tulis_ulang" style="display:none">
        </label>
        <label class="qz-opt" data-q="q5" data-v="jadwal">
            <div class="qz-opt__icon">🗓️</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Review berkala terjadwal</p><p class="qz-opt__sub">Ulang materi di hari-hari berikutnya</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q5]" value="jadwal" style="display:none">
        </label>
    </div>
</div>

<div class="qz-step" data-step="6">
    <div class="qz-qcard">
        <div class="qz-qcard__illus" style="background:#fefce8;">
            <svg class="qz-qcard__svg" viewBox="0 0 80 80" fill="none">
                <circle cx="40" cy="40" r="38" fill="#fef08a"/>
                <circle cx="40" cy="30" r="12" fill="#fbbf24" fill-opacity=".5"/>
                <path d="M40 18 v4 M40 42 v4 M28 30 h4 M52 30 h4" stroke="#b45309" stroke-width="2" stroke-linecap="round"/>
                <path d="M40 30 L40 23" stroke="#1e3a20" stroke-width="2.5" stroke-linecap="round"/>
                <path d="M40 30 L46 30" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/>
                <circle cx="40" cy="30" r="2" fill="#1e3a20"/>
                <rect x="25" y="55" width="30" height="8" rx="4" fill="#fde68a" stroke="#d97706" stroke-width="1.2"/>
                <path d="M30 55 l5-8 M50 55 l-5-8" stroke="#d97706" stroke-width="1.2" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="qz-qcard__body">
            <span class="qz-step-badge" style="color:#92400e;background:#fef9c3;">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none"><circle cx="4" cy="4" r="3" fill="#d97706"/></svg>
                Soal 6 dari 7
            </span>
            <h2 class="qz-qcard__q">Kapan waktu belajar yang paling efektif bagimu?</h2>
            <p class="qz-qcard__hint">Setiap orang punya jam biologis produktivitas yang berbeda.</p>
        </div>
    </div>
    <div class="qz-options">
        <label class="qz-opt" data-q="q6" data-v="pagi">
            <div class="qz-opt__icon">🌅</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Pagi hari (05–10 pagi)</p><p class="qz-opt__sub">Pikiran segar setelah bangun tidur</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q6]" value="pagi" style="display:none">
        </label>
        <label class="qz-opt" data-q="q6" data-v="siang">
            <div class="qz-opt__icon">☀️</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Siang hari (10–14 siang)</p><p class="qz-opt__sub">Energi penuh, paling produktif</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q6]" value="siang" style="display:none">
        </label>
        <label class="qz-opt" data-q="q6" data-v="sore">
            <div class="qz-opt__icon">🌇</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Sore hari (14–18 sore)</p><p class="qz-opt__sub">Setelah aktivitas harian selesai</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q6]" value="sore" style="display:none">
        </label>
        <label class="qz-opt" data-q="q6" data-v="malam">
            <div class="qz-opt__icon">🌙</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Malam hari (19+ malam)</p><p class="qz-opt__sub">Suasana tenang, lebih mudah fokus</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q6]" value="malam" style="display:none">
        </label>
    </div>
</div>

<div class="qz-step" data-step="7">
    <div class="qz-qcard">
        <div class="qz-qcard__illus" style="background:#fff1f2;">
            <svg class="qz-qcard__svg" viewBox="0 0 80 80" fill="none">
                <circle cx="40" cy="40" r="38" fill="#fecdd3"/>
                <path d="M40 18 l5 10 11 1.6-8 7.8 1.9 11L40 43l-9.9 5.4 1.9-11-8-7.8 11-1.6L40 18z" fill="#fb7185" stroke="#e11d48" stroke-width="1.5" stroke-linejoin="round"/>
                <circle cx="40" cy="58" r="7" fill="#e11d48"/>
                <path d="M37 58 l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="qz-qcard__body">
            <span class="qz-step-badge" style="color:#be123c;background:#ffe4e6;">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none"><circle cx="4" cy="4" r="3" fill="#e11d48"/></svg>
                Soal 7 dari 7
            </span>
            <h2 class="qz-qcard__q">Apa tujuan utama belajarmu saat ini?</h2>
            <p class="qz-qcard__hint">Soal terakhir! Tujuanmu menentukan strategi belajar yang paling cocok.</p>
        </div>
    </div>
    <div class="qz-options">
        <label class="qz-opt" data-q="q7" data-v="ujian">
            <div class="qz-opt__icon">📋</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Persiapan ujian / tes</p><p class="qz-opt__sub">Nilai tinggi dalam waktu singkat</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q7]" value="ujian" style="display:none">
        </label>
        <label class="qz-opt" data-q="q7" data-v="pemahaman">
            <div class="qz-opt__icon">💡</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Pemahaman mendalam</p><p class="qz-opt__sub">Benar-benar mengerti, bukan hafal</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q7]" value="pemahaman" style="display:none">
        </label>
        <label class="qz-opt" data-q="q7" data-v="skill">
            <div class="qz-opt__icon">🛠️</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Mengembangkan skill</p><p class="qz-opt__sub">Kemampuan yang bisa langsung dipakai</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q7]" value="skill" style="display:none">
        </label>
        <label class="qz-opt" data-q="q7" data-v="hafal">
            <div class="qz-opt__icon">🧠</div>
            <div class="qz-opt__text"><p class="qz-opt__label">Hafal banyak informasi</p><p class="qz-opt__sub">Retensi jangka panjang materi</p></div>
            <div class="qz-opt__check"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <input type="radio" name="answers[q7]" value="hafal" style="display:none">
        </label>
    </div>
</div>

</form>
</div>
</div>

<div class="qz-bottom">
    <div class="qz-bottom__inner">
        <button class="qz-btn-next" id="btnNext" disabled>
            Selanjutnya
            <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
        <div class="qz-hint-pill">
            <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><circle cx="7" cy="7" r="6" stroke="#64748b" stroke-width="1.2"/><path d="M7 4.5v3M7 9v.5" stroke="#64748b" stroke-width="1.3" stroke-linecap="round"/></svg>
            Jawabanmu membantu kami menyesuaikan metode belajarmu.
        </div>
    </div>
</div>

<script>
(function () {
    var TOTAL = 7;
    var current = 1;
    var answers = {};
    var progressBar = document.getElementById('progressBar');
    var pctLabel = document.getElementById('pctLabel');
    var btnNext = document.getElementById('btnNext');
    var form = document.getElementById('quizForm');

    function updateProgress() {
        var pct = Math.round(((current - 1) / TOTAL) * 100);
        progressBar.style.width = pct + '%';
        pctLabel.textContent = pct + '%';
    }

    function getStep(n) { return document.querySelector('.qz-step[data-step="' + n + '"]'); }

    function enableNext() { btnNext.disabled = !answers['q' + current]; }

    document.querySelectorAll('.qz-opt').forEach(function(opt) {
        opt.addEventListener('click', function() {
            var q = this.dataset.q;
            var v = this.dataset.v;
            document.querySelectorAll('.qz-opt[data-q="' + q + '"]').forEach(function(o) { o.classList.remove('selected'); });
            this.classList.add('selected');
            this.querySelector('input').checked = true;
            answers[q] = v;
            enableNext();
        });
    });

    btnNext.addEventListener('click', function() {
        if (!answers['q' + current]) return;
        if (current === TOTAL) { form.submit(); return; }

        var curStep = getStep(current);
        var nextStep = getStep(current + 1);
        curStep.classList.add('exit');
        setTimeout(function() {
            curStep.classList.remove('active', 'exit');
            current++;
            nextStep.classList.add('active');
            updateProgress();
            enableNext();
            if (current === TOTAL) {
                btnNext.innerHTML = 'Lihat Hasilku <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>';
            }
        }, 300);
    });

    updateProgress();
    enableNext();
})();
</script>
@endsection
