$(document).ready(function() {
    $("ul.file-tree").filetree();
    $("ul.checktree").checktree();
});
$('.change_group_user button').click(function(){
    if($('.box_change_group').css('display') == 'none'){
        $('.box_change_group').show();
    }else{
        $('.box_change_group').hide();
    }
})
if ($('.box_change_group').length) {
    $('.box_change_group').each(function () {
        new PerfectScrollbar(this);
    });
}