<div id="headerCalendar">
    <div class="container">
        <div class="left bottom"><?=$page->name_calendar?></div>
        <div class="center title"><span><?php echo str_replace(' ', '&nbsp;&nbsp;&nbsp;', $page->name) ?></span></div>
        <div class="right logo_list"><a href="/list"></a></div>
    </div>
</div>

<div id="content" class="calendar_list_system">
	<div class="wrapList">
        <div class="item">
            <div class="wrap">
                <div class="row">
                    <div class="left">
                        <div class="wrap-left">
                            <div class="middle">
                                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/uploads/systems/'.$page->id.'.png')): ?><img src="/uploads/systems/<?=$page->id?>.png"><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="wrap-right">
                            <div class="middle"><?=$page->short_content?></div>
                        </div>
                    </div>
                </div>              
                <div class="row bottom">
                    <div class="left">
                        <div class="select format">
                            <?php if($page->url != 'bogoakalnaya' && $page->url != 'shotoakalnaya'): ?>
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
                            <?php else: ?>
                                <div class="view">открытия нет</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="right">
                        <div class="select sections">
                            <?php if($page->url != 'bogoakalnaya' && $page->url != 'shotoakalnaya'): ?>
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
                            <?php else: ?>
                                <div class="bttn">описания нет</div>
                            <?php endif; ?>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

<div id="footerCalendar">
    <div class="container">
        <div class="left top">БОС</div>
        <div class="center format"><span>БАЗОВОЕ&nbsp;&nbsp;&nbsp;ОКНО&nbsp;&nbsp;&nbsp;СИСТЕМЫ</span></div>
        <div class="right logo"><a href="/" class="itemContext"></a></div>
    </div>
</div>    