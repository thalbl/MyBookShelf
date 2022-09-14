<?php
// Include the database configuration file
include 'conexao.php';

// Get images from the database
$query = $conexao->query("SELECT * FROM livros ORDER BY date_added DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["img"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>

<div class="container">
    <h1> OI </h1>
    <<div class="espaco-topo">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php
						$controle_ativo = 2;		
						$controle_num_slide = 1;
						$query = $conexao->query("SELECT * FROM livros ORDER BY date_added DESC");
						if($query->num_rows > 0){
              while($row_carousel = $query->fetch_assoc()){
							if($controle_ativo == 2){ ?>
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li><?php
								$controle_ativo = 1;
							}else{ ?>
								<li data-target="#carousel-example-generic" data-slide-to="<?php echo $controle_num_slide; ?>"></li><?php
								$controle_num_slide++;
							}
						}
          }
					?>						
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php
						$controle_ativo = 2;						
						$query = $conexao->query("SELECT * FROM livros ORDER BY idlivros DESC");
						if($query->num_rows > 0){
              while($row_carousel = $query->fetch_assoc()){
							if($controle_ativo == 2){ 
                $imageURL = 'Upload/uploads/'.$row_carousel["img"]; ?>
								<div class="item active">
									<img src="<?php echo $imageURL; ?>" alt="<?php echo $row_carousel['nomelivro']; ?> onclick = ">
								</div><?php
								$controle_ativo = 1;
							}else{ ?>
								<div class="item">
                <img src="<?php echo $imageURL; ?>" alt="<?php echo $row_carousel['nomelivro']; ?>">
								</div> <?php
							}
						}
          }
					?>					
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	