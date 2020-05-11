
  //func
  function bannerActiveAnimation() {
    var color = [
      'c1',
      'c2',
      'c3',
      'c4',
      'c5',
      'c6',
      'c7',
      'c8',
      'c9'
    ];

    var now = new Date();
    var minute = now.getMinutes();
    var second = now.getSeconds();

    var secondNow = (minute * 60) + second;
    var bonNow = secondNow / 5;
    var banNow = secondNow / 45;

    bonNowSplit = bonNow.toString().split('.');
    banNowSplit = banNow.toString().split('.');

    var colorNow = bonNowSplit[0] - (banNowSplit[0] * 9);
    
    $('.calendar table td.active').removeClass('c1');
    $('.calendar table td.active').removeClass('c2');
    $('.calendar table td.active').removeClass('c3');
    $('.calendar table td.active').removeClass('c4');
    $('.calendar table td.active').removeClass('c5');
    $('.calendar table td.active').removeClass('c6');
    $('.calendar table td.active').removeClass('c7');
    $('.calendar table td.active').removeClass('c8');
    $('.calendar table td.active').removeClass('c9');
    $('.calendar table td.active').addClass(color[colorNow]);
  }

  function initGKS() {
    $('.loadingCalendar').remove();

    var match = ['false'];

    Date.prototype.getWeek = function (dowOffset) {
        dowOffset = typeof(dowOffset) == 'int' ? dowOffset : 0;
        var newYear = new Date(this.getFullYear(),0,1);
        var day = newYear.getDay() - dowOffset;
        day = (day >= 0 ? day : day + 7);
        var daynum = Math.floor((this.getTime() - newYear.getTime() - 
        (this.getTimezoneOffset()-newYear.getTimezoneOffset())*60000)/86400000) + 1;
        var weeknum;
        if(day < 4) {
            weeknum = Math.floor((daynum+day-1)/7) + 1;
            if(weeknum > 52) {
                nYear = new Date(this.getFullYear() + 1,0,1);
                nday = nYear.getDay() - dowOffset;
                nday = nday >= 0 ? nday : nday + 7;
                weeknum = nday < 4 ? 1 : 53;
            }
        }
        else {
            weeknum = Math.floor((daynum+day-1)/7);
        }
        var week = new Date().getDay();
        if(match[week]) weeknum = weeknum - 1;
        return weeknum;
    };

    //line
    var weeks = new Date().getWeek();
    var week = new Date().getDay();
    var year = new Date().getFullYear();
    var month = new Date().getMonth() + 1;
    var day = new Date().getDate();

    var str = "" + month;
    var pad = "00"
    var ans = pad.substring(0, pad.length - str.length) + str

    $('td[data-year="'+year+'"][data-month="'+ans+'"][data-day="'+day+'"]').addClass('active');

    $('tr[data-year="'+year+'"][data-week-days="true"] td').each(function() {
      if($(this).html() == weeks) $(this).addClass('active'); 
    });

    $('td.end-month').each(function(i) {
        var tr = $(this).closest('tr').index();
        var eq = $(this).index();
        var week = $(this).data('week-day');
        var down = Math.abs(week-7); //вниз
        var month = parseInt($(this).data('month'));
        var y = parseInt($(this).data('year'));
        var up = 7-(down+1);
        down++;

        //line      
        var eqLeft = eq - 1;
        var trLeft = tr;
        for (var i=0; i < down; i++) {
          trLeft++;
          var trF = trLeft - 1;
          if(parseInt($(this).closest('table').find('tr:eq('+trF+') td:eq('+eqLeft+')').css('border-right-width')) <= 0) {
            var eqF = eqLeft-1;
            $(this).closest('table').find('tr:eq('+trLeft+') td[data-weeks]:eq('+eqLeft+')').addClass('end-month-right').attr({'data-month':month, 'data-year':y});
            $(this).closest('table').find('tr:eq('+trLeft+') td[data-weeks]:eq('+eqF+')').removeClass('end-month-right').addClass('end-month-right-stop');
          }

          if(!$(this).closest('table').find('tr:eq('+trLeft+') td:eq('+eqLeft+')').hasClass('end-month-right-stop')) {
            $(this).closest('table').find('tr:eq('+trLeft+') td:eq('+eqLeft+')').addClass('end-month-right').attr({'data-month':month, 'data-year':y});
          }
        }

        for (var i=0; i < up; i++) {
          tr--;
          $(this).closest('table').find('tr:eq('+tr+') td:eq('+eq+')').addClass('end-month-right').attr({'data-month':month, 'data-year':y});
        }
    });

    //startMonth td
    $('tr[data-week="1"]').each(function() {
      var y = $(this).data('year');
      if(y != $(this).find('td:eq(1)').data('year')) {
        $(this).closest('tbody').find('tr[data-head="true"][data-year="'+y+'"] td:eq(0)').after('<td class="xl106" style="border-left:none;border-right: 2pt solid windowtext;" data-next="true" data-year="'+y+'">→</td>')
      }
    });

    //head
    $('td[data-week-day="1"]').each(function() {
      if(parseInt($(this).css('border-right-width')) > 1) {
        $(this).addClass('end-head-line');
      } else {
        if($(this).closest('tr').find('td:nth-last-child(1)').html() == 'пн') {
          $(this).closest('tr').find('td:nth-last-child(2)').addClass('end-head-line');
        }
      }  
    });

    var oldEQ = 0;
    var oldYear = 0;
    var month = 0;
    var s = false;

    $('td.end-head-line').each(function() {
      if($(this).index() != 1) {
        var y = $(this).closest('tr').data('year');
        if(y != oldYear) {
          oldEQ = 0;
          month = 0;
          s = false;
        }
        oldYear = y;
        month++;

        var eq = $(this).index();
        var colspan = eq - oldEQ;

        if($(this).closest('tr').find('td:eq(1)').hasClass('end-head-line') && !s) {
          s = true;
          $(this).closest('tr').find('td:eq(1)').removeClass('end-head-line');
          colspan--;
        }

        $(this).closest('tr').find('td:eq('+eq+')').attr({'data-colspan': colspan, 'data-month': month});
        oldEQ = eq;
      }
    });

    $('td[data-colspan]').each(function() {
      var y = $(this).closest('tr').data('year');
      var m = parseInt($(this).data('month'));
      var c = $(this).data('colspan');

      $('td[data-head="true"][data-year="'+y+'"][data-month="'+m+'"]').attr('colspan', c);
    });

    //week and day animation
    if(match[week]) week = 7;
    month = new Date().getMonth() + 1;
    $('tr[data-year="'+year+'"][data-week="'+week+'"] td:first-child').addClass('active'); 
    $('td[data-year="'+year+'"][data-day="'+day+'"][data-month="'+month+'"]').addClass('active'); 


    //show
    $('.calendarWrap').show();

    //animation func
    bannerActiveAnimation();

    setInterval(function() {
      bannerActiveAnimation();
    }, 4999);    
  }

  //load callback
  $(window).load(function() {
    if($('.currentTable').length) {
      setTimeout(function() {
        $('html, body').animate({scrollTop:$('.currentTable').offset().top}, '1');
      }, 1000);
    }    

    $('.calendarWrap').css('margin-top', 0);

    initGKS();
  });