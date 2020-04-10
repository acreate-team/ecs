<div id="headerCalendar">
    <div class="container">
        <div class="left prev"><a href="?y=<?=$calendars['startYear']-4?>"></a></div>
        <div class="center title"><span>КАЛЕНДАРНАЯ&nbsp;&nbsp;&nbsp;СИСТЕМА&nbsp;&nbsp;&nbsp;ГРИГОРИАНСКАЯ</span></div>
        <div class="right next"><a href="?y=<?=$calendars['startYear']+4?>"></a></div>
    </div>
</div>

<div id="content" class="calendar">
<div class="wrap">
<link type="text/css" rel="stylesheet" href="/calendars/gks/stylesheet.css"/>

<div class="calendarWrap gks">



<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:
 collapse;table-layout:fixed; margin: auto;">
<tbody><tr height="18" style="mso-height-source:userset;height:14.1pt;/* border-left: 2pt solid windowtext; */">
  <td colspan="2" height="18" class="xl153" width="68" style="
  border-right: 2pt solid black;
  height:14.1pt;
  width:68px;
  border-left: 2pt solid windowtext;
  border-top: 2pt solid windowtext;
  "><?=$calendars['startYear']-1?>-<?=$calendars['startYear']?></td>
  <td width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
  <td class="xl65" width="34"></td>
 </tr>





 <tr height="18"<?php if($calendars['table-1']['year'] == $currentYear): ?>class="currentTable" <?php endif; ?>style="mso-height-source:userset;height:14.1pt;border-left: 2pt solid windowtext;border-top: 2pt solid windowtext;">
  <td height="18" class="xl90" style="height:14.1pt;border-right: 2pt solid windowtext;border-top:none;">&nbsp;</td>
  <td class="xl123" style="border-left:none;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">→</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">янв</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">фев</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">мар</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">апр</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">маи</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">июн</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">июл</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">авг</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">сен</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">окт</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">ноя</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">дек</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt;border-top: 2pt solid windowtext;">
  <td height="18" class="xl69" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">пн</td>
  <?php foreach ($calendars['table-1'][1] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">вт</td>
  <?php foreach ($calendars['table-1'][2] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl69" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">ср</td>
  <?php foreach ($calendars['table-1'][3] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">чт</td>
  <?php foreach ($calendars['table-1'][4] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;border-top:none;">пт</td>
  <?php foreach ($calendars['table-1'][5] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;border-top:none;">сб</td>
  <?php foreach ($calendars['table-1'][6] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl91" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">вс</td>
  <?php foreach ($calendars['table-1'][7] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt;border-top: 2pt solid windowtext;border-bottom: 2pt solid windowtext;" data-year="<?=$calendars['table-1']['year']?>" <?php if($calendars['table-1']['year'] == $currentYear): ?> data-week-days="true"<?php endif; ?>>
  <td height="18" class="xl96" style="height:14.1pt;border-left: 2pt solid windowtext;border-top:none;border-right: 2pt solid windowtext;">&nbsp;</td>
  <?php $week = 0; ?>
  <?php foreach ($calendars['table-1'][7] as $key => $date) : ?>
  <?php $week++; ?>
  <td class="xl99" style="border-left:none"><?=sprintf("%02d", $week)?></td>
  <?php endforeach; ?>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td colspan="27" height="18" class="xl148" style="height:14.1pt">Таблица № 1 (сед №*; лил № *; век № **; юга № ***; год № <?=$calendars['table-1']['year']?> от р.х.).</td>
  <td colspan="27" class="xl65" style="mso-ignore:colspan"></td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" colspan="54" class="xl65" style="height:14.1pt;mso-ignore:colspan"></td>
 </tr>







 <tr height="18"<?php if($calendars['table-2']['year'] == $currentYear): ?>class="currentTable" <?php endif; ?>style="mso-height-source:userset;height:14.1pt;border-top: 2pt solid windowtext;border-bottom: 2pt solid windowtext;">
  <td height="18" class="xl92" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">&nbsp;</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">янв</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">фев</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">мар</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">апр</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">маи</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">июн</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">июл</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">авг</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">сен</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">окт</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">ноя</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">дек</td>
  <td class="xl90" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">&nbsp;</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl69" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">пн</td>
  <?php foreach ($calendars['table-2'][1] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl69" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">пн</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">вт</td>
  <?php foreach ($calendars['table-2'][2] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl77" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">вт</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl69" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">ср</td>
  <?php foreach ($calendars['table-2'][3] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl69" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">ср</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">чт</td>
  <?php foreach ($calendars['table-2'][4] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl77" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">чт</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;border-top:none;">пт</td>
  <?php foreach ($calendars['table-2'][5] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl77" style="border-top:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;border-left:none;border-left: 2pt solid windowtext;">пт</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;border-top:none;">сб</td>
  <?php foreach ($calendars['table-2'][6] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl77" style="border-top:none;border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">сб</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl69" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">вс</td>
  <?php foreach ($calendars['table-2'][7] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl69" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">вс</td>
 </tr>
 <tr height="18" data-year="<?=$calendars['table-2']['year']?>" <?php if($calendars['table-2']['year'] == $currentYear): ?> data-week-days="true"<?php endif; ?>style="mso-height-source:userset;height:14.1pt;border-top: 2pt solid windowtext;border-bottom: 2pt solid windowtext;">
  <td height="18" class="xl90" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">&nbsp;</td>
  <?php $week = 0; ?>
  <?php foreach ($calendars['table-2'][7] as $key => $date) : ?>
  <?php $week++; ?>
  <td class="xl99" style="border-left:none"><?=sprintf("%02d", $week)?></td>
  <?php endforeach; ?>
  <td class="xl66" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">&nbsp;</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td colspan="27" height="18" class="xl148" style="height:14.1pt">Таблица № 2 (сед №*; лил № *; век № **; юга № ***; год № <?=$calendars['table-2']['year']?> от р.х.).</td>
  <td colspan="27" class="xl65" style="mso-ignore:colspan"></td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" colspan="54" class="xl65" style="height:14.1pt;mso-ignore:colspan"></td>
 </tr>






 <tr height="18"<?php if($calendars['table-3']['year'] == $currentYear): ?>class="currentTable" <?php endif; ?>style="mso-height-source:userset;height:14.1pt;border-top: 2pt solid windowtext;border-bottom: 2pt solid windowtext;">
  <td height="18" class="xl90" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">&nbsp;</td>
  <td class="xl106" style="border-left:none;border-right: 2pt solid windowtext;">→</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">янв</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">фев</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">мар</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">апр</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">маи</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">июн</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">июл</td>
  <td colspan="4" class="xl149" style="border-left:none;border-right: 2pt solid windowtext;/* border-bottom: 2pt solid windowtext; */">авг</td>
  <td colspan="5" class="xl149" style="border-right: 2pt solid black;">сен</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">окт</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">ноя</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">дек</td>
  <td class="xl90" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">&nbsp;</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl69" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">пн</td>
  <?php foreach ($calendars['table-3'][1] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl69" style="border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">пн</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">вт</td>
  <?php foreach ($calendars['table-3'][2] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl77" style="border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">вт</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl69" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">ср</td>
  <?php foreach ($calendars['table-3'][3] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl69" style="border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;border-left:none;border-left: 2pt solid windowtext;">ср</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">чт</td>
  <?php foreach ($calendars['table-3'][4] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl77" style="border-right: 2pt solid windowtext;border-left:none;border-left: 2pt solid windowtext;">чт</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;border-top:none;">пт</td>
  <?php foreach ($calendars['table-3'][5] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl77" style="border-right: 2pt solid windowtext;border-top:none;border-left: 2pt solid windowtext;border-left:none;border-left: 2pt solid windowtext;">пт</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-top:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">сб</td>
  <?php foreach ($calendars['table-3'][6] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl77" style="border-right: 2pt solid windowtext;border-top:none;border-left:none;border-left: 2pt solid windowtext;">сб</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl69" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">вс</td>
  <?php foreach ($calendars['table-3'][7] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl69" style="border-right: 2pt solid windowtext;border-left:none;border-left: 2pt solid windowtext;">вс</td>
 </tr>
 <tr height="18" data-year="<?=$calendars['table-3']['year']?>" <?php if($calendars['table-3']['year'] == $currentYear): ?> data-week-days="true"<?php endif; ?>style="mso-height-source:userset;height:14.1pt;border-top: 2pt solid windowtext;border-bottom: 2pt solid windowtext;">
  <td height="18" class="xl90" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">&nbsp;</td>
  <?php $week = 0; ?>
  <?php foreach ($calendars['table-3'][7] as $key => $date) : ?>
  <?php $week++; ?>
  <td class="xl99" style="border-left:none"><?=sprintf("%02d", $week)?></td>
  <?php endforeach; ?>
  <td class="xl111" style="
    border-right: 2pt solid windowtext;
    border-left: 2pt solid windowtext;
">&nbsp;</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td colspan="27" height="18" class="xl152" style="height:14.1pt">Таблица № 3 (сед №*; лил № *; век № **; юга № ***; год № <?=$calendars['table-3']['year']?> от р.х.).</td>
  <td colspan="27" class="xl65" style="mso-ignore:colspan"></td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" colspan="54" class="xl65" style="height:14.1pt;mso-ignore:colspan"></td>
 </tr>






 <tr height="18"<?php if($calendars['table-4']['year'] == $currentYear): ?>class="currentTable" <?php endif; ?>style="mso-height-source:userset;height:14.1pt;border-top: 2pt solid windowtext;border-bottom: 2pt solid windowtext;">
  <td height="18" class="xl90" style="height:14.1pt;border-left: 2pt solid windowtext;">&nbsp;</td>
  <td class="xl115" style="
    border-right: 2pt solid windowtext;
">→</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">янв</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">фев</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">мар</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">апр</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">маи</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">июн</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">июл</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">авг</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">сен</td>
  <td colspan="4" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">окт</td>
  <td colspan="5" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">ноя</td>
  <td colspan="3" class="xl149" style="
  border-right: 2pt solid black;
  border-left:
  none;
  ">дек</td>
  <td class="xl90" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">&nbsp;</td>
 </tr>
 <tr data-year="<?=$calendars['table-4']['year']?>" data-week-day="1" height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl69" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">пн</td>
  <?php foreach ($calendars['table-4'][1] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl69" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">пн</td>
 </tr>
 <tr data-year="<?=$calendars['table-4']['year']?>" data-week-day="2" height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77 c7" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">вт</td>
  <?php foreach ($calendars['table-4'][2] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl77 c7" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">вт</td>
 </tr>
 <tr data-year="<?=$calendars['table-4']['year']?>" data-week-day="3" height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl69" style="height:14.1pt;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">ср</td>
  <?php foreach ($calendars['table-4'][3] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl69" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">ср</td>
 </tr>
 <tr data-year="<?=$calendars['table-4']['year']?>" data-week-day="4" height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">чт</td>
  <?php foreach ($calendars['table-4'][4] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>  
  <td class="xl77" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">чт</td>
 </tr>
 <tr data-year="<?=$calendars['table-4']['year']?>" data-week-day="5" height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;border-top:none;">пт</td>
  <?php foreach ($calendars['table-4'][5] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl77" style="border-top:none;border-right: 2pt solid windowtext;border-left:none;border-left: 2pt solid windowtext;">пт</td>
 </tr>
 <tr data-year="<?=$calendars['table-4']['year']?>" data-week-day="6" height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl77 c8" style="height:14.1pt;border-top:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">сб</td>
  <?php foreach ($calendars['table-4'][6] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl77" style="border-top:none;border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">сб</td>
 </tr>
 <tr data-year="<?=$calendars['table-4']['year']?>" data-week-day="7" height="18" style="mso-height-source:userset;height:14.1pt">
  <td height="18" class="xl91" style="height:14.1pt;border-left: 2pt solid windowtext;border-right: 2pt solid windowtext;">вс</td>
  <?php foreach ($calendars['table-4'][7] as $key => $date) : ?>
  <td class="xl125" style="border-left:none" data-year="<?=$date['year']?>" data-month="<?=$date['month']?>" data-day="<?=$date['day']?>"><?=$date['day']?></td>
  <?php endforeach; ?>
  <td class="xl91" style="border-left:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">вс</td>
 </tr>
 <tr height="18" data-year="<?=$calendars['table-4']['year']?>" <?php if($calendars['table-4']['year'] == $currentYear): ?> data-week-days="true"<?php endif; ?>style="mso-height-source:userset;height:14.1pt;border-top: 2pt solid windowtext;border-bottom: 2pt solid windowtext;">
  <td height="18" class="xl90" style="height:14.1pt;border-left: 2pt solid windowtext;border-top:none;border-right: 2pt solid windowtext;">&nbsp;</td>
  <?php $week = 0; ?>
  <?php foreach ($calendars['table-4'][7] as $key => $date) : ?>
  <?php $week++; ?>
  <td class="xl99" style="border-left:none"><?=sprintf("%02d", $week)?></td>
  <?php endforeach; ?>
  <td class="xl114" style="border-top:none;border-right: 2pt solid windowtext;border-left: 2pt solid windowtext;">&nbsp;</td>
 </tr>
 <tr height="18" style="mso-height-source:userset;height:14.1pt">
  <td colspan="27" height="18" class="xl152" style="height:14.1pt">Таблица № 4 (сед №*; лил № *; век № **; юга № ***; год № <?=$calendars['table-4']['year']?> от р.х.).</td>
  <td colspan="27" class="xl65" style="mso-ignore:colspan"></td>
 </tr>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <!--[if supportMisalignedColumns]-->
 <tr height="0" style="display:none">
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
  <td width="34"></td>
 </tr>
 <!--[endif]-->
</tbody></table>
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

<script>
  Date.prototype.getWeek = function (dowOffset) {
  /*getWeek() was developed by Nick Baicoianu at MeanFreePath: http://www.meanfreepath.com */

      dowOffset = typeof(dowOffset) == 'int' ? dowOffset : 0; //default dowOffset to zero
      var newYear = new Date(this.getFullYear(),0,1);
      var day = newYear.getDay() - dowOffset; //the day of week the year begins on
      day = (day >= 0 ? day : day + 7);
      var daynum = Math.floor((this.getTime() - newYear.getTime() - 
      (this.getTimezoneOffset()-newYear.getTimezoneOffset())*60000)/86400000) + 1;
      var weeknum;
      //if the year starts before the middle of a week
      if(day < 4) {
          weeknum = Math.floor((daynum+day-1)/7) + 1;
          if(weeknum > 52) {
              nYear = new Date(this.getFullYear() + 1,0,1);
              nday = nYear.getDay() - dowOffset;
              nday = nday >= 0 ? nday : nday + 7;
              /*if the next year starts before the middle of
                the week, it is week #1 of that year*/
              weeknum = nday < 4 ? 1 : 53;
          }
      }
      else {
          weeknum = Math.floor((daynum+day-1)/7);
      }
      return weeknum;
  };

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

  $('tr[data-year="'+year+'"][data-week-day="'+week+'"] td:first-child').addClass('active'); 
  $('tr[data-year="'+year+'"][data-week-day="'+week+'"] td:last-child').addClass('active'); 

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

  bannerActiveAnimation();

  setInterval(function() {
    bannerActiveAnimation();
  }, 4999);

  if($('.currentTable').length) {
  	$('html, body').animate({scrollTop:$('.currentTable').offset().top}, '1');
  }

</script>