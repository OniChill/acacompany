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
                    <button type="button" class="btn btn-sm btn-success mb-2" id="create-new-slider">Tambah Data</button>
                    <table class="table table-striped" cellspacing="0" width="100%" id="y_dataTables">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>No</th>
                            <th>Author</th>
                            <th>Tittle</th>
                            <th>Deskripsi</th>
                            <th>Gambar Slider</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="ajax-slider-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sliderCrudModal"></h5>
                        <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form id="sliderForm" name="sliderForm" enctype="multipart/form-data">
                            <input type="hidden" id="slider_id" name="slider_id" />
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter Slug" required/>
                                </div>
                                <div class="col mb-0">
                                    <label for="author" class="form-label">Author</label>
                                    <input type="text" id="author" name="author" class="form-control" placeholder="Enter Author" required/>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="tittle" class="form-label">Tittle</label>
                                    <input type="text" id="tittle" name="tittle" class="form-control" placeholder="Enter Tittle" required/>
                                </div>
                                <div class="col mb-0">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="Enter Deskripsi" required/>
                                </div>
                            </div>
                            <div class="rowg-2">
                                <div class="col mb-0">
                                    <label for="image" class="form-label">Gambar Slider</label>
                                    <input class="form-control" id="image" type="file" name="image" accept="image/png, image/jpeg" onchange="readURL(this);"/>
                                    <input type="hidden" name="hidden_image" id="hidden_image">
                                    <input type="hidden" id="urlimg" name="urlimg" />
                                </div>
                                <div class="col mb-0">
                                    <img id="modal-preview" src="https://placehold.co/600" alt="Preview" class="form-group hidden" width="100" height="100">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                            </button>
                            <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Bordered Table -->
    <div>
    <x-jsslider></x-jsslider>
  </x-layoutadmin>