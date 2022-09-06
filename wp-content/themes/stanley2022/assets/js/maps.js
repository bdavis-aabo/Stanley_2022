var urlSegment = window.location.pathname.split('/');
if(urlSegment[1] === 'about'){

	//Mapbox setup
	mapboxgl.accessToken = 'pk.eyJ1IjoiYnBkYXZpczgxIiwiYSI6ImNrcTQwbDR4NTByZGgycG56N3pkMDB1NGMifQ.5qgmUy3sOAsi5vEhcV3Rmg';
	var lng = 39.75304;
	var lat = -104.87694;

	const map = new mapboxgl.Map({
		container: 'map',
		style: 'mapbox://styles/thejessica400/cl433qdgz000015o2d6yq9nyv',
		zoom: 11,
		center: [lat,lng]
	});
	var nav = new mapboxgl.NavigationControl();
	var size = 250;


	// implementation of CustomLayerInterface to draw a pulsing dot icon on the map
	// see https://docs.mapbox.com/mapbox-gl-js/api/#customlayerinterface for more info
	var pulsingDot = {
		width: size,
		height: size,
		data: new Uint8Array(size * size * 4),

		// get rendering context for the map canvas when layer is added to the map
		onAdd: function () {
			var canvas = document.createElement('canvas');
			canvas.width = this.width;
			canvas.height = this.height;
			this.context = canvas.getContext('2d');
		},

		// called once before every frame where the icon will be used
		render: function () {
			var duration = 1000;
			var t = (performance.now() % duration) / duration;

			var smRadius = (size / 5) * 0.2;
			var radius = (size / 2) * 0.4;
			var outerRadius = (size / 2) * 0.6 * t + radius;
			var context = this.context;

			// draw outer circle
			context.clearRect(0, 0, this.width, this.height);
			context.beginPath();
			context.arc(
				this.width / 2,
				this.height / 2,
				outerRadius,
				0,
				Math.PI * 2
			);
			context.fillStyle = 'rgba(255, 68, 56,' + (1 - t) + ')';
			context.fill();

			// draw inner circle
			context.beginPath();
			context.arc(
				this.width / 2,
				this.height / 2,
				radius,
				0,
				Math.PI * 2
			);
			context.fillStyle = 'rgba(255, 68, 56, 1)';
			context.lineWidth = 2 + 4 * (1 - t);
			context.fill();

			//draw inner-inner circle
			context.beginPath();
			context.arc(
				this.width / 2,
				this.height / 2,
				smRadius,
				0,
				Math.PI * 2
			);
			context.fillStyle = 'rgba(255,255,255,.8)';
			context.fill();

			// update this image's data with data from the canvas
			this.data = context.getImageData(
				0,
				0,
				this.width,
				this.height
			).data;

			// continuously repaint the map, resulting in the smooth animation of the dot
			map.triggerRepaint();

			// return `true` to let the map know that the image was updated
			return true;
		}
	};

	map.on('load', function () {
		map.resize();
		map.addImage('pulsing-dot', pulsingDot, { pixelRatio: 2 });

		map.addSource('points', {
			'type': 'geojson',
			'data': {
				'type': 'FeatureCollection',
				'features': [
					{
					'type': 'Feature',
						'properties': {
						'description':
							'<img src="http://bryans-macbook-pro.local:5757/wp-content/themes/barefoot_2.0/assets/images/BFL-logo.png" alt="Barefoot Lakes" class="img-responsive">' +
							'<br/>' +
							'<a href="" title="Get Directions to Barefoot Lakes" class="btn ltblue-btn">Get Directions</a>'
						},
						'geometry': {
							'type': 'Point',
							'coordinates': [lat,lng]
						}
					}
				]
			}
		});
		map.addLayer({
			'id': 'points',
			'type': 'symbol',
			'source': 'points',
			'layout': {
				'icon-image': 'pulsing-dot'
			}
		});
	});

} //end if
