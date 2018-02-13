<template>
	<div >
		<input type="hidden" :value="placeId" id="place" name="place" required>
		<input id="findMapInput" class="form-control" @focus="showMap" required>
		<div id="findMap"></div>
	</div>
</template>
<script>
	import GoogleMapsLoader from 'google-maps';
	GoogleMapsLoader.KEY = 'AIzaSyBMwczJKoRyj_7bvKKTPBvE-zh6pMO9HQA';
	GoogleMapsLoader.LIBRARIES = ['places', 'geometry'];
	export default {
		data: function(){
			return {
				placeId: '',
				map: ''
			}
		},
		mounted: function(){
			let vc = this;
			let el = document.getElementById('findMap');

			GoogleMapsLoader.load(function(google) {
				vc.map = new google.maps.Map(el, {
					zoom: 8,
					center: {lat: 50.04, lng: 19.86}
				});

				var marker = new google.maps.Marker({
					map:vc.map
				});
				var infowindow = new google.maps.InfoWindow();

				var input = document.getElementById('findMapInput');

				var autocomplete = new google.maps.places.Autocomplete(input, {
					placeIdOnly: true
				});
				autocomplete.bindTo('bounds', vc.map);
				

				autocomplete.addListener('place_changed', function(){
					vc.placeId = autocomplete.getPlace().place_id;
					eventBus.$emit('updateLocation', vc.placeId);
					let geocoder = new google.maps.Geocoder;
					geocoder.geocode({'placeId':vc.placeId}, function(result){
						vc.map.setCenter(result[0].geometry.location);
						marker.setPlace({
							placeId: vc.placeId,
							location: result[0].geometry.location
						});
						infowindow.setContent(result[0].formatted_address);
						infowindow.open(vc.map, marker);
					});
				});
			});	
		},
		created: function(){
			let el = this;
			eventBus.$on('clearPlace', function(){
				el.placeId = '';
				document.getElementById('findMapInput').value = '';
			});
			eventBus.$on('showModal', function(event){
				el.placeId = event.place_id;
			});
		},
		methods: {
			showMap: function(){
				document.getElementById('findMap').style.height = '250px';
				google.maps.event.trigger(this.map, 'resize');
			}
		}
	}
</script>
<style>
#findMap
{
	width:100%;
	height: 0;
}

#findMapInput
{
	width: 100%;
}
</style>