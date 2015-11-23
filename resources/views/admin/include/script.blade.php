<script type="text/javascript" src="{{asset('public/bootstrap/js/jquery-1.11.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/scripts/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/scripts/mapDetail.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#table_index').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
			},
			"order": [[ 1, "asc" ]]
		});
	} );


</script>
<script type="text/javascript">
	$("#checkAll").click(function () {
		$(".check").prop('checked', $(this).prop('checked'));
	});
</script>
