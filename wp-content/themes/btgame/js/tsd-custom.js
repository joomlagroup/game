jQuery(document).ready(function($) {
  console.log ('js running');
  $('.card-item').matchHeight();
  $('.loaiquanco').change(function(){
    if($(this).val() == 2) {
      var items = [4, 5, 6, 7, 8, 9, 10, 11];
      console.log (items);
      for(var i=0; i < items.length; i++) {
        $('.field-'+items[i]).find('select, input').prop('disabled', true);
      }
    }
  });
  $('input.radio-boco').click(function() {
    var boco = $(this).val();
    $('select[name="boco"]').val(boco);
    $('.btn-search').trigger( "click" );
  });
})
