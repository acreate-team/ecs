<div id="headerCalendar">
    <div class="container">
        <div class="left bottom"><a href="javascript:;"></a></div>
        <div class="center title"><span>БАЗОВЫЕ&nbsp;&nbsp;&nbsp;ОКНА&nbsp;&nbsp;&nbsp;СИСТЕМ</span></div>
        <div class="right logo_list"><a href="/list"></a></div>
    </div>
</div>

<div id="content" class="calendar_list_system">
	<div class="wrapList">
		<?php foreach ($pages as $page) : ?>
        <div class="item" style="padding-bottom: 50px">
            <div class="wrap">
                <div class="row">
                    <div class="left">
                        <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/uploads/systems/'.$page->id.'.png')): ?><img src="/uploads/systems/<?=$page->id?>.png"><?php endif; ?>
                    </div>
                    <div class="right">
                        <?=$page->short_content?>
                    </div>
                </div>              
                <div class="row bottom">
                    <div class="left">
                        <div class="select format">
                            <div class="box">
                                <div class="top">
                                    <span>форматы</span>
                                    <a href="javascript:;" class="closeBox"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="wrap">
                                    <div class="left">
                                        <span>от р.х.</span>
                                        <ul>
                                            <li><a href="#">по вертикали</a></li>
                                            <li><a href="#">по диагонали</a></li>
                                            <li><a href="/calendar/gs-<?=$page->url?>">по горизонтали</a></li>
                                        </ul>
                                    </div>
                                    <div class="right">
                                        <span>от ш.э.</span>
                                        <ul>
                                            <li><a href="#">по вертикали</a></li>
                                            <li><a href="#">по диагонали</a></li>
                                            <li><a href="#">по горизонтали</a></li>
                                        </ul>                                        
                                    </div>
                                </div>
                            </div>
                            <a href="/calendar/<?=$page->url?>" class="view">открыть <?=$page->name_calendar?></a>
                        </div>
                    </div>
                    <div class="right">
                        <div class="select sections">
                            <div class="box">
                                <div class="top">
                                    <span>разделы</span>
                                    <a href="javascript:;" class="closeBox"></a>
                                    <div class="clear"></div>
                                </div>                                
                                <ul>
                                    <li><a href="/system/ks-<?=$page->url?>/history">история</a></li>
                                    <li><a href="/system/ks-<?=$page->url?>/structure">структура</a></li>
                                    <li><a href="/system/ks-<?=$page->url?>/actual">актуальность</a></li>
                                </ul>
                            </div>
                            <a href="/system/ks-<?=$page->url?>/view" class="bttn">описание <?=$page->name_calendar?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php endforeach; ?>		
	</div>
</div>

<div id="footerCalendar">
    <div class="container">
        <div class="left top"><a href="javascript:;"></a></div>
        <div class="center format"><span>КОЛЛЕКЦИЯ&nbsp;&nbsp;&nbsp;КАЛЕНДАРНЫХ&nbsp;&nbsp;&nbsp;СИСТЕМ</span></div>
        <div class="right logo"><a href="/"></a></div>
    </div>
</div>    

<script>
	$('table tr.head td:eq(1), table tr.bottom td:eq(1)').width($('.list_scroll tr:eq(0) td:eq(1)').width());
	$('table tr.head td:eq(2), table tr.bottom td:eq(2)').width($('.list_scroll tr:eq(0) td:eq(2)').width());
	$('table tr.head td:eq(3), table tr.bottom td:eq(3)').width($('.list_scroll tr:eq(0) td:eq(3)').width());
	$('table tr.head td:eq(4), table tr.bottom td:eq(4)').width($('.list_scroll tr:eq(0) td:eq(4)').width());

	$(function() {
		$(window).resize(function() {
			$('table tr.head td:eq(1), table tr.bottom td:eq(1)').removeAttr('style');
			$('table tr.head td:eq(2), table tr.bottom td:eq(2)').removeAttr('style');
			$('table tr.head td:eq(3), table tr.bottom td:eq(3)').removeAttr('style');
			$('table tr.head td:eq(4), table tr.bottom td:eq(4)').removeAttr('style');

			$('table tr.head td:eq(1), table tr.bottom td:eq(1)').width($('.list_scroll tr:eq(0) td:eq(1)').width());
			$('table tr.head td:eq(2), table tr.bottom td:eq(2)').width($('.list_scroll tr:eq(0) td:eq(2)').width());
			$('table tr.head td:eq(3), table tr.bottom td:eq(3)').width($('.list_scroll tr:eq(0) td:eq(3)').width());
			$('table tr.head td:eq(4), table tr.bottom td:eq(4)').width($('.list_scroll tr:eq(0) td:eq(4)').width());

			var h = $('.calendar_list .list_scroll table tr:eq(0)').innerHeight() + $('.calendar_list .list_scroll table tr:eq(1)').innerHeight() + $('.calendar_list .list_scroll table tr:eq(2)').innerHeight() + $('.calendar_list .list_scroll table tr:eq(3)').innerHeight() + $('.calendar_list .list_scroll table tr:eq(4)').innerHeight() - 2;

			$('.calendar_list .list_scroll').css('max-height', h+'px');						
		});

		$(window).load(function() {
			var h = $('.calendar_list .list_scroll table tr:eq(0)').innerHeight() + $('.calendar_list .list_scroll table tr:eq(1)').innerHeight() + $('.calendar_list .list_scroll table tr:eq(2)').innerHeight() + $('.calendar_list .list_scroll table tr:eq(3)').innerHeight() + $('.calendar_list .list_scroll table tr:eq(4)').innerHeight() - 2;

			$('.calendar_list .list_scroll').css('max-height', h+'px');

			var l5 = $('.calendar_list .list_scroll tr:eq(4)').position().top;
			var l10 = $('.calendar_list .list_scroll tr:eq(9)').position().top;
			var l15 = $('.calendar_list .list_scroll tr:eq(14)').position().top;
			var l20 = $('.calendar_list .list_scroll tr:eq(19)').position().top;

			$('.calendar_list .list_scroll').scroll(function () {
				if ($(this).scrollTop() > l20) {
					$('.calendar_list .list_scroll').attr('data-current', 20);
				} else if ($(this).scrollTop() > l15) {
					$('.calendar_list .list_scroll').attr('data-current', 15);
				} else if ($(this).scrollTop() > l10) {
					$('.calendar_list .list_scroll').attr('data-current', 10);
				} else if ($(this).scrollTop() > l5) {
					$('.calendar_list .list_scroll').attr('data-current', 5);
				} else {
					$('.calendar_list .list_scroll').attr('data-current', 1);
				}
			});			
		});
	});
</script>