$(document).ready(function() {

	// tooltip enabled
	$('[data-toggle="tooltip"]').tooltip();

	// data table
	$('#example').DataTable();

	// date time picker
	$('#datepicker').datetimepicker({
		language:  'fr',
		weekStart: 1,
		todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
	});

	// switch button for publish
	$('.switch-art').bootstrapSwitch({
		size: 'small',
		onText: 'Yes',
		offText: 'No',
		labelText: 'Active'
	});

	// styling input file
	$(":file").filestyle({
		buttonBefore: true,
		icon: false,
		placeholder: "No file"
	});

	// add clear button on input file
	$('#clearImage').click(function() {
		$("#image").filestyle('clear');
	});

	// click to dismiss alert
	$('.alert').click(function() {
		$('.alert').slideToggle('fast');
	});

	// Publish Article
	$('[name="publish-status"]').on('switchChange.bootstrapSwitch', function(event, state) {

		var id = this.id;

		// sql bug, change true/false to 1/0
		if(state == true)
		{
			state = 1;
		}
		else if(state == false)
		{
			state = 0;
		}

		$.get('Tahun/publish/' + id + '/' + state);
	});

});
