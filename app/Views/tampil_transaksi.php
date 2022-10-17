<?=$this->extend('Layouts/admin')?>
<?=$this->section('title')?>
<i class="fas fa-solid fa-cash-register"></i>  Transaksi 
<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="row">
    <div class="col">    
        <div class="card border-primary">
            <div class="modal-header bg-primary">
                
            </div>
            <div class="modal-body">
                <form action="/caritagihan" method="post">
                    <div class="form-group">
                        <label for="no_rek">Masukan Nomor Rekening Yang Dicari</label>
                        <input type="text" id="no_rek" name="no_rek" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-solid fa-search"></i>Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>