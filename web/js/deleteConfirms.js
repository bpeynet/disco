function confirmDelLabel(label,id) {  
		var route = Routing.generate('deleteLabel', {'id': id})
	if (confirm("Supprimer le Label "+label+" ?" )) {
	 	window.location.replace(route);
	}  
}

function confirmDelArtiste(artiste,id) {
	var route = Routing.generate('deleteArtiste', {'id': id})
	if (confirm("Supprimer l'Artiste "+artiste+" ?" )) {
	 	window.location.replace(route);
	}  
} 

function confirmDelCd(cd,id) {  
	var route = Routing.generate('deleteCd', {'id': id})
	if (confirm("Supprimer le Cd "+cd+" ?" )) {
	 	window.location.replace(route);
	}  
} 

function confirmDelUser(user,id) {  
	var route = Routing.generate('deleteUser', {'id': id})
	if (confirm("Supprimer l'Utilisateur "+user+" ?" )) {
	 	window.location.replace(route);
	}  
} 