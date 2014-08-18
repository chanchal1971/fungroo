var ContactPage = function () {

    return {
        
    	//Basic Map
        initMap: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#map',
				lat: 12.856206,
				lng: 77.588625
			  });
			  
			  var marker = map.addMarker({
				lat: 12.856206,
				lng: 77.588625,
	            title: 'Company, Inc.'
		       });
			});
        },

        //Panorama Map
        initPanorama: function () {
		    var panorama;
		    $(document).ready(function(){
		      panorama = GMaps.createPanorama({
		        el: '#panorama',
		        lat : 12.856206,
		        lng : 77.588625
		      });
		    });
		}        

    };
}();