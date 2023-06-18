<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/menu-setting.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>

<script src="assets/plugins/amchart/js/amcharts.js"></script>
<script src="assets/plugins/amchart/js/gauge.js"></script>
<script src="assets/plugins/amchart/js/serial.js"></script>
<script src="assets/plugins/amchart/js/light.js"></script>
<script src="assets/plugins/amchart/js/pie.min.js"></script>
<script src="assets/plugins/amchart/js/ammap.min.js"></script>
<script src="assets/plugins/amchart/js/usaLow.js"></script>
<script src="assets/plugins/amchart/js/radar.js"></script>
<script src="assets/plugins/amchart/js/worldLow.js"></script>
<!-- Sweet alert Js -->



<script src="assets/plugins/modal-window-effects/js/classie.js"></script>
<script src="assets/plugins/modal-window-effects/js/modalEffects.js"></script>




<!--  -->
<script src="assets/plugins/sweetalert/js/sweetalert.min.js"></script>
<script src="assets/plugins/notification/js/bootstrap-growl.min.js"></script>
<script src="assets/plugins/data-tables/js/datatables.min.js"></script>
<script>

    
  'use strict';
$(document).ready(function() {
    $('#zero-configuration').DataTable();
    $('#key-act-button').DataTable( {
        dom: 'Bfrtip', buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
    }
    );
    $('#col-reorder').DataTable( {
        colReorder: true
    }
    );
    $('#fixed-columns-left').DataTable( {
        scrollY: "300px", scrollX: true, scrollCollapse: true, paging: false, fixedColumns: true,
    }
    );
    $('#fixed-columns-left-right').DataTable( {
        scrollY:"300px", scrollX:true, scrollCollapse:true, paging:false, fixedColumns:true, fixedColumns: {
            leftColumns: 1, rightColumns: 1
        }
    }
    );
    $('#fixed-header').DataTable( {
        fixedHeader: true
    }
    );
    $('#scrolling-table').DataTable( {
        scrollY: 300, paging: false, keys: true
    }
    );
    $('#responsive-table').DataTable( {}
    );
    $('#responsive-table-model').DataTable( {
        responsive: {
            details: {
                display:$.fn.dataTable.Responsive.display.modal( {
                    header:function(row) {
                        var data=row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                }
                ), renderer:$.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                }
                )
            }
        }
    }
    );
}

);
</script>






</body>

</html>