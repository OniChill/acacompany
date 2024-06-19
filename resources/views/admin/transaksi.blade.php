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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> List Slider</h4>
        <div class="card">
            <h5 class="card-header">List Slider</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                <a href="#" class="btn btn-sm btn-success mb-2">Tambah Data</a>
                <table class="table table-striped" id="transaksitable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Nama Product</th>
                        <th>Jumlah</th>
                        <th>Harga (USD)</th>
                        <th>Pembeli</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Metode</th>
                        <th>No Resi</th>
                    </tr>
                    </thead>
                </table>
                </div>
            </div>
        </div>
<!--/ Bordered Table -->
    <div>
        
    <x-jstransaksi></x-jstransaksi>
  </x-layoutadmin>