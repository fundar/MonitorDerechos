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

    var tag = jQuery(rtag + " ul.chzn-results li#field_" + topic + "_chzn_o_" + num);

    jQuery("#field-" + topic).val( value )
    jQuery( rtag + " #field_" + topic + "_chzn a.chzn-single span").text( tag.text() )
    tag.addClass('result-selected')
  }
  that.scope.$watch(topic + sufix, function(value){ 
    if(value){
      that.ls.set(topic + sufix, value) 
      console.log("topic: " + topic + ", valor_enviado: '" + value + "', valor_recibido: '" + that.ls.get(topic + sufix, value) + "'")
    } 
  });
}

StorageMethods.prototype.clear_all= function(){  
  this.ls.clearAll();
}


app.controller('MigranteCtrl', [
  '$scope',
  'localStorageService',
  function($scope, localStorageService) {
    var m_storage = new StorageMethods(localStorageService, $scope);
   
    $scope.storageType = 'Local storage';
    if (localStorageService.getStorageType().indexOf('session') >= 0) { $scope.storageType = 'Session storage'; }
    if (!localStorageService.isSupported) { $scope.storageType = 'Cookie'; }
    
    var topics = ['nombre', 'municipio', 'ocupacion', 'nombre_pueblo_indigena', 'edad', 'fecha_nac', 'ocupacion'];
 
    for(var i in topics) m_storage.save_of_input(topics[i] + '_migrante')

    // Elimina los datos que se guardaron al dar click en si en 'pertenece a un pueblo indigena'
    $scope.$watch('pueblo_indigena_migrante', function(value){ 
      if(value == 2){
        localStorageService.remove('nombre_pueblo_indigena_migrante');
        localStorageService.remove('espanol_migrante');
      }
    });

    var sufix = '_migrante';
    var topics_of_selects = ['id_pais', 'id_estado', 'id_genero', 'ocupacion_homologada', 'id_estado_civil', 
                             'escolaridad', 'pueblo_indigena', 'espanol', 'id_lugar_denuncia' ];
    for(var j in topics_of_selects){ m_storage.save_of_select(topics_of_selects[j], sufix)}
    
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
    console.log("-------------------------------------")

    var topics = ['nombre_persona_atendio_seguimiento', 'fecha_creada','intentos','monto_coyote',
                  'nombre_punto_fronterizo','lugar_de_usa','con_quien_viaja','familiar_separado','situacion_familiar',
                  'acto_siguiente','fecha_injusticia','municipio_injusticia','espacio_fisico_injusticia', 
                  'detonante_injusticia','numero_migrantes_injusticia','lugar_abordaje_transporte','destino_transporte',
                  'numero_oficiales_responsables','algun_nombre_responsables', 'carcteristicas_ficias_policia_responsable',
                  'carcteristicas_ficias_policia_responsable2', 'carcteristicas_ficias_policia_responsable3',
                  'apodos_responsables', 'color_uniforme_responsables', 'insignias_responsables',
                  'numero_vehiculos_responsables', 'placas_vehiculos_responsables','monto_extorsion','notas_seguimiento',
                  'telefono_seguimiento' ]     

    var topics_of_selects = [ 'id_lugar_denuncia_','id_tipo_queja','motivo_migracion','acto_siguiente_homologada', 
                              'coyote_guia','lugar_contrato_coyote', 'viaja_solo','deportado','momento_deportado',
                              'separacion_familiar', 'dano_autoridad', 'id_autoridad_dano','id_pais_injusticia',
                              'id_estado_injusticia', 'uniformado_responsables', 'espacio_fisico_injusticia_homologada',
                              'id_transporte_viaje_injusticia', 'estado_seguimiento','responsables_abordo_vehiculos_responsables',
                              'id_tipo_transporte_responsables', 'id_estado_caso', 'detonante_injusticia_homologada' ]     

    //var topics_of_multiselects = [ 'paquete_pago', 'autoridades_viaje', 'autoridades_responables', 
    //                               'derechos_violados', 'violaciones_derechos' ]

    for(var i in topics) d_storage.save_of_input( topics[i] )         
    for(var j in topics_of_selects){ d_storage.save_of_select(topics_of_selects[j], '')}

    var topic = 'autoridades_viaje'
    /**/
    $scope.$watch(topic, function(value){ 
      var rtag = "#" + topic + "_input_box"
      var ul = jQuery( rtag + " #field_" + topic + "_chzn ul.chzn-choices")
      if(value){
        var before = localStorageService.get(topic), data = [];
        ul.children("li.search-choice").each(function(i){ 
          data.push( jQuery(this).attr("id").split("_c_")[1] )
        }) 

        var enviado = data.join(",")

        localStorageService.set(topic, enviado)
        console.log("topic: " + topic + ", valor_enviado: '" + enviado + "', valor_recibido: '" + localStorageService.get(topic) + "', valor_anterior:'" + before +"'")
      } 
    });
    /**/
    //d_storage.clear_all()

    /**/
    if( localStorageService.get(topic) ){ 
      var rtag = "#" + topic + "_input_box"
        , values = localStorageService.get(topic).split(","),  nums = [];

      for(var i in values){
        if( !isNaN(parseInt(values[i]).toString()) ){
          jQuery("#field-" + topic + " option").each(function(index) {
            if( $(this).val() == values[i] ){ 
              values[i] = $(this).text(); return false;
            }
          })
        }
        jQuery( rtag + " ul.chzn-results li").each(function(index) {
          if( $(this).text() == values[i] ){ nums.push(++index); return false }
        })
      }     
      
      console.log(nums, values)
      
      //var input = jQuery( rtag + " #field_" + topic + "_chzn a.chzn-single span")
      var ul = jQuery( rtag + " #field_" + topic + "_chzn ul.chzn-choices")
      
      for(var j in nums){
        var tag = jQuery(rtag + " ul.chzn-results li#field_" + topic + "_chzn_o_" + nums[j]);
        //input.text( tag.text() )
        var a = '<li class="search-choice" id="field_' + topic + '_chzn_c_' + nums[j] + '"><span>' + values[j] + '</span><a href="javascript:void(0)" class="search-choice-close" rel="' + nums[j] + '"></a></li>';
        ul.prepend(a)
      }
    }
    /**/


  }
]);