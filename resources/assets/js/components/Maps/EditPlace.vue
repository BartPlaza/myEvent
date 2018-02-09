<template>
	<input type="text" class="form-controll" id="editMap">
</template>

<script>
import GoogleMapsLoader from 'google-maps';
GoogleMapsLoader.KEY = 'AIzaSyBMwczJKoRyj_7bvKKTPBvE-zh6pMO9HQA';
GoogleMapsLoader.LIBRARIES = ['places', 'geometry'];


export default {
	data: function(){
		return {
			placeee: ''
		}
	},
	mounted: function(){
		GoogleMapsLoader.load(function(google){
			let el = this;
			const input = document.getElementById('editMap');
			var autocomplete = new google.maps.places.Autocomplete(input, {
					placeIdOnly: true
				});
			autocomplete.addListener('place_changed', function(){
				alert(autocomplete.getPlace().place_id);
			});

		});	
	}
}

</script>

<style scoped>

#editMap
{
	width: 100%;
}

</style>