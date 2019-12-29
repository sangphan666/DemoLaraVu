$(function () {
    //Date range picker
    $('#reservation').daterangepicker({
        opens: 'left',
    });
    $('.dropdown-menu').click(function(e) {
        e.stopPropagation();
    });
})