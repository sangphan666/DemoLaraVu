function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#photo').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$('[data-mask]').inputmask();
$('.select2').select2();
function showPW(element){
  var input = $(element).prev();
  if(input.prop('type') == 'password'){
    input.prop('type','text');
  }else{
    input.prop('type','password');
  }
}

// Generate a password string
function randString(id){
  var dataSet = $(id).attr('data-character-set').split(',');  
  var possible = '';
  if($.inArray('a-z', dataSet) >= 0){
    possible += 'abcdefghijklmnopqrstuvwxyz';
  }
  if($.inArray('A-Z', dataSet) >= 0){
    possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  }
  if($.inArray('0-9', dataSet) >= 0){
    possible += '0123456789';
  }
  if($.inArray('#', dataSet) >= 0){
    possible += '![]{}()%&*$#^<>~@|';
  }
  var text = '';
  for(var i=0; i < $(id).attr('data-size'); i++) {
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  }
  return text;
}

// Create a new password on page load
$('input[rel="gp"]').each(function(){
  $(this).val(randString($(this)));
});

// Create a new password
$("#getPw").click(function(){
  var field = $('#password');
  field.val(randString(field));
  $('#password').attr('type','text');
  $('#password-repeat').val(field.val());
  $('#password-repeat').attr('type','text');
});

// Auto Select Pass On Focus
$('input[rel="gp"]').on("click", function () {
   $(this).select();
});