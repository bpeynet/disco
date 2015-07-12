function confirmDelLabel(label,id) {
	var route = Routing.generate('deleteLabel', {'id': id})
	if (confirm("Supprimer le Label "+label+" ?" )) {
	 	window.location.replace(route);
	}
	return false;
}

function confirmDelArtiste(artiste,id) {
	var route = Routing.generate('deleteArtiste', {'id': id})
	if (confirm("Supprimer l'Artiste "+artiste+" ?" )) {
	 	window.location.replace(route);
	}
	return false;
}
