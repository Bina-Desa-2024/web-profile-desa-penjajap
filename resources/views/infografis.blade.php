<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Laravel Website</title>
    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            padding-top: 70px; /* Untuk menghindari navbar fixed-top menutupi konten */
        }
        .nav-tittle {
            color: #347928;
        }
        .nav-tittle.scrolled {
             color: #E9EFEC; /* Warna setelah scroll */    
        }

        .navbar-transparent {
            background-color: rgba(255, 255, 255, 0.5); /* Transparan */
            transition: background-color 0.3s ease;
        }

        .navbar-solid {
            background-color:#347928; /* Warna solid */
            transition: background-color 0.3s ease;
        }

        .navbar .nav-link {
            color: #347928; /* Warna default teks */
            position: relative;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover::after,
        .navbar .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: -2px; /* Posisi garis berada di bawah teks */
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #C0EBA6; /* Warna garis hijau */
            transition: all 0.3s ease;
        }

        .navbar .nav-link.active {
            color: green; /* Ubah warna teks saat menu aktif */
        }


        .navbar.scrolled .nav-link {
            color: #E9EFEC;
        }
            
        
        .navbar-nav .nav-item {
            margin-right: 17px; /* Memberikan jarak antar item */
        }

        .navbar-nav .nav-item:last-child {
            margin-right: 0; /* Menghilangkan margin pada item terakhir */
        }

        .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='red' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            margin-bottom: 20px;
        }
        .stat-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .stat-icon {
            width: 64px;
            height: 64px;
            object-fit: contain;
        }
        .stat-info h3 {
            color: #666;
            font-size: 1.25rem;
            margin-bottom: 5px;
            font-weight: normal;
        }
        .stat-value {
            color: #f44336;
            font-size: 2rem;
            font-weight: bold;
        }
        .custom-card {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px #0000001a;
        }
        .logo-img {
            width: 50px;
            height: auto;
        }
        .job-list {
            max-height: 500px;
            overflow-y: auto;
        }
        .navbar-nav .nav-item {
            margin-right: 15px; /* Memberikan jarak antar item */
        }
        .navbar-nav .nav-item:last-child {
            margin-right: 0; /* Menghilangkan margin pada item terakhir */
        }
        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }
        .pekerjaan h4 {
            font-size: 12px;
            font-weight: 600
        }

        .pekerjaan h2 {
            font-size: 2.7rem;
        }

        footer {
            margin-top: 30px; /* Menambahkan ruang di atas footer */
        }

        .footer-container {
            background: #347928;
            padding: 2rem;
            color: white;
            font-family: Arial, sans-serif;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .footer-logo {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-logo img {
            width: 250px;
            height: auto;
        }

        .contact-info, .phone-numbers, .links {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .footer-heading {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .copyright {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
        }

        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .footer-content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 1024px) {
        .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-transparent fixed-top">
        <div class="container-fluid">
          <!-- Foto di kiri dan teks di samping -->
          <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('image/logo sambas.png') }}" alt="logo" 
              style="width: 80px; height: 75px; object-fit: cover; margin-right: 10px;">
            <div class="nav-tittle">
              <h1 class="m-2" style="font-size:20px; font-weight: bold;">Desa Penjajap</h1>
              <h4 class="m-2" style="font-size: 15px;">Kabupaten Sambas</h4>
            </div>
          </a>
      
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarScroll">
            <!-- Merapikan navbar ke tengah -->
            <ul class="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height:100px;">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/profil-desa">Profil Desa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/infografis">Infografis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/peta-desa">Peta Desa</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container my-5" style="padding: 50px;">
        <p class="font-weight-bold" style="font-size:30px; color: #347928" >DEMOGRAFI PENDUDUK</p>
        <p>Memberikan informasi lengkap mengenai karakteristik demografi penduduk suatu wilayah. Mulai dari jumlah penduduk, jenis kelamin, pekerjaan, agama, dan aspek penting lainnya yang menggambarkan komposisi populasi secara rinci.</p>

        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('image/data.svg') }}" alt="">
            </div>
            <div class="col-md-6">
                <p>Informasi demografi yang kami sajikan mencakup data-data terkait:</p>
                <ul>
                    <li>Jumlah penduduk</li>
                    <li>Jenis kelamin</li>
                    <li>Pekerjaan</li>
                    <li>Agama</li>
                    <li>Dan aspek penting lainnya</li>
                </ul>
                <p>Data ini dapat digunakan untuk menganalisis komposisi penduduk desa Kersik secara komprehensif.</p>
            </div>
        </div>
    </div>

    <div class="text-start mt-5 mb-5" style="padding: 0 80px;">
        <p class="font-weight-bold" style=" color:#347928; font-size:30px;">Jumlah Penduduk dan Kepala Keluarga</p>

        <!-- Statistik Jumlah Penduduk -->
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="stat-card">
                    <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-total-penduduk-Du2cCbAO.svg" alt="Belum Kawin" class="stat-icon">
                    <div class="stat-info">
                        <h3>Total Penduduk</h3>
                        <div class="stat-value" style="color: #347928">{{$infografis->population}}</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-kepala-keluarga-D4UfE36x.svg" alt="Kawin" class="stat-icon">
                    <div class="stat-info">
                        <h3>Kepala Keluarga</h3>
                        <div class="stat-value" style="color: #347928">{{$infografis->households}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="stat-card">
                    <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-perempuan-BCmUG8mA.svg" alt="Belum Kawin" class="stat-icon">
                    <div class="stat-info">
                        <h3>Perempuan</h3>
                        <div class="stat-value" style="color: #347928">{{$infografis->female}}</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-laki-CmERQRaD.svg" alt="Kawin" class="stat-icon">
                    <div class="stat-info">
                        <h3>Laki-laki</h3>
                        <div class="stat-value" style="color: #347928">{{$infografis->male}}</div>
                    </div>
                </div>
            </div>
        </div>


      <div class="mt-5 mb-5">
        <p class="font-weight-bold" style="color: #347928; font-size:30px; margin-left:8px;">Statistik Berdasarkan Perkawinan dan Agama</p>

        <!-- Statistik Berdasarkan Perkawinan -->
        <p style="font-size: 20px; color:#7b8480; margin-left:8px; margin-top:0px;">Berdasarkan Perkawinan</p>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="stat-card">
                    <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-belum-kawin-B6LGf_QT.svg" alt="Belum Kawin" class="stat-icon">
                    <div class="stat-info">
                        <h3>Belum Kawin</h3>
                        <div class="stat-value" style="color: #347928;">{{$infografis->belum_kawin}}</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-kawin-DDA193Z5.svg" alt="Kawin" class="stat-icon">
                    <div class="stat-info">
                        <h3>Kawin</h3>
                        <div class="stat-value" style="color: #347928;">{{$infografis->kawin}}</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-cerai-mati-VdEzxQgX.svg" alt="Cerai Mati" class="stat-icon">
                    <div class="stat-info">
                        <h3>Cerai Mati</h3>
                        <div class="stat-value" style="color: #347928;">{{$infografis->cerai_mati}}</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-kawin-tercatat-Cr_1J14L.svg"alt="Kawin Tercatat" class="stat-icon">
                    <div class="stat-info">
                        <h3>Kawin Tercatat</h3>
                        <div class="stat-value" style="color: #347928;">{{$infografis->kawin_tercatat}}</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-kawin-tak-tercatat-Ba6jJHqw.svg" alt="Kawin Tidak Tercatat" class="stat-icon">
                    <div class="stat-info">
                        <h3>Kawin Tidak Tercatat</h3>
                        <div class="stat-value" style="color: #347928;">{{$infografis->kawin_tidak_tercatat}}</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="stat-card">
                    <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-cerai-hidup-c75sVKpW.svg" alt="Cerai Hidup" class="stat-icon">
                    <div class="stat-info">
                        <h3>Cerai Hidup</h3>
                        <div class="stat-value" style="color: #347928;">{{$infografis->cerai_hidup}}</div>
                    </div>
                </div>
            </div>
        </div>

     <!-- Statistik Berdasarkan Agama -->
<p class="mt-5 mb-4 font-weight-bold" style="font-size: 30px; color:#347928;">Berdasarkan Agama</p>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <!-- Islam -->
    <div class="col">
        <div class="stat-card">
            <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-islam-B2-fwtBi.svg" alt="Islam" class="stat-icon">
            <div class="stat-info">
                <h3>Islam</h3>
                <div class="stat-value" style="color: #347928;">{{$infografis->islam}}</div>
            </div>
        </div>
    </div>

    <!-- Kristen -->
    <div class="col">
        <div class="stat-card">
            <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-kristen-CvNUV1pq.svg" alt="Buddha" class="stat-icon">
            <div class="stat-info">
                <h3>Kristen</h3>
                <div class="stat-value" style="color: #347928;">{{$infografis->kristen}}</div>
            </div>
        </div>
    </div>

    <!-- Katolik -->
    <div class="col">
        <div class="stat-card">
            <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-katolik-DFXj5yZv.svg" alt="Konghucu" class="stat-icon">
            <div class="stat-info">
                <h3>Katolik</h3>
                <div class="stat-value" style="color: #347928;">{{$infografis->katolik}}</div>
            </div>
        </div>
    </div>

    <!-- Hindu -->
    <div class="col">
        <div class="stat-card">
            <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-hindu-D9LgBI6W.svg" alt="Kristen" class="stat-icon">
            <div class="stat-info">
                <h3>Hindu</h3>
                <div class="stat-value" style="color: #347928;">{{$infografis->hindu}}</div>
            </div>
        </div>
    </div>

    <!-- Buddha -->
    <div class="col">
        <div class="stat-card">
            <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-buddha-Cfftt9vu.svg" alt="Katolik" class="stat-icon">
            <div class="stat-info">
                <h3>Buddha</h3>
                <div class="stat-value" style="color: #347928;">{{$infografis->buddha}}</div>
            </div>
        </div>
    </div>

    <!-- Konghucu -->
    <div class="col">
        <div class="stat-card">
            <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-konghuchu-Bt_R-Ivr.svg" alt="Hindu" class="stat-icon">
            <div class="stat-info">
                <h3>Konghucu</h3>
                <div class="stat-value" style="color: #347928;">{{$infografis->konghucu}}</div>
              </div>
            </div>
        </div>
    </div>    
</div>

  <!-- Main Content -->
  <div class="container mt-5">
    <h2 class="mb-4" style="margin-left: 2px;">Berdasarkan Pekerjaan</h2>
    <div class="col d-flex">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body ">
                    <h4 class="card-title">Jenis Pekerjaan</h4>
                    <div class="job-list">
                        <table class="table table-borderless" >
                            <tbody>
                                @foreach($jobs as $job)
                                <tr>
                                    <td>{{$job->job_type}}</td>
                                    <td>{{$job->total}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4 pekerjaan">
        @foreach($jobs as $job)
        <div class="col">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title">{{$job->job_type}}</h4>
                    <h2 class="display-4 text-center">{{$job->total
                        
                        }}</h2>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
  </div>
</div>

{{-- footer --}}
<footer class="footer-container">
    <div class="footer-content">
        <div class="footer-logo" style="border-right: 1px solid white;">
            <img src="{{ asset('image/logo sambas.png') }}" alt="Logo Desa Penjajap">
            <h3 style="margin-left:30px; font-weight:bolder;">Desa Penjajap</h3>
            <p style="margin-left:30px; font-size:14px;">Kecamatan Pemangkat<br>
            Kabupaten Sambas<br>
            Provinsi Kalimantan Barat</p>
        </div>
        
        <div class="contact-info">
            <h4 class="footer-heading" style="font-size: 26px; font-weight:bold">Kontak Desa</h4>
            <p style="font-size: 18px; margin-bottom:-7px;">Nomor Telepon Desa</p>
              <p style="font-size: 15px;">123456789</p>
            <p style="font-size: 18px; margin-bottom:-7px;">Email Desa</p>
              <p style="font-size: 15px;">desapenjajap@gmail.com</p>
            <p style="font-size: 18px; ">Senin - Kamis (08.00 - 15.00) &<br>
              Jum'at (08.00 - 11.00)</p>
            <p style="font-size: 18px; margin-bottom:-7px;">Alamat Desa </p>
              <p style="font-size: 15px;"> Raya Desa Penjajap</p>
        </div>
  
        <div class="phone-numbers">
            <h4 class="footer-heading" style="font-size: 24px; font-weight:bold">Nomor Telepon Penting</h4>
            <p style="font-size: 18px; margin-bottom:-7px;">Nomor Kades</p>
              <p style="font-size: 15px;">08124236848</p>
            <p style="font-size: 18px; margin-bottom:-7px;">Nomor Ambulan Penjajap</p>
              <p style="font-size: 15px;">085392095123</p>
            <p style="font-size: 18px; margin-bottom:-7px;">Nomor Polisi</p>
              <p style="font-size: 15px;">08123456789</p>
            <p style="font-size: 18px; margin-bottom:-7px;">Nomor Pemadam Kebakaran</p>
              <p style="font-size: 15px;">08123456789</p>
        </div>
  
        <div class="links" style="margin-left: 50px;">
            <h4 class="footer-heading" style="font-size: 26px; font-weight:bold;">Jelajahi</h4>
            <a href="https://kemendesa.go.id/" style="color: white; margin-bottom:10px; font-size:18px; text-decoration: none;">Website Kemendesa</a>
            <a href="https://kemendagri.go.id/" style="color: white; margin-bottom:10px; font-size:18px; text-decoration: none;">Website Kemendagri</a>
            <a href="https://kalbarprov.go.id/" style="color: white; margin-bottom:10px; font-size:18px; text-decoration: none;">Website Kalimantan Barat</a>
            <a href="https://bkpsdmad.sambas.go.id/" style="color: white; margin-bottom:10px; font-size:18px; text-decoration: none;">Website Kabupaten Sambas</a>
        </div>
    </div>
  
    <div class="copyright">
        © 2024 Powered by PT Digital Desa Indonesia
    </div>
  </footer>
  
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.querySelector(".navbar");
        const navTitle = document.querySelector(".nav-tittle");
        const navLink = document.querySelector(".navbar");
      
        window.addEventListener("scroll", function () {
          if (window.scrollY > 50) { // Jika halaman digulir lebih dari 50px
            navbar.classList.remove("navbar-transparent");
            navbar.classList.add("navbar-solid");
            navTitle.classList.add("scrolled");
            navLink.classList.add("scrolled");
          } else {
            navbar.classList.remove("navbar-solid");
            navbar.classList.add("navbar-transparent");
            navTitle.classList.remove("scrolled");
            navLink.classList.remove("scrolled");
          }
        });
      });
      </script>
    
</body>
</html>
