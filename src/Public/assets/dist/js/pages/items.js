$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('meta[name="index"]').attr('content'),
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nama_barang',
                name: 'nama_barang'
            },
            {
                data: 'harga_beli',
                name: 'harga_beli'
            },
            {
                data: 'harga_jual',
                name: 'harga_jual'
            },
            {
                data: 'stok_alert',
                name: 'stok_alert',
            },
            {
                data: 'image',
                name: 'image',
                orderable: false,
                searchable: false
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
    $('#add').click(function(e) {
        e.preventDefault();
        $('#modelHeading').html("Add Item");
        $('#ajaxModelAdd').modal('show');
    });
    $('#createNewProduct').click(function() {
        $('#saveBtn').val("create-product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Create New Product");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editProduct', function() {
        var product_id = $(this).data('id');
        $.get($('meta[name="index"]').attr('content') + '/' + product_id + '/edit', function(data) {
            console.log(data);
            $('#modelHeadingEdit').html("Edit Item");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#product_id_edit').val(data.id);
            $('#productFormEdit').attr('action', 'item/'+data.id+'/update')
            $('#nama_barang').val(data.nama_barang);
            $('#harga_beli').val(data.harga_beli);
            $('#harga_jual').val(data.harga_jual);
            $('input[name=stok]').val(data.stok);
            $('#img_items').attr('src',data.media.path+'/'+data.media.file_name);
        })
    });



    $('#productFormAdd').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(this).html('Sending..');

        $.ajax({
            data: formData,
            url: $('meta[name="store"]').attr('content'),
            type: "POST",
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#productForm').trigger("reset");
                $('#ajaxModelAdd').modal('hide');
                table.draw();
            },
            error: function(data) {
                console.log('Error:', data.responseJSON.errors.nama_barang);
                $('#ajaxModelAdd').modal('hide');
                $('#addBtn').html('Save Changes');
                toastr.error(data.responseJSON.errors.nama_barang)

            }
        });
    });
    
    
    $('body').on('click', '.deleteProduct', function() {
        var product_id = $(this).data("id");
        var result = confirm("Are You sure want to delete !");
        if (result) {
            $.ajax({
                type: "DELETE",
                url: "/items" + '/' + product_id,
                success: function(data) {
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        } else {
            return false;
        }
    });
});