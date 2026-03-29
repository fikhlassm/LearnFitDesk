@extends('layouts.app')

@section('content')

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
            <li><a href="#" class="navbar__link">Beranda</a></li>
            <li><a href="#fitur" class="navbar__link">Fitur</a></li>
            <li><a href="#tentang" class="navbar__link">Tentang Kami</a></li>
            <li><a href="#kontak" class="navbar__link">Kontak</a></li>
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
        <a href="#tentang" class="navbar__link">Tentang Kami</a>
        <a href="#kontak" class="navbar__link">Kontak</a>
        <div class="navbar__mobile-actions">
            <a href="/login" class="btn btn--ghost">Masuk</a>
            <a href="/register" class="btn btn--primary">Daftar</a>
        </div>
    </div>
</nav>

{{-- HERO --}}
<section class="hero">
    {{-- Dekorasi titik-titik kiri bawah --}}
    <div class="hero__dots-deco">
        @for($r = 0; $r < 4; $r++)
            @for($c = 0; $c < 5; $c++)
                <span></span>
            @endfor
        @endfor
    </div>
    {{-- Dekorasi titik-titik kanan atas --}}
    <div class="hero__dots-deco-r">
        @for($r = 0; $r < 4; $r++)
            @for($c = 0; $c < 5; $c++)
                <span></span>
            @endfor
        @endfor
    </div>

    <div class="container hero__inner">

        {{-- Konten kiri --}}
        <div class="hero__content" data-animate="fade-up">
            <span class="hero__badge">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <line x1="0" y1="7" x2="4" y2="7" stroke="#2563EB" stroke-width="1.5"/>
                    <circle cx="7" cy="7" r="3" fill="#2563EB"/>
                </svg>
                PERSONALIZED EDUCATION
            </span>
            <h1 class="hero__title">Temukan Gaya<br>Belajarmu</h1>
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

        {{-- Gambar kanan --}}
        <div class="hero__visual" data-animate="fade-left">
            <div class="hero__img-wrapper">
                @if(file_exists(public_path('images/hero-student.png')))
                    <img src="{{ asset('images/hero-student.png') }}" alt="Student studying" class="hero__img">
                @elseif(file_exists(public_path('images/hero-student.jpg')))
                    <img src="{{ asset('images/hero-student.jpg') }}" alt="Student studying" class="hero__img">
                @else
                    {{-- Fallback SVG illustration --}}
                    <div class="hero__img-fallback">
                        <svg width="200" height="200" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Body -->
                            <ellipse cx="100" cy="155" rx="50" ry="30" fill="#e8d5b8"/>
                            <!-- Neck -->
                            <rect x="91" y="105" width="18" height="22" rx="6" fill="#f9c784"/>
                            <!-- Head -->
                            <ellipse cx="100" cy="88" rx="32" ry="36" fill="#f9c784"/>
                            <!-- Hair -->
                            <path d="M68 78 Q72 44 100 40 Q128 44 132 78 Q128 60 100 58 Q72 60 68 78Z" fill="#2d1b0e"/>
                            <path d="M68 78 Q62 95 66 112 Q72 90 68 78Z" fill="#2d1b0e"/>
                            <path d="M132 78 Q138 95 134 112 Q128 90 132 78Z" fill="#2d1b0e"/>
                            <!-- Eyes -->
                            <ellipse cx="88" cy="88" rx="4" ry="5" fill="#2d1b0e"/>
                            <ellipse cx="112" cy="88" rx="4" ry="5" fill="#2d1b0e"/>
                            <ellipse cx="89" cy="87" rx="1.5" ry="1.5" fill="white"/>
                            <ellipse cx="113" cy="87" rx="1.5" ry="1.5" fill="white"/>
                            <!-- Smile -->
                            <path d="M91 100 Q100 108 109 100" stroke="#c0855a" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                            <!-- Shirt -->
                            <path d="M55 155 Q60 125 100 120 Q140 125 145 155Z" fill="#fff" stroke="#e2e8f0" stroke-width="1"/>
                            <!-- Desk/book -->
                            <rect x="40" y="168" width="120" height="10" rx="4" fill="#d4b896"/>
                            <rect x="55" y="158" width="90" height="12" rx="3" fill="#e9ecef" stroke="#dee2e6" stroke-width="1"/>
                        </svg>
                        <p>Letakkan foto hero di<br><strong>public/images/hero-student.png</strong></p>
                    </div>
                @endif

                {{-- Floating badge --}}
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
    <div class="container features__grid">

        <div class="feature-card" data-animate="fade-up" style="--delay:0ms">
            <div class="feature-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="10" stroke="#2563EB" stroke-width="1.8"/>
                    <path d="M8 12a4 4 0 018 0" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round"/>
                    <circle cx="12" cy="10" r="2" fill="#2563EB"/>
                </svg>
            </div>
            <h3 class="feature-card__title">Methode belajar</h3>
            <p class="feature-card__desc">Analisis cara efektifmu belajar</p>
        </div>

        <div class="feature-card" data-animate="fade-up" style="--delay:100ms">
            <div class="feature-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M5 12l2-5 5 2 5-4 2 5" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="19" cy="5" r="2" fill="#2563EB"/>
                </svg>
            </div>
            <h3 class="feature-card__title">Metode Cepat</h3>
            <p class="feature-card__desc">Belajar 2x lebih cepat dengan teknik yang pas.</p>
        </div>

        <div class="feature-card" data-animate="fade-up" style="--delay:200ms">
            <div class="feature-card__icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <polyline points="4 17 9 12 13 16 22 7" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    <line x1="4" y1="21" x2="20" y2="21" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
            </div>
            <h3 class="feature-card__title">Analisis Pintar</h3>
            <p class="feature-card__desc">Pantau progres belajarmu secara nyata.</p>
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

        {{-- Stats bar --}}
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

@endsection