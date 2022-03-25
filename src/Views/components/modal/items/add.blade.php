<div class="modal fade" id="ajaxModelAdd" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productFormAdd" name="productForm" class="form-horizontal" enctype="multipart/form-data" >
                <input type="hidden" name="product_id" id="product_id">
                <div class="form-group">
                    <label for="name" class="col-sm-12 control-label">Nama Barang</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="nama_barang" placeholder="Masukan Nama Barang" value="" maxlength="50" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-12 control-label">Harga Beli</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="price" name="harga_beli" placeholder="Masukan Harga Beli" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 control-label">Harga Jual</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="detail" name="harga_jual" placeholder="Masukan Harga Jual" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 control-label">Stok</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukan Harga Jual" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 control-label">Foto Item</label>
                    <div class="col-sm-12">
                        <input type="file" name="foto_item" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pilih Foto</label>
                    </div>
                </div>
  
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="addBtn" value="create">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>