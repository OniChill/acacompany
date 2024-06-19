<script>
    $(document).ready( function () {
      $('#transaksitable').DataTable({
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
            ajax: "{{ url('transaksi') }}",
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
                      { data: 'payment_id', name: 'payment_id' },
                      { data: 'product_name', product_name: 'name' },
                      { data: 'quantity', name: 'quantity' },
                      { data: 'amount', name: 'amount' },
                      { data: 'payer_name', name: 'payer_name' },
                      { data: 'payer_email', name: 'payer_email' },
                      { data: 'payment_status', name: 'payment_status' },
                      { data: 'payment_method', name: 'payment_method' },
                      { data: 'resi',
                        "searchable": false,
                        "orderable":false,
                        "render": function(data, type, row) { // Tampilkan kolom aksi
                          if (data != null) {
                            return data;
                          } else {
                            var html = "<a href='' class='btn btn-outline-primary'>Upload</a>"
                            return html;
                          }
                        }
                      },
                  ],
            columnDefs: [
              {"className": "dt-center", "targets": "_all"},
              { width: '3%', targets: 0 }
            ]
          });
      });
    </script>