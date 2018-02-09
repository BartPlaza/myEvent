<template>
	<div id="gmap">
		
	</div>
</template>
<script>
	import GoogleMapsLoader from 'google-maps';
	GoogleMapsLoader.KEY = 'AIzaSyBMwczJKoRyj_7bvKKTPBvE-zh6pMO9HQA';
	GoogleMapsLoader.LIBRARIES = ['places', 'geometry'];
	export default {
		props: {
			placeId: {
				type: String,
				required: true
			}
		},
		data: function(){
			return {
				placeName: '',
				location: {}
			}
		},
		computed: {
			placeIdObj: function(){
				let placeId = this.placeId;
				let obj = {placeId};
				return obj;
			}
		},
		mounted: function(){
			let vc = this;
			let el = document.getElementById('gmap');

			GoogleMapsLoader.load(function(google) {
				var map = new google.maps.Map(el, {
					zoom: 13
				});
			var geocoder = new google.maps.Geocoder;
			var marker = new google.maps.Marker({
              map: map
            });
            var infowindow = new google.maps.InfoWindow;
			geocoder.geocode(vc.placeIdObj, function(result){
				vc.placeName = result[0].formatted_address;
				vc.location = result[0].geometry.location;
				map.setCenter(vc.location);
				marker.setPlace({
					placeId: vc.placeId,
					location: vc.location
				});
				infowindow.setContent(vc.placeName);
				infowindow.open(map,marker);
				vc.updateLocation();
			});
			});
		},
		methods: {
			updateLocation: function(){
				document.getElementById('event-location').innerHTML=this.placeName;
			}
		}
	}
</script>
<style>
#gmap
{
	width:100%;
	height: 300px;
}
</style>