<script>
  $(document).ready( function () {
    $('#y_dataTables').DataTable({
          dom: 'lfBrtip',
          layout: {
                topStart: {
                    buttons: [
                        'copyHtml5', 'excelHtml5', 'pdfHtml5'
                    ]
                }
            },
          processing: true,
          serverSide: true,
          ordering: true, // Set true agar bisa di sorting
          aLengthMenu: [[5, 10, 50, 100], [5, 10, 50, 100]], // Combobox Limit
          order: [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
          ajax: "{{ url('slider-list') }}",
          deferRender: true,
          columns: [
                    {
                        data: 'id',
                        name: 'id',
                        'visible': false
                    },
                    {
                      "data": null,
                      "orderable": false,
                      "searchable": false,
                      "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                      }
                    },
                    { data: 'author', name: 'author' },
                    { data: 'tittle', name: 'tittle' },
                    { data: 'des', name: 'des' },
                    { data: 'img', name: 'img', orderable: false },
                    { data: 'action', name: 'action', orderable: false },
                ],
          columnDefs: [
            {
                "render": function ( data, type, row ) {
                    return '<img src="slider/'+data+'" style="width:200px;height:100px;" />';
                },
                "targets": 5 // column index 
            },
            {"className": "dt-center", "targets": "_all"},
            { width: '3%', targets: 1 },
            { width: '15%', targets: 6 }
          ]
        });
    });
  </script>
  <script>
      var SITEURL = 'http://127.0.0.1:8000/';
      console.log(SITEURL);
      $(document).ready(function() {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $('#create-new-slider').click(function() {
              $('#btn-save').val("create-slider");
              $('#sliderForm').trigger("reset");
              $('#sliderCrudModal').html("Add New Slider");
              $('#ajax-slider-modal').modal('show');
              $('#modal-preview').attr('src', 'https://placehold.co/600');
          });
      });

      $('body').on('click', '.edit-slider', function() {
          var slider_id = $(this).data('id');
          console.log(slider_id);
          $.get('slider/Edit/' + slider_id, function(data) {
              
              $('#sliderCrudModal').html("Edit slider");
              $('#btn-save').val("edit-slider");
              $('#ajax-slider-modal').modal('show');
              $('#slider_id').val(data.id);
              $('#slug').val(data.slug);
              $('#author').val(data.author);
              $('#tittle').val(data.tittle);
              $('#deskripsi').val(data.des);
              $('#urlimg').val(data.img);
              $('#modal-preview').attr('alt', 'No image available');
              if (data.img) {
                  $('#modal-preview').attr('src', SITEURL + 'slider/' + data.img);
                  $('#hidden_image').attr('src', SITEURL + 'slider/' + data.img);
              }
          })
      });  

      // delete employee ajax request
      $('body').on('click', '#delete-slider', function() {
        var slider_id = $(this).data("id");
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: "GET",
                url: SITEURL + "slider/Delete/" + slider_id,
                success: function(data) {
                    var oTable = $('#y_dataTables').dataTable();
                    oTable.fnDraw(false);
                },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                var oTable = $('#y_dataTables').dataTable();
                      oTable.fnDraw(false);
              }
            });
          }
        })
      });

      $('body').on('submit', '#sliderForm', function(e) {
          e.preventDefault();
          var actionType = $('#btn-save').val();
          $('#btn-save').html('Sending..');
          var formData = new FormData(this);
          $.ajax({
              type: 'POST',
              url: SITEURL + "slider/Store",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              success: (data) => {
                Swal.fire({
                position: "center",
                icon: "success",
                title: "Success",
                text: "Data Berhasil Disimpan",
                showConfirmButton: false,
                timer: 1500
                });
                  $('#sliderForm').trigger("reset");
                  $('#ajax-slider-modal').modal('hide');
                  $('#btn-save').html('Created');
                  var oTable = $('#y_dataTables').dataTable();
                  oTable.fnDraw(false);
              },
              error: function(data) {
                  Swal.fire({
                    position: "center",
                    icon: "warning",
                    title: "Warning",
                    text: "Data Gagal Disimpan",
                    showConfirmButton: false,
                    timer: 1500
                    });
                $('#sliderForm').trigger("reset");
                $('#ajax-slider-modal').modal('hide');
              }
          });
      });

      function readURL(input, id) {
          id = id || '#modal-preview';
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $(id).attr('src', e.target.result);
              };
              reader.readAsDataURL(input.files[0]);
              $('#modal-preview').removeClass('hidden');
              $('#start').hide();
          }
      }
  </script>
    