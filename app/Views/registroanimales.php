<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel = "preconnect" href = "https://fonts.googleapis.com">
	<link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
	<link href = "https: //fonts.googleapis.com/css2? family = Handlee & display = swap "rel =" stylesheet ">
	<link rel="stylesheet" href="<?php echo (base_url('public/styles/estilos.css'))?>">

    <title>AnimalPets</title>
</head>
<body>
<header>
		<nav class="navbar navbar-expand-lg navbar-dark fondoPrincipal">
			<div class="container-fluid">
				<a class="navbar-brand fuente" href="#">
					<i class="fas fa-paw"></i>
					AnimalPets
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= site_url('/inicio') ?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('/productos/registro') ?>">Registro Productos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('/animales/registro') ?>">Registro Animales</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>


<main>
        <div class="container mb-5">
             <div class="row mt-5 d-flex justify-content-center">
                <div class="col-12 col-md-5">
                    <h3 class="fuente2 fw-bold text-center">Registro de Animales</h3>
                    
                    <form action="<?= site_url('/animales/registro/nuevo')?>" method="POST" class="mt-4">
                        <div class="mb-3">
                            <label class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Edad:</label>
                            <input type="text" class="form-control" name="edad">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fotograf??a:</label>
                            <input type="text" class="form-control" name="foto">
                        </div>
                        <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Descripcion" name="descripcion" style="height: 100px"></textarea>
                            <label for="floatingTextarea">Descripci??n</label>
                        </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipo de animal:</label>
                            <select class="form-select" name="tipoAnimal">
                                <option value="1" selected>Perro</option>
                                <option value="2">Gato</option>
                                <option value="3">Ave</option>
                                <option value="4">Caballo</option>
                                <option value="5">Reptil</option>
                            </select>
                        </div>
                        
						<div class="d-grid gap-2">
                    <button type="submit" class="btn fondoPrincipal mt-2 text-white">Guardar</button>
                        </div>
                        
                    </form>
                </div>
                <div class="col-12 col-md-5 align-self-end">
                    <img src="<?= base_url('public/img/adopcion1.jpeg')?>" alt="imagen" class="img-fluid w-100">
                    <a href="<?= site_url('/animales/listado')?>" class="btn fondoPrincipal mt-2 text-white">ver inventario</a>

                </div>
            </div>
        </div>
       
    </main>

	<section>

    <?php if(session('mensaje')):?>
        <div class="modal fade" id="modalrespuesta" tabindex="-1" >
            <div class="modal-dialog">
                <div class="modal-content">
                     <div class="fondoPrincipal">
                        <h5 class="modal-title">AnimalPets</h5>
                        </div>
                             <div class="modal-body"> 
                                <h5><?= session('mensaje') ?></h5>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                </div>
            </div>
        </div>
    <?php endif ?>
    </section>


    
    <footer class="fondoDos p-5">

		<div class="container-fluid">

		<div class="row">
			<div class="col-12 col-md-4">
				<h3 class="fw-bold">Horario de atenci??n:</h3>
				<p>Lunes a viernes 7:00 am - 3:00 pm / S??bado: 7:00 am - 2:30 pm / Domingos y festivos 8:00 am - 3:00 pm</p>
				<br>
				<h3 class="fw-bold">Direcci??n:</h3>
				<p>Bel??n Altavista Calle 8A # 112-82 </p>
			</div>

			<div class="col-12 col-md-4">
				<h3 class="fw-bold">Ayudas:</h3>
				<p>Glosario / Correo remoto  /  Monitoreo y desempe??o de uso del sitio web</p>
				<br>
				<h3 class="fw-bold">Protecci??n de datos:</h3>
				<p>Protecci??n de datos personales en el Municipio de Medell??n </p>
			</div>

			<div class="col-12 col-md-4">
				<h1 class="fw-bold fuente"><span><i class="fas fa-paw"></i></span>AnimalPets</h1>
				<br>
				<i class="fab fa-facebook fa-3x"></i>
				<i class="fab fa-instagram fa-3x"></i>
				<i class="fab fa-youtube fa-3x"></i>
				<br>
				<p class="mt-4">?? 2021 / NIT: 890905211-1 / C??digo DANE: 05001 / C??digo Postal: 050015</p>
				
			</div>
		</div>

		</div>

	</footer>






	<script type="module" src="<?=  base_url('public/js/lanzarmodal.js') ?>"></script>	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0ed63ec5d8.js" crossorigin="anonymous"></script>
</body>
</html>