<label for="select_type_shop_dashboard"><?php esc_html_e('انتخاب الگو', 'woodmartplus'); ?></label>
<select name="alfa_shop_dashboard_type" id="select_type_shop_dashboard">
<option value="default"><?php esc_html_e('یک الگو انتخاب کنید', 'woodmartplus') ?></option>
    <?php foreach( $dashboard_type as $key_type => $value ): ?>
        <option value="<?php echo esc_attr( $key_type )  ?>" <?php selected( $key_type,$selected ); ?> ><?php echo esc_html( $value ) ?></option>
    <?php endforeach; ?>
</select>