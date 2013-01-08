<?php
/*

	thumbnail should be names foobar0.png
	screenshots should be named foobar#.png, # starts at 1
	shotCount is the total number of screenshots
	
	declare a new site like this:
	
	foobar = array(
		client=>'Foo Bar',
		url => 'http://www.foobar.com',
		id => "foobar",
		shotCount => 5,
	),
*/

$path = 'http://vbbros.net/vbbros/thumbs/';
$ext = '.png';

$sites = array(
	dietz => array(
		client=>'dieter dietz',
		url => 'http://www.dieterdietz.org',
		id => "dietz",
		shotCount => 4,
	),
	
	plak => array(
		client=>'plak records',
		url => 'http://www.plak-records.com',
		id => "plak",
		shotCount => 3,
	),
	
	easy => array(
		client=> 'easyamiante',
		url => 'http://www.easyamiante.ch',
		id => "easy",
		shotCount => 2,
	),
	
	mjc => array(
		client=>'moi j\'connais',
		url => 'http://www.moijconnais.com',
		id => "mjc",
		shotCount => 4,	
	),	
	
	andone => array(
		client=>'and-one architecture',
		url => 'http://www.and-one.ch',
		id => "andone",
		shotCount => 2,	
	),
	
	opuswerk => array(
		client=>'opuswerk',
		url => 'http://www.opuswerk.ch',
		id => "opuswerk",
		shotCount => 2,		
	),
		
	stef => array(
		client=>'st&eacute;phane blumer',
		url => 'http://www.stephaneblumer.com',
		id => "stef",
		shotCount => 4,		
	),
	
	absolutive => array(
		client=>'absolutive records',
		url => 'http://www.absolutive.net',
		id => "absolutive",
		shotCount => 4,		
	),

);

/* used to randomly place we */
$place = rand(0, 5);
$siteCounter = 0;//used to know how many sites have been displayed
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html" charset="UTF-8">
  <meta name="description" content="we create (your) website ">
  <meta name="keywords" content="webdesign, drupal, vbbros, geneva">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

  <title>vbbro's.net</title>
  
  <link rel="stylesheet" type="text/css" href="vbbros/styles.css">


  <!--[if IE]>
  <style type="text/css">
	.site{
		width: 30%;
		margin-right: 3%;
		float: left;
		margin-bottom: 50px;
	}
	
	.site:nth-child(3n){
		margin-right: 0px;
	}
	
	h2.client{
	    top: -40px;
	}
	
	#we:nth-child(3n-1){
	text-align: center;
	}
	
	#we:nth-child(3n+1){
		text-align: right;	
	}
	
	#we:nth-child(3n){
		text-align: left;	
	}
	</style>
  <![endif]-->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://flesler-plugins.googlecode.com/files/jquery.scrollTo-1.4.3.1-min.js"></script>
  <script type="text/javascript" src="http://vbbros.net/vbbros/script.js"></script>
</head>

<body>

<ul class="container">
		<?php foreach ($sites as $site): ?>
		
		<?php if($place == $siteCounter): ?>
			<li class="site" id="we">
				 <div id="we-content">
				        <h1 class="we-title"> VBBROS.NET </h1>
				    <p>we create (your) website</p>
				    <p><a href="mailto:info@vbbros.net">Hire us!</a></p>
				 </div>
			</li>
		<?php endif; ?> 
		
		<li class="site">
			    <a class="site-image-a site-link" href="<?php print $site['url'] ?>" target="_blank">
				    <div class="site-image" style="background-image: url(<?php print $path . $site['id'] . '0' . $ext ?>)"> 
				    </div>
				    <!-- <img class="site-image" width="100%" height="auto" src="<?php print $path . $site['id'] . '0' . $ext ?>"/> -->
			    <!-- </a> -->
			    <section class="site-info">
			        	<h2 class="client"><?php print $site['client'] ?></h2>
			        <?php if(false): ?>
			        <div class="client-link"> 
			                <?php for($i = 1; $i <= $site['shotCount']; $i++): ?>                
			            	<a class="colorbox <?php print( ($i==1) ? "client-ss" : "more-pics" ) ?>" href="<?php print $path . $site['id']. $i . $ext ?>" rel="<?php print $site['id'] ?>"><?php print( ($i==0) ? "view" : "more screenshots" ) ?></a>
			            	<?php endfor; ?>
			            <a class="client-visit" href="<?php print $site['url'] ?>" target="_blank"> visit </a>
			        </div> 
			        <?php endif; ?>
			    </section>
			  </a>
		</li>  
		
		<?php $siteCounter++; endforeach; ?>    
	</ul>
	<div id="frame-container" style="display: none">
	<div class="frame-title"> </div>
	<div class="back">&uarr;</div>
<iframe id="iframe" height="90%" width="100%" >
</iframe>
	</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27024782-9']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>


</html>

