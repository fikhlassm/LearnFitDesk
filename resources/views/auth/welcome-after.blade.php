@extends('layouts.app')

@section('content')

<div class="welcome-page">

    <nav class="navbar container">
        <a href="/" class="navbar__brand">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
                <rect width="28" height="28" rx="8" fill="#2563EB"/>
                <path d="M8 10h12M8 14h8M8 18h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span class="navbar__brand-name">LearnFit</span>
        </a>
        <div class="navbar__actions">
            <button class="navbar__icon-btn" aria-label="Notifikasi">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 2a6 6 0 00-6 6v2.586l-1.707 1.707A1 1 0 003 14h14a1 1 0 00.707-1.707L16 10.586V8a6 6 0 00-6-6z" stroke="#64748b" stroke-width="1.5"/>
                    <path d="M8 14a2 2 0 004 0" stroke="#64748b" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </button>
            <button class="navbar__icon-btn" aria-label="Profil">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <circle cx="10" cy="7" r="3.5" stroke="#64748b" stroke-width="1.5"/>
                    <path d="M3 18c0-3.866 3.134-7 7-7s7 3.134 7 7" stroke="#64748b" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </nav>

    <div class="page-body container">

        {{-- LEFT COLUMN --}}
        <div class="col-left">

            <span class="chip">
                <svg width="13" height="13" viewBox="0 0 13 13" fill="none">
                    <path d="M6.5 1l1.2 2.4L10.5 4 8.7 5.7l.4 2.8L6.5 7.2 4 8.5l.4-2.8L2.5 4l2.8-.6L6.5 1z" fill="#FBBF24" stroke="#FBBF24" stroke-width=".3" stroke-linejoin="round"/>
                </svg>
                Akun berhasil dibuat
            </span>

            <h1 class="title">Selamat<br>Bergabung!</h1>
            <p class="sub">Langkah awal menuju cara belajar yang lebih cerdas dan efektif.</p>

            {{-- Stats --}}
            <div class="stats">
                <div class="stat"><span class="stat__n">12K+</span><span class="stat__l">Pelajar Aktif</span></div>
                <div class="stat__div"></div>
                <div class="stat"><span class="stat__n">200+</span><span class="stat__l">Materi</span></div>
                <div class="stat__div"></div>
                <div class="stat"><span class="stat__n">4.9</span><span class="stat__l">Rating</span></div>
            </div>

            {{-- Recommend card --}}
            <div class="rec-card">
                <div class="rec-card__top">
                    <span class="badge">Direkomendasikan</span>
                    <span class="rec-card__time">
                        <svg width="13" height="13" viewBox="0 0 14 14" fill="none"><circle cx="7" cy="7" r="6" stroke="#64748b" stroke-width="1.3"/><path d="M7 4v3.5l2 1.5" stroke="#64748b" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        5 Menit
                    </span>
                </div>
                <h2 class="rec-card__title">Cari Metode Belajarmu</h2>
                <p class="rec-card__desc">Ambil tes singkat untuk menemukan gaya belajar yang paling sesuai dengan kepribadian dan kebutuhan unikmu.</p>
                <div class="rec-card__actions">
                    <a href="#" class="btn-primary">Mulai Quiz <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                    <button class="btn-ghost">Lakukan Nanti</button>
                </div>
            </div>

            {{-- Quick links --}}
            <div class="ql-grid">
                <a href="#" class="ql">
                    <div class="ql__icon" style="background:#EFF6FF;">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none"><rect x="2" y="3" width="16" height="12" rx="2" stroke="#2563EB" stroke-width="1.5"/><path d="M6 8h8M6 11h5" stroke="#2563EB" stroke-width="1.3" stroke-linecap="round"/></svg>
                    </div>
                    <div><p class="ql__t">Materi Belajar</p><p class="ql__s">200+ topik</p></div>
                    <svg class="ql__arr" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M4 8h8M9 5l3 3-3 3" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <a href="#" class="ql">
                    <div class="ql__icon" style="background:#F0FDF4;">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="7.5" stroke="#16a34a" stroke-width="1.5"/><path d="M10 6v4l3 2" stroke="#16a34a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <div><p class="ql__t">Jadwal Belajar</p><p class="ql__s">Atur waktumu</p></div>
                    <svg class="ql__arr" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M4 8h8M9 5l3 3-3 3" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <a href="#" class="ql">
                    <div class="ql__icon" style="background:#FFF7ED;">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none"><path d="M10 2l2.4 5 5.6.8-4 3.9.9 5.3L10 14.5l-4.9 2.5.9-5.3L2 7.8l5.6-.8L10 2z" stroke="#EA580C" stroke-width="1.5" stroke-linejoin="round"/></svg>
                    </div>
                    <div><p class="ql__t">Pencapaian</p><p class="ql__s">Badge & sertifikat</p></div>
                    <svg class="ql__arr" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M4 8h8M9 5l3 3-3 3" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <a href="#" class="ql">
                    <div class="ql__icon" style="background:#FDF4FF;">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none"><path d="M3 5h14v8a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" stroke="#9333ea" stroke-width="1.5"/><path d="M7 9h6M7 12h3" stroke="#9333ea" stroke-width="1.3" stroke-linecap="round"/></svg>
                    </div>
                    <div><p class="ql__t">Forum Diskusi</p><p class="ql__s">Tanya & jawab</p></div>
                    <svg class="ql__arr" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M4 8h8M9 5l3 3-3 3" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>

        </div>

        {{-- RIGHT COLUMN --}}
        <div class="col-right">

            {{-- Illustration --}}
            <div class="illus-card">
                <div class="blob blob--1"></div>
                <div class="blob blob--2"></div>
                <svg class="illus-fig" viewBox="0 0 260 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="85" y="155" width="90" height="95" rx="20" fill="#4EB89D"/>
                    <rect x="112" y="140" width="36" height="24" rx="8" fill="#F5C5A3"/>
                    <ellipse cx="130" cy="112" rx="38" ry="38" fill="#F5C5A3"/>
                    <path d="M92 102c0-28 76-36 76-9" fill="#3D2B1F"/>
                    <ellipse cx="130" cy="78" rx="38" ry="17" fill="#3D2B1F"/>
                    <ellipse cx="117" cy="112" rx="5" ry="5.5" fill="#3D2B1F"/>
                    <ellipse cx="143" cy="112" rx="5" ry="5.5" fill="#3D2B1F"/>
                    <circle cx="119" cy="110" r="1.5" fill="white"/>
                    <circle cx="145" cy="110" r="1.5" fill="white"/>
                    <path d="M118 124 q12 9 24 0" stroke="#C87137" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                    <path d="M85 165 Q55 142 48 108" stroke="#4EB89D" stroke-width="22" stroke-linecap="round"/>
                    <ellipse cx="46" cy="100" rx="12" ry="13" fill="#F5C5A3"/>
                    <path d="M175 165 Q205 142 212 108" stroke="#4EB89D" stroke-width="22" stroke-linecap="round"/>
                    <ellipse cx="214" cy="100" rx="12" ry="13" fill="#F5C5A3"/>
                    <rect x="85" y="218" width="42" height="60" rx="10" fill="#2C3E6B"/>
                    <rect x="133" y="218" width="42" height="60" rx="10" fill="#2C3E6B"/>
                    <rect x="80" y="270" width="50" height="16" rx="8" fill="#1E2A45"/>
                    <rect x="130" y="270" width="50" height="16" rx="8" fill="#1E2A45"/>
                    <path d="M112 155 l18-14 18 14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
                <div class="badge-float badge-float--tl">
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"><path d="M6.5 1l1.2 2.4L10.5 4 8.7 5.7l.4 2.8L6.5 7.2 4 8.5l.4-2.8L2.5 4l2.8-.6L6.5 1z" fill="#FBBF24" stroke="#FBBF24" stroke-width=".3" stroke-linejoin="round"/></svg>
                    Mulai Belajar Hari Ini!
                </div>
                <div class="badge-float badge-float--br">
                    <svg width="13" height="13" viewBox="0 0 14 14" fill="none"><circle cx="7" cy="7" r="6" stroke="#2563EB" stroke-width="1.3"/><path d="M4.5 7l2 2L9.5 5" stroke="#2563EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Akun berhasil dibuat
                </div>
            </div>

            {{-- Steps --}}
            <div class="steps-card">
                <p class="steps-card__head">Mulai dari sini 👇</p>
                <div class="step">
                    <div class="step__dot step__dot--done">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <div><p class="step__t step__t--done">Buat akun</p><p class="step__s">Selesai!</p></div>
                </div>
                <div class="step__line"></div>
                <div class="step">
                    <div class="step__dot step__dot--active">2</div>
                    <div><p class="step__t step__t--active">Temukan gaya belajar</p><p class="step__s">Ikuti quiz singkat 5 menit</p></div>
                </div>
                <div class="step__line"></div>
                <div class="step">
                    <div class="step__dot">3</div>
                    <div><p class="step__t">Mulai belajar</p><p class="step__s">Akses ratusan materi</p></div>
                </div>
            </div>

            {{-- Tip box --}}
            <div class="tip-box">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="7" stroke="#2563EB" stroke-width="1.3"/><path d="M8 5v3.5M8 10.5v.5" stroke="#2563EB" stroke-width="1.5" stroke-linecap="round"/></svg>
                <p class="tip-box__text"><strong>Tips:</strong> Selesaikan quiz gaya belajar untuk mendapatkan rekomendasi materi yang personal.</p>
            </div>

        </div>

    </div>

    <footer class="footer container">
        <span>© {{ date('Y') }} LearnFit. Hak Cipta Dilindungi.</span>
        <div class="footer__links">
            <a href="#">Bantuan</a>
            <a href="#">Privasi</a>
            <a href="#">Syarat &amp; Ketentuan</a>
        </div>
    </footer>

</div>

<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}

.welcome-page{min-height:100vh;background:#d1dae4;display:flex;flex-direction:column;font-family:inherit;}

/* Navbar */
.navbar{display:flex;align-items:center;justify-content:space-between;padding:.9rem 2rem;background:#fff;border-bottom:1px solid #e2e8f0;}
.navbar__brand{display:flex;align-items:center;gap:.55rem;text-decoration:none;}
.navbar__brand-name{font-size:1.1rem;font-weight:700;color:#0f172a;letter-spacing:-.02em;}
.navbar__actions{display:flex;gap:.4rem;}
.navbar__icon-btn{width:36px;height:36px;border:none;background:#f1f5f9;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:background .2s;}
.navbar__icon-btn:hover{background:#e2e8f0;}

.container{width:100%;max-width:1100px;margin:0 auto;padding-inline:2rem;}

/* Page body: 2 columns */
.page-body{display:grid;grid-template-columns:1fr 340px;gap:2rem;padding-block:2rem 1.5rem;align-items:start;}

/* Left column stacks everything tightly */
.col-left{display:flex;flex-direction:column;gap:1rem;}
.col-right{display:flex;flex-direction:column;gap:.85rem;}

/* Chip */
.chip{display:inline-flex;align-items:center;gap:.4rem;background:#fefce8;color:#92400e;font-size:.72rem;font-weight:700;letter-spacing:.04em;padding:.28rem .8rem;border-radius:99px;border:1px solid #fde68a;width:fit-content;}

/* Title */
.title{font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#0f172a;line-height:1.1;letter-spacing:-.03em;}
.sub{font-size:.9rem;color:#64748b;line-height:1.6;max-width:400px;}

/* Stats */
.stats{display:flex;align-items:center;gap:1.25rem;background:#e2e8f0;border:1px solid #cbd5e1;border-radius:12px;padding:.75rem 1.25rem;}
.stat{display:flex;flex-direction:column;align-items:center;}
.stat__n{font-size:1.2rem;font-weight:800;color:#0f172a;letter-spacing:-.02em;}
.stat__l{font-size:.68rem;color:#94a3b8;font-weight:500;white-space:nowrap;}
.stat__div{width:1px;height:28px;background:#e2e8f0;}

/* Rec card */
.rec-card{background:#e2e8f0;border:1px solid #cbd5e1;border-radius:16px;padding:1.4rem;}
.rec-card__top{display:flex;align-items:center;justify-content:space-between;margin-bottom:.75rem;}
.badge{font-size:.65rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:.25rem .65rem;border-radius:99px;background:#dcfce7;color:#15803d;}
.rec-card__time{display:flex;align-items:center;gap:.3rem;font-size:.78rem;color:#64748b;font-weight:500;}
.rec-card__title{font-size:1.2rem;font-weight:700;color:#0f172a;margin-bottom:.4rem;letter-spacing:-.02em;}
.rec-card__desc{font-size:.85rem;color:#64748b;line-height:1.55;margin-bottom:1.1rem;}
.rec-card__actions{display:flex;align-items:center;gap:.6rem;}
.btn-primary{display:inline-flex;align-items:center;gap:.4rem;background:#2563EB;color:#fff;font-size:.85rem;font-weight:600;padding:.6rem 1.2rem;border-radius:10px;text-decoration:none;border:none;cursor:pointer;transition:background .2s,transform .15s;}
.btn-primary:hover{background:#1d4ed8;transform:translateY(-1px);}
.btn-ghost{background:#f1f5f9;color:#475569;font-size:.85rem;font-weight:600;padding:.6rem 1.2rem;border-radius:10px;border:none;cursor:pointer;transition:background .2s;}
.btn-ghost:hover{background:#e2e8f0;}

/* Quick links grid */
.ql-grid{display:grid;grid-template-columns:1fr 1fr;gap:.6rem;}
.ql{display:flex;align-items:center;gap:.7rem;background:#e2e8f0;border:1px solid #cbd5e1;border-radius:12px;padding:.75rem 1rem;text-decoration:none;transition:box-shadow .2s,transform .15s,border-color .2s;}
.ql:hover{box-shadow:0 4px 16px rgba(15,23,42,.07);transform:translateY(-1px);border-color:#cbd5e1;}
.ql__icon{width:36px;height:36px;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.ql__t{font-size:.83rem;font-weight:600;color:#0f172a;margin-bottom:.1rem;}
.ql__s{font-size:.7rem;color:#94a3b8;}
.ql__arr{margin-left:auto;flex-shrink:0;}

/* Illustration card */
.illus-card{position:relative;background:#e2e8f0;border:1px solid #cbd5e1;border-radius:20px;padding:1.75rem 1.5rem;display:flex;align-items:center;justify-content:center;overflow:visible;min-height:260px;}
.blob{position:absolute;border-radius:50%;opacity:.1;pointer-events:none;}
.blob--1{width:160px;height:160px;background:#2563EB;top:-25px;right:-25px;}
.blob--2{width:110px;height:110px;background:#4EB89D;bottom:-18px;left:-18px;}
.illus-fig{width:100%;max-width:180px;height:auto;position:relative;z-index:1;}
.badge-float{position:absolute;display:flex;align-items:center;gap:.35rem;background:#e2e8f0;border:1px solid #cbd5e1;border-radius:99px;padding:.35rem .8rem;font-size:.72rem;font-weight:600;color:#0f172a;box-shadow:0 3px 12px rgba(15,23,42,.07);white-space:nowrap;z-index:2;animation:fl 3s ease-in-out infinite;}
.badge-float--tl{top:12px;left:12px;animation-delay:0s;}
.badge-float--br{bottom:12px;right:12px;animation-delay:1.5s;}
@keyframes fl{0%,100%{transform:translateY(0)}50%{transform:translateY(-5px)}}

/* Steps card */
.steps-card{background:#e2e8f0;border:1px solid #cbd5e1;border-radius:16px;padding:1.1rem 1.25rem;}
.steps-card__head{font-size:.75rem;font-weight:700;color:#64748b;margin-bottom:.85rem;letter-spacing:.02em;}
.step{display:flex;align-items:center;gap:.75rem;}
.step__dot{width:26px;height:26px;border-radius:50%;background:#f1f5f9;border:1.5px solid #e2e8f0;display:flex;align-items:center;justify-content:center;font-size:.72rem;font-weight:700;color:#94a3b8;flex-shrink:0;}
.step__dot--done{background:#2563EB;border-color:#2563EB;}
.step__dot--active{background:#2563EB;border-color:#2563EB;color:#fff;}
.step__t{font-size:.83rem;font-weight:600;color:#475569;}
.step__t--done{color:#94a3b8;}
.step__t--active{color:#2563EB;}
.step__s{font-size:.7rem;color:#94a3b8;}
.step__line{width:1.5px;height:18px;background:#e2e8f0;margin-left:12px;}

/* Tip box */
.tip-box{display:flex;align-items:flex-start;gap:.6rem;background:#EFF6FF;border:1px solid #BFDBFE;border-radius:12px;padding:.85rem 1rem;}
.tip-box__text{font-size:.78rem;color:#1e40af;line-height:1.5;}
.tip-box__text strong{font-weight:700;}

/* Footer */
.footer{display:flex;align-items:center;justify-content:space-between;padding-block:1rem;border-top:1px solid #e2e8f0;flex-wrap:wrap;gap:.5rem;font-size:.78rem;color:#94a3b8;}
.footer__links{display:flex;gap:1.1rem;}
.footer__links a{font-size:.78rem;color:#64748b;text-decoration:none;transition:color .2s;}
.footer__links a:hover{color:#2563EB;}

/* Responsive */
@media(max-width:860px){
    .page-body{grid-template-columns:1fr;}
    .col-right{display:grid;grid-template-columns:1fr 1fr;gap:.75rem;}
    .illus-card{grid-column:1/-1;}
}
@media(max-width:560px){
    .container{padding-inline:1rem;}
    .col-right{grid-template-columns:1fr;}
    .ql-grid{grid-template-columns:1fr;}
    .rec-card__actions{flex-direction:column;}
    .btn-primary,.btn-ghost{width:100%;justify-content:center;}
}
</style>

@endsection