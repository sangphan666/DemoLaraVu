var rowTable1 = $('#table-1 .table_custom tbody > tr').length;
var rowTable2 = $('#table-2 .table_custom tbody > tr').length;
if (rowTable1 > 10) {
    $('#table-1').css({ 'overflow-y': 'scroll' });
}
if (rowTable2 > 10) {
    $('#table-1').css({ 'overflow-y': 'scroll' });
}
if ($('.table-responsive,.box_change_group').length) {
    $('.table-responsive,.box_change_group').each(function () {
        new PerfectScrollbar(this);
    });
}
$('.change_group_user button').click(function(){
    if($('.box_change_group').css('display') == 'none'){
        $('.box_change_group').show();
    }else{
        $('.box_change_group').hide();
    }
})
$("#table-1 #check-all-available").click(function(){
    $('#table-1 tbody tr input:checkbox').not(this).prop('checked', this.checked);
});
$("#table-2 #check-all-permission").click(function(){
    $('#table-2 tbody tr input:checkbox').not(this).prop('checked', this.checked);
});
$('.send_row').click(function() {
    var row = $("#table-1 tbody tr input:checked").parents("tr").clone();
    $("#table-2 tbody").append(row);
    $("#table-1 tbody tr input:checked").parents('tr').remove();
    var i = 1;
    var j = 1;
    $( "#table-1 tbody tr" ).each(function( index ) {
        $(this).find("td:first-child").html(i++);
    });
    $( "#table-2 tbody tr" ).each(function( index ) {
        $(this).find("td:first-child").html(j++);
        $(this).find("td input").prop('checked', false);
    });
})
$('.return_row').click(function() {
    var row = $("#table-2 tbody tr input:checked").parents("tr").clone();
    $("#table-1 tbody").append(row);
    $("#table-2 tbody tr input:checked").parents('tr').remove();
    var i = 1;
    var j = 1;
    $( "#table-2 tbody tr" ).each(function( index ) {
        $(this).find("td:first-child").html(i++);
    });
    $( "#table-1 tbody tr" ).each(function( index ) {
        $(this).find("td:first-child").html(j++);
        $(this).find("td input").prop('checked', false);
    });
})