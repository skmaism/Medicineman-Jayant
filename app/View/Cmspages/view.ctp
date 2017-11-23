<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $( "#accordion" ).accordion();
    });
</script>
<div class="left_zone">
    <h1><?php echo $data['Cmspage']['title']; ?></h1>
    <?php echo $data['Cmspage']['description']; ?>
</div>
<div class="right_zone">
    <?php echo $this->html->image("login.png"); ?>
</div>