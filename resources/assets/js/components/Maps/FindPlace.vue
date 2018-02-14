<template>
	<div >
		<input type="hidden" :value="placeId" id="place" name="place" required>
		<input id="findMapInput" class="form-control" @focus="showMap" :value="location" required>
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
				map: '',
				marker: '',
				infowindow: '',
				location: '',
				temp: ''
			}
		},
		watch: {
			placeId: function(){
				let el = this;
				if(this.placeId != ''){
					let geocoder = new google.maps.Geocoder;
					geocoder.geocode({'placeId':this.placeId}, function(result){
						el.showMap();
						el.location = result[0].formatted_address;
						el.map.setCenter(result[0].geometry.location);
						el.marker.setPlace({
								placeId: el.placeId,
								location: result[0].geometry.location
							});
						el.marker.setMap(el.map);
						el.infowindow.setContent(result[0].formatted_address);
						el.infowindow.open(el.map, el.marker);
					});
				}else {
					el.marker.setMap(null);
					el.infowindow.close();
				}
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

				vc.marker = new google.maps.Marker({
					map:vc.map
				});
				vc.infowindow = new google.maps.InfoWindow();

				var input = document.getElementById('findMapInput');

				var autocomplete = new google.maps.places.Autocomplete(input, {
					placeIdOnly: true
				});
				autocomplete.bindTo('bounds', vc.map);
				

				autocomplete.addListener('place_changed', function(){
					vc.placeId = autocomplete.getPlace().place_id;
					eventBus.$emit('updateLocation', vc.placeId);
				});
			});	
		},
		created: function(){
			let el = this;
			eventBus.$on('clearPlace', function(){
				el.placeId = '';
				el.location = '';
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