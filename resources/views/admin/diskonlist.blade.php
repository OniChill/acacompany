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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> List Promo</h4>
        <div class="card">
            <h5 class="card-header">List Promo</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="diskontable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Diskon</th>
                        <th>Gambar Slider</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
                </div>
            </div>
        </div>
<!--/ Bordered Table -->
    <div>
        
    <x-jspromo></x-jspromo>
  </x-layoutadmin>