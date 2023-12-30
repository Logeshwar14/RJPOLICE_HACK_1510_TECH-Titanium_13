<html>

<head>

<title>location markers</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link media="all" type="text/css" href="assets/dashicons.css" rel="stylesheet">
<link media="all" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet">
<link rel='stylesheet' id='style-css'  href='style.css' type='text/css' media='all' />
<script type='text/javascript' src='assets/jquery.js'></script>
<script type='text/javascript' src='assets/jquery-migrate.js'></script>

<?php /* === GOOGLE MAP JAVASCRIPT NEEDED (JQUERY) ==== */ ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqkbkdi7tRpRzCDrSmLjpbk9Jx51D14y8&v=3" type="text/javascript"></script>
<script type='text/javascript' src='assets/gmaps.js'></script>

</head>

<body>
	<div id="container">

		<article class="entry">

			

			<div class="entry-content">

				<?php /* adding map */ ?>
				<div class="google-map-wrap" itemscope itemprop="hasMap" itemtype="http://schema.org/Map">
					<div id="google-map" class="google-map">
					</div><!-- map -->
				</div>

				<?php /* MAP DATA*/ ?>
				<?php
				$locations = array();

				/* Marker #1 */
				$locations[] = array(
					'google_map' => array(
						'lat' => '12.988240',
						'lng' => '79.971808',
					),
					'location_address' => 'marine block',
					'location_name'    => 'Officer A',
				);

				/* Marker #2 */
				$locations[] = array(
					'google_map' => array(
						'lat' => '12.988412',
						'lng' => '79.974230',
					),
					'location_address' => 'Block 5',
					'location_name'    => 'Officer B',
				);

				/* Marker #3 */
				$locations[] = array(
					'google_map' => array(
						'lat' => '12.987087',
						'lng' => '79.971068',
					),
					'location_address' => 'OAT',
					'location_name'    => 'Officer C',
				);

				
				?>


				

				<?php
				/* Setting Default Map area*/
				$map_area_lat = isset( $locations[0]['google_map']['lat'] ) ? $locations[0]['google_map']['lat'] : '';
				$map_area_lng = isset( $locations[0]['google_map']['lng'] ) ? $locations[0]['google_map']['lng'] : '';
				?>

				<script>
				jQuery( document ).ready( function($) {

					
					var is_touch_device = 'ontouchstart' in document.documentElement;

					var map = new GMaps({
						el: '#google-map',
						lat: '<?php echo $map_area_lat; ?>',
						lng: '<?php echo $map_area_lng; ?>',
						scrollwheel: false,
						draggable: ! is_touch_device
					});

					/* Map Bound */
					var bounds = [];

					<?php /* For Each Location Create a Marker. */
					foreach( $locations as $location ){
						$name = $location['location_name'];
						$addr = $location['location_address'];
						$map_lat = $location['google_map']['lat'];
						$map_lng = $location['google_map']['lng'];
						?>
						/* Set Bound Marker */
						var latlng = new google.maps.LatLng(<?php echo $map_lat; ?>, <?php echo $map_lng; ?>);
						bounds.push(latlng);
						/* Add Marker */
						map.addMarker({
							lat: <?php echo $map_lat; ?>,
							lng: <?php echo $map_lng; ?>,
							title: '<?php echo $name; ?>',
							infoWindow: {
								content: '<p><?php echo $name; ?></p>'
							}
						});
					<?php } //end foreach locations ?>

					/* Fit All Marker to map */
					map.fitLatLngBounds(bounds);

					/* Make Map Responsive */
					var $window = $(window);
					function mapWidth() {
						var size = $('.google-map-wrap').width();
						$('.google-map').css({width: size + 'px', height: (size/2) + 'px'});
					}
					mapWidth();
					$(window).resize(mapWidth);

				});
				</script>

				<div class="map-list">

					<h3><span>LIST</span></h3>

					<ul class="google-map-list" itemscope itemprop="hasMap" itemtype="http://schema.org/Map">

						<?php foreach( $locations as $location ){
							$name = $location['location_name'];
							$addr = $location['location_address'];
							$map_lat = $location['google_map']['lat'];
							$map_lng = $location['google_map']['lng'];
							?>
							<li>
								<a target="_blank" itemprop="url" href="<?php echo 'http://www.google.com/maps/place/' . $map_lat . ',' . $map_lng;?>"><?php echo $name; ?></a>
								<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><?php echo $addr; ?></span>
							</li>
						
						<?php } //end foreach ?>

					</ul><!-- .google-map-list -->
				</div>

			</div><!-- .entry-content -->

		</article>

	</div><!-- #container -->
	
</body>

</html>

