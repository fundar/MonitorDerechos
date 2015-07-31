var app = angular.module('ReporteApp', ['LocalStorageModule']);

app.config(['localStorageServiceProvider', function(localStorageServiceProvider){
  localStorageServiceProvider.setPrefix('ReporteApp');
  localStorageServiceProvider.setStorageCookieDomain('ddhh.fundarlabs.org.mx');
  localStorageServiceProvider.setStorageType('sessionStorage');
  localStorageServiceProvider.setNotify(true, true);
}])


var StorageMethods = function(ls, $scope){
  this.ls = ls
  this.scope = $scope
}

StorageMethods.prototype.save_of_input= function(topic){
  var that = this;
  if( that.ls.get(topic) ){   that.scope[topic] = that.ls.get(topic)  }

  // Guardar datos de los inputs
  that.scope.$watch(topic, function(value){ if(value){ that.ls.set(topic, value) }  });
}

StorageMethods.prototype.save_of_select= function(topic, sufix){
  var that = this;
  if( that.ls.get(topic + sufix) ){ 
    var rtag = "#" + topic + "_input_box"
      , value = that.ls.get(topic + sufix), num;
    /* En el caso de que el value sea una cadena y no un indice 
    consecutivo se cambia solo para ubicarlo en el select*/
    if( !isNaN(parseInt(value).toString()) ){
      jQuery("#field-" + topic + " option").each(function(index) {
        if( $(this).val() == value ){ value = $(this).text(); return false;}
      })
    }

    jQuery( rtag + " ul.chzn-results li").each(function(index) {
      if( $(this).text() == value ){ num = ++index; return false }
    })

    jQuery("#field-" + topic).val( value )
    var tag = jQuery(rtag + " ul.chzn-results li#field_" + topic + "_chzn_o_" + num);
    var show_label = jQuery( rtag + " #field_" + topic + "_chzn a.chzn-single")

    show_label.removeClass("chzn-default")
    show_label.children("span").text( tag.text() )
    show_label.children("span").after( '<abbr class="search-choice-close"></abbr>' )
    tag.addClass('result-selected')
  }

  // Guardar datos de los selects
  that.scope.$watch(topic + sufix, function(value){ 
    if(value){
      that.ls.set(topic + sufix, value) 
      console.log("topic: " + topic + ", valor_enviado: '" + value + "', valor_recibido: '" + that.ls.get(topic + sufix, value) + "'")
    } 
  });
}



StorageMethods.prototype.save_of_multiselect = function(topic){
  var that = this
  that.scope.$watch(topic, function(value){ 
    var rtag = "#" + topic + "_input_box"
    var ul = jQuery( rtag + " #field_" + topic + "_chzn ul.chzn-choices")
    if(value){
      var before = that.ls.get(topic), data = [];
      ul.children("li.search-choice").each(function(i){ 
        data.push( jQuery(this).attr("id").split("_c_")[1] )
      }) 

      var enviado = data.join(",")
      that.ls.set(topic, enviado)
      console.log("topic: " + topic + ", valor_enviado: '" + enviado + "', valor_recibido: '" + that.ls.get(topic) + "', valor_anterior:'" + before +"'")
    } 
  });
  
  if( that.ls.get(topic) ){ 
    var rtag = "#" + topic + "_input_box"
      , nums = that.ls.get(topic).split(","),  textos = [], values = [];
    for(var i in nums){
      var texto = jQuery( rtag + " ul.chzn-results").children("li").eq(nums[i] - 1).text()
      var value = jQuery( "#field-" + topic + " option[text='" + texto + "']").val()//.split("_").pop()
      textos.push(texto)
      values.push(value)
    }

    var ul = jQuery( rtag + " #field_" + topic + "_chzn ul.chzn-choices")
    
    for(var j in nums){
      var li = '<li class="search-choice" id="field_' + topic + '_chzn_c_' + nums[j] + '">' + 
                '<span>' + textos[j] + '</span>' +  
                '<a href="javascript:void(0)" class="search-choice-close" rel="' + values[j] + '"></a>' +
              '</li>';
      ul.prepend(li)
    }
  }
}

StorageMethods.prototype.save_of_multiselect_backup = function(topic){
  var that = this
  that.scope.$watch(topic, function(value){ 
    var rtag = "#" + topic + "_input_box"
    var ul = jQuery( rtag + " #field_" + topic + "_chzn ul.chzn-choices")
    if(value){
      var before = that.ls.get(topic), data = [];
      ul.children("li.search-choice").each(function(i){ 
        data.push( jQuery(this).attr("id").split("_c_")[1] )
      }) 

      var enviado = data.join(",")
      that.ls.set(topic, enviado)
      console.log("topic: " + topic + ", valor_enviado: '" + enviado + "', valor_recibido: '" + that.ls.get(topic) + "', valor_anterior:'" + before +"'")
    } 
  });
  
  if( that.ls.get(topic) ){ 
    var rtag = "#" + topic + "_input_box"
      , nums = that.ls.get(topic).split(","),  textos = [], values = [];
    for(var i in nums){
      var texto = jQuery( rtag + " ul.chzn-results").children("li").eq(nums[i] - 1).text()
      var value = jQuery( "#field-" + topic + " option[text='" + texto + "']").val()//.split("_").pop()
      textos.push(texto)
      values.push(value)
    }

    var ul = jQuery( rtag + " #field_" + topic + "_chzn ul.chzn-choices")
    
    for(var j in nums){
      var li = '<li class="search-choice" id="field_' + topic + '_chzn_c_' + nums[j] + '">' + 
                '<span>' + textos[j] + '</span>' +  
                '<a href="javascript:void(0)" class="search-choice-close" rel="' + values[j] + '"></a>' +
              '</li>';
      ul.prepend(li)
    }



  }
}

StorageMethods.prototype.clear_all= function(){  
  this.ls.clearAll();
}

StorageMethods.prototype.clear_theses= function(names, sufix){  
  for(var i in names) this.ls.remove(names[i] + sufix)
}

StorageMethods.prototype.add_migrantes_to_select = function(){
  if(this.ls.get("migrantes_data") != null ){
    var migrantes = this.ls.get("migrantes_data").split(",")
    var ul = jQuery( "#migrantes_input_box" + " #field_migrantes_chzn ul.chzn-choices")
    var select = jQuery("#field-migrantes")
    
    ul.empty();
    select.empty();

    for(var i in migrantes){
      var migrante = migrantes[i].split(":")
      var li = '<li class="search-choice" id="field_migrantes_chzn_c_' + ul.children("li").length  + '">' + 
                '<span>' + migrante[1] + '</span>' +  
                '<a href="javascript:void(0)" rel="' + ul.children("li").length  + '"></a>' +
                // sin la clase "search-choice-close" no se pueden quitar los elementos seleccionados
                //'<a href="javascript:void(0)" class="search-choice-close" rel="' + ul.children("li").length  + '"></a>' +
              '</li>';

      select.append("<option value='" + migrante[0] + "' selected>" + migrante[1] + "</option>")
      ul.append(li)
    }
  }
}

app.controller('MigranteCtrl', [
  '$scope',
  'localStorageService',
  function($scope, localStorageService) {
    var m_storage = new StorageMethods(localStorageService, $scope)
      , sufix = '_migrante'
      , topics = ['nombre', 'municipio', 'ocupacion', 'nombre_pueblo_indigena', 'edad', 'fecha_nac', 'ocupacion']
      , topics_of_selects = ['id_pais', 'id_estado', 'id_genero', 'ocupacion_homologada', 'id_estado_civil', 
                             'escolaridad', 'pueblo_indigena', 'espanol', 'id_lugar_denuncia' ];
    //setup
    $scope.storageType = 'Local storage';
    if (localStorageService.getStorageType().indexOf('session') >= 0) { $scope.storageType = 'Session storage'; }
    if (!localStorageService.isSupported) { $scope.storageType = 'Cookie'; }
    
     
    for(var i in topics) m_storage.save_of_input(topics[i] + sufix)
    for(var j in topics_of_selects){ m_storage.save_of_select(topics_of_selects[j], sufix)}

    // Elimina los datos que se guardaron al dar click en si en 'pertenece a un pueblo indigena'
    $scope.$watch('pueblo_indigena_migrante', function(value){ 
      if(value == 2){
        localStorageService.remove('nombre_pueblo_indigena_migrante');
        localStorageService.remove('espanol_migrante');
      }
    });
    $scope.clear_migrante = function(){
      m_storage.clear_theses(topics, sufix)
      m_storage.clear_theses(topics_of_selects, sufix)
    }

    $scope.clear_all = function(){
      m_storage.clear_all()
    }

    $scope.add_migrante = function(migrante){
      /* Crear options con nombres de migrantes de forma persistente */
      var nuevo = migrante.id + ":" + migrante.nombre
      if( localStorageService.get("migrantes_data") == null ){
        localStorageService.set("migrantes_data", nuevo)
      }else{
        var todos = localStorageService.get("migrantes_data") + "," + nuevo;
        localStorageService.set("migrantes_data", todos)
      }
      
      //actualizar el select de migrantes
      m_storage.add_migrantes_to_select()
      jQuery("#field-migrantes").change()

    }

    $scope.get_migrantes_data = function(){
      return m_storage.ls.get("migrantes_data")
    }

    $scope.clear_theses = function(names){
      m_storage.clear_theses(names, sufix)
    }
  }
]).controller('DenunciaCtrl', [
  '$scope',
  'localStorageService',
  function($scope, localStorageService) {

    var d_storage = new StorageMethods(localStorageService, $scope);
    $scope.storageType = 'Local storage';
    if (localStorageService.getStorageType().indexOf('session') >= 0) { $scope.storageType = 'Session storage'; }
    if (!localStorageService.isSupported) { $scope.storageType = 'Cookie'; }


    //d_storage.clear_all()
    console.log("-------------------------------------")
    var keys = localStorageService.keys()
    console.log(keys)
    for(i in keys) console.log(keys[i], localStorageService.get(keys[i]) )

    window.migrantes_data = localStorageService.get( "migrantes_data" )
    console.log(localStorageService.get( "migrantes_data" ))
    console.log("-------------------------------------")

    var topics = ['nombre_persona_atendio_seguimiento', 'fecha_creada','intentos','monto_coyote',
                  'lugar_de_usa','con_quien_viaja','familiar_separado','situacion_familiar',
                  'acto_siguiente','fecha_injusticia','municipio_injusticia','espacio_fisico_injusticia', 
                  'detonante_injusticia','numero_migrantes_injusticia','lugar_abordaje_transporte','destino_transporte',
                  'numero_oficiales_responsables','algun_nombre_responsables', 'carcteristicas_ficias_policia_responsable',
                  'carcteristicas_ficias_policia_responsable2', 'carcteristicas_ficias_policia_responsable3',
                  'apodos_responsables', 'color_uniforme_responsables', 'insignias_responsables',
                  'numero_vehiculos_responsables', 'placas_vehiculos_responsables','monto_extorsion','notas_seguimiento',
                  'telefono_seguimiento' ]     

    var topics_of_selects = [ 'id_lugar_denuncia_','id_tipo_queja','motivo_migracion','acto_siguiente_homologada', 
                              'coyote_guia','lugar_contrato_coyote',  'nombre_punto_fronterizo', 'viaja_solo','deportado','momento_deportado',
                              'separacion_familiar', 'dano_autoridad', 'id_autoridad_dano','id_pais_injusticia',
                              'id_estado_injusticia', 'uniformado_responsables', 'espacio_fisico_injusticia_homologada',
                              'id_transporte_viaje_injusticia', 'estado_seguimiento','responsables_abordo_vehiculos_responsables',
                              'id_tipo_transporte_responsables', 'id_estado_caso', 'detonante_injusticia_homologada' ]     

    var topics_of_multiselects = [ 'paquete_pago', 'autoridades_viaje', 'autoridades_responables', 
                                   'derechos_violados', 'violaciones_derechos' ]

    // 'migrantes',                                    

    for(var i in topics) d_storage.save_of_input( topics[i] )         
    for(var j in topics_of_selects){ d_storage.save_of_select(topics_of_selects[j], '')}
    for(var j in topics_of_multiselects){ d_storage.save_of_multiselect(topics_of_multiselects[j] )}

    //actualizar el select de migrantes
    d_storage.add_migrantes_to_select() 

    $scope.clear_all = function(){
      d_storage.clear_all()
    }

    $scope.clear_theses = function(names){
      d_storage.clear_theses(names, "")
    }
  }
]);
