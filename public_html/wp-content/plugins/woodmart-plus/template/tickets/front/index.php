
<div class="white_card">
    <div class="card_header">
    <div class="title">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
        <path d="M14.6663 1.83301H7.33301C3.66634 1.83301 1.83301 3.66634 1.83301 7.33301V19.2497C1.83301 19.7538 2.24551 20.1663 2.74967 20.1663H14.6663C18.333 20.1663 20.1663 18.333 20.1663 14.6663V7.33301C20.1663 3.66634 18.333 1.83301 14.6663 1.83301Z" stroke="#4D4D4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M6.41699 8.70801H15.5837" stroke="#4D4D4D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M6.41699 13.291H12.8337" stroke="#4D4D4D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        <p><?php esc_html_e('Your tickets','woodmartplus'); ?></p>
    </div>
    <hr>
    </div>

    <div class="outline_card">
    <div class="space_between">
        <p class="text_black"><?php esc_html_e('Send new ticket','woodmartplus'); ?></p>
        <a href="<?php echo add_query_arg(['action' => 'new_ticket']) ?>" class="btn solid medium"><?php esc_html_e('Creat new ticket','woodmartplus'); ?></a>
    </div>
    </div>

    <div class="ticket_card__container">
    <div class="ticket_card gray">
        <div class="ticket_card__icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path d="M11.333 14H20.6663" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M9.33366 24.5736H14.667L20.6003 28.5203C21.4803 29.1069 22.667 28.4802 22.667 27.4136V24.5736C26.667 24.5736 29.3337 21.9069 29.3337 17.9069V9.9069C29.3337 5.9069 26.667 3.24023 22.667 3.24023H9.33366C5.33366 3.24023 2.66699 5.9069 2.66699 9.9069V17.9069C2.66699 21.9069 5.33366 24.5736 9.33366 24.5736Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        </div>
        <div class="ticket_card__body">
        <p class="ticket_card__title"><?php esc_html_e('All','woodmartplus'); ?></p>
        <p class="ticket_card__number"><?php echo !empty($all_tickets) ? count($all_tickets) : 0; ?></p>
        </div>
    </div>
    <div class="ticket_card blue">
        <div class="ticket_card__icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path d="M29.3337 9.9069V17.9069C29.3337 19.9069 28.667 21.5736 27.4937 22.7469C26.3337 23.9069 24.667 24.5736 22.667 24.5736V27.4136C22.667 28.4802 21.4803 29.1203 20.6003 28.5336L14.667 24.5736H11.8403C11.947 24.1736 12.0003 23.7602 12.0003 23.3336C12.0003 21.9736 11.4803 20.7203 10.627 19.7736C9.66699 18.6803 8.24033 18.0002 6.66699 18.0002C5.17366 18.0002 3.81367 18.6136 2.84033 19.6136C2.72033 19.0803 2.66699 18.5069 2.66699 17.9069V9.9069C2.66699 5.9069 5.33366 3.24023 9.33366 3.24023H22.667C26.667 3.24023 29.3337 5.9069 29.3337 9.9069Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M11.9997 23.3333C11.9997 24.9333 11.293 26.36 10.1864 27.3333C9.23969 28.16 8.01301 28.6667 6.66634 28.6667C3.71967 28.6667 1.33301 26.28 1.33301 23.3333C1.33301 21.6533 2.10634 20.1467 3.33301 19.1733C4.25301 18.44 5.41301 18 6.66634 18C9.61301 18 11.9997 20.3867 11.9997 23.3333Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M6.99967 21.666V23.666L5.33301 24.666" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M11.333 14H20.6663" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        </div>
        <div class="ticket_card__body">
        <p class="ticket_card__title"><?php esc_html_e('In progress','woodmartplus'); ?></p>
        <p class="ticket_card__number"><?php echo !empty($in_progress) ? count($in_progress) : 0; ?></p>
        </div>
    </div>
    <div class="ticket_card green">
        <div class="ticket_card__icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path d="M29.3337 9.9069V17.9069C29.3337 19.9069 28.667 21.5736 27.4937 22.7469C26.3337 23.9069 24.667 24.5736 22.667 24.5736V27.4136C22.667 28.4802 21.4803 29.1203 20.6003 28.5336L14.667 24.5736H11.8403C11.947 24.1736 12.0003 23.7602 12.0003 23.3336C12.0003 21.9736 11.4803 20.7203 10.627 19.7736C9.66699 18.6803 8.24033 18.0002 6.66699 18.0002C5.17366 18.0002 3.81367 18.6136 2.84033 19.6136C2.72033 19.0803 2.66699 18.5069 2.66699 17.9069V9.9069C2.66699 5.9069 5.33366 3.24023 9.33366 3.24023H22.667C26.667 3.24023 29.3337 5.9069 29.3337 9.9069Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M11.9997 23.3333C11.9997 24.3333 11.7197 25.28 11.2264 26.08C10.9464 26.56 10.5863 26.9867 10.173 27.3333C9.23968 28.1733 8.01301 28.6667 6.66634 28.6667C4.71967 28.6667 3.02632 27.6267 2.10632 26.08C1.61299 25.28 1.33301 24.3333 1.33301 23.3333C1.33301 21.6533 2.10634 20.1467 3.33301 19.1733C4.25301 18.44 5.41301 18 6.66634 18C9.61301 18 11.9997 20.3867 11.9997 23.3333Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M4.58594 23.334L5.90592 24.654L8.74593 22.0273" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M11.333 14H20.6663" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        </div>
        <div class="ticket_card__body">
        <p class="ticket_card__title"><?php esc_html_e('answered','woodmartplus'); ?></p>
        <p class="ticket_card__number"><?php echo !empty($answered) ? count($answered) : 0; ?></p>
        </div>
    </div>
    <div class="ticket_card red">
        <div class="ticket_card__icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path d="M29.3337 9.9069V17.9069C29.3337 19.9069 28.667 21.5736 27.4937 22.7469C26.3337 23.9069 24.667 24.5736 22.667 24.5736V27.4136C22.667 28.4802 21.4803 29.1203 20.6003 28.5336L14.667 24.5736H11.8403C11.947 24.1736 12.0003 23.7602 12.0003 23.3336C12.0003 21.9736 11.4803 20.7203 10.627 19.7736C9.66699 18.6803 8.24033 18.0002 6.66699 18.0002C5.17366 18.0002 3.81367 18.6136 2.84033 19.6136C2.72033 19.0803 2.66699 18.5069 2.66699 17.9069V9.9069C2.66699 5.9069 5.33366 3.24023 9.33366 3.24023H22.667C26.667 3.24023 29.3337 5.9069 29.3337 9.9069Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M11.9997 23.3333C11.9997 23.76 11.9463 24.1733 11.8397 24.5733C11.7197 25.1067 11.5064 25.6267 11.2264 26.08C10.3064 27.6267 8.61301 28.6667 6.66634 28.6667C5.29301 28.6667 4.053 28.1466 3.11967 27.2933C2.71967 26.9466 2.37299 26.5333 2.10632 26.08C1.61299 25.28 1.33301 24.3333 1.33301 23.3333C1.33301 21.8933 1.90635 20.5734 2.83968 19.6134C3.81301 18.6134 5.17301 18 6.66634 18C8.23967 18 9.66634 18.68 10.6263 19.7734C11.4797 20.72 11.9997 21.9733 11.9997 23.3333Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M8.09326 24.7196L5.2666 21.9062" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M8.06689 21.9453L5.24023 24.7586" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M11.333 14H20.6663" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        </div>
        <div class="ticket_card__body">
        <p class="ticket_card__title"><?php esc_html_e('Open','woodmartplus'); ?></p>
        <p class="ticket_card__number"><?php echo !empty($open) ? count($open) : 0; ?></p>
        </div>
    </div>
    </div>

    <div class="ticket_table__container">
    <div class="ticket_table">
        <div class="ticket_table__header">
            <p class="item"><?php esc_html_e('Ticket id','woodmartplus'); ?></p>
            <p class="item"><?php esc_html_e('Subject','woodmartplus'); ?></p>
            <p class="item"><?php esc_html_e('departman','woodmartplus') ?></p>
            <p class="item"><?php esc_html_e('Last update','woodmartplus'); ?></p>
            <p class="item"><?php esc_html_e('View','woodmartplus'); ?></p>
        </div>
    <?php if(!empty($all_tickets)): ?>
        <?php foreach($all_tickets as $ticket_obj ):
                $output = '';
                $class = '';
                $status = get_post_meta($ticket_obj->ID,'wplus_ticket_status',true);
    
                if($status === 'wplus_ticket_open'){
                    $output =  esc_html__('Open','woodmartplus') ;
                    $class = 'red';
                }
                elseif($status === 'wplus_ticket_in_progress')
                {
                    $output =  esc_html__('In progress','woodmartplus') ;
                    $class = 'blue';
                }
                elseif($status === 'wplus_ticket_clossed')
                {
                    $output =  esc_html__('Closed','woodmartplus');
                    $class = 'orange';
                }
                elseif($status === 'wplus_ticket_answered')
                {
                    $output =  esc_html__('Answered','woodmartplus');
                    $class = 'green';
                }

        ?>
        <div class="ticket_table__item <?php echo esc_attr($class); ?>">
            <div class="item"><?php echo esc_html($ticket_obj->ID); ?></div>
            <div class="item">
                <p><a href="<?php echo esc_url( add_query_arg(['show_ticket'=>'ticket_'.$ticket_obj->ID]) ); ?>"><?php echo esc_html($ticket_obj->post_title); ?></a></p>
                <div class="badge_ticket"><?php echo esc_html($output); ?></div>
            </div>
            <div class="item">
                <?php 
                    $slug = get_post_meta($ticket_obj->ID,'wplus_ticket_departeman',true);
                    if( 'departeman_order' === $slug )
                    {
                        echo $object->get_name_departeman_by_slug($slug);
                    }else{
                        echo $object->get_name_departeman_by_id( $slug );
                    }
                ?>
            </div>
            <div class="item">
                <?php echo esc_html(wplus_helper::date_to_garegorian(strtotime($ticket_obj->post_modified))); ?>
            </div>
            <div class="item">
                <a href="<?php echo add_query_arg(['show_ticket'=>'ticket_'.$ticket_obj->ID]); ?>" class="btn link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                    <path d="M10.3866 8.49995C10.3866 9.81995 9.31995 10.8866 7.99995 10.8866C6.67995 10.8866 5.61328 9.81995 5.61328 8.49995C5.61328 7.17995 6.67995 6.11328 7.99995 6.11328C9.31995 6.11328 10.3866 7.17995 10.3866 8.49995Z" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M7.9999 14.0138C10.3532 14.0138 12.5466 12.6271 14.0732 10.2271C14.6732 9.28714 14.6732 7.70714 14.0732 6.76714C12.5466 4.36714 10.3532 2.98047 7.9999 2.98047C5.64656 2.98047 3.45323 4.36714 1.92656 6.76714C1.32656 7.70714 1.32656 9.28714 1.92656 10.2271C3.45323 12.6271 5.64656 14.0138 7.9999 14.0138Z" stroke="#808080" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <p><?php esc_html_e('View ticket','woodmartplus'); ?></p>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
            <div>
                <?php esc_html_e('Create Your new ticket','woodmartplus'); ?>
            </div>
        <?php endif; ?>
    </div>
    </div>
</div>