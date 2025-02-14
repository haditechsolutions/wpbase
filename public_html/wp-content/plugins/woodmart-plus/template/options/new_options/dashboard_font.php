<div class="item p-18 br-bottom">
    <span class="title"><?php esc_html_e('Choose font dashboard.','woodmartplus') ?></span>
    <p class="des"><?php esc_html_e('فونت داشبورد خود را انتخاب کنید','woodmartplus') ?></p>
    <div class="dropdown_select">
        <select name="<?php echo wplus_helper::generate_option('[font_dashboard]'); ?>" class="dropdown">
            <option  >لطفا یک گزینه رو انتخاب کنید.</option>
            <?php foreach( wplus_helper::get_fonts() as $key => $font ): ?>
                <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, wplus_helper::show_value( 'font_dashboard',false ) ) ?> ><?php echo esc_html( $font ); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>