function bindAddCd(new_row) {

	$("#addCd").submit(function(event) {
		event.preventDefault();
			var id = $("#newCD").val();
			
			var route = Routing.generate('getInfosCd', {'id': id})
			$.get(route, function(cd){
				if(cd == null) {
					alert( "Cd CD ne peut pas être ajouté à la liste (déjà présent dans un airplay, ou supprimé)." );
				} else {
					if ($("#row_"+cd.cd).length == 0) {
							var content = new_row.replace(/:id/g,cd.cd).replace(':artiste',cd.artiste).replace(':titre',cd.titre).replace(':annee',cd.annee).replace(':rotation',cd.rotation).replace(':note',cd.note).replace(':star',cd.star).replace(':paulo',cd.paulo).replace(':anim',cd.anim).replace(':genre',cd.genre).replace(':type', cd.type).replace(':ecoute',cd.ecoute);
							$("#liste_cd tbody").prepend(content);
							classer();	
							editNumRow();
					} else {
						alert( "Ce CD (#"+cd.cd+") ne peut pas être ajouté à la liste (déjà présent dans cette liste)." );
					}
				}
			})
				.fail(function() {
					alert( "CD non trouvé" );
				});
			$("#newCD").val("");
	});
}

function deleteRow (cd) {
	$("#row_"+cd).remove();
	editNumRow();
}

function editNumRow () {
	$("#nbEtiquettes").html("Nombre d'étiquettes : " + $("#liste_cd tbody tr").length);
};

function classer() {
	var num = 1;
	$("#liste_cd .num_row_airplay").each(function() {
		$(this).html(num);
		num++;
	})
}