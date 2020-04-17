<div id="headerCalendar">
    <div class="container">
        <div class="left prev"><a href="/calendar/gs-grigorianskaya/yga=<?=$yga-1?>"></a></div>
        <div class="center title"><span>КАЛЕНДАРНАЯ&nbsp;&nbsp;&nbsp;СИСТЕМА&nbsp;&nbsp;&nbsp;ГРИГОРИАНСКАЯ</span></div>
        <div class="right next"><a href="/calendar/gs-grigorianskaya/yga=<?=$yga+1?>"></a></div>
    </div>
</div>

<div id="content" class="calendar">
  <div class="wrap">
  <link type="text/css" rel="stylesheet" href="/calendars/gks/stylesheet.css"/>
    <div class="calendarWrap gks" style="margin-top: -1000000px">
      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;table-layout:fixed; margin: auto; min-width: 1450px;">
        <tbody>
          <?php $num = 4; ?>
          <?php if($calendars['table-1']['year'] == 9997) $num = 3 ?>
          <?php for ($tableNum=1; $tableNum <= $num; $tableNum++) : ?>
            <?php $tableID = 'table-'.$tableNum ?>
            <tr height="18" data-head="true" data-year="<?=$calendars[$tableID]['year']?>" <?php if($calendars[$tableID]['year'] == $currentYear): ?>class="currentTable" <?php endif; ?>style="mso-height-source:userset;height:14.1pt;border-left: 2pt solid windowtext; border-top: 2pt solid windowtext; border-bottom: 2pt solid windowtext;">
            <td height="18" class="xl90" style="height:14.1pt;border-right: 2pt solid windowtext;border-top:none;" data-year="<?=$calendars[$tableID]['year']?>">&nbsp;</td>
            <?php for ($i=1; $i <= 12; $i++) : ?>
            <td colspan="1" data-month="<?=$i?>" data-head="true" data-year="<?=$calendars[$tableID]['year']?>" class="xl149" style="border-right: 2pt solid black;border-left:none;"><?=$month[$i]?></td>
            <?php endfor; ?>
            <?php if($tableNum != 1): ?>
              <td class="xl90" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">&nbsp;</td>
            <?php endif; ?>
            </tr>

            <?php for ($i=1; $i <= 7; $i++) : ?>
            <tr data-row="true" data-year="<?=$calendars[$tableID]['year']?>" data-week="<?=$i?>" height="18" style="mso-height-source:userset;height:14.1pt">
              <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;"><?=$weeks[$i]?></td>
              <?php $countTR = count($calendars[$tableID][$i]); ?>
              <?php $countI = 0; ?>
              <?php foreach ($calendars[$tableID][$i] as $key => $date) : ?>
              <?php $countI++; ?>
              <td class="xl125<?php if($date['day'] == $date['daysInMonth']) :?> end-month<?php endif; ?>" style="border-left:none;<?php if($countTR == $countI): ?> border-right: 2pt solid black;<?php endif; ?>" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>" data-week-day="<?=$date['week']?>" data-year="<?=$date['year']?>"><?=$date['day']?></td>
              <?php endforeach; ?>
              <?php if($tableNum != 1): ?>
                <td class="xl77" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;"><?=$weeks[$date['week']]?></td>
              <?php endif; ?>            
            </tr>
            <?php endfor; ?>

            <tr height="18" style="mso-height-source:userset;height:14.1pt;border-top: 2pt solid windowtext;border-bottom: 2pt solid windowtext;" data-year="<?=$calendars[$tableID]['year']?>"<?php if($calendars[$tableID]['year'] == $currentYear): ?> data-week-days="true"<?php endif; ?>>
              <td height="18" class="xl96" style="height:14.1pt;border-left: 2pt solid windowtext;border-top:none;border-right: 2pt solid windowtext;">&nbsp;</td>
              <?php $week = 0; ?>
              <?php foreach ($calendars[$tableID][7] as $key => $date) : ?>
              <?php $week++; ?>
              <td data-weeks class="xl99" style="border-left:none<?php if($week == 53): ?>;border-right: 2pt solid windowtext;<?php endif; ?>"><?=sprintf("%02d", $week)?></td>
              <?php endforeach; ?>
              <?php if($tableNum != 1): ?>
              <td class="xl111" style="border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">&nbsp;</td>
              <?php endif; ?>
            </tr>

            <tr height="18" style="mso-height-source:userset;height:14.1pt">
              <td colspan="27" height="18" class="xl148" style="height:14.1pt">Таблица № <?=$tableNum?> (сед №<?=intval($calendars[$tableID]['sed'])?>; лил №<?=intval($calendars[$tableID]['lil'])?>; век №<?=intval($calendars[$tableID]['century'])?>; юга №<?=intval($yga)?>; год №<?=intval($calendars[$tableID]['year'])?> от р.х.).</td>
              <td colspan="27" class="xl65" style="mso-ignore:colspan"></td>
            </tr>

            <tr height="18" style="mso-height-source:userset;height:14.1pt">
              <td height="18" colspan="54" class="xl65" style="height:14.1pt;mso-ignore:colspan"></td>
            </tr>    
          <?php endfor; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="footerCalendar">
    <div class="container">
        <div class="left toList"><a href="/list"><img src="/uploads/systems/1-w.png" width="35"></a></div>
        <div class="center format"><span>Формат&nbsp;&nbsp;&nbsp;системы&nbsp;&nbsp;&nbsp;горизонтальный</span></div>
        <div class="right logo"><a href="/" class="itemContext"></a></div>
    </div>
</div>

<?php

  $this->registerJsFile('/frontend/views/calendar/list/gs/js/gks.js');

?>