var DT_PRODUCTOS;
var PRODUCTO_TO_DELETE;

$(document).ready(function(){

DT_PRODUCTOS=$('#listProductos').DataTable( {
        "ajax":{
            type: 'get',
            url: APIS_URL+"/api/v1/productos",
            headers: {"Authorization": "Bearer "+_token},
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
            {
                "targets": 1,
                "render": function ( data, type, row ) {

                    if(row.imagen_path)
                    {
                        return "<img width='80px' src='http://apis.miapp.syslacsdev.com"+row.imagen_path+"'>";
                    }
                    else
                    {
                        return "";
                    }

                    
                },
                
            },
            { data: 'codigo' },
            { data: 'nombre' },
            {
                "targets": 4,
                "render": function ( data, type, row ) {
                    
                    if(row.categoria)
                        return row.categoria.nombre;
                    else
                        return "";
                },
                
            },
            {
                "targets": 5,
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

    $("#modalContainer1").load("/views/productos/frm-new-producto.html?v=3.6",function(response){


        $.ajax({
          method: "GET",
          headers: {"Authorization": "Bearer "+_token},
          url: APIS_URL+"/api/v1/categorias"
        })
        .done(function( response ) {


            for(i=0;i<response.data.length;i++)
            {
                item = response.data[i];

                $("#ddlCategorias").append(new Option(item.nombre,item.id));
            }

        
            $('#mdlNewProducto').modal({ show: true,  backdrop: 'static', size: 'lg', keyboard: false });


          });



        

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
      headers: {"Authorization": "Bearer "+_token},
      url: APIS_URL+"/api/v1/productos/"+id
    })
    .done(function( response ) {

        
        $("#txtId").val(response.data.id);
        $("#txtCodigo").val(response.data.codigo);
        $("#txtNombre").val(response.data.nombre);
        //$("#txtPrecio").val("");

        $('#mdlEditProducto').modal({ show: true,  backdrop: 'static', size: 'lg', keyboard: false });
    
      });
    
}
