@extends('layouts.main')

@section('title', 'Report')

@section('content')
    <div class="card m-4">
      <div class="card-body">
        <div class="card-title"><h5>Report</h5></div>

        <div class="card-text table-responsive">
          <table id="example" class="table table-sm table-striped" width="100%"></table>
          
          
        </div>
      </div>
    </div>

  <script type="text/javascript">    
    $(document).ready(function () {
      $('#example tbody tr').each(function (idx) {
          $(this).children("tr:eq(1)").html(idx + 1);
      });
      
      var data = '{!! $data !!}'
      var table = $('#example').DataTable({
        data: JSON.parse(data),
        columns: [
            {
              data: "id",
              render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            {
              className: 'dt-control',
              orderable: false,
              data: null,
              defaultContent: '',
            },
            {data: 'SubjectsGroupName', title: 'Group' },
            {data: 'SubjectsDesc', title: 'Matakuliah' },
            {data: 'EnrolledUsers', title: 'Enrolled Users' },
            {data: 'respondent', title: 'Respondent', 
              render: function (data, type, row, meta) {
                if(row.respondent > 0){
                  return `<a href="{{url('/report/`+row.EnrollHeaderID+`/detail')}}">`+row.respondent+`</a>`;
                }
                return row.respondent
              } 
            },
        ],
        columnDefs: [
          {"className": "dt-center", "targets": [4,5]}
        ]
      });

      // Add event listener for opening and closing details
      $('#example tbody').on('click', 'td.dt-control', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              row.child(expanded(row.data())).show();
              tr.addClass('shown');
          }
      });
    });

    function expanded(d) {
      return (
          '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
          '<tr>' +
          '<td>Dosen</td>' +
          '<td>:</td>' +
          '<td>' +
          d.lectureName +
          '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Kode Matakuliah</td>' +
          '<td>:</td>' +
          '<td>' +
          d.SubjectsCode +
          '</td>' +
          '</tr>' +
          '<tr>' +
          '<td>Kelas</td>' +
          '<td>:</td>' +
          '<td>' +
          d.ClassCode +
          '</td>' +
          '</tr>' +
          '</table>'
      );
    }
  </script>
@stop
