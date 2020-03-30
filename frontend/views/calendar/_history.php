<div id="headerCalendar">
    <div class="container">
        <div class="left bottom"><?=$page->name_calendar?></div>
        <div class="center title"><span><?php echo str_replace(' ', '&nbsp;&nbsp;&nbsp;', $page->name) ?></span></div>
        <div class="right logo_list"><a href="/system/ks-<?=$page->url?>" style="background-image: url('/uploads/systems/<?=$page->id?>.png');"></a></div>
    </div>
</div>

<div id="content" class="calendar_list_system calendar_content_system calendar_content_text">
	<div class="wrapList">
        <?=$page->content?>
	</div>
</div>

<div id="footerCalendar">
    <div class="container">
        <div class="left">
            <div class="select sections sections_kot">
                <div class="box">
                    <div class="head">
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
                <div class="menu_kot">КОТ</div>
            </div>            
        </div>
        <div class="center format"><span>РАЗДЕЛ&nbsp;&nbsp;&nbsp;СИСТЕМЫ&nbsp;&nbsp;&nbsp;ИСТОРИЧЕСКИЙ</span></div>
        <div class="right logo"><a href="/" class="itemContext"></a></div>
    </div>
</div>    