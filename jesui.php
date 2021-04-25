<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <body>
		<body
    background="/img/blue.jpg"></bodybackground>
    <link rel="stylesheet" href="/css/stype.css" />
            <link rel="stylesheet" href="jesuis.css" />
		
			<?php include 'data/database.php'; global $db;?>			
<?php
include("header.php");?>


<?php
$q= $db ->query("SELECT * FROM articles");

while ($donnees = $q->fetch())
{
?>

	<div class="container1">		
		<section class="dr-container" id="dr-container">
			<article>
				<header>
					<h3><a target="_blank" href="http://"><?php echo $donnees['nom']; ?></a></h3>
						<span>...</span>
					</header>
					<p>...</p>
				</article>
				<article>
					<header>
						<h3><a target="_blank" href="http://">FF0000</a></h3>
						<span>...</span>
					</header>
					<p>...</p>
				</article>
                <article>
					<header>
						<h3><a target="_blank" href="http://">FF0000</a></h3>
						<span>...</span>
					</header>
					<p>...</p>
				</article>
				<article>
					<header>
						<h3><a target="_blank" href="http://">FF3300</a></h3>
						<span>...</span>
					</header>
					<p>...</p>
				</article>
				<article>
					<header>
						<h3><a target="_blank" href="http://">FF6600</a></h3>
						<span>... </span>
					</header>
					<p>...</p>
				</article>
				<article>
					<header>
						<h3><a target="_blank" href="http://">FF9900</a></h3>
						<span>... </span>
					</header>
					<p>...</p>
				</article>
				<article>
					<header>
						<h3><a target="_blank" href="http://">FFCC00</a></h3>
						<span>...</span>
					</header>
					<p>...</p>
				</article>
				<article>
					<header>
						<h3><a target="_blank" href="http://">FFFF00</a></h3>
						<span>...</span>
					</header>
					<p>...</p>
				</article>
				<article>
					<header>
						<h3><a target="_blank" href="http://">FF0033</a></h3>
						<span>...</span>
					</header>
					<p>...</p>
				</article>
				<article>
					<header>
						<h3><a target="_blank" href="http://">FFCC33</a></h3>
						<span>...</span>
					</header>
					<p>...</p>
				</article>
			</section>
        </div>
		<?php
}

?>







<!--fonction sortir l'article -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {
				
				var $container	= $('#dr-container'),
					$articles	= $container.children('article'),
					timeout;
				
				$articles.on( 'mouseenter', function( event ) {
						
					var $article	= $(this);
					clearTimeout( timeout );
					timeout = setTimeout( function() {
						
						if( $article.hasClass('active') ) return false;
						
						$articles.not( $article.removeClass('blur').addClass('active') )
								 .removeClass('active')
								 .addClass('blur');
						
					}, 65 );
					
				});
				
				$container.on( 'mouseleave', function( event ) {
					
					clearTimeout( timeout );
					$articles.removeClass('active blur');
					
				});
			
			});
		</script>
    </body>
</html>