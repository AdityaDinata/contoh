<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Rental Costume</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
<body>

<?php
include 'database.php';

// Buat objek database
$db = new Database();

// Ambil semua data gambar dari database
$data_gambar = $db->getAllData();

// Koneksi ke database
$con = mysqli_connect("localhost", "root", "", "costume_maker");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Variabel untuk pesan peringatan
$warning_message = "";

$sql = "SELECT * FROM costume";
$result = mysqli_query($con, $sql);

// Loop untuk menampilkan data
while ($row = mysqli_fetch_assoc($result)) {
    // Ambil data untuk tiap gambar
    $id_to_show = $row['id'];
    $nama_karakter = $row['Nama_Karakter'];
    $asal = $row['asal'];
    $foto = $row['foto'];
}
    // Tutup koneksi database
    mysqli_close($con);
    ?>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/LOGO.png " alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Top 3 Costume</a></li>
                        <li class="nav-item"><a class="nav-link" href="#more">More Costume</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Pemesanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Catalog Costume</div>
                <div class="masthead-heading text-uppercase">Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
            </div>
        </header>

  
<section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <br>
                    <br>
                    <br>
                    <h2 class="section-heading text-uppercase">Top 3 Costume</h2>
                    <h3 class="section-subheading text-muted">   </h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"> </i>
                            <img src="assets/img/kafka (2).jpg" alt="" class="fa-stack-1x rounded-circle" style="width: 100%; height: 100%;">
                        </span>
                        <h4 class="my-3">kafka </h4>
                        <h4>(honkai star rail)</h4>
                        <p class="text-muted">Price = 800.000.00</p>
                        
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <img src="assets/img/boa.jpg" alt="" class="fa-stack-1x rounded-circle" style="width: 100%; height: 100%;">
                        </span>
                        <h4 class="my-3">Boa Hancock</h4>
                        <h4>(One Piece)</h4>
                        <p class="text-muted">Price = 1.000.000.00</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <img src="assets/img/Esdeath.jpg" alt="" class="fa-stack-1x rounded-circle" style="width: 100%; height: 100%;">
                        </span>
                        <h4 class="my-3">Esdeath</h4>
                        <h4 class="my-3">Akame Ga Kill</h4>
                        <p class="text-muted">Price = 900.000.00</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="more">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">More Costume</h2>
            <h3 class="section-subheading text-muted">All OF Costume</h3>
        </div>
        <div class="row">
            <?php
            // Koneksi ke database
            $con = mysqli_connect("localhost", "root", "", "costume_maker");

            // Periksa koneksi
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
            }

            // Query untuk mengambil semua data gambar dari database
            $sql = "SELECT * FROM costume";
            $result = mysqli_query($con, $sql);

            // Periksa apakah ada data gambar yang ditemukan
            if (mysqli_num_rows($result) > 0) {
                // Loop untuk menampilkan semua gambar
                while ($row = mysqli_fetch_assoc($result)) {
                    $id_to_show = $row['id'];
                    $nama_karakter = $row['Nama_Karakter'];
                    $asal = $row['asal'];
                    $foto = $row['foto'];
                    ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item -->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $id_to_show; ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <!-- Ganti sumber gambar dengan gambar dari database -->
                                <br>
                                <br>
                                <br>
                                <img class="img-fluid" src="data:image/jpeg;base64,<?php echo base64_encode($foto); ?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $nama_karakter; ?></div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo $asal; ?></div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                // Jika tidak ada gambar yang ditemukan, tampilkan pesan
                echo "Tidak ada gambar yang ditemukan.";
            }

            // Tutup koneksi database
            mysqli_close($con);
            ?>
        </div>
    </div>
</section>

        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center1">
                    <h2 class="section-heading text-uppercase">Pemesanan</h2>
                   
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/w.jpg" alt="..." />
                            <h4>Whatsap</h4>
                    
                        </div>
                    </div>
                    <div class="col-lg-4">
                            <h3 class="section-subheading text-muted">Pemesanan dapat di lakukan pada Kontak kami, info leboh lanjut terkait pemesanan silahkan hubungi kontak tertera</h3>
    
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <!-- Contact-->
        <section class="page-section1" id="contact">
    <div class="container">
        <div class="bg">
            <div class="text-center1">
                <h2 class="section-heading text-uppercase">Contact us</h2>
                <h3 class="section-subheading text-muted">Silahkan berikan rekomendasi costume rental yang diinginkan</h3>
            </div>
            <form id="contactForm" action="submit_form.php" method="post">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input -->
                            <input class="form-control" name="name" id="name" type="text" placeholder="Your Name *" required />
                            <div class="invalid-feedback">A name is required.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input -->
                            <input class="form-control" name="email" id="email" type="email" placeholder="Your Email *" required />
                            <div class="invalid-feedback">An email is required.</div>
                            <div class="invalid-feedback">Email is not valid.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input -->
                            <input class="form-control" name="phone" id="phone" type="tel" placeholder="Your Phone *" required />
                            <div class="invalid-feedback">A phone number is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input -->
                            <textarea class="form-control" name="message" id="message" placeholder="Your Message *" required></textarea>
                            <div class="invalid-feedback">A message is required.</div>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="text-center">
                    <button class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
            </form>
            <?php if(isset($success_message)): ?>
                <div class="text-center">
                    <p><?php echo $success_message; ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Rental Costume</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/s_selaputri16" aria-label="Twitter"><i class="fa-brands fa-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/share/J8oFuYQDEM4dHrcw/?mibextid=qi2Omg" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Owner</a>
                        <a class="link-dark text-decoration-none" href="#!">Sela Putri Ismalia</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
        
                                    <h2 class="text-uppercase">VinsMoke Sanji</h2>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <p class="item-intro text-muted">One Piece</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                    <p>Price = 100K/3Hari</p>
                                    <p>Waktu Pembuatan = 1 bulan</p>
                                    <p>ukuran = XL </p>
                                    <P>Bahan = katun</P>
                                    
                
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Monkey.D.Luffy</h2>
                                    <br>
                                    <br>
                                    <br>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." />
                                    <p>Price = 100K/3Hari</p>
                                    <p>Ukuran = XL</p>
                                    <P>Acc = Full</P>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 3 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Roronoa Zoro</h2>
                                    <br>
                                    <br>
                                    <br>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                    <p>Price = 100K/3Hari</p>
                                    <p>Ukuran = XL</p>
                                    <P>Acc = Full</P>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close 
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 4 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Nico Robin</h2>
                                    <br>
                                    <br>
                                    <br>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." />
                                    <p>Price = 100K/3Hari</p>
                                    <p>Ukuran = XL</p>
                                    <P>Acc = Full</P>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close 
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 5 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Southwest
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Website Design
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 6 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Window
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Photography
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 2 modal popup-->
        <!--  -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>


</body>
</html>
