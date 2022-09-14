<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="mybookshelf.php">MyBookShelf</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="mybookshelf.php">Página Inicial</a></li>
          <li class="dropdown"><a href="livros_geral.php"><span>Livros</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="livros_geral.php">Busca de Livros</a></li>
            </ul>
          </li>
          <!--<li class="dropdown"><a href="#"><span>Comunidade</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Fóruns</a></li>
            </ul>
          </li> -->
          <?php
          if(!isset($_SESSION['nome'])){
          ?>
          <li><a class="getstarted scrollto" href="cadastro.php">Cadastre-se</a></li>
          <li><a class="getstarted scrollto" href="login.php">Login</a></li>
          <?php
          }
          else{
            ?>
        <li class="dropdown"><a href="#"><span><?php echo $_SESSION['nome'];?> </span> <i class="bi bi-chevron-down"></i></a>
        <ul>
        <li><a href="painel.php">Perfil</a></li>
        <li><a href="logout.php">Logout</a></li>
        </ul>
        </li>
            <?php
          }
          ?>
        </ul>
        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->