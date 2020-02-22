{* Модуль статистика для фотосайта *}

{* таблица стилей *}
{literal}
<style>
#mod_photostat{}
#mod_photostat .mod_photostat_title{color:#000;font-size:16px;}
#mod_photostat .mod_photostat_body{}
.mod_photostat_body .itembody{display:block;padding:5px 0;}
.mod_photostat_body .fieldtitle{
    color: #666;
    padding: 3px 0 0 0;
}
.mod_photostat_body .fieldvalue{
    padding: 0 15px 0 0;
}

.mod_photostat_body .blocktitle{color: #000;font-weight:bold;}

.mod_photostatclear {
    clear: both;
    display: block;
    height: 0;
    overflow: hidden;
    visibility: hidden;
    width: 0;
}
</style>
{/literal}

<div id="mod_photostat">
    <div class="mod_photostat_title">Статистика по фотосайту:</div>
    <div class="mod_photostat_body">
     
        <div class="blocktitle">Галерея</div>
    
    {if $cfg.show_photos}
        <div class="itembody">
            <span class="fieldtitle">Картин:</span> 
            <span class="fieldvalue"><a href="/photos" class="showall">{$col.photos}</a></span>
            <div class="mod_photostatclear"></div>
        </div>
    {/if}

    {if $cfg.show_photos_size}
        <div class="itembody">
            <span class="fieldtitle">Объем:</span>
            <span class="fieldvalue">{$col.photos_size}</span>
            <div class="mod_photostatclear"></div>
        </div>
    {/if}
    
    {if $cfg.show_sometext}
        <div class="itembody">
            <span class="fieldtitle">Объем вручную:</span>
            <span class="fieldvalue">{$cfg.sometext}</span>
            <div class="mod_photostatclear"></div>
        </div>
    {/if}
    
    {if $cfg.showuc}
        <div class="itembody">
            <span class="fieldtitle">Записей в каталоге:</span> 
            <span class="fieldvalue"><a href="/photos" class="showall">{$col.photos}</a></span>
            <div class="mod_photostatclear"></div>
        </div>
    {/if}
    
    {if $cfg.show_users}
        <div class="itembody">
            <span class="fieldtitle">Пользователей:</span>
            <span class="fieldvalue"><a href="/users" class="showall">{$col.users}</a></span>
            <div class="mod_photostatclear"></div>
        </div>
    {/if}
    
    </div>

</div>