<?php
/*

	thumbnail should be names foobar0.png
	screenshots should be named foobar#.png, # starts at 1
	shotCount is the total number of screenshots
	
	declare a new site like this:
	
	foobar = array(
		client =>'Foo Bar',
		url => 'http://www.foobar.org',
		date => '2013',
		type => 'foo',
		location => 'Bar foo',
		id => "foobar",
		classes => 'coming-soon', // if the site isn't ready yet (then it shouldn't even be there, should it now..)
	),
*/

$path = 'http://vbbros.net/vbbros/thumbs/';
$ext = '.png';

$sites = array(
	dietz => array(
		client =>'dieter dietz',
		url => 'http://www.dieterdietz.org',
		date => '2012',
		type => 'Architecture',
		location => 'Geneva / Z&uuml;rich',
		id => "dietz",
		job => "development",
		classes => 'coming-soon',
	),
	
	plak => array(
		client =>'plak records',
		url => 'http://www.plak-records.com',
		date => '2012',
		type => 'Label',
		location => 'Geneva',
		id => "plak",
		job => "design, concept, development",
	),
	
	easy => array(
		client => 'easyamiante',
		url => 'http://www.easyamiante.ch',
		date => '2012',
		type => 'Corporate',
		location => 'Geneva',
		id => "easy",
		job => "design, development",

	),
	
	mjc => array(
		client =>'moi j\'connais records',
		url => 'http://www.moijconnais.com',
		date => '2011',
		type => 'Label',
		location => 'Geneva',
		id => "mjc",
		job => "design, concept, development",	
	),	
	
	andone => array(
		client =>'and-one architecture',
		url => 'http://www.and-one.ch',
		date => '2011',
		type => 'Architecture',
		location => 'Geneva',
		id => "andone",
		job => "design, development",
	),
	
	opuswerk => array(
		client =>'opuswerk',
		url => 'http://www.opuswerk.ch',
		date => '2010',
		type => 'Musician',
		location => 'Geneva',
		id => "opuswerk",
		job => "design, concept, development"
	),
		
	stef => array(
		client =>'st&eacute;phane blumer',
		url => 'http://www.stephaneblumer.com',
		date => '2010',
		type => 'Artist',
		location => 'Geneva / London',
		id => "stef",
		job => "design, concept, development"
	),
	
	absolutive => array(
		client =>'absolutive records',
		url => 'http://www.absolutive.net',
		date => '2010',
		type => 'Label',
		location => 'Aix-en-Provence',
		id => "absolutive",
		job => "design, concept, development",
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
  <script type="text/javascript" src="vbbros/jquery.avgrund.js_v1_1/jquery.avgrund.js"></script>
  <link rel="stylesheet" type="text/css" href="vbbros/jquery.avgrund.js_v1_1/avgrund.css">
  <script type="text/javascript" src="vbbros/script.js"></script>
  <script type="text/javascript" src="vbbros/mousetrap.min.js"></script>
  <script type="text/javascript" src="vbbros/jquery.cycle2.min.js"></script>
  <script type="text/javascript" src="vbbros/jquery.cycle2.scrollVert.js"></script>
</head>

<body>

<ul class="container">
		<?php foreach ($sites as $site): ?>
		
			<?php if($place == $siteCounter): ?>
				<li class="item" id="we">
					 <div id="we-content">
					    <h1 class="we-title"> VBBROS.NET </h1>
					    <h2>we create (your) websites</h2>
					    <p><a href="mailto:info@vbbros.net">Hire us!</a></p>
					    <p>or have a look around!</p>
					 </div>
				</li>
			<?php endif; ?> 
			
			<li class="item site <?php print $site['classes'] ?>">
				    <a class="site-image-a site-link <?php print $site['classes'] ?>" href="<?php print $site['url'] ?>" target="_blank">
					    <div class="site-image" style="background-image: url(<?php print $path . $site['id']. $ext ?>)"> 
					    </div>
					    <!-- <img class="site-image" width="100%" height="auto" src="<?php print $path . $site['id'] . $ext ?>"/> -->
				    <div class="site-info">
				        <h2 class="client"><?php print $site['client'] ?></h2>
				        <div class="job"><?php print $site['job'] ?></div>
				    </div>
				  </a>
			</li>  
		
		<?php $siteCounter++; endforeach; ?>    
	</ul>
	
	
	<div id="frame-container" style="display: none">
		<div class="frame-more"> 
			<div class="controls">
				<span class="nav">
					<span class="frame-prev- button">
						<span class="frame-prev button">&lt;</span>
					</span>
					<span class="frame-next- button">
						<span class="frame-next button">&gt;</span>
					</span>
				</span>
				<span class="frame-close button">X</span>
			</div>
			<div class="frame-desc cycle-slideshow" data-cycle-prev=".frame-prev-" data-cycle-next=".frame-next-" data-cycle-slides=".frame-desc" data-cycle-paused="true" data-cycle-sync="false" data-cycle-timeout="400" data-cycle-speed="300" data-cycle-fx="scrollVert">
				<?php foreach($sites as $site): ?>
					<?php if($site['classes'] != "coming-soon"): ?>
						<div class="frame-desc">
							<span class="frame-title"><a href="<?php print $site['url'] ?>" target="_blank"><?php print $site['client'] ?></a></span>
							<span class="frame-details">
								<span class="frame-type"><?php print $site['type'] ?></span>
								<span class="frame-location"><?php print $site['location'] . ', ' . $site['date'] ?></span>
							</span>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>			
		</div>
		
		<div class="frames cycle-slideshow" data-cycle-prev=".frame-prev" data-cycle-next=".frame-next" data-cycle-slides=" iframe" data-cycle-fx="scrollHorz" data-cycle-paused="true">
			<?php foreach($sites as $site): ?>
				<?php if($site['classes'] != "coming-soon"): ?>	
					<iframe id="iframe" data-src="<?php print $site['url'] ?>" height="70%" width="100%" ></iframe>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
	
	
<script id="ga" type="text/javascript">

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

