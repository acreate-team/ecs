$(function() {

  $('#tabs').tabs({
    active: 0
  });

  $('.table tbody tr td .delete').click(function(){
    
      var link = $(this);

      $.confirm({
        'title'   : 'Подтверждение удаления',
        'message' : 'Вы решили удалить пункт. <br />После удаления его нельзя будет восстановить! Продолжаем?',
        'buttons' : {
          'Да'  : {
            'class' : 'yes',
            'action': function(){
              document.location.href = link.attr('href');
            }
          },
          'Нет' : {
            'class' : 'no',
            'action': function(){}  // В данном случае ничего не делаем. Данную опцию можно просто опустить.
          }
        }
      });

      return false;
    });

        $('.table select, .form select').styler();
        $('.table .switch, .form .switch').switchable();
  var styler = function() {

    $('.watch_list').click(function() {
      if($(this).attr('href') != '#') {
        return true;
      }
      
      $('.back').click();
    });

    if($('.success').length) {
      $('.success').slideDown(900, 'easeInOutExpo').delay(4000).slideUp(250, 'easeInOutExpo')
    }

    if($('.error').length) {
      $('.error').slideDown(900, 'easeInOutExpo').delay(3000).slideUp(250, 'easeInOutExpo')
    }

    $('.table .checkbox input[type="checkbox"]').styler();

    $('.head input[type="checkbox"]').on('change', function() {
      if($(this).is(':checked')) {
        $('.row').each(function() {
          var r = $(this);
          var c = r.find('input[type="checkbox"]');

          if(!r.hasClass('select')) {
            c.attr('checked', 'checked');
            r.addClass('select');
            $('.actionMass').slideDown();
            $('#wrap').css('padding-bottom','60px');
          }       
        });
      } else {
        $('.row').each(function() {
          var r = $(this);
          var c = r.find('input[type="checkbox"]');

          if(r.hasClass('select')) {
            c.removeAttr('checked');
            r.removeClass('select');
          }       
        });  
      }

      var opened = false;
      var row_select_count = 0;

      $('.row td input[type="checkbox"]').each(function() {
        if($(this).closest('tr').hasClass('select')) {
          opened = true;
        }
      })

      if(!opened) {
        $('.actionMass').slideUp();
      }
    });

    //row click
    $('.row td .switchable-wrapper').click(function() {
      return false;
    });

    $('.row td').click(function() {
      if ($(this).find('.switchable-holder').length) {
        return false;
      }

      var r = $(this).closest('tr');
      var c = r.find('input[type="checkbox"]');

      if(!r.hasClass('select')) {
        c.attr('checked', 'checked');
        r.addClass('select');
        $('.actionMass').slideDown();
        $('#wrap').css('padding-bottom','60px');
      } else {
        c.removeAttr('checked');
        r.removeClass('select');
      }

      var opened = false;
      var row_select_count = 0;

      $('.row td input[type="checkbox"]').each(function() {
        if($(this).closest('tr').hasClass('select')) {
          opened = true;
          row_select_count++;
        }
      })

      var row_count = $('.row td input[type="checkbox"]').length;

      if(row_count == row_select_count) {
        /* TODO fail moment
        if(!$('.head input[type="checkbox"]').is(':checked')) {
          $('.head input[type="checkbox"]').attr('checked', 'checked');
        }
        */
      } else if(row_select_count == 0) {
        if($('.head input[type="checkbox"]').is(':checked')) {
          $('.head input[type="checkbox"]').removeAttr('checked');
        }                
      } else {
        if($('.head input[type="checkbox"]').is(':checked')) {
          $('.head input[type="checkbox"]').removeAttr('checked');
        }           
      }

      if(!opened) {
        $('.actionMass').slideUp();
      }

      $('.table input[type="checkbox"]').trigger('refresh');
    });        
  };

  styler();




  $(document).keydown(function(e) {
      if ((e.which == '115' || e.which == '83' ) && (e.ctrlKey || e.metaKey))
      {
          e.preventDefault();
          $('#content input[type="submit"]').click();
          return false;
      }
      if ((e.which == '115' || e.which == '69' ) && (e.ctrlKey || e.metaKey))
      {
          e.preventDefault();
          $('#content .back').click();
          return false;
      }      
      return true;
  }); 

  $(document).click(function() {
      if( $(event.target).closest(".action").length ) 
      return;
      if($(".action").is(':visible')) $(".action").slideUp();
      event.stopPropagation();
  }); 

  $(document).click(function() {
      if( $(event.target).closest(".search").length ) 
      return;
      if($('.search').is(':visible')) {
        $('.search').slideUp(150, 'easeInOutCirc');
        $('.searchOpen').removeClass('open'); 
      }
      event.stopPropagation();
  }); 

  $(document).click(function() {
      if( $(event.target).closest(".filters").length ) 
      return;
      if($('.filters').is(':visible')) {
        $('.filters').slideUp(150, 'easeInOutCirc');
        $('.filterOpen').removeClass('open'); 
      }
      event.stopPropagation();
  }); 

});