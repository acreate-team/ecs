<div id="headerCalendar">
    <div class="container">
        <div class="left bottom"><a href="javascript:;"></a></div>
        <div class="center title"><span>КАЛЕНДАРНАЯ&nbsp;&nbsp;&nbsp;СИСТЕМА&nbsp;&nbsp;&nbsp;ЕДИНАЯ</span></div>
        <div class="right logo_list"><a href="/list"></a></div>
    </div>
</div>

<div id="content" class="calendar_list">
	<div class="calendar_listWrap">
		<div class="list_head">
			<table>
				<tr class="head">
					<td title="поиск по алфавиту" style="position: relative;">
						<a href="/list/alphabet" class="linkBox openAlphabet"></a>
						<a href="/list/alphabet" style="display: block;">
							<img src="/frontend/views/site/images/list_icon_1.png"></div>
						</a>
					</td>
					<td>I</td>
					<td>II</td>
					<td>III</td>
					<td>IIII</td>
					<td>IIIII</td>
					<td title="формат таблицы исходный" style="position: relative;">
						<a href="/" class="linkBox"></a>
						<a href="/">
							<img src="/frontend/views/site/images/list_icon_2.png"></div>
						</a>					
					</td>
				</tr>
			</table>			
		</div>
		<div class="list_scroll">
			<table>
				<?php 
					$i = 0;
					$m = 0; 
				?>
				<?php foreach ($page as $key => $p) : ?>
					<?php $i++; ?>
					<?php if($i == 1): ?>
						<tr class="row">
							<?php $m++; $m_id = sprintf("%02d", $m); ?>
							<td><?=$m_id?></td>
					<?php endif; ?>
					<td>
						<div class="itemList">
							<a href="/system/ks-<?=$p->url?>" data-id="<?=$p->id?>" data-numeric="<?=$p->numeric_calendar?>">
							<div class="image"><img src="/uploads/calendars/<?=$p->image_name?>.png"></div></a>
							<span><?=str_replace('календарная система', '', $p->name)?></span>
						</div>
					</td>
					<?php if($i == 5): ?>
						<?php $i = 0; ?>
						<td>сэт</td>
						</tr>
					<?php endif; ?>					
				<?php endforeach; ?>			
			</table>			
		</div>
		<div class="list_bottom">
			<table>
				<tr class="bottom">
					<td title="поиск по циферблату" style="position: relative;">
						<a href="/list/numeric" class="linkBox"></a>
						<a href="/list/numeric" style="display: block;">
							<img src="/frontend/views/site/images/list_icon_3.png"></div>
						</a>					
					</td>
					<td>ряд</td>
					<td>ряд</td>
					<td>ряд</td>
					<td>ряд</td>
					<td>ряд</td>
					<td title="формат таблицы произвольный" style="position: relative;">
                        <?php if (Yii::$app->user->isGuest) : ?>
                        	<a href="/list/profile/guest" class="linkBox"></a>
                        	<a href="/list/profile/guest">
                        <?php else: ?>
                        	<a href="/list/profile" class="linkBox"></a>
                        	<a href="/list/profile">
                        <?php endif; ?>						
							<img src="/frontend/views/site/images/list_icon_4.png"></div>
						</a>					
					</td>
				</tr>																																
			</table>			
		</div>
	</div>
</div>

<div id="footerCalendar">
    <div class="container">
        <div class="left top"><a href="javascript:;"></a></div>
        <div class="center format"><span>КОЛЛЕКЦИЯ&nbsp;&nbsp;&nbsp;КАЛЕНДАРНЫХ&nbsp;&nbsp;&nbsp;СИСТЕМ</span></div>
        <div class="right logo"><a href="/" class="itemContext"></a></div>
    </div>
</div>    

<div id="searchAlphabet">
<div class="calendar_list">
	<div class="calendar_listWrap calendar_list-alphabet">
		<div>
			<table>
				<tr class="head">
					<td style="background: #C00000"></td>
					<td>I</td>
					<td>II</td>
					<td>III</td>
					<td>IIII</td>
					<td>IIIII</td>
					<td style="background: #C00000"></td>
				</tr>				
				<?php 
					$i = 0;
					$m = 0; 
				?>
				<?php foreach ($page as $key => $p) : ?>
					<?php $i++; ?>
					<?php if($i == 1): ?>
						<tr class="row">
							<?php $m++; $m_id = sprintf("%02d", $m); ?>
							<td style="font-size: 22px"><?=$m_id?></td>
					<?php endif; ?>



						<?php if(isset($match) && $p->match) : ?>
						<td style="text-align: left; padding-left: 5px" class="match-q">
							<a href="/system/ks-<?=$p->url?>" data-id="<?=$p->id?>" data-numeric="<?=$p->numeric_calendar?>" style="font-size: 18px">кс <?=str_replace('календарная система', '', $p->name)?></a>
						</td>
						<?php else: ?>
						<td style="text-align: left; padding-left: 5px">
							<a href="/system/ks-<?=$p->url?>" data-id="<?=$p->id?>" data-numeric="<?=$p->numeric_calendar?>" style="font-size: 18px">кс <?=str_replace('календарная система', '', $p->name)?></a>
						</td>
						<?php endif; ?>



					<?php if($i == 5): ?>
						<?php $i = 0; ?>
						<td style="font-size: 22px">сэт</td>
						</tr>
					<?php endif; ?>					
				<?php endforeach; ?>	
				<tr class="bottom">
					<td style="background: #C00000"></td>
					<td>ряд</td>
					<td>ряд</td>
					<td>ряд</td>
					<td>ряд</td>
					<td>ряд</td>
					<td style="background: #C00000"></td>
				</tr>							
			</table>			
		</div>
	</div>
</div>
</div>

<script>
	$('table tr.head td:eq(1), table tr.bottom td:eq(1)').width($('.list_scroll tr:eq(0) td:eq(1)').width());
	$('table tr.head td:eq(2), table tr.bottom td:eq(2)').width($('.list_scroll tr:eq(0) td:eq(2)').width());
	$('table tr.head td:eq(3), table tr.bottom td:eq(3)').width($('.list_scroll tr:eq(0) td:eq(3)').width());
	$('table tr.head td:eq(4), table tr.bottom td:eq(4)').width($('.list_scroll tr:eq(0) td:eq(4)').width());

	$(function() {
		$('.openAlphabet').click(function() {
			$.fancybox.open({
				src  : '#searchAlphabet',
				type : 'inline',
				touch: false,
				baseTpl:
				'<div class="fancybox-searchBox fancybox-container" role="dialog" tabindex="-1">' +
				'<div class="fancybox-bg"></div>' +
				'<div class="fancybox-inner">' +
				'<div class="fancybox-infobar"><span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span></div>' +
				'<div class="fancybox-toolbar">{{buttons}}</div>' +
				'<div class="fancybox-navigation">{{arrows}}</div>' +
				'<div class="fancybox-stage"></div>' +
				'<div class="fancybox-caption"><div class=""fancybox-caption__body"></div></div>' +
				'</div>' +
				'</div>',	
				afterShow: function() {
					setTimeout(function() {
						listInit();
					}, 1);
				},				
				afterClose: function() {
					setTimeout(function() {
						listInit();
					}, 1);
				}			
			});
			return false;
		});

		function listInit() {
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

			var maxH = [];

			$('.calendar_list .list_scroll tr').each(function() {
				var h = $(this).height();
				maxH.push(h);
			});

			maxH = Math.max.apply(null, maxH);

			$('.calendar_list .list_scroll tr').attr('style', 'height: '+maxH+'px');			
		}

		$(window).resize(function() {
			listInit();		
		});

		$('.calendar_list .list_scroll img').load(function() {
			listInit();
		});

		$(window).load(function() {
			listInit();
			<?php if($pageOld): ?>
			var pageOld = <?=$pageOld?>;

			var href = $('.calendar_list .row td a[data-id="'+pageOld+'"]');
			var index = href.closest('tr').index()+1;
			var current_kit = Math.ceil(index/5);
			var select = current_kit*5-6;
			var position = 0;

			for (var i = 0; i <= select; i++) {
				position = position + $('.calendar_list .list_scroll tr:eq('+i+')').height();
			}

			$('.calendar_list .list_scroll').animate({scrollTop: position+2}, 1000);
			<?php endif; ?>
		});

		$( document ).tooltip({
			position: { my: "left+15 center", at: "right center" }
		});		
	});
</script>