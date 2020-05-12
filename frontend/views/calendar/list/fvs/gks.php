<div id="headerCalendar">
    <div class="container">
        <div class="left prev"><a href="/calendar/fvs-grigorianskaya/sed=<?=$sed-1?>" <?php if($sed-1 == 0): ?> style="display: none"<?php endif; ?>></a></div>
        <div class="center title"><span>КАЛЕНДАРНАЯ&nbsp;&nbsp;&nbsp;СИСТЕМА&nbsp;&nbsp;&nbsp;ГРИГОРИАНСКАЯ</span></div>
        <div class="right next"><a href="/calendar/fvs-grigorianskaya/sed=<?=$sed+1?>"></a></div>
    </div>
</div>

<div id="content" class="calendar" data-sed="<?=$sed?>">
  <div class="wrap">
    <link type="text/css" rel="stylesheet" href="/calendars/gks/stylesheet-ds.css"/>
    <div class="loadingCalendar"></div>
    <div class="calendarWrap gks" style="margin-top: -1000000px; display: none">    
      <ul class="vs-list">
        <?php $s = 1; ?>
        <?php if($sed > 1): ?>
          <?php $s = 56 * ($sed - 1) + 1; ?>
        <?php endif; ?>

        <?php $links = []; ?>
        <?php for($i = $s; $i <= $s - 1 + 56; $i++): ?>
          <?php if($i >= 1 && $i <= 7): ?>
            <?php $links['col-1'][] = $i ?>
          <?php endif; ?>
          <?php if($i >= 8 && $i <= 14): ?>
            <?php $links['col-2'][] = $i ?>
          <?php endif; ?>
          <?php if($i >= 15 && $i <= 21): ?>
            <?php $links['col-3'][] = $i ?>
          <?php endif; ?>
          <?php if($i >= 22 && $i <= 28): ?>
            <?php $links['col-4'][] = $i ?>
          <?php endif; ?>          
          <?php if($i >= 29 && $i <= 35): ?>
            <?php $links['col-5'][] = $i ?>
          <?php endif; ?>
          <?php if($i >= 36 && $i <= 42): ?>
            <?php $links['col-6'][] = $i ?>
          <?php endif; ?>
          <?php if($i >= 43 && $i <= 49): ?>
            <?php $links['col-7'][] = $i ?>
          <?php endif; ?> 
          <?php if($i >= 50 && $i <= 56): ?>
            <?php $links['col-8'][] = $i ?>
          <?php endif; ?>
        <?php endfor; ?>




        <?php for($t = 0; $t < 7; $t++): ?>
          <li><a href="/calendar/fds-grigorianskaya/lil=<?=$links['col-1'][$t]?>" target="_blank"><?=sprintf("%02d", $links['col-1'][$t])?></a></li>
          <li><a href="/calendar/fds-grigorianskaya/lil=<?=$links['col-2'][$t]?>" target="_blank"><?=sprintf("%02d", $links['col-2'][$t])?></a></li>
          <li><a href="/calendar/fds-grigorianskaya/lil=<?=$links['col-3'][$t]?>" target="_blank"><?=sprintf("%02d", $links['col-3'][$t])?></a></li>
          <li><a href="/calendar/fds-grigorianskaya/lil=<?=$links['col-4'][$t]?>" target="_blank"><?=sprintf("%02d", $links['col-4'][$t])?></a></li>
          <li><a href="/calendar/fds-grigorianskaya/lil=<?=$links['col-5'][$t]?>" target="_blank"><?=sprintf("%02d", $links['col-5'][$t])?></a></li>
          <li><a href="/calendar/fds-grigorianskaya/lil=<?=$links['col-6'][$t]?>" target="_blank"><?=sprintf("%02d", $links['col-6'][$t])?></a></li>
          <li><a href="/calendar/fds-grigorianskaya/lil=<?=$links['col-7'][$t]?>" target="_blank"><?=sprintf("%02d", $links['col-7'][$t])?></a></li>
          <li><a href="/calendar/fds-grigorianskaya/lil=<?=$links['col-8'][$t]?>" target="_blank"><?=sprintf("%02d", $links['col-8'][$t])?></a></li>
        <?php endfor; ?>
      </ul>

    </div>    
  </div>
</div>

<div id="footerCalendar">
    <div class="container">
        <div class="left toList"><a href="/list"><img src="/uploads/systems/1-w.png" width="35"></a></div>
        <div class="center format">
          <div class="selectFormat">
            <ul class="selectFormatWrap">
              <li><a href="/calendar/<?=str_replace('fvs-', 'fgs-', Yii::$app->request->get('url')) ?>">формат системы горизонтальный</a></li>
              <li><a href="/calendar/<?=str_replace('fvs-', 'fds-', Yii::$app->request->get('url')) ?>">формат системы диагональный</a></li>
            </ul>
          </div>
          <span>Формат&nbsp;&nbsp;&nbsp;системы&nbsp;&nbsp;&nbsp;лилианский</span>
        </div>
        <div class="right logo"><a href="/" class="itemContext"></a></div>
    </div>
</div>

<script>
  var w = 20;

  setInterval(function() {
    $('.loadingCalendar').css('width', w+'%');
    w = w + 20;
    if(w >= 100) w = 100;
  }, 200);

  $(window).load(function() {
    $('.loadingCalendar').stop().css('width', '100%');
    setTimeout(function() {
      $('.loadingCalendar').hide();
      $('.calendarWrap').css('margin-top', 0).fadeIn();
    }, 1001);
  });
</script>