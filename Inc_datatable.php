<script src="//code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css">
<script type="text/javascript">
	$(document).ready(function() {
		 $('#myTable').dataTable( {
		 	"autoWidth" : false,
		 	columnDefs: [
		 		{ orderable: false, "targets": [-1, -2] }
		 	],
	        "language": {
	            "lengthMenu": "每頁顯示 _MENU_ 筆資料",
	            "zeroRecords": "找不到資料",
	            "info": "第 _PAGE_ 頁，共 _PAGES_ 頁",
	            "infoEmpty": "目前尚無任何資料",
	            "infoFiltered": "(filtered from _MAX_ total records)",
		  		"loadingRecords": "載入中...",
		   		"processing":     "處理中...",
		   		"search":         "搜尋：",
		   		"paginate": {
		    		"first":      "首頁",
		    		"last":       "最後一頁",
		    		"next":       "下一頁",
		    		"previous":   "上一頁"
		   		},
	        }
	     } );
	} );
</script>