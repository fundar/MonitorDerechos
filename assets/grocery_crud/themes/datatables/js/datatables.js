var default_per_page = typeof default_per_page !== 'undefined' ? default_per_page : 25;
var oTable = null;
var oTableArray = [];
var oTableMapping = [];
var histograma = {};
var topicos = [];
var site 
/* Obtener los datos de la tabla
	denuncias -> los rows como objetos key/value
	d_titles -> array de titulos
*/

/* Cambia los filtros de input[text] a selects */
var select_filters = function(columns, prefix){

	/* Substituir los campos de búsqueda por selects*/
	var titles = {}
	var l = $("tfoot th").length - 1

	$("tfoot th").each( function ( i ) {
		if(i >= l || columns.indexOf(i) < 0){ return true	} // si rebasa el limite de las columnas (tfoot th) o no se encuentra en la lista de los items  

		/* crear el select, substituir al input y asignarle el evento de búsqueda */
	  var select = $( '<select> <option value=""> Todos </option> </select>')
    select.appendTo( $(this).empty() )
   

		select.on( 'change', function () {
			$("#grafica").fadeOut("slow", function(){ $("#grafica").empty() })
 			if($(this).val() != ""){
    		table.fnFilter(unescape("^" + $(this).val() + "$"), i, true, false, false, false); 
 			}else{	
 				table.fnFilter(unescape($(this).val()), i, false, false, false, false);
 			}
    });
	  
		var data = table.fnGetColumnData( i )
		  , results = [] ;


    if( localStorage.getItem(prefix + '_' + i) === null) {
    	/* Agregar opciones al input basados en todas las celdas con valores no repetidos de la columna */
    	data = data.map(function(d){ return d.replace(/\"/g,"\'") } ).sort()

    	for(var j in data) {
        var val = data[j]
          , text = val; 

        if( data[j].match(/<a.*>(.*)<\/a>/g) ){
        	val = val.match(/>(.*)</g).map(function(s){ return s.substr(1, s.length -2 ) }).join(',');
        }else if( data[j].match(/<span.*>(.*)<\/span>/g) ){
        	val = val.replace(/<span.*'>/g, '').replace(/<\/.*>/g, '')
        	text = val.substr(19)
        }
 				
 				select.append( '<option value="' + val + '">' + text + '</option>' )
 				if(data[j] != "" && results.indexOf( data[j] ) > -1 ) results.push(data[j])
	 		}

			localStorage.setItem( prefix + '_' + i ,'["' + data.join('","') + '"]');

		}else{
			var options = localStorage.getItem(prefix + '_' + i)
			$.each( $.parseJSON(options), function(num,val){
				var text = val;

				if( val.match(/<a.*>(.*)<\/a>/g) ){
        	val = val.match(/>(.*)</g).map(function(s){ return s.substr(1, s.length -2 ) }).join(',');
        }else if( val.match(/<span.*>(.*)<\/span>/g) ){
        	val = val.replace(/<span.*'>/g, '').replace(/<\/.*>/g, '')
        	text = val.substr(19)
        }

			 	if(val !== '') select.append( "<option value='" + val + "'>" + text + "</option>" )
			});

		}

	});
}

var filters_to_graphic = function(){
	var subtopicos = {}
    var rows = table._('tr', {"filter": "applied"}); 
    /* limpiar las variables globales*/
    histograma = {};
	topicos = [];

	// omitir la columna de acciones de los titulaes
	for(var i = 0; i <= table.fnSettings().aoColumns.length - 2; i++){
		var topico = table.fnSettings().aoColumns[i]["sTitle"];
		topicos.push( topico )
		histograma[topico] = []
		subtopicos[topico] = []
	}

	for(var i in rows){
        for(var k in topicos ){
            var t = topicos[k];
            var sub = (rows[i][k] == null || rows[i][k] == "") ? "Dato no disponible" : rows[i][k];

            var pos = subtopicos[t].indexOf(sub); 
            if( pos > -1 ) { 
                histograma[t][pos][1]++
            } else {
            	histograma[t].push([sub, 1])
                subtopicos[t].push(sub)
            }
        }
    }
}

function supports_html5_storage() {
	try {
		JSON.parse("{}");
		return 'localStorage' in window && window['localStorage'] !== null;
	} catch (e) {
		return false;
	}
}

var use_storage = supports_html5_storage();

var aButtons = [];
var mColumns = [];

$(document).ready(function() {
	site = location.href.split("/").pop()
	$('table.groceryCrudTable thead tr th').each(function(index){
		if(!$(this).hasClass('actions'))
		{
			mColumns[index] = index;
		}
	});

	if(!unset_export)
	{
		aButtons.push(    {
	         "sExtends":    "xls",
	         "sButtonText": export_text,
	         "mColumns": mColumns
	     });
	}

	if(!unset_print)
	{
		aButtons.push({
	         "sExtends":    "print",
	         "sButtonText": print_text,
	         "mColumns": mColumns
	     });
	}

	//For mutliplegrids disable bStateSave as it is causing many problems
	if ($('.groceryCrudTable').length > 1) {
		use_storage = false;
	}

	$('.groceryCrudTable').each(function(index){
		if (typeof oTableArray[index] !== 'undefined') {
			return false;
		}

		oTableMapping[$(this).attr('id')] = index;

		oTableArray[index] = loadDataTable(this, site);
	});

	$(".groceryCrudTable tfoot input").keyup( function () {

		chosen_table = datatables_get_chosen_table($(this).closest('.groceryCrudTable'));

		chosen_table.fnFilter( this.value, chosen_table.find("tfoot input").index(this) );

		if(use_storage)
		{
			var search_values_array = [];

			chosen_table.find("tfoot tr th").each(function(index,value){
				search_values_array[index] = $(this).children(':first').val();
			});

			localStorage.setItem( 'datatables_search_'+ unique_hash ,'["' + search_values_array.join('","') + '"]');
		}
		
		filters_to_graphic()
		$("#grafica").fadeOut("slow", function(){ $("#grafica").empty() })

	} );

	var search_values = localStorage.getItem('datatables_search_'+ unique_hash);

	if( search_values !== null)
	{
		$.each($.parseJSON(search_values),function(num,val){
			if(val !== '')
			{
				$(".groceryCrudTable tfoot tr th:eq("+num+")").children(':first').val(val);
			}
		});
	}

	$('.clear-filtering').click(function(){
		localStorage.removeItem( 'DataTables_' + unique_hash);
		localStorage.removeItem( 'datatables_search_'+ unique_hash);

		chosen_table = datatables_get_chosen_table($(this).closest('.groceryCrudTable'));

		chosen_table.fnFilterClear();
		$(this).closest('.groceryCrudTable').find("tfoot tr th input").val("");
	});

	loadListenersForDatatables();

	$('a[role=button],button[role=button]').live("mouseover mouseout", function(event) {
		  if ( event.type == "mouseover" ) {
			  $(this).addClass('ui-state-hover');
		  } else {
			  $(this).removeClass('ui-state-hover');
		  }
	});

	$('th.actions').unbind('click');
	$('th.actions>div .DataTables_sort_icon').remove();

} );

function loadListenersForDatatables() {

	$('.refresh-data').click(function(){
		var this_container = $(this).closest('.dataTablesContainer');

		var new_container = $("<div/>").addClass('dataTablesContainer');

		this_container.after(new_container);
		this_container.remove();

		$.ajax({
			url: $(this).attr('data-url'),
			success: function(my_output){
				new_container.html(my_output);

				loadDataTable(new_container.find('.groceryCrudTable'), site);

				loadListenersForDatatables();
			}
		});
	});
}

function loadDataTable(this_datatables, site) {
	table = $(this_datatables).dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		//"sScrollY": "800px",
		"bStateSave": use_storage,
        "fnStateSave": function (oSettings, oData) {
            localStorage.setItem( 'DataTables_' + unique_hash, JSON.stringify(oData) );
        },
    	"fnStateLoad": function (oSettings) {
            return JSON.parse( localStorage.getItem('DataTables_'+unique_hash) );
    	},
		"iDisplayLength": default_per_page,
		"aaSorting": datatables_aaSorting,
		"oLanguage":{
		    "sProcessing":   list_loading,
		    "sLengthMenu":   show_entries_string,
		    "sZeroRecords":  list_no_items,
		    "sInfo":         displaying_paging_string,
		    "sInfoEmpty":   list_zero_entries,
		    "sInfoFiltered": filtered_from_string,
		    "sSearch":       search_string+":",
		    "oPaginate": {
		        "sFirst":    paging_first,
		        "sPrevious": paging_previous,
		        "sNext":     paging_next,
		        "sLast":     paging_last
		    }
		},
		"bDestory": true,
		"bRetrieve": true,
		"fnDrawCallback": function() {
			$('.image-thumbnail').fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	600,
				'speedOut'		:	200,
				'overlayShow'	:	false
			});
			add_edit_button_listener();
		},
		//"sScrollY": "200px",
		"sDom": 'T<"clear"><"H"lfr>t<"F"ip>',
    "oTableTools": {
    	"aButtons": aButtons,
        "sSwfPath": base_url+"assets/grocery_crud/themes/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
    },
    "bDeferRender": true,
    "scroller": true,
    "oScroller": {
      height: { row: 150 }
    }

	});
	
	var columns = [  0, 1, 2, 3, 4, 5, /*6,*/ 7, 8, 9, 10, 11, /*12,*/ 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 25, 
									26, 27, 28, 29, 30, 31, 32, 33, /*34,*/ 35, /*36,*/ 37, /*38, 39, 40, 41, */42   , 45, 46, 47, 48   , 50, 
									51, 52, 53, 54 ]


	
	if (site == "migrantes"){
		columns = [0, 1, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14] // no usar la ultima columna 
		select_filters(columns, 'fil-mig')
	}else{
		select_filters(columns, 'fil-den')
	}
	
	filters_to_graphic()
	return table;
}

function datatables_get_chosen_table(table_as_object)
{
	chosen_table_index = oTableMapping[table_as_object.attr('id')];
	return oTableArray[chosen_table_index];
}

function delete_row(delete_url , row_id)
{
	if(confirm(message_alert_delete))
	{
		$.ajax({
			url: delete_url,
			dataType: 'json',
			success: function(data)
			{
				if(data.success)
				{
					success_message(data.success_message);

					chosen_table = datatables_get_chosen_table($('tr#row-'+row_id).closest('.groceryCrudTable'));

					$('tr#row-'+row_id).addClass('row_selected');
					var anSelected = fnGetSelected( chosen_table );
					chosen_table.fnDeleteRow( anSelected[0] );
				}
				else
				{
					error_message(data.error_message);
				}
			}
		});
	}

	return false;
}

function fnGetSelected( oTableLocal )
{
	var aReturn = new Array();
	var aTrs = oTableLocal.fnGetNodes();

	for ( var i=0 ; i<aTrs.length ; i++ )
	{
		if ( $(aTrs[i]).hasClass('row_selected') )
		{
			aReturn.push( aTrs[i] );
		}
	}
	return aReturn;
}