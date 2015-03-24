$.fn.dataTableExt.oApi.fnFilterClear  = function ( oSettings )
{
    /* Remove global filter */
    oSettings.oPreviousSearch.sSearch = "";
      
    /* Remove the text of the global filter in the input boxes */
    if ( typeof oSettings.aanFeatures.f != 'undefined' )
    {
        var n = oSettings.aanFeatures.f;
        for ( var i=0, iLen=n.length ; i<iLen ; i++ )
        {
            $('input', n[i]).val( '' );
        }
    }
      
    /* Remove the search text for the column filters - NOTE - if you have input boxes for these
     * filters, these will need to be reset
     */
    for ( var i=0, iLen=oSettings.aoPreSearchCols.length ; i<iLen ; i++ )
    {
        oSettings.aoPreSearchCols[i].sSearch = "";
    }
      
    /* Redraw */
    oSettings.oApi._fnReDraw( oSettings );
};

jQuery.fn.dataTableExt.oApi.fnGetColumnData = function ( oSettings, iColumn, bUnique, bFiltered, bIgnoreEmpty ) {
    // check that we have a column id
    if ( typeof iColumn == "undefined" ) {
        return [];
    }
 
    // by default we only wany unique data
    if ( typeof bUnique == "undefined" ) {
        bUnique = true;
    }
 
    // by default we do want to only look at filtered data
    if ( typeof bFiltered == "undefined" ) {
        bFiltered = true;
    }
 
    // by default we do not wany to include empty values
    if ( typeof bIgnoreEmpty == "undefined" ) {
        bIgnoreEmpty = true;
    }
 
    // list of rows which we're going to loop through
    var aiRows;
 
    // use only filtered rows
    if (bFiltered === true) {
        aiRows = oSettings.aiDisplay;
    }
    // use all rows
    else {
        aiRows = oSettings.aiDisplayMaster; // all row numbers
    }
 
    // set up data array   
    var asResultData = [];
 
    for (var i=0,c=aiRows.length; i<c; i++) {
        var iRow = aiRows[i];
        var sValue = this.fnGetData(iRow, iColumn);
 
        // ignore empty values?
        if (bIgnoreEmpty === true && sValue.length === 0) {
            continue;
        }
 
        // ignore unique values?
        else if (bUnique === true && jQuery.inArray(sValue, asResultData) > -1) {
            continue;
        }
 
        // else push the value onto the result data array
        else {
            asResultData.push(sValue);
        }
    }
 
    return asResultData;
};