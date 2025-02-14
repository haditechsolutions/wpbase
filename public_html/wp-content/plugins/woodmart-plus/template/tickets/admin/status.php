
<div>
    <h3><?php esc_html_e('Status','woodmartplus'); ?></h3>
    <div class="status_fields">
        <select name="wplus_ticket_status_select" id="">
            <option value=""><?php echo esc_html_e('Chosse status','woodmartplus'); ?></option>
            <?php foreach($status as $key => $value): ?>
                <option value="<?php echo $key ?>" <?php echo $key === $status_selected ? 'selected' : '' ?> ><?php echo esc_html($value['output']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>