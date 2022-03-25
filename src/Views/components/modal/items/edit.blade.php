<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeadingEdit"></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="productFormEdit" name="productForm" class="form-horizontal" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="product_id" id="product_id_edit">
                <div class="form-group">
                    <label for="name" class="col-sm-12 control-label">Nama Barang</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang" value="" maxlength="50" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-12 control-label">Harga Beli</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukan Harga Beli" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 control-label">Harga Jual</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukan Harga Jual" required="">
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
                        <img width="70" class="img-thumbnail" id="img_items" alt="">
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
                    <button type="submit" class="btn btn-primary" id="editBtn" value="create">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>