function confirmDelLabel(label,id) {  
	if (confirm("Supprimer le Label "+label+" ?" )) {
	 	window.location.replace('/label/delete/'+id);
	}  
}

function confirmDelArtiste(artiste,id) {  
	if (confirm("Supprimer l'Artiste "+artiste+" ?" )) {
	 	window.location.replace('/artiste/delete/'+id);
	}  
} 

function confirmDelCd(cd,id) {  
	if (confirm("Supprimer le Cd "+cd+" ?" )) {
	 	window.location.replace('/cd/delete/'+id);
	}  
} 

function confirmDelUser(user,id) {  
	if (confirm("Supprimer l'Utilisateur "+user+" ?" )) {
	 	window.location.replace('/user/delete/'+id);
	}  
} 