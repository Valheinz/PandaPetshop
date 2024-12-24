<?php
include "koneksi.php"; 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	
	<nav id="nav" class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
	  <div class="container">
		<a class="navbar-brand" href="#"><img src="./img/panda petshop.PNG"alt="Logo" width="50" style="border-radius: 50%;">Panda Petshop</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="#">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="#produk">Produk</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="#article">Article</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="#gallery">Gallery</a>
			</li>
				<li class="nav-item">
					<a class="nav-link" href="login.php" target="_blank">Login</a>
				</li>
			<li>
				<button id="Light" type="button" class="btn btn-light" onclick="lightFunction();"><i class="bi bi-brightness-high"></i></button>
				<button id="Dark"type="button" class="btn btn-dark" onclick="darkFunction();"><i class="bi bi-moon-stars"></i></button>	
			</li>
		  </ul>
		  
		</div>
	  </div>
	</nav>
	<section id="hero" class="text-sm-start bg-secondary-subtle text-dark">
		<div class="container">
			<div class="d-sm-flex flex-sm-row-reverse align-items-center">
				<img src="./img/Koceng.JPG" alt="Koceng" class="img-thumbnail img-fluid" width="500">
				<div>
				
				<h2 class="fw-bold display-4">Selamat Datang Di Toko Panda Petshop!<h2>
				<h4 class="lead display-6">Kami menyediakan berbagai jasa seperti makanan untuk anabul kalian beserta grooming dan juga penitipan!<h4>
			
				<h6>
					<span id="tanggal"></span>
					<span id="jam"></span>
				</h6>
				<br>
				</div>
				
			</div>
		</div>
		<br>
	</section>
	
	<!-- produk begin -->
<section id="produk" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">produk</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM produk";
      $hasil = $conn->query($sql); 

      $no = 1;
      while($row = $hasil->fetch_assoc()){
        ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["nama"]?></h5>
              <p class="card-text">
                <hr> <b>Harga:</b> Rp
			  <?= $row["harga"]?>
              </p>
			  <p class="card-text">
                <hr> <b>Jenis:</b>
			  <?= $row["jenis"]?>
              </p>
			  <p class="card-text">
                <hr> <b>Stok:</b>
			  <?= $row["stok"]?>
              </p>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- produk end -->	


	<!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      $no = 1;
      while($row = $hasil->fetch_assoc()){
        ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->			
	
	<section id="gallery">
		<h1 class="text-center" style="font-family: lucida handwriting;">HASIL GROOMINGAN KAMI >_></h1>
	<br>
		<div id="carouselExample" class="carousel slide">
		  <div class="carousel-inner">
		  <?php
			$sql = "SELECT * FROM gallery ORDER BY id DESC";
			$hasil = $conn->query($sql); 
	  		//Buat array kosong dengan nama $id
			$id = array();
			$no = 1;
			while($row = $hasil->fetch_assoc()){
				//memasukkan semua id gallery ke dalam array $id
				array_push($id,$row["id"]);
				//mengecek nilai minimal dalam array $id
				$min_id = min($id);
				
       	 ?>
		 	<!-- pada bagian carousel item hanya boleh satu foto yang aktif maka diberikan pengecekan kondisi dengan if ternary -->
			<div class="carousel-item <?= $row["id"] == $min_id ? 'active' : '' ?>">
			  <img src="img/<?= $row["gambar"]?>" class="d-block w-100" alt="<?= $row["judul"]?>">
			</div>
			<?php
			}
		?>
		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		  </button>
		</div>
		<br><br>
	</section>
	
	<section id="lokasi">
		<div class="text-center">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.3483795795773!2d110.30764777499805!3d-7.085551392917433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b31186722b3%3A0xf9458ee1457a09f7!2sPANDA%20GROOMING%20%26%20PET%20ACCESSORIES!5e0!3m2!1sen!2sid!4v1727353032583!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</section>
	<footer id="sosmed">
		<div class="text-center">
			<a href="https://wa.me/6282359208057" target="_blank"><i class="h2 p2 bi bi-whatsapp"></i></a>
			<a href="https://www.instagram.com/esaputra981/" target="_blank"><i class="h2 p2 bi bi-instagram"></i></a>
			<a href="https://wa.me/6282359208057" target="_blank"><i class="h2 p2 bi bi-tiktok"></i></a>
		</div>
		<div class="text-center">COPYRIGHT PANDA PETSHOP SEMARANG</div>
	</footer>
		
		<script type="text/javascript">
			window.setTimeout("tampilWaktu()", 1000)
			function tampilWaktu() {
				var waktu = new Date();
				var bulan = waktu.getMonth() + 1;
				
				setTimeout("tampilWaktu()", 1000);
				document.getElementById("tanggal").innerHTML =
					waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
				document.getElementById("jam").innerHTML =
					waktu.getHours() +
					":" +
					waktu.getMinutes() +
					":" + 
					waktu.getSeconds();
			}
		</script>

		
		<script>
			function darkFunction() {
			  const element = document.getElementById("nav");  // Get the DIV element
			  element.classList.remove("navbar-light"); 
			  element.classList.remove("bg-light"); 
			  element.classList.add("navbar-dark"); 
			 element.classList.add("bg-dark");
			 
			 const ehero = document.getElementById("hero");  // Get the DIV element
			  ehero.classList.remove("bg-secondary-subtle"); 
			  //ehero.classList.remove("text-dark"); 
			  ehero.classList.add("bg-muted"); 
			 ehero.classList.add("text-dark");
			  
			 const earticle = document.getElementById("article");  // Get the DIV element
			 earticle.classList.add("bg-dark"); 
			 earticle.classList.add("text-light");
			  
			 const CardBody = document.getElementsByClassName("card-body");
				for (let i = 0; i < CardBody.length; i++) {
				  CardBody[i].classList.add("bg-secondary-subtle"); 
				  CardBody[i].classList.add("text-dark");
				}
				
				
				const egallery = document.getElementById("gallery");  // Get the DIV element
			 egallery.classList.add("bg-dark"); 
			 egallery.classList.add("text-light");
			 
				const elokasi = document.getElementById("lokasi");  // Get the DIV element
			 elokasi.classList.add("bg-dark"); 
			 elokasi.classList.add("text-light");
			 
				const esosmed = document.getElementById("sosmed");  // Get the DIV element
			 esosmed.classList.add("bg-dark"); 
			 esosmed.classList.remove("text-dark");
			 esosmed.classList.add("text-light");
			
			
			}
			
			function lightFunction() {
			  const element = document.getElementById("nav");  // Get the DIV element
			  element.classList.remove("navbar-dark"); 
			  element.classList.remove("bg-dark"); 
			  element.classList.add("navbar-light"); 
			  element.classList.add("bg-light");  
			  
			  const ehero = document.getElementById("hero");  // Get the DIV element
			  ehero.classList.remove("bg-dark"); 
			  ehero.classList.remove("text-light"); 
			  ehero.classList.add("bg-secondary-subtle"); 
			 ehero.classList.add("text-dark");
			 
			 const earticle = document.getElementById("article");  // Get the DIV element
			 earticle.classList.remove("bg-dark"); 
			 earticle.classList.add("text-dark");
			 
			 const CardBody = document.getElementsByClassName("card-body");
				for (let i = 0; i < CardBody.length; i++) {
				  CardBody[i].classList.remove("bg-secondary-subtle"); 
				  CardBody[i].classList.add("text-light");
				}
				
				const egallery = document.getElementById("gallery");  // Get the DIV element
			 egallery.classList.remove("bg-dark"); 
			 egallery.classList.add("text-dark");
			 
				const elokasi = document.getElementById("lokasi");  // Get the DIV element
			 elokasi.classList.remove("bg-dark"); 
			 elokasi.classList.add("text-light");
			 
				const esosmed = document.getElementById("sosmed");  // Get the DIV element
			 esosmed.classList.remove("bg-dark"); 
			 esosmed.classList.add("text-dark");
			  
			}
		</script>
  </body>
</html>

