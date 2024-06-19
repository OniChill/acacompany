 <script>
    $(document).ready( function () {
      $('#diskontable').DataTable({
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
            ajax: "{{ url('promo-list') }}",
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
                      { data: 'judul', name: 'judul' },
                      { data: 'diskon', name: 'diskon' },
                      { data: 'img', name: 'img' },
                      { "render": function(data, type, row) { // Tampilkan kolom aksi
                          var html = "<a href='' class='btn btn-outline-primary'>EDIT</a>"
                          return html
                        }
                      },
                  ],
            columnDefs: [
              {
                  "render": function ( data, type, row ) {
                      return '<img src="img/bg-img/'+data+'" style="width:200px;height:100px;" />';
                  },
                  "targets": 3 // column index 
              },
              {"className": "dt-center", "targets": "_all"},
              { width: '3%', targets: 0 },
              { width: '15%', targets: 4 }
            ]
          });
      });
    </script>