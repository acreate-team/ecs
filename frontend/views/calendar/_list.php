<div id="headerCalendar">
    <div class="container">
        <div class="left bottom"><a href="javascript:;"></a></div>
        <div class="center title"><span>КАЛЕНДАРНАЯ&nbsp;&nbsp;&nbsp;СИСТЕМА&nbsp;&nbsp;&nbsp;ЕДИНАЯ</span></div>
        <div class="right logo_list"><a href="/list"></a></div>
    </div>
</div>

<div id="content" class="calendar_list"<?php if($pageOld): ?> data-page-old="<?=$pageOld?>"<?php endif; ?>>
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
        <div class="right logo"><a href="/"></a></div>
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
					<?php foreach ($pageAlphabet as $key => $p) : ?>
						<?php $i++; ?>
						<?php if($i == 1): ?>
							<tr class="row">
								<?php $m++; $m_id = sprintf("%02d", $m); ?>
								<td style="font-size: 22px"><?=$m_id?></td>
						<?php endif; ?>
						<?php if($i > 1) { $keyOut = $m+(25*($i-1))-1; } else { $keyOut = $m+$i-2; } ?>


							<td style="text-align: left; padding-left: 5px">
									<a href="/system/ks-<?=$pageAlphabet[$keyOut]->url?>" data-id="<?=$pageAlphabet[$keyOut]->id?>" data-numeric="<?=$pageAlphabet[$keyOut]->numeric_calendar?>" style="font-size: 18px">кс <?=str_replace('календарная система', '', $pageAlphabet[$keyOut]->name)?></a>
							</td>
				


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