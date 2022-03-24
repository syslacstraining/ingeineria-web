var DT_CATEGORIAS;
var CATEGORIA_TO_DELETE;

$(document).ready(function(){

DT_CATEGORIAS=$('#listCategorias').DataTable( {
        "ajax":{
            type: 'get',
            url: APIS_URL+"/api/v1/categorias",
            headers: {"Authorization": "Bearer "+_token},
            dataSrc: 'data',
            cache: true
            },
        columns: [
            {
                "targets": 0,
                "render": function ( data, type, row ) {

                    return moment(row.created_at).format('DD/MM/YYYY HH:mm:ss');
                },
                
            },
            { data: 'codigo' },
            { data: 'nombre' },
            
            {
                "targets": 3,
                "render": function ( data, type, row ) {
                    return "<a href='#' onclick=\"loadEditCategoria('"+row.id+"')\">Editar</a> | <a href='#' onclick=\"loadConfirmDelete('"+row.id+"');\">Eliminar</a>";
                },
                
            },

        ]

    });



});


function updateDataTable()
{
    DT_CATEGORIAS.ajax.reload();
}


function loadConfirmDelete(id)
{
    CATEGORIA_TO_DELETE=id;
    
    $("#modalContainer1").load("/views/categorias/frm-confirm-delete.html",function(response){

        $('#mdlConfirmDelete').modal({ show: true,  backdrop: 'static', size: 'lg', keyboard: false });


    });
}

function loadNewCategoria()
{
    console.log("entro a nueva categoria1");

    $("#modalContainer1").load("/views/categorias/frm-new-categoria.html?v=3.1",function(response){


        $('#mdlNewCategoria').modal({ show: true,  backdrop: 'static', size: 'lg', keyboard: false });

    });


}


function loadEditCategoria(id)
{

    $("#modalContainer1").load("/views/categorias/frm-edit-categoria.html",function(response){

         loadDataCategoria(id);

        

    });


}

function loadDataCategoria(id)
{
    $.ajax({
      method: "GET",
      headers: {"Authorization": "Bearer "+_token},
      url: APIS_URL+"/api/v1/categorias/"+id
    })
    .done(function( response ) {

        
        $("#txtId").val(response.data.id);
        $("#txtCodigo").val(response.data.codigo);
        $("#txtNombre").val(response.data.nombre);
        

        $('#mdlEditCategoria').modal({ show: true,  backdrop: 'static', size: 'lg', keyboard: false });
    
      });
    
}
