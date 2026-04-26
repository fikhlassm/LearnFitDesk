@extends('layouts.app')

@section('content')

<div class="dash-page">

    {{-- SIDEBAR --}}
    <aside class="sidebar">
        <div class="sidebar__brand">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
                <rect width="28" height="28" rx="8" fill="#2563EB"/>
                <path d="M8 10h12M8 14h8M8 18h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <div>
                <p class="sidebar__brand-name">LearnFit</p>
                <p class="sidebar__brand-sub">Platform Belajar Anda</p>
            </div>
        </div>

        <nav class="sidebar__nav">
            <a href="{{ route('dashboard.pengajar') }}" class="sidebar__link">
                <svg width="18" height="18" viewBox="0 0 20 20" fill="none"><rect x="2" y="2" width="7" height="7" rx="1.5" fill="currentColor"/><rect x="11" y="2" width="7" height="7" rx="1.5" fill="currentColor" opacity=".4"/><rect x="2" y="11" width="7" height="7" rx="1.5" fill="currentColor" opacity=".4"/><rect x="11" y="11" width="7" height="7" rx="1.5" fill="currentColor" opacity=".4"/></svg>
                Beranda
            </a>
            <a href="{{ route('dashboard.kelas') }}" class="sidebar__link sidebar__link--active">
                <svg width="18" height="18" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="6" r="3.5" stroke="currentColor" stroke-width="1.6"/><path d="M3 18c0-3.31 3.13-6 7-6s7 2.69 7 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="15.5" cy="7.5" r="2.5" fill="currentColor" opacity=".3"/></svg>
                Kelas Saya
            </a>
            <a href="#" class="sidebar__link">
                <svg width="18" height="18" viewBox="0 0 20 20" fill="none"><rect x="2" y="3" width="16" height="15" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M6 1v4M14 1v4M2 8h16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                Jadwal
            </a>
            <a href="#" class="sidebar__link">
                <svg width="18" height="18" viewBox="0 0 20 20" fill="none"><rect x="2" y="3" width="16" height="14" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M6 8h8M6 11h5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M15 14l1.5 1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                Tugas & Penilaian
            </a>
            <a href="#" class="sidebar__link">
                <svg width="18" height="18" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="7" r="3.5" stroke="currentColor" stroke-width="1.6"/><path d="M3 18c0-3.31 3.13-6 7-6s7 2.69 7 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                Profil
            </a>
        </nav>

        <div class="sidebar__user">
            <div class="sidebar__avatar">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="7" r="3.5" stroke="#64748b" stroke-width="1.5"/><path d="M3 18c0-3.31 3.13-6 7-6s7 2.69 7 6" stroke="#64748b" stroke-width="1.5" stroke-linecap="round"/></svg>
            </div>
            <div>
                <p class="sidebar__user-name">{{ Auth::user()->name }}</p>
                <p class="sidebar__user-role">Pengajar</p>
            </div>
        </div>
    </aside>

    {{-- MAIN --}}
    <main class="dash-main">

        {{-- TOP BAR --}}
        <div class="topbar">
            <div>
                <h1 class="topbar__title">Kelas Saya</h1>
                <p class="topbar__sub">Kelola dan pantau aktivitas kelas yang Anda ampu semester ini.</p>
            </div>
            <div class="topbar__right">
                <div class="search-box">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="6.5" cy="6.5" r="5" stroke="#94a3b8" stroke-width="1.5"/><path d="M10.5 10.5l3 3" stroke="#94a3b8" stroke-width="1.5" stroke-linecap="round"/></svg>
                    <input type="text" placeholder="Cari kelas..." id="searchKelas">
                </div>
                <button class="topbar__icon-btn" aria-label="Notifikasi" style="position:relative;">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none"><path d="M10 2a6 6 0 00-6 6v2.586l-1.707 1.707A1 1 0 003 14h14a1 1 0 00.707-1.707L16 10.586V8a6 6 0 00-6-6z" stroke="#475569" stroke-width="1.5"/><path d="M8 14a2 2 0 004 0" stroke="#475569" stroke-width="1.5" stroke-linecap="round"/></svg>
                    <span class="notif-dot"></span>
                </button>
                <button class="topbar__icon-btn" aria-label="Pengaturan">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="2.5" stroke="#475569" stroke-width="1.5"/><path d="M10 2v2M10 16v2M2 10h2M16 10h2M4.22 4.22l1.42 1.42M14.36 14.36l1.42 1.42M4.22 15.78l1.42-1.42M14.36 5.64l1.42-1.42" stroke="#475569" stroke-width="1.5" stroke-linecap="round"/></svg>
                </button>
            </div>
        </div>

        {{-- ACTION BAR --}}
        <div class="action-bar">
            <div class="filter-tabs">
                <button class="filter-tab filter-tab--active" data-filter="semua">Semua</button>
                <button class="filter-tab" data-filter="aktif">Aktif</button>
                <button class="filter-tab" data-filter="draft">Draft</button>
            </div>
            <div class="action-bar__right">
                <div class="semester-select">
                    <span>Semester Ganjil 2023/2024</span>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 5l4 4 4-4" stroke="#475569" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
                <button class="btn-tambah-kelas">
                    <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M8 3v10M3 8h10" stroke="white" stroke-width="1.8" stroke-linecap="round"/></svg>
                    Mulai Kelas Baru
                </button>
            </div>
        </div>

        {{-- KELAS GRID --}}
        <div class="kelas-grid" id="kelasGrid">

            {{-- Kelas 1: Aktif --}}
            <div class="kelas-card" data-status="aktif" data-nama="kalkulus">
                <div class="kelas-card__thumb kelas-card__thumb--1">
                    <span class="kelas-status kelas-status--aktif">● Aktif</span>
                </div>
                <div class="kelas-card__body">
                    <span class="kelas-code">MAT-101</span>
                    <h3 class="kelas-name">Kalkulus I</h3>
                    <p class="kelas-desc">Konsep dasar limit, turunan, dan integral dengan aplikasi pada sains…</p>
                    <div class="kelas-meta">
                        <span class="kelas-meta__item">
                            <svg width="13" height="13" viewBox="0 0 14 14" fill="none"><path d="M2 12c0-2.76 2.24-5 5-5s5 2.24 5 5" stroke="#94a3b8" stroke-width="1.3" stroke-linecap="round"/><circle cx="7" cy="4.5" r="2.5" stroke="#94a3b8" stroke-width="1.3"/></svg>
                            45 Mahasiswa
                        </span>
                        <span class="kelas-meta__item">
                            <svg width="13" height="13" viewBox="0 0 14 14" fill="none"><rect x="1" y="2" width="12" height="11" rx="1.5" stroke="#94a3b8" stroke-width="1.3"/><path d="M4 1v2M10 1v2M1 6h12" stroke="#94a3b8" stroke-width="1.3" stroke-linecap="round"/></svg>
                            Sesi: Besok, 08:00 WIB
                        </span>
                    </div>
                    <div class="kelas-card__foot">
                        <div class="kelas-avatars">
                            <span class="kelas-avatar">A</span>
                            <span class="kelas-avatar">B</span>
                            <span class="kelas-avatar kelas-avatar--more">+43</span>
                        </div>
                        <a href="#" class="btn-lihat-detail">Lihat Detail →</a>
                    </div>
                </div>
            </div>

            {{-- Kelas 2: Aktif --}}
            <div class="kelas-card" data-status="aktif" data-nama="statistika">
                <div class="kelas-card__thumb kelas-card__thumb--2">
                    <span class="kelas-status kelas-status--aktif">● Aktif</span>
                </div>
                <div class="kelas-card__body">
                    <span class="kelas-code">STA-205</span>
                    <h3 class="kelas-name">Statistika Dasar</h3>
                    <p class="kelas-desc">Pengantar probabilitas, distribusi data, dan pengujian hipotesis untuk…</p>
                    <div class="kelas-meta">
                        <span class="kelas-meta__item">
                            <svg width="13" height="13" viewBox="0 0 14 14" fill="none"><path d="M2 12c0-2.76 2.24-5 5-5s5 2.24 5 5" stroke="#94a3b8" stroke-width="1.3" stroke-linecap="round"/><circle cx="7" cy="4.5" r="2.5" stroke="#94a3b8" stroke-width="1.3"/></svg>
                            32 Mahasiswa
                        </span>
                        <span class="kelas-meta__item">
                            <svg width="13" height="13" viewBox="0 0 14 14" fill="none"><rect x="1" y="2" width="12" height="11" rx="1.5" stroke="#94a3b8" stroke-width="1.3"/><path d="M4 1v2M10 1v2M1 6h12" stroke="#94a3b8" stroke-width="1.3" stroke-linecap="round"/></svg>
                            Sesi: Lusa, 10:00 WIB
                        </span>
                    </div>
                    <div class="kelas-card__foot">
                        <div class="kelas-avatars">
                            <span class="kelas-avatar">C</span>
                            <span class="kelas-avatar">D</span>
                            <span class="kelas-avatar kelas-avatar--more">+30</span>
                        </div>
                        <a href="#" class="btn-lihat-detail">Lihat Detail →</a>
                    </div>
                </div>
            </div>

            {{-- Kelas 3: Draft --}}
            <div class="kelas-card" data-status="draft" data-nama="fisika">
                <div class="kelas-card__thumb kelas-card__thumb--3">
                    <span class="kelas-status kelas-status--draft">● Draft</span>
                </div>
                <div class="kelas-card__body">
                    <span class="kelas-code">FIS-301</span>
                    <h3 class="kelas-name">Fisika Kuantum</h3>
                    <p class="kelas-desc">Mekanika gelombang, persamaan Schrödinger, dan aplikasi pada…</p>
                    <div class="kelas-meta">
                        <span class="kelas-meta__item kelas-meta__item--empty">
                            <svg width="13" height="13" viewBox="0 0 14 14" fill="none"><path d="M2 12c0-2.76 2.24-5 5-5s5 2.24 5 5" stroke="#cbd5e1" stroke-width="1.3" stroke-linecap="round"/><circle cx="7" cy="4.5" r="2.5" stroke="#cbd5e1" stroke-width="1.3"/></svg>
                            Belum ada mahasiswa
                        </span>
                        <span class="kelas-meta__item kelas-meta__item--empty">
                            <svg width="13" height="13" viewBox="0 0 14 14" fill="none"><rect x="1" y="2" width="12" height="11" rx="1.5" stroke="#cbd5e1" stroke-width="1.3"/><path d="M4 1v2M10 1v2M1 6h12" stroke="#cbd5e1" stroke-width="1.3" stroke-linecap="round"/></svg>
                            Jadwal belum ditentukan
                        </span>
                    </div>
                    <div class="kelas-card__foot">
                        <button class="btn-tambah-mhs">
                            <svg width="13" height="13" viewBox="0 0 14 14" fill="none"><path d="M7 3v8M3 7h8" stroke="#2563EB" stroke-width="1.6" stroke-linecap="round"/></svg>
                        </button>
                        <a href="#" class="btn-edit-draf">Edit Draf ✏</a>
                    </div>
                </div>
            </div>

        </div>

        {{-- EMPTY STATE (tersembunyi, muncul kalau filter kosong) --}}
        <div class="empty-state" id="emptyState" style="display:none;">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><rect x="4" y="8" width="40" height="32" rx="4" stroke="#CBD5E1" stroke-width="2"/><path d="M16 24h16M16 30h10" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round"/></svg>
            <p class="empty-state__text">Tidak ada kelas ditemukan</p>
        </div>

    </main>
</div>

<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}

.dash-page{
    display:flex;
    min-height:100vh;
    font-family:'Plus Jakarta Sans',sans-serif;
    background:#F1F5F9;
    color:#0F172A;
}

/* ── SIDEBAR (sama persis dgn pengajar) ── */
.sidebar{
    width:240px;flex-shrink:0;
    background:#fff;border-right:1px solid #E2E8F0;
    display:flex;flex-direction:column;
    padding:1.25rem 0;
    position:sticky;top:0;height:100vh;overflow-y:auto;
}
.sidebar__brand{
    display:flex;align-items:center;gap:.7rem;
    padding:.25rem 1.25rem 1.25rem;
    border-bottom:1px solid #F1F5F9;margin-bottom:.5rem;
}
.sidebar__brand-name{font-size:.95rem;font-weight:700;color:#0F172A;line-height:1.2;}
.sidebar__brand-sub{font-size:.68rem;color:#94A3B8;}
.sidebar__nav{flex:1;display:flex;flex-direction:column;gap:.15rem;padding:.5rem .75rem;}
.sidebar__link{
    display:flex;align-items:center;gap:.7rem;
    padding:.65rem .85rem;border-radius:10px;
    text-decoration:none;font-size:.85rem;font-weight:500;color:#475569;
    transition:background .18s,color .18s;
}
.sidebar__link:hover{background:#F8FAFC;color:#2563EB;}
.sidebar__link--active{background:#EFF6FF;color:#2563EB;font-weight:600;}
.sidebar__link:active{background:#DBEAFE;}

.sidebar__user{
    display:flex;align-items:center;gap:.7rem;
    padding:.85rem 1.25rem;border-top:1px solid #F1F5F9;
    border-radius:10px;margin:.5rem .75rem 0;
    transition:background .18s;cursor:pointer;
}
.sidebar__user:hover{background:#F8FAFC;}
.sidebar__avatar{
    width:36px;height:36px;border-radius:50%;
    background:#E2E8F0;
    display:flex;align-items:center;justify-content:center;flex-shrink:0;
}
.sidebar__user-name{font-size:.82rem;font-weight:600;color:#0F172A;}
.sidebar__user-role{font-size:.68rem;color:#94A3B8;}

/* ── MAIN ── */
.dash-main{
    flex:1;display:flex;flex-direction:column;
    padding:1.5rem 2rem;gap:1.25rem;overflow-x:hidden;
}

/* ── TOPBAR ── */
.topbar{display:flex;align-items:center;justify-content:space-between;gap:1rem;}
.topbar__title{font-size:1.5rem;font-weight:800;color:#0F172A;letter-spacing:-.03em;}
.topbar__sub{font-size:.83rem;color:#64748B;margin-top:.1rem;}
.topbar__right{display:flex;align-items:center;gap:.6rem;}
.search-box{
    display:flex;align-items:center;gap:.5rem;
    background:#fff;border:1px solid #E2E8F0;
    border-radius:10px;padding:.5rem .9rem;width:220px;
    transition:border-color .18s,box-shadow .18s;
}
.search-box:focus-within{border-color:#2563EB;box-shadow:0 0 0 3px rgba(37,99,235,.10);}
.search-box input{border:none;outline:none;font-size:.83rem;color:#0F172A;font-family:inherit;width:100%;background:transparent;}
.search-box input::placeholder{color:#94A3B8;}
.topbar__icon-btn{
    width:38px;height:38px;border:1px solid #E2E8F0;
    background:#fff;border-radius:10px;
    display:flex;align-items:center;justify-content:center;
    cursor:pointer;transition:background .18s,transform .15s;
}
.topbar__icon-btn:hover{background:#F1F5F9;}
.topbar__icon-btn:active{background:#E2E8F0;transform:scale(.93);}
.notif-dot{
    position:absolute;top:7px;right:7px;
    width:8px;height:8px;border-radius:50%;
    background:#EF4444;border:1.5px solid #fff;
}

/* ── ACTION BAR ── */
.action-bar{
    display:flex;align-items:center;justify-content:space-between;gap:1rem;
    flex-wrap:wrap;
}
.filter-tabs{display:flex;gap:.35rem;background:#fff;border:1px solid #E2E8F0;border-radius:10px;padding:.3rem;}
.filter-tab{
    padding:.38rem .9rem;border-radius:7px;border:none;
    background:transparent;font-size:.8rem;font-weight:500;color:#64748B;
    cursor:pointer;font-family:inherit;transition:background .18s,color .18s;
}
.filter-tab:hover{background:#F1F5F9;color:#0F172A;}
.filter-tab--active{background:#EFF6FF;color:#2563EB;font-weight:600;}
.action-bar__right{display:flex;align-items:center;gap:.6rem;}
.semester-select{
    display:flex;align-items:center;gap:.4rem;
    padding:.45rem .9rem;border-radius:10px;
    border:1px solid #E2E8F0;background:#fff;
    font-size:.8rem;font-weight:500;color:#475569;
    cursor:pointer;transition:border-color .18s;
}
.semester-select:hover{border-color:#2563EB;}
.btn-tambah-kelas{
    display:flex;align-items:center;gap:.45rem;
    padding:.5rem 1.1rem;border-radius:10px;
    background:#2563EB;color:#fff;border:none;
    font-size:.83rem;font-weight:600;font-family:inherit;
    cursor:pointer;transition:background .18s,transform .15s,box-shadow .18s;
}
.btn-tambah-kelas:hover{background:#1d4ed8;box-shadow:0 4px 14px rgba(37,99,235,.3);transform:translateY(-1px);}
.btn-tambah-kelas:active{transform:scale(.96);background:#1e40af;}

/* ── KELAS GRID ── */
.kelas-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:1.1rem;
}

.kelas-card{
    background:#fff;border:1px solid #E2E8F0;
    border-radius:16px;overflow:hidden;
    display:flex;flex-direction:column;
    transition:box-shadow .22s,transform .22s,border-color .22s;
    animation: fadeInUp .35s ease both;
}
.kelas-card:hover{
    box-shadow:0 8px 28px rgba(37,99,235,.12);
    transform:translateY(-3px);
    border-color:#BFDBFE;
}

@keyframes fadeInUp{
    from{opacity:0;transform:translateY(16px);}
    to{opacity:1;transform:translateY(0);}
}
.kelas-card:nth-child(1){animation-delay:.05s;}
.kelas-card:nth-child(2){animation-delay:.12s;}
.kelas-card:nth-child(3){animation-delay:.19s;}

/* Thumbnails */
.kelas-card__thumb{
    height:130px;position:relative;
    display:flex;align-items:flex-end;justify-content:flex-end;
    padding:.7rem;
}
.kelas-card__thumb--1{background:linear-gradient(135deg,#1e3a5f 0%,#2d6a9f 60%,#4a90c4 100%);}
.kelas-card__thumb--2{background:linear-gradient(135deg,#1a3a4a 0%,#2a6080 60%,#3d8fb5 100%);}
.kelas-card__thumb--3{background:linear-gradient(135deg,#1f2d3d 0%,#2c3e50 60%,#4a6278 100%);}

/* Status badge */
.kelas-status{
    font-size:.68rem;font-weight:700;
    padding:.22rem .65rem;border-radius:99px;
}
.kelas-status--aktif{background:rgba(255,255,255,.9);color:#15803D;}
.kelas-status--draft{background:rgba(255,255,255,.9);color:#64748B;}

/* Card body */
.kelas-card__body{
    padding:1rem 1.1rem 1rem;
    display:flex;flex-direction:column;gap:.45rem;flex:1;
}
.kelas-code{
    font-size:.7rem;font-weight:700;color:#2563EB;
    background:#EFF6FF;padding:.18rem .55rem;border-radius:6px;
    width:fit-content;
}
.kelas-name{font-size:1rem;font-weight:700;color:#0F172A;}
.kelas-desc{font-size:.78rem;color:#64748B;line-height:1.5;}
.kelas-meta{display:flex;flex-direction:column;gap:.3rem;margin-top:.1rem;}
.kelas-meta__item{
    display:flex;align-items:center;gap:.35rem;
    font-size:.75rem;color:#64748B;
}
.kelas-meta__item--empty{color:#CBD5E1;}

/* Footer card */
.kelas-card__foot{
    display:flex;align-items:center;justify-content:space-between;
    margin-top:.5rem;padding-top:.75rem;
    border-top:1px solid #F1F5F9;
}
.kelas-avatars{display:flex;align-items:center;}
.kelas-avatar{
    width:26px;height:26px;border-radius:50%;
    background:#DBEAFE;color:#1D4ED8;
    font-size:.65rem;font-weight:700;
    display:flex;align-items:center;justify-content:center;
    border:2px solid #fff;margin-left:-6px;
}
.kelas-avatar:first-child{margin-left:0;}
.kelas-avatar--more{background:#F1F5F9;color:#64748B;}

.btn-lihat-detail{
    font-size:.78rem;font-weight:600;color:#2563EB;
    text-decoration:none;padding:.38rem .8rem;
    border-radius:8px;border:1.5px solid #DBEAFE;
    background:#EFF6FF;
    transition:background .18s,border-color .18s,transform .15s;
}
.btn-lihat-detail:hover{background:#DBEAFE;border-color:#93C5FD;transform:translateY(-1px);}
.btn-lihat-detail:active{transform:scale(.96);}

.btn-tambah-mhs{
    width:30px;height:30px;border-radius:8px;
    border:1.5px solid #DBEAFE;background:#EFF6FF;
    display:flex;align-items:center;justify-content:center;
    cursor:pointer;transition:background .18s,transform .15s;
}
.btn-tambah-mhs:hover{background:#DBEAFE;transform:scale(1.08);}

.btn-edit-draf{
    font-size:.78rem;font-weight:600;color:#475569;
    text-decoration:none;padding:.38rem .8rem;
    border-radius:8px;border:1.5px solid #E2E8F0;
    background:#fff;
    transition:color .18s,border-color .18s,transform .15s;
}
.btn-edit-draf:hover{color:#2563EB;border-color:#2563EB;transform:translateY(-1px);}
.btn-edit-draf:active{transform:scale(.96);}

/* ── EMPTY STATE ── */
.empty-state{
    display:flex;flex-direction:column;align-items:center;
    gap:.75rem;padding:3rem;color:#94A3B8;
}
.empty-state__text{font-size:.9rem;font-weight:500;}

/* ── RESPONSIVE ── */
@media(max-width:1100px){
    .kelas-grid{grid-template-columns:repeat(2,1fr);}
}
@media(max-width:900px){
    .sidebar{display:none;}
    .kelas-grid{grid-template-columns:1fr;}
}
@media(max-width:560px){
    .dash-main{padding:1rem;}
    .search-box{width:140px;}
    .action-bar{flex-direction:column;align-items:flex-start;}
}
</style>

<script>
// ── Filter tab ──
document.querySelectorAll('.filter-tab').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('filter-tab--active'));
        tab.classList.add('filter-tab--active');
        filterKelas();
    });
});

// ── Search ──
document.getElementById('searchKelas').addEventListener('input', filterKelas);

function filterKelas() {
    const activeFilter = document.querySelector('.filter-tab--active').dataset.filter;
    const keyword = document.getElementById('searchKelas').value.toLowerCase();
    const cards = document.querySelectorAll('.kelas-card');
    let visible = 0;

    cards.forEach(card => {
        const statusMatch = activeFilter === 'semua' || card.dataset.status === activeFilter;
        const nameMatch   = card.dataset.nama.includes(keyword) ||
                            card.querySelector('.kelas-name').textContent.toLowerCase().includes(keyword);
        if (statusMatch && nameMatch) {
            card.style.display = '';
            visible++;
        } else {
            card.style.display = 'none';
        }
    });

    document.getElementById('emptyState').style.display = visible === 0 ? 'flex' : 'none';
}
</script>

@endsection
