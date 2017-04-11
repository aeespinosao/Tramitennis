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
