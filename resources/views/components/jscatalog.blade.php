<script>
    $(document).ready( function () {
      $('#catalogtable').DataTable({
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
            aLengthMenu: [[5, 10, 50, 100, 200], [5, 10, 50, 100, 200]], // Combobox Limit
            order: [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            ajax: "{{ url('catalog') }}",
            deferRender: true,
            columns: [
              
                      {
                        "data": null,
                        "orderable": false,
                        "searchable": false,
                        "render": function(data, type, row, meta) {
                          return meta.row + meta.settings._iDisplayStart + 1;
                        }
                      },
                      { data: 'name', name: 'name' },
                      { data: 'price', name: 'price' },
                      { data: 'sale_price', name: 'sale_price' },
                      { data: 'featured_image', name: 'featured_image' },
                      { "render": function(data, type, row) { // Tampilkan kolom aksi
                          var html = "<a href='' class='btn btn-outline-primary'>EDIT</a> | "
                          html += "<a href='' class='btn btn-outline-danger'>DELETE</a>"
                          return html
                        }
                      },
                  ],
            columnDefs: [
              {
                  "render": function ( data, type, row ) {
                      return '<img src="img/product-img/'+data+'" style="width:100px;height:150px;" />';
                  },
                  "targets": 4 // column index 
              },
              {"className": "dt-center", "targets": "_all"},
              { width: '3%', targets: 0 },
              { width: '15%', targets: 4 }
            ]
          });
      });
    </script>