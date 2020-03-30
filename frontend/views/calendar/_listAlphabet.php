<div id="headerCalendar">
    <div class="container">
        <div class="left bottom"><a href="javascript:;"></a></div>
        <div class="center title"><span>КАЛЕНДАРНАЯ&nbsp;&nbsp;&nbsp;СИСТЕМА&nbsp;&nbsp;&nbsp;ЕДИНАЯ</span></div>
        <div class="right logo_list"><a href="/list"></a></div>
    </div>
</div>

<div id="content" class="calendar_list">
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

<div id="footerCalendar">
    <div class="container">
        <div class="left top"><a href="javascript:;"></a></div>
        <div class="center format"><span>КОЛЛЕКЦИЯ&nbsp;&nbsp;&nbsp;КАЛЕНДАРНЫХ&nbsp;&nbsp;&nbsp;СИСТЕМ</span></div>
        <div class="right logo"><a href="/" class="itemContext"></a></div>
    </div>
</div>    

<?php if($q && $match): ?>
<script>
	$(window).load(function() {
		$('html, body').animate({scrollTop: $('.match-q').offset().top-2}, 1000);
	});
</script>
<?php endif; ?>