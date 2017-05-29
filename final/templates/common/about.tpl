{include file='common/header.tpl'}

<div id="about-body" class="container-fluid">
    <div id="AboutImage" class="col-md-4">
        <img class="img-responsive" src="{$image_path}">
    </div>
    <div id="AboutText" class="col-md-8">
        <h1> About </h1>
        {foreach $paragraphs as $paragraph}
        <p>{$paragraph}</p>
        {/foreach}
    </div>
</div>

{include file='common/footer.tpl'}