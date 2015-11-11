$(document).ready(function(){

	view = new ol.View({
		center: [-6217890.205764902, -1910870.6048274133],
		zoom: 4,
		maxZoon: 18,
		minZoon: 2
	});


	var mapquest = new ol.layer.Tile({
		source:  new ol.source.MapQuest({layer: 'osm'}),
		visible: true,
		name: 'mapquest'
	});

	var bingmaps = new ol.layer.Tile({
		source:  new ol.source.BingMaps({layer: 'osm'}),
		visible: false,
		name: 'mapquest'
	});

	var map =  new ol.Map({
		target: 'mapa',
		controls: ol.control.defaults().extend([
			new ol.control.ScaleLine(),
			new ol.control.ZoomSlider()
		]),
		renderer: 'canvas',
		layers : [baserLayer],
		view: view
	});

});