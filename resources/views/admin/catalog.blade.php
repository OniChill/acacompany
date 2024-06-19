<x-layoutadmin>
    <x-slot:tittle>{{ $tittle}}</x-slot:tittle>
    <style>
        button{
            padding: 0.5rem 1rem !important;
            border: none !important;
            border-radius: 0.5rem !important;
            font-weight: 500 !important;
        }
        thead{
            background-color: rgba(105, 108, 255, 0.16) !important;
            color : #696cff;
        }
    </style>
    <div class="container-fluid flex-grow-1 container-p-y">
<!-- Bordered Table -->
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Catalog</h4>
        <div class="card">
            <h5 class="card-header">Product</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                <a href="#" class="btn btn-sm btn-success mb-2">Tambah Data</a>
                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="catalogtable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Harga Diskon</th>
                        <th>Gambar Product</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
                </div>
            </div>
        </div>
<!--/ Bordered Table -->
    <div>
        
    <x-jscatalog></x-jscatalog>
  </x-layoutadmin>