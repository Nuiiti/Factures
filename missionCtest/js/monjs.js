function main() {
	ajouterligne();
	supprimerligne();
	miroir();

	choixfacture();

	choixfactureavoir();

	gestion_btn();

	choixentete();
	
	cptligne();

	cptligne_all();

	afficherrep();

	confirmersupp();

	choix_fact_url();
	
	exporter();
}




function diff() {

	$("#id_debit_ctrl, #id_credit_ctrl").on("input", function () {
		calculerdiff();
	});
}

function calculerDiff() {

	var afficher = 0;
	var debit = $("#id_debit_ctrl").val();
	var credit = $("#id_credit_ctrl").val();
	afficher = -debit;
	afficher += +credit;
	$("#id_diff_ctrl").val(afficher);
}

function miroir() {
	miroir_credit();
	miroir_debit();
}

function miroir_debit() {

	$(".debit").on("input", function () {
		calculerDebit();
	});
}

function calculerDebit() {
	var somme = 0;
	$(".debit").each(function () {
		somme += +$(this).val();
	});
	$("#id_debit_ctrl").val(somme);
	calculerDiff();
}

function miroir_credit() {

	$(".credit").on("input", function () {
		calculerCredit();
	});
}

function calculerCredit() {
	var somme = 0;
	$(".credit").each(function () {
		somme += +$(this).val();
	});
	$("#id_credit_ctrl").val(somme);
	calculerDiff();
}



function ajouterligne() {
	var ligne1 = $("#id_tab_od tr:eq( 2 )");
	var cpt = 1;
	ligne1.find("input").each(function(){
		var first = $(this).attr("name", $(this).attr("name")+cpt) ;
	});	
	
	$("#id_add").click(function () {
		cpt = cpt + 1 ;
		
		//cloner la ligne 1
		var ligne = ligne1.clone();	
		
		//nom dynamique sur chaque input type=text
		ligne.find("input").each(function(){
			var name = $(this).attr("name", $(this).attr("name")+cpt) ;
			$(this).attr("name", $(this).attr("name").replace("1","")) ;
		});
		ligne.attr("id","");	
		$(this).before(ligne);
		$("#id_tab_od tr:eq(-2)").find($("input[type='text']")).val("");
		miroir();
	});

}

function supprimerligne() {
	$(".icone2").click(function () {
		$("#id_model").remove();
	});

	$("#id_add").click(function () {
		$(".icone2").each(function () {
			$(this).click(function () {
				$(this).parent().parent().parent().remove();
				calculerCredit();
				calculerDebit();
				cptligne();
			});
		});
	});
}

function choixfacture() {
	var choixfact = "";
	$("#id_select_fact").change(function () {
		choixfact = $(this).val();
		if (choixfact === "Choisir une facture") {

			$(".ligne_od_voir").show();
		} else {
			$(".td_id_fact").each(function () {

				//$("#id_liste_factures tr").show();
				if ($(this).html() === choixfact) {
					$(this).parent().show();
				} else {
					$(this).parent().hide();
				}

			});
		}
	});
}

function choixfactureavoir() {
	$("tr[name='av']").hide();
	var choixfact = "";
	$("#id_select_fact_avoir").change(function () {
		choixfact = $(this).val().substring(0, 1);
		if (choixfact === "C") {
			$("tr[name='av']").hide();
		} else {
			$("tr[name='av']").each(function () {
				if ($(this).attr("class") === choixfact) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
		}
	});
}

// ----------------- Gestion des action des input type submit -------------------
function gestion_btn(){
	btn_on_off();
	btn_switch();
	btn_switch_tiers();
	btn_switch_supp_modif();
	btn_confirmer_edit();

}

function btn_on_off() {
	$("input[name='facture'], input[name='ligne'], input[name='tiers'] ").click(function () {

		$("#id_btn_od, #id_btn_avoirs, #id_btn_supp, #id_btn_modif, #id_btn_supp_lignes, #id_btn_modif_lignes, #id_btn_lignes,#id_btn_tiers_fact,#id_btn_tiers_avoirs").attr("disabled", false);

	});
}
function btn_switch() {
	id = $('.id_facture').html();
	$("#id_btn_avoirs").click(function () {
		$("#id_form_fact").attr("action", "http://localhost/missionCtest/consulter/facture/avoirs/id_fact/"+id)
	});
	$("#id_btn_od").click(function () {
		$("#id_form_fact").attr("action", "http://localhost/missionCtest/consulter/facture/lignes/id_fact/"+id)
	});
}

function btn_switch_tiers() {
	$("#id_btn_tiers_fact").click(function () {
		$("#id_form_fact").attr("action", "factures.php")
	});
	$("#id_btn_tiers_avoirs").click(function () {
		$("#id_form_fact").attr("action", "avoirs.php")
	});
}

function btn_switch_supp_modif(){
	btn_switch_supp_modif_entete();	
	btn_switch_supp_modif_lignes();
}

function btn_switch_supp_modif_entete() {
	$('input[type="radio"]').click(function(){
		id = ($(this).val());
	});
		$("#id_btn_supp").click(function () {
			$("#id_form_fact").attr("action", "http://localhost/missionCtest/vues/modifier/facture");
		});

		$("#id_btn_modif").click(function () {
			$("#id_form_fact").attr("action", "http://localhost/missionCtest/vues/modifier/facture/entete/id_fact/"+id);
		});
		$("#id_btn_lignes").click(function(){
			$("#id_form_fact").attr("action", "http://localhost/missionCtest/vues/modifier/facture/ligne/id_fact/"+id);
		});
}
function btn_switch_supp_modif_lignes() {
	$('input[type="radio"]').click(function(){
		id_ligne = $(this).val();
		id_facture = $('.id_facture').html();
	});
	$("#id_btn_supp_lignes").click(function () {
		$("#id_form_lignes").attr("action", "#");
	});
	$("#id_btn_modif_lignes").click(function () {
		$("#id_form_lignes").attr("action", "http://localhost/missionCtest/vues/modifier/facture/ligne/id_fact/"+id_facture+"/id_ligne/"+id_ligne);
	});
}

function btn_confirmer_edit(){
	id_facture = $('input[name="facture"]').val();
	$("#id_btn_modif_ligne_conf").click(function () {
		$("#id_form_lignes").attr("action", "http://localhost/missionCtest/vues/modifier/facture/ligne/id_fact/"+id_facture);	
	});
}

function choix_fact_url(){
	$('input[type="radio"]').click(function(){
		fact = ($(this).val());
		$('#id_btn_od').attr('href','http://localhost/missionCtest/consulter/facture/lignes/id_fact/'+fact);
		$('#id_btn_avoirs').attr('href','http://localhost/missionCtest/consulter/facture/avoirs/id_fact/'+fact);
	});
} 

//--------------------------------azeaze----------------------------------


function choixentete() {
	var choixentete = "";

	$("#id_select_entete").change(function() {
		choixentete = $("#id_select_entete").val();
		
		$(".id_facture").each(function(){
			if(choixentete.substring(0, 1) === "C"){
				$(this).val("");
			}else
				$(this).val(choixentete);
		});
	});
	$("#id_add").click(function () {
		$(".id_facture").each(function(){
			if(choixentete.substring(0, 1) === "C"){
				$(this).val("");
			}else
				$(this).val(choixentete);
		});
	});
}

// ----------- Les compteur de lignes ---------------------
function cptligne(){
	$("#id_nb_lignes").val($(".ligne").length);	
	$("#id_add").click(function(){
		var nblignes = $(".ligne").length;
		$("#id_nb_lignes").val(nblignes) ;
	});
}

function cptligne_all(){
	var cpt = 1;
	$("#id_nb_lignes_all").val(cpt);	
	$("#id_add").click(function(){
		cpt += +1;
		var nblignes = cpt;
		$("#id_nb_lignes_all").val(nblignes) ;
	});
}

//  --------- Afficher les message success ---------------
function afficherrep(){
	$("#flip").click(function(){
		$("#panel").slideToggle("slow");
	});
		
}


function confirmersupp(){
	$("input[name='supp']").click(function(){
		confirm("Voulez vous vraiment supprimer ?");
	});
}





function cocher_tr(){
	$("tr").click(function(){
		$(this).find('input[type="radio"]').attr("checked","on");
	});
}

function exporter(){
$("#export").click(function(){
	$("#id_lignes").tableToCsv({
		extension:'csv', // or 'txt', 'tsv'
		seperator:';',
		outputheaders:false,
	  });
	});	  
}

