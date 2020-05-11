<div id="headerCalendar">
    <div class="container">
        <div class="left prev"><a href="/calendar/vs-grigorianskaya/sed=<?=$sed-1?>" <?php if($sed-1 == 0): ?> style="display: none"<?php endif; ?>></a></div>
        <div class="center title"><span>КАЛЕНДАРНАЯ&nbsp;&nbsp;&nbsp;СИСТЕМА&nbsp;&nbsp;&nbsp;ГРИГОРИАНСКАЯ</span></div>
        <div class="right next"><a href="/calendar/vs-grigorianskaya/sed=<?=$sed+1?>"></a></div>
    </div>
</div>

<div id="content" class="calendar" data-sed="<?=$sed?>">
  <div class="wrap">
    <link type="text/css" rel="stylesheet" href="/calendars/gks/stylesheet-ds.css"/>
    <div class="loadingCalendar" style="text-align: center; padding-top: 40px; padding-bottom: 40px; font-size: 20px;">
      <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
      <p style="display: inline-block;">Загрузка, пожалуйста подождите...</p>
    </div>
    <div class="calendarWrap gks" style="margin-top: -1000000px; display: none">    

      <ul class="vs-list">
        <?php $s = 1; ?>
        <?php if($sed > 1): ?>
          <?php $s = 56 * ($sed - 1) + 1; ?>
        <?php endif; ?>
        <?php for($i = $s; $i <= $s - 1 + 56; $i++): ?>
          <li><a href="/calendar/ds-grigorianskaya/lil=<?=$i?>" target="_blank"><?=$i?></a></li>
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
              <li><a href="/calendar/<?=str_replace('vs-', 'gs-', Yii::$app->request->get('url')) ?>">формат системы горизонтальный</a></li>
              <li><a href="/calendar/<?=str_replace('vs-', 'ds-', Yii::$app->request->get('url')) ?>">формат системы диагональный</a></li>
            </ul>
          </div>
          <span>Формат&nbsp;&nbsp;&nbsp;системы&nbsp;&nbsp;&nbsp;лилианский</span>
        </div>
        <div class="right logo"><a href="/" class="itemContext"></a></div>
    </div>
</div>

<script>
  $(window).load(function() {
    $('.loadingCalendar').remove();
    $('.calendarWrap').css('margin-top', 0).show();
  });
</script>