<?php
// $query_pub = "SELECT * FROM publicacao where id_pet=$id_pet";
// $result_pub = $conn->prepare($query_pub);
// $result_pub->execute();
// $row_pub = $result_pub->fetch(PDO::FETCH_ASSOC);

// extract($row_pub);
// var_dump ($row_pub);

$query_pet = "SELECT * FROM pet WHERE id_pet=$id_pet";
$result_pet = $conn->prepare($query_pet);
$result_pet->execute();
$row_pet = $result_pet->fetch(PDO::FETCH_ASSOC);
extract($row_pet);


$query_usuario = "SELECT nome_usuario FROM usuario WHERE id_usuario = $id_usuario";
$result_usuario = $conn->prepare($query_usuario);
$result_usuario->execute();
$row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);

extract($row_usuario);


?>

<?php
echo '
<section id="dashboard">
		<div class="container-insta">
			<div class="row">
				<div class="col-md-8 feed">
					<div class="card-post">
						<div class="card-header">
							<img class="post-usericon" src="imagens/' . $id_pet . '/profile0" " alt="Pires">
							<span>' . $nome_pet . '</span>
							<!-- <div class="config">
								<button><img src="assets\images\pontos.png"></button>
							</div> -->
						</div>
							
						<div class="card-bodya post-image">

								<div class="carousel-item active">
									<img class="publication  width:360 height:500" src="imagens/' . $id_pet . '/profile1" alt="First slide">
								</div>

						</div>

						<div class="card-footer background-color:white">
							<div class="actionButtons col-lg-8">
								<div class=" column item">
									<i id="like" class="fa-regular fa-heart"></i>
								</div>

								<div class="item">
									<i class="fa-regular fa-comment"></i>
								</div>

								<div class="item">
									<i class="fa-regular fa-share-from-square"></i>
								</div>

								<div class="btn btn-outline-primary waves-effectimary">
								<a href= "contact.php?id=' . $id_pet . '">Adotar!</a><br>
								</div>
							</div>

								<div class="post-comments">
									<div class="comment">
										<span class="user">' . $nome_usuario . '</span>
										<span class="text">' . $legenda_publicacao . '</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
';

?>
<!-- <div>
	<span  class="text-bold">'.$curtida_publicacao.' Curtidas</span>
	</div> 111-->