var DT_PRODUCTOS;
var PRODUCTO_TO_DELETE;

$(document).ready(function(){

DT_PRODUCTOS=$('#listProductos').DataTable( {
        "ajax":{
            type: 'get',
            url: "http://apis-app.com/api/v1/productos",
            dataSrc: 'data',
            cache: true
            },
        columns: [
            {
                "targets": 0,
                "render": function ( data, type, row ) {

                    //console.log(row);

                    //return row.created_at;

                    return moment(row.created_at).format('DD/MM/YYYY HH:mm:ss');
                },
                
            },
            { data: 'codigo' },
            { data: 'nombre' },
            {
                "targets": 3,
                "render": function ( data, type, row ) {
                    
                    if(row.categoria)
                        return row.categoria.nombre;
                    else
                        return "";
                },
                
            },
            {
                "targets": 4,
                "render": function ( data, type, row ) {
                    return "<a href='#' onclick=\"loadEditProducto('"+row.id+"')\">Editar</a> | <a href='#' onclick=\"loadConfirmDelete('"+row.id+"');\">Eliminar</a>";
                },
                
            },

        ]

    });



});


function updateDataTable()
{
    DT_PRODUCTOS.ajax.reload();
}


function loadConfirmDelete(id)
{
    PRODUCTO_TO_DELETE=id;
    
    $("#modalContainer1").load("/views/productos/frm-confirm-delete.html",function(response){

        $('#mdlConfirmDelete').modal({ show: true,  backdrop: 'static', size: 'lg', keyboard: false });


    });
}

function loadNewProducto()
{

    $("#modalContainer1").load("/views/productos/frm-new-producto.html",function(response){


        $('#mdlNewProducto').modal({ show: true,  backdrop: 'static', size: 'lg', keyboard: false });

    });


}


function loadEditProducto(id)
{

    $("#modalContainer1").load("/views/productos/frm-edit-producto.html",function(response){

         loadDataProducto(id);

        

    });


}

function loadDataProducto(id)
{
    $.ajax({
      method: "GET",
      url: "http://apis-app.com/api/v1/productos/"+id
    })
    .done(function( response ) {

        
        $("#txtId").val(response.data.id);
        $("#txtCodigo").val(response.data.codigo);
        $("#txtNombre").val(response.data.nombre);
        //$("#txtPrecio").val("");

        $('#mdlEditProducto').modal({ show: true,  backdrop: 'static', size: 'lg', keyboard: false });
    
      });
    
}
