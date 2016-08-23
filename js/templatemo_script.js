/* Credit: http://www.templatemo.com */
function setMinDate(value) {
	$('#tanggalBerakhir').datepicker({
		minDate: value
	});
}

$(document).ready(function() {     

	$.datepicker.setDefaults({
		dateFormat: "dd MM yy",
		dayNames: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
		dayNamesMin: ["Mi", "Sen", "Sel", "Ra", "Ka", "Ju", "Sa"],
		monthNames: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]
	});

	$('.templatemo-sidebar-menu li.sub a').click(function() {
		$(this).parent('.sub').each(function() {
		 	$(this).parent().find('.sub').removeClass('open');
		});
		$(this).parent().addClass('open');
	});

	$('#tanggalBerangkat').datepicker({
			minDate: 0,
			onSelect: function(selected, evnt) {
				$('#tanggalBerakhir').datepicker('destroy');
				setMinDate(selected);
				$('#tanggalBerakhir').removeAttr('disabled');
			}
	});

}); // document.ready