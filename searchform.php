<form action="<?php  echo home_url(); ?>/" method="get">
    <fieldset>
        <input type="text" name="s" id="s" data-placeholder="<?php echo __('Search for ...', TEMP_NAME); ?>" value="<?php echo __('Search for ...', TEMP_NAME); ?>" />
        <input type="submit" id="searchsubmit" value="<?php echo __('Search', TEMP_NAME); ?>" />
    </fieldset>
</form>