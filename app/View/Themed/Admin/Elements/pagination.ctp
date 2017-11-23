<div class="flickr_pagination">

    <?php echo $this->Paginator->prev('← Previous', array('class' => 'disabled previous_page')); ?>
    <?php echo $this->Paginator->numbers(array('separator' => '', 'currentClass' => 'current')); ?>
    <?php echo $this->Paginator->next('Next →', array('class' => 'next_page')); ?>

    <div class="page_info">(<?php echo $this->Paginator->counter(array('format' => __('Displaying ') . ' %start%-%end% of %count%')); ?>)</div>
</div>
<style>
    .digg_pagination {
        background: white;
        cursor: default;
        /* self-clearing method: */ }
    .digg_pagination a, .digg_pagination span, .digg_pagination em {
        padding: 0.2em 0.5em;
        display: block;
        float: left;
        margin-right: 1px; }
    .digg_pagination .disabled {
        color: #999999;
        border: 1px solid #dddddd; }
    .digg_pagination .current {
        font-style: normal;
        font-weight: bold;
        background: #2e6ab1;
        color: white;
        border: 1px solid #2e6ab1; }
    .digg_pagination a {
        text-decoration: none;
        color: #105cb6;
        border: 1px solid #9aafe5; }
    .digg_pagination a:hover, .digg_pagination a:focus {
        color: #000033;
        border-color: #000033; }
    .digg_pagination .page_info {
        background: #2e6ab1;
        color: white;
        padding: 0.4em 0.6em;
        width: 22em;
        margin-bottom: 0.3em;
        text-align: center; }
    .digg_pagination .page_info b {
        color: #000033;
        background: #6aa6ed;
        padding: 0.1em 0.25em; }
    .digg_pagination:after {
        content: ".";
        display: block;
        height: 0;
        clear: both;
        visibility: hidden; }
    * html .digg_pagination {
        height: 1%; }
    *:first-child + html .digg_pagination {
        overflow: hidden; }

    .apple_pagination {
        background: #f1f1f1;
        border: 1px solid #e5e5e5;
        text-align: center;
        padding: 1em;
        cursor: default; }
    .apple_pagination a, .apple_pagination span {
        padding: 0.2em 0.3em; }
    .apple_pagination .disabled {
        color: #aaaaaa; }
    .apple_pagination .current {
        font-style: normal;
        font-weight: bold;
        background-color: #bebebe;
        display: inline-block;
        width: 1.4em;
        height: 1.4em;
        line-height: 1.5;
        -moz-border-radius: 1em;
        -webkit-border-radius: 1em;
        border-radius: 1em;
        text-shadow: rgba(255, 255, 255, 0.8) 1px 1px 1px; }
    .apple_pagination a {
        text-decoration: none;
        color: black; }
    .apple_pagination a:hover, .apple_pagination a:focus {
        text-decoration: underline; }

    .flickr_pagination {
        text-align: center;
        padding: 0.3em;
        cursor: default; }
    .flickr_pagination a, .flickr_pagination span, .flickr_pagination em {
        padding: 0.2em 0.5em; }
    .flickr_pagination .disabled {
        color: #aaaaaa; }
    .flickr_pagination .current {
        font-style: normal;
        font-weight: bold;
        color: #ff0084; }
    .flickr_pagination a {
        border: 1px solid #dddddd;
        color: #0063dc;
        text-decoration: none; }
    .flickr_pagination a:hover, .flickr_pagination a:focus {
        border-color: #003366;
        background: #0063dc;
        color: white; }
    .flickr_pagination .page_info {
        color: #aaaaaa;
        padding-top: 0.8em; }
    .flickr_pagination .previous_page, .flickr_pagination .next_page {
        border-width: 2px; }
    .flickr_pagination .previous_page {
        margin-right: 1em; }
    .flickr_pagination .next_page {
        margin-left: 1em; }


</style>