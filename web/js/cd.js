
  	function log( input, message ) {
  		$("#"+input).text(message.libelle);
      $( "#"+input+"_hidden" ).val( message.num );
    }
 	var artisteCompleteParameters = {
      source: Routing.generate('autocompleteArtiste',{'like':1}),
      minLength: 2,
      delay: 300,
      select: function( event, ui ) {
        $(this).text(ui.item.libelle);
      },
      create : function( event, ui ){$(".ui-helper-hidden-accessible").remove();}
    };
    $( "#artiste" ).autocomplete(artisteCompleteParameters);

    $( "#label" ).autocomplete({
      source: Routing.generate('autocompleteLabel',{'like':1}),
      minLength: 2,
      delay: 300,
      select: function( event, ui ) {
        log('label',ui.item);
      },
	  create : function( event, ui ){$(".ui-helper-hidden-accessible").remove();}
    });

    $( "#maison" ).autocomplete({
      source: Routing.generate('autocompleteLabel',{'like':1}),
      minLength: 2,
      delay: 300,
      select: function( event, ui ) {
        log('maison',ui.item);
      },
	  create : function( event, ui ){$(".ui-helper-hidden-accessible").remove();}
    });

    $( "#distrib" ).autocomplete({
      source: Routing.generate('autocompleteLabel',{'like':1}),
      minLength: 2,
      delay: 300,
      select: function( event, ui ) {
        log('distrib',ui.item);
      },
	  create : function( event, ui ){$(".ui-helper-hidden-accessible").remove();}
    });

    /**
		La fonction suivante vérifie que l'artiste existe ou non
    */
    $("#artiste").blur(function() {
    	if($("#artiste").val() != "") {
			$.ajax({
			  url: Routing.generate('autocompleteArtiste',{'like':0}),
			  type: 'GET',
			  data: 'term='+$("#artiste").val()
			}).done(function(tab_exact){
				if ( tab_exact.length == 1) {
					$("#artiste_hidden").val(tab_exact[0].num);
				} else {
		  			if(confirm("Cet Artiste semble ne pas exister... Le créer ?")) {
		  				var route = Routing.generate('createArtiste',{'libelle': $('#artiste').val() });
		  				window.open(route,"Pop-up","toolbar=0,location=0,directories=0,menuBar=0,resizable=0,scrollbars=yes,width=470,height=400,left=75,top=60");
			  		} else {
			  			$("#artiste_hidden").val("");
			  		};
				};

			});
    	}
  	});

  	function labelsVerif (htmlItem,hiddenItem) {
  		if(htmlItem.val() != "") {
			$.ajax({
			  url: Routing.generate('autocompleteLabel',{'like':0}),
			  type: 'GET',
			  data: 'term='+htmlItem.val()
			}).done(function(tab_exact){
				if ( tab_exact.length == 1) {
					hiddenItem.val(tab_exact[0].num);
				} else {
		  			if(confirm("Le Label "+ htmlItem.val() +" semble ne pas exister... Le créer ?")) {
		  				var route = Routing.generate('createLabel',{'libelle': htmlItem.val() });
		  				window.open(route,"Pop-up","toolbar=0,location=0,directories=0,menuBar=0,resizable=0,scrollbars=yes,width=470,height=400,left=75,top=60");
			  		} else {
			  			hiddenItem.val("");
			  		};
				};
			});
  		}
  	}

  	$("#label").blur(function() { labelsVerif($("#label"),$("#label_hidden")) });
  	$("#maison").blur(function() {labelsVerif($("#maison"),$("#maison_hidden"))});
  	$("#distrib").blur(function() {labelsVerif($("#distrib"),$("#distrib_hidden"))});

  	$(".artiste_autocomplete").autocomplete(artisteCompleteParameters);

  	$("#nbPiste").change(function() {
  		var nbPiste = $("#nbPiste").val();
  		var table = $("#pistes > tbody");
  		var template = "<tr id='track_NNN'><td>NNN</td><td><input name='titre_NNN' value='Track NNN'></td><td><input id='artiste_NNN' name='artiste_NNN' class='artiste_autocomplete'></td><td><input type='checkbox' class='fr_input' name='fr_NNN'></td><td><input type='checkbox' name='anim_NNN' value='1'></td><td><input type='checkbox' name='rivendell_NNN' value='1'></td><td><input class='k_star' type='checkbox' name='star_NNN' value='1'></td></tr>";
  		table.empty();
  		for (var i = 1; i <= nbPiste; i++) {
  			table.append(template.replace(/NNN/g, i));
  			$( "#artiste_NNN".replace(/NNN/g, i) );
  		};
  		verifVarious();
  		verifFr();
  	});

  	function verifVarious () {
  		for(var i = 1; i<= $("#nbPiste").val(); i++) {
			if($("#various").prop('checked')) {
				$("#artiste_"+i).show();
	  		} else {
	  			$("#artiste_"+i).hide();
	  		}
		}
  	}

  	function verifFr () {
  		if ($("#full_fr").is(":checked")) {
  			$(".fr_input").each(function() {
  				$(this).prop('checked',true);
  			});
  		} else {
  			$(".fr_input").each(function() {
  				$(this).prop('checked',false);
  			});
  		};
  	}

  	$("#various").click(function() {
  		verifVarious();
  	});

  	$("#full_fr").click(function(){
  		verifFr();
  	});

	$("#pochette_delete").click(function(){
		id = $(this).attr('num');
		if(confirm("Supprimer la pochette actuelle ?")) {
			route = Routing.generate('removePochette', {'id': id})
			$.get(route, function(retour){
				if(retour.ok) {
					$("#div_pochette").remove();
				} else {
					alert("La pochette n'a pas pu être supprimé !")
				}
			})
		}
	});
