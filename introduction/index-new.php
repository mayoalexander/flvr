<?php
include_once('/kunden/homepages/0/d643120834/htdocs/config/index.php');
include_once(ROOT.'config/stats.php');
$user = new User();
//$blog = new Blog();
//$page_title = 'Magazine';
if ($blog_type=='single') {
	// IF SINGLE, FORMAT FOR SINGLE
	$blogentry = '
	<audio controls preload="metadata">
	<source src="'.$trackmp3.'"></source>
	</audio>';
}
if(strpos($blog_post_data['writeup'], 'livemixtapes')) {
	$blog_post_data['writeup'] = '<iframe src="'.$blog_post_data['writeup'].'" width="100%" height="450px" frameborder=0 seamless></iframe>';
} elseif(strpos($blog_post_data['writeup'], 'youtube')) {
	$blog_post_data['writeup'] = '<iframe src="'.$blog_post_data['writeup'].'" width="100%" height="450px" frameborder=0 seamless></iframe>';
} elseif(strpos($blog_post_data['writeup'], 'soundcloud')) {
	$blog_post_data['writeup'] = '<iframe src="'.$blog_post_data['writeup'].'" width="100%" height="450px" frameborder=0 seamless></iframe>';
}elseif(strpos($blog_post_data['writeup'], 'datpiff')) {
	//echo 'datpiff';
	$blog_post_data['writeup'] = '<iframe src="'.$blog_post_data['writeup'].'" width="100%" height="450px" frameborder=0 seamless></iframe>';
}elseif(strpos($blog_post_data['writeup'], 'audiomack')) {
	//echo 'datpiff';
	$blog_post_data['writeup'] = '<iframe src="'.$blog_post_data['writeup'].'" width="100%" height="450px" frameborder=0 seamless></iframe>';
} else {
	//$blog_post_data['writeup'] =  'not found';
}

if ($_GET['dev']==1) {
	print_r($config); exit;
}

?>



<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo HTTP."ico/favicon.ico"; ?>" >
		<link rel="shortcut icon" href="<?php echo HTTP; ?>ico/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo HTTP; ?>images/favicon.ico" type="image/x-icon">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title><?php echo $page_title; ?> // FREELABEL MAG + RADIO</title>
		<meta name="author" content="FREELABEL">
		<meta name="Description" content="// FREELABEL Network is the Leader in Online Showcasing">
		<meta name="Keywords" content="FREELABEL, FREE LABEL, FREE, LABEL, AMR, AMRecords, Rap, Hip Hop, Showcasing, Good Brand, Get That Good, Good Brand Clothing, Dalls Texas, FREELABEL, amradio, am radio live, texas, music, promotion, hip hop, rap">
		<meta name="Copyright" content="FREELABEL">
		<meta name="Language" content="English">


		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:player" content="<?php echo $page_url;?>">
		<meta name="twitter:player:width" content="300">
		<meta name="twitter:player:height" content="300">
		<meta name="twitter:image" content="<?php echo $blog_post_data['photo'];?>">
		<meta name="twitter:image:src" content="<?php echo $blog_post_data['photo'];?>">
		<meta name="twitter:site" content="@freelabelnet">
		<meta name="twitter:creator" content="@AMRadioLIVE">
		<meta name="twitter:title" content="<?php echo $page_title; ?> | FREELABEL RADIO + MAGAZINE + STUDIOS">
		<meta name="twitter:description" content="Submit your music to get showcased on FREELABEL Magazine, Radio, TV, Events, and more!">
		<meta property="og:url" content="<?php echo $page_url; ?>">
		<meta property="og:title" content="<?php echo $page_title; ?> // FREELABEL RADIO + MAGAZINE">
		<meta property="og:description" content="Subscribe and create an account to FREELABEL.net for exclusive access to daily updated news, interviews, singles and project releases from the most influencial creators of our generation.">
		<meta property="og:image" content="<?php echo $blog_post_data['photo']; ?>">
		<meta property="og:image:type" content="image/png">
		<meta property="og:image:width" content="1024">
		<meta property="og:image:height" content="1024">

		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo HTTP; ?>ico/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo HTTP; ?>ico/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo HTTP; ?>ico/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo HTTP; ?>ico/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo HTTP; ?>ico/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo HTTP; ?>ico/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo HTTP; ?>ico/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo HTTP; ?>ico/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo HTTP; ?>ico/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo HTTP; ?>ico/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo HTTP; ?>ico/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo HTTP; ?>ico/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo HTTP; ?>ico/favicon-16x16.png">
		<link rel="manifest" href="<?php echo HTTP; ?>ico/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo HTTP; ?>ico/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<link rel="manifest" href="<?php echo HTTP; ?>ico/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo HTTP; ?>ico/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<link rel="stylesheet" type="text/css" href="<?php echo HTTP.'introduction/';?>css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="http://freelabel.net/css/bootstrap-social/bootstrap-social.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP.'introduction/';?>css/demo.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo HTTP.'introduction/';?>css/component.css" />


	<!-- hover styles -->
<!-- 	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/hover/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/hover/css/demo.css" />
	<link rel="stylesheet" type="text/css" href="http://freelabel.net/landing/view/hover/css/set2.css" /> -->
	<link rel="stylesheet" href="http://freelabel.net/AudioPlayer/css/audioplayer.css" type='text/css'




		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body class="demo-2">


		<div id="container" class="container intro-effect-fadeout">
			<!-- Top Navigation -->
			<div class="codrops-top clearfix">
				<a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Tutorials/SamsungGrid/"><span>Previous Demo</span></a>
				<span class="right"><a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=19119"><span>Back to the Codrops Article</span></a></span>
			</div>
			<header class="header">
				<div class="bg-img"><img src="img/2.jpg" alt="Background Image" /></div>
				<div class="title">
					<nav class="codrops-demos">
						<a href="index.html">Push</a>
						<a class="current-demo" href="index2.html">Fade Out</a>
						<a href="index3.html">Sliced</a>
						<a href="index4.html">Side</a>
						<a href="index5.html">Fixed Side</a>
						<a href="index6.html">Grid</a>
						<a href="index7.html">Jam 3</a>
					</nav>
					<h1>Unconditional Love &amp; Cookies</h1>
					<p class="subline">Inspiration for Article Intro Effects</p>
					<p>by <strong>Mark Satorini</strong> &#8212; Posted in <strong>Animals</strong> on <strong>May 21, 2014</strong></p>
				</div>
			</header>
			<button class="trigger" data-info="Click to see the header effect"><span>Trigger</span></button>
			<article class="content">
				<div>
					<p>We may define a food to be any substance which will repair the functional waste of the body, increase its growth, or maintain the heat, muscular, and nervous energy. </p>
					<p>In its most comprehensive sense, the oxygen of the air is a food; as although it is admitted by the lungs, it passes into the blood, and there re-acts upon the other food which has passed through the stomach. It is usual, however, to restrict the term food to such nutriment as enters the body by the intestinal canal. Water is often spoken of as being distinct from food, but for this there is no sufficient reason.</p>
					<p>Many popular writers have divided foods into flesh-formers, heat-givers, and bone-formers. Although attractive from its simplicity, this classification will not bear criticism. Flesh-formers are also heat-givers. Only a portion of the mineral matter goes to form bone.</p>
					<p>These last are not strictly foods, if we keep to the definition already given; but they are consumed with the true foods or nutrients, comprised in the other two classes, and cannot well be excluded from consideration.</p>
					<p>Water forms an essential part of all the tissues of the body. It is the solvent and carrier of other substances.</p>
					<p>Mineral Matter or Salts, is left as an ash when food is thoroughly burnt. The most important salts are calcium phosphate, carbonate and fluoride, sodium chloride, potassium phosphate and chloride, and compounds of magnesium, iron and silicon.</p>
					<h3>Flesh-formers, heat-givers, and bone-formers</h3>
					<p>Mineral matter is quite as necessary for plant as for animal life, and is therefore present in all food, except in the case of some highly-prepared ones, such as sugar, starch and oil. Children require a good proportion of calcium phosphate for the growth of their bones, whilst adults require less. The outer part of the grain of cereals is the richest in mineral constituents, white flour and rice are deficient. Wheatmeal and oatmeal are especially recommended for the quantity of phosphates and other salts contained in them. Mineral matter is necessary not only for the bones but for every tissue of the body.</p>
					<p>When haricots are cooked, the liquid is often thrown away, and the beans served nearly dry, or with parsley or other sauce. Not only is the food less tasty but important saline constituents are lost. The author has made the following experiments:—German whole lentils, Egyptian split red lentils and medium haricot beans were soaked all night (16 hours) in just sufficient cold water to keep them covered. The water was poured off and evaporated, the residue heated in the steam-oven to perfect dryness and weighed. After pouring off the water, the haricots were boiled in more water until thoroughly cooked, the liquid being kept as low as possible. The liquid was poured off as clear as possible, from the haricots, evaporated and dried. The ash was taken in each case, and the alkalinity of the water-soluble ash was calculated as potash (K2O). The quantity of water which could be poured off was with the German lentils, half as much more than the original weight of the pulse; not quite as much could be poured off the others.</p>
					<h3>Soaking in cold water</h3>
					<p>The loss on soaking in cold water, unless the water is preserved, is seen to be considerable. The split lentils, having had the protecting skin removed, lose most. In every case the ash contained a good deal of phosphate and lime. Potatoes are rich in important potash salts; by boiling a large quantity is lost, by steaming less and by baking in the skins, scarcely any. The flavour is also much better after baking.</p>
					<p>The usual addition of common salt (sodium-chloride) to boiled potatoes is no proper substitute for the loss of their natural saline constituents. Natural and properly cooked foods are so rich in sodium chloride and other salts that the addition of common salt is unnecessary. An excess of the latter excites thirst and spoils the natural flavour of the food. It is the custom, especially in restaurants, to add a large quantity of salt to pulse, savoury food, potatoes and soups. Bakers' brown bread is usually very salt, and sometimes white is also. In some persons much salt causes irritation of the skin, and the writer has knowledge of the salt food of vegetarian restaurants causing or increasing dandruff. As a rule, fondness for salt is an acquired taste, and after its discontinuance for a time, food thus flavoured becomes unpalatable.</p>
					<p>Organic Compounds are formed by living organisms (a few can also be produced by chemical means). They are entirely decomposed by combustion.</p>
					<h3>Carbon compounds or heat-producers</h3>
					<p>The Non-Nitrogenous Organic Compounds are commonly called carbon compounds or heat-producers, but these terms are also descriptive of the nitrogenous compounds. These contain carbon, hydrogen and oxygen only, and furnish by their oxidation or combustion in the body the necessary heat, muscular and nervous energy. The final product of their combustion is water and carbon dioxide (carbonic acid gas).</p>
					<p>The Carbohydrates comprise starch, sugar, gum, mucilage, pectose, glycogen, &amp;c.; cellulose and woody fibre are carbohydrates, but are little capable of digestion. They contain hydrogen and oxygen in the proportion to form water, the carbon alone being available to produce heat by combustion. Starch is the most widely distributed food. It is insoluble in water, but when cooked is readily digested and absorbed by the body. Starch is readily converted into sugar, whether in plants or animals, during digestion. There are many kinds of sugar, such as grape, cane and milk sugars.</p>
					<p>The Oils and Fats consist of the same elements as the carbohydrates, but the hydrogen is in larger quantity than is necessary to form water, and this surplus is available for the production of energy. During their combustion in the body they produce nearly two-and-a-quarter times (4 : 8.9 = 2.225) as much heat as the carbohydrates; but if eaten in more than small quantities, they are not easily digested, a portion passing away by the intestines. The fat in the body is not solely dependent upon the quantity consumed as food, as an animal may become quite fat on food containing none. A moderate quantity favours digestion and the bodily health. In cold weather more should be taken. In the Arctic regions the Esquimaux consume enormous quantities. Nuts are generally rich in oil. Oatmeal contains more than any of the other cereals (27 analyses gave from 8 to 12.3 per cent.)</p>
					<h3>From acid and rancidity</h3>
					<p>The most esteemed and dearest oil is Almond. What is called Peach-kernel oil (Oleum Amygdalæ Persicæ), but which in commerce includes the oil obtained from plum and apricot stones, is almost as tasteless and useful, whilst it is considerably cheaper. It is a very agreeable and useful food. It is often added to, as an adulterant, or substituted for the true Almond oil. The best qualities of Olive oil are much esteemed, though they are not as agreeable to English taste as the oil previously mentioned. The best qualities are termed Virgin, Extra Sublime and Sublime. Any that has been exposed for more than a short time to the light and heat of a shop window should be rejected, as the flavour is affected. It should be kept in a cool place. Not only does it vary much in freedom from acid and rancidity, but is frequently adulterated. Two other cheaper oils deserve mention. The "cold-drawn" Arachis oil (pea-nut or earth-nut oil) has a pleasant flavour, resembling that of kidney beans. The "cold-drawn" Sesamé oil has an agreeable taste, and is considered equal to Olive oil for edible purposes. The best qualities are rather difficult to obtain; those usually sold being much inferior to Peach-kernel and Olive oils. Cotton-seed oil is the cheapest of the edible ones. Salad oil, not sold under any descriptive name, is usually refined Cotton-seed oil, with perhaps a little Olive oil to impart a richer flavour.</p>
					<p>The solid fats sold as butter and lard substitutes, consist of deodorised cocoanut oil, and they are excellent for cooking purposes. It is claimed that biscuits, &amp;c., made from them may be kept for a much longer period, without showing any trace of rancidity, than if butter or lard had been used. They are also to be had agreeably flavoured by admixture with almond, walnut, &amp;c., "cream."</p>

					<p>The better quality oils are quite as wholesome as the best fresh butter, and better than most butter as sold. Bread can be dipped into the oil, or a little solid vegetable fat spread on it. The author prefers to pour a little Peach-kernel oil upon some ground walnut kernels (or other ground nuts in themselves rich in oil), mix with a knife to a suitable consistency and spread upon the bread. Pine-kernels are very oily, and can be used in pastry in the place of butter or lard.</p>

					<p>Whenever oils are mentioned, without a prefix, the fixed or fatty oils are always understood. The volatile or essential oils are a distinct class. Occasionally, the fixed oils are called hydrocarbons, but hydrocarbon oils are quite different and consist of carbon and hydrogen alone. Of these, petroleum is incapable of digestion, whilst others are poisonous.</p>

					<p>Vegetable Acids are composed of the same three elements and undergo combustion into the same compounds as the carbohydrates. They rouse the appetite, stimulate digestion, and finally form carbonates in combination with the alkalies, thus increasing the alkalinity of the blood. The chief vegetable acids are: malic acid, in the apple, pear, cherry, &amp;c.; citric acid, in the lemon, lime, orange, gooseberry, cranberry, strawberry, raspberry, &amp;c.; tartaric acid, in the grape, pineapple, &amp;c.</p>

					<p>Some place these under Class III. or food adjuncts. Oxalic acid (except when in the insoluble state of calcium oxalate), and several other acids are poisonous.</p>

					<h3>The essential part of every living cell</h3>
					<p>Proteids or Albuminoids are frequently termed flesh-formers. They are composed of nitrogen, carbon, hydrogen, oxygen, and a small quantity of sulphur, and are extremely complex bodies. Their chief function is to form flesh in the body; but without previously forming it, they may be transformed into fat or merely give rise to heat. They form the essential part of every living cell.</p>

					<p>Proteids are excreted from the body as water, carbon dioxide, urea, uric acid, sulphates, &amp;c.</p>

					The principal proteids of animal origin have their corresponding proteids in the vegetable kingdom. Some kinds, whether of animal or vegetable origin, are more easily digested than others. They have the same physiological value from whichever kingdom they are derived.</p>

					<p>The Osseids comprise ossein, gelatin, cartilage, &amp;c., from bone, skin, and connective issue. They approach the proteids in composition, but unlike them they cannot form flesh or fulfil the same purpose in nutrition. Some food chemists wish to call the osseids, albuminoids; what were formerly termed albuminoids to be always spoken of as proteids only.</p>

					<p>Jellies are of little use as food; not only is this because of the low nutritive value of gelatin, but also on account of the small quantity which is mixed with a large proportion of water.</p>

					<p>The Vegetable Kingdom is the prime source of all organic food; water, and to a slight extent salts, form the only food that animals can derive directly from the inorganic kingdom. When man consumes animal food—a sheep for example—he is only consuming a portion of the food which that sheep obtained from grass, clover, turnips, &amp;c. All the proteids of the flesh once existed as proteids in the vegetables; some in exactly the same chemical form.</p>

					<blockquote>A comparatively small quantity of proteid matter, such as is easily obtained from vegetable food, is ample for the general needs of the body.</blockquote>
					<p>Flesh contains no starch or sugar, but a small quantity of glycogen. The fat in an animal is derived from the carbohydrates, the fats and the proteids of the vegetables consumed. The soil that produced the herbage, grain and roots consumed by cattle, in most cases could have produced food capable of direct utilisation by man. By passing the product of the soil through animals there is an enormous economic loss, as the greater part of that food is dissipated in maintaining the life and growth; little remains as flesh when the animal is delivered into the hands of the butcher. Some imagine that flesh food is more easily converted into flesh and blood in our bodies and is consequently more valuable than similar constituents in vegetables, but such is not the case. Fat, whether from flesh or from vegetables is digested in the same manner. The proteids of flesh, like those of vegetables, are converted into peptone by the digestive juices—taking the form of a perfectly diffusible liquid—otherwise they could not be absorbed and utilised by the body. Thus the products of digestion of both animal and vegetable proteids and fats are the same. Formerly, proteid matter was looked upon as the most valuable part of the food, and a large proportion was thought necessary for hard work. It was thought to be required, not only for the construction of the muscle substance, but to be utilised in proportion to muscular exertion. These views are now known to be wrong. A comparatively small quantity of proteid matter, such as is easily obtained from vegetable food, is ample for the general needs of the body. Increased muscular exertion requires but a slight increase of this food constituent. It is the carbohydrates, or carbohydrates and fats that should be eaten in larger quantity, as these are the main source of muscular energy. The fact that animals, capable of the most prolonged and powerful exertion, thrive on vegetables of comparatively low proteid value, and that millions of the strongest races have subsisted on what most Englishmen would consider a meagre vegetarian diet, should have been sufficient evidence against the earlier view.</p>

					<p>A comparison of flesh and vegetable food, shows in flesh an excessive quantity of proteid matter, a very small quantity of glycogen (the animal equivalent of starch and sugar) and a variable quantity of fat. Vegetable food differs much, but as a rule it contains a much smaller quantity of proteid matter, a large proportion of starch and sugar and a small quantity of fat. Some vegetable foods, particularly nuts, contain much fat.</p>

					<p>Investigation of the digestive processes has shown that the carbohydrates and fats entail little strain on the system; their ultimate products are water and carbon dioxide, which are easily disposed of. The changes which the proteids undergo in the body are very complicated. There is ample provision in the body for their digestion, metabolism, and final rejection, when taken in moderate quantity, as is the case in a dietary of vegetables. The proteids in the human body, after fulfilling their purpose, are in part expelled in the same way as the carbohydrates; but the principal part, including all the nitrogen, is expelled by the kidneys in the form of urea (a very soluble substance), and a small quantity of uric acid in the form of quadurates.</p>

					<p>There is reciprocity between the teeth and digestive organs of animals and their natural food. The grasses, leaves, &amp;c., which are consumed by the herbivora, contain a large proportion of cellulose and woody tissue. Consequently, the food is bulky; it is but slowly disintegrated and the nutritious matter liberated and digested. The cellulose appears but slightly acted upon by the digestive juices. The herbivora possess capacious stomachs and the intestines are very long. The carnivora have simpler digestive organs and short intestines. Even they consume substances which leave much indigestible residue, such as skin, ligaments and bones, but civilised man, when living on a flesh dietary removes as much of such things as possible. The monkeys, apes, and man (comprised in the order Primates have a digestive canal intermediate in complexity and in length to the herbivora and carnivora. A certain quantity of indigestible matter is necessary for exciting peristaltic action of the bowels. The carnivora with their short intestinal canal need the least, the frugivora more, and the herbivora a much larger quantity. The consumption by man of what is commonly called concentrated food is the cause of the constipation to which flesh-eating nations are subject. Most of the pills and other nostrums which are used in enormous quantities contain aloes or other drugs which stimulate the action of the intestines.</p>

					<p>Highly manufactured foods, from which as much as possible of the non-nutritious matter has been removed is often advocated, generally by those interested in its sale. Such food would be advantageous only if it were possible to remove or modify a great part of our digestive canal (we are omitting from consideration certain diseased conditions, when such foods may be useful). The eminent physiologist and bacteriologist, Elie Metchnikoff, has given it as his opinion that much of man's digestive organs is not only useless but often productive of derangement and disease. In several cases where it has been necessary, in consequence of serious disease, to remove the entire stomach or a large part of the intestines, the digestive functions have been perfectly performed. It is not that our organs are at fault, but our habits of life differ from that of our progenitors. In past times, when a simple dietary in which flesh food formed little or no part, and to-day, in those countries where one wholly or nearly all derived from vegetable sources and simply prepared is the rule, diseases of the digestive organs are rare. The Englishman going to a tropical country and partaking largely of flesh and alcohol, suffers from disease of the liver and other organs, to which the natives and the few of his own countrymen, living in accordance with natural laws are strangers.</p>
					<p><strong>Excerpt from: <a href="http://www.gutenberg.org/ebooks/15237">The Chemistry of Food and Nutrition</a> by A. W. Duncan</strong></p>
				</div>
			</article>
			<section class="related">
				<p>If you enjoyed these effects you might also like:</p>
				<div><a href="http://tympanus.net/Development/HeaderEffects/"><h4>On Scroll Header Effects</h4></a></div>
				<div><a href="http://tympanus.net/Tutorials/MediumStylePageTransition/"><h4>Medium-Style Page Transitions</h4></a></div>
			</section>
		</div><!-- /container -->
  		<script type="text/javascript" src='http://freelabel.net/config/globals.js'></script>
  		<script type="text/javascript" src='http://freelabel.net/js/modalBox-min.js'></script>
  		<script src="<?php echo HTTP.'introduction/';?>js/classie.js"></script>
		<script src="js/classie.js"></script>
		<script>
			(function() {

				// detect if IE : from http://stackoverflow.com/a/16657946		
				var ie = (function(){
					var undef,rv = -1; // Return value assumes failure.
					var ua = window.navigator.userAgent;
					var msie = ua.indexOf('MSIE ');
					var trident = ua.indexOf('Trident/');

					if (msie > 0) {
						// IE 10 or older => return version number
						rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
					} else if (trident > 0) {
						// IE 11 (or newer) => return version number
						var rvNum = ua.indexOf('rv:');
						rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
					}

					return ((rv > -1) ? rv : undef);
				}());


				// disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179					
				// left: 37, up: 38, right: 39, down: 40,
				// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
				var keys = [32, 37, 38, 39, 40], wheelIter = 0;

				function preventDefault(e) {
					e = e || window.event;
					if (e.preventDefault)
					e.preventDefault();
					e.returnValue = false;  
				}

				function keydown(e) {
					for (var i = keys.length; i--;) {
						if (e.keyCode === keys[i]) {
							preventDefault(e);
							return;
						}
					}
				}

				function touchmove(e) {
					preventDefault(e);
				}

				function wheel(e) {
					// for IE 
					//if( ie ) {
						//preventDefault(e);
					//}
				}

				function disable_scroll() {
					window.onmousewheel = document.onmousewheel = wheel;
					document.onkeydown = keydown;
					document.body.ontouchmove = touchmove;
				}

				function enable_scroll() {
					window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;  
				}

				var docElem = window.document.documentElement,
					scrollVal,
					isRevealed, 
					noscroll, 
					isAnimating,
					container = document.getElementById( 'container' ),
					trigger = container.querySelector( 'button.trigger' );

				function scrollY() {
					return window.pageYOffset || docElem.scrollTop;
				}
				
				function scrollPage() {
					scrollVal = scrollY();
					
					if( noscroll && !ie ) {
						if( scrollVal < 0 ) return false;
						// keep it that way
						window.scrollTo( 0, 0 );
					}

					if( classie.has( container, 'notrans' ) ) {
						classie.remove( container, 'notrans' );
						return false;
					}

					if( isAnimating ) {
						return false;
					}
					
					if( scrollVal <= 0 && isRevealed ) {
						toggle(0);
					}
					else if( scrollVal > 0 && !isRevealed ){
						toggle(1);
					}
				}

				function toggle( reveal ) {
					isAnimating = true;
					
					if( reveal ) {
						classie.add( container, 'modify' );
					}
					else {
						noscroll = true;
						disable_scroll();
						classie.remove( container, 'modify' );
					}

					// simulating the end of the transition:
					setTimeout( function() {
						isRevealed = !isRevealed;
						isAnimating = false;
						if( reveal ) {
							noscroll = false;
							enable_scroll();
						}
					}, 600 );
				}

				// refreshing the page...
				var pageScroll = scrollY();
				noscroll = pageScroll === 0;
				
				disable_scroll();
				
				if( pageScroll ) {
					isRevealed = true;
					classie.add( container, 'notrans' );
					classie.add( container, 'modify' );
				}
				
				window.addEventListener( 'scroll', scrollPage );
				trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
			})();
		</script>
		<script src="http://freelabel.net/AudioPlayer/js/jquery.js"></script>
		<script src="http://freelabel.net/AudioPlayer/js/audioplayer.js"></script>
		<script>$( function() { $( 'audio' ).audioPlayer(); } );</script>
	</body>
</html>
