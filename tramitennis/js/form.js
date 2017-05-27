$('.focus-text').focus(function(){
  $(this).closest('div').addClass('focus-t');
})
$('.focus-text').blur(function(){
  if($('.focus-text').length > 0 && $('.focus-text').val() != ''){
      $(this).closest('div').addClass('focus-t');
  }
  else{
      $(this).closest('div').removeClass('focus-t');
  }
})

$('document').ready(function () {
  if($('.focus-text').length > 0 && $('.focus-text').val() != ''){
      $('.focus-text').closest('div').addClass('focus-t');
  }
  else{
      $('.focus-text').closest('div').removeClass('focus-t');
  }
})
$(function(){
    $('#t1').clockface();  
});
$('.datepicker').datepicker({
  format: 'mm/dd/yyyy',
  startDate: '-3d'
});
