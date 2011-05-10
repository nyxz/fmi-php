<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        {foreach from=$cssFiles item=css}
            <link rel="stylesheet" href="{$cssFolder}/{$css}.css" type="text/css" media="screen" />
        {/foreach}
            <br/>
        {foreach from=$jsFiles item=js}
            <script src="{$jsFolder}/{$js}.js" type="text/javascript" language="javascript" charset="utf-8"></script>
        {/foreach}
        <title>{$title}</title>
    </head>
    <body>
        <h2>{$message}</h2>
    </body>
</html>

