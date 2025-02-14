(function($){


// menu
$(document).ready(function () {
    $('.sidbar-menu ul li ').on('click', function () {
        if ($(this).hasClass('opened')) {
            // $(this).removeClass('opened');
        } else {
            $('.sidbar-menu ul li ').removeClass('opened');
            $(this).addClass('opened');
        }
    });
});

// submenu-select-svg
$(document).ready(function () {
    $('.submenu ul li').click(function () {
        $('.submenu ul li img , .submenu ul li ').removeClass('select');
        $(this).find('img').addClass('select');
        $(this).addClass('select');
        $('.sidbar-menu ul li ').removeClass('opened')
    });
});
// submenu-item
$(document).ready(function () {
    $('.submenu ul li, .sidbar-menu-item').click(function () {
        var $this = $(this);
        var id_li = $(this).data('id');
        var main_wrapper    = $this.parents('.body-main-wrapper');
        var conntet_wrapper = main_wrapper.find('#'+id_li);

        if ($('.content-wrapper').hasClass('show-wrapper')) {
            $('.content-wrapper').removeClass('show-wrapper');
            // $('.sidbar-menu ul li ').removeClass('opened')
        }

        if( conntet_wrapper.length )
        {
            conntet_wrapper.addClass('show-wrapper');
            localStorage.setItem("lastLiSelected", id_li);
        }else{

            if( $this.siblings('.submenu').length )
            {
                var $submenu = $this.siblings('.submenu');
                $first_li = $submenu.find('ul li:first-child');

                var nextid = $first_li.data('id');
                
                if(  main_wrapper.find('#'+nextid).length )
                {
                    main_wrapper.find('#'+nextid).addClass('show-wrapper');

                    $first_li.addClass('select');

                    $first_li.find('img').addClass('select');
                    $('.sidbar-menu ul li ').removeClass('opened')
                }
               
            }
        }
    });
});
$(document).ready(function(e){
    var $li_id = localStorage.getItem('lastLiSelected');
    // $('#'+$li_id).addClass('show-wrapper');
    if( $('li[data-id="'+$li_id+'"]').length ){
        $('li[data-id="'+$li_id+'"]').click();
    }
    if( $('div[data-id="'+$li_id+'"]').length )
    {
        $('div[data-id="'+$li_id+'"]').click();
    }
})
// button
$('input[type=checkbox].switch').each(function () {
    $(this).on('change', function () {
        if ($(this).is(':checked')) {

            $(this).removeClass('unchecked-animate');
            $('.product-report-content , .progress-wrapper').stop(true, true).slideDown(200); // انیمیشن slideDown
        } else {

            $(this).addClass('unchecked-animate');
            $('.product-report-content , .progress-wrapper').stop(true, true).slideUp(200); // انیمیشن slideUp
        }
    });
});

// dropdown
$(document).ready(function () {
    const $dropdowns = $('.dropdown');

    if ($dropdowns.length > 0) {
        $dropdowns.each(function () {
            createCustomDropdown($(this));
        });
    }

    const $form = $('.form');
    if ($form.length > 0) {
        $form.on('submit', function (e) {
            e.preventDefault();
        });
    }

    function createCustomDropdown($dropdown) {
        const $options = $dropdown.find('option');
        const optionsArr = $options.toArray();

        const $customDropdown = $('<div>', { class: 'dropdown' });
        $dropdown.after($customDropdown);

        const $selected = $('<div>', { class: 'dropdown-select', text: $options.filter(':selected').text() });
        $customDropdown.append($selected);

        const $menu = $('<div>', { class: 'dropdown-menu' });
        $customDropdown.append($menu);
        $selected.on('click', function () {
            toggleDropdown($menu, $selected);
        });

        const $search = $('<input>', { type: 'text', placeholder: 'جست و جو', class: 'dropdown-menu-search' });
        $menu.append($search);

        const $menuInnerWrapper = $('<div>', { class: 'dropdown-menu-inner' });
        $menu.append($menuInnerWrapper);
        
        $options.each(function () {
            const $option = $(this);
            var newClass = $option.is(':selected') ? 'is-select' : '';
            
            const $item = $('<div>', {
                class: 'dropdown-menu-item '+newClass,
                'data-value': $option.val(),
                text: $option.text()
            });
            $menuInnerWrapper.append($item);

            if ($option.prop('disabled')) {
                $item.addClass('disabled-item');
                $item.on('click', function (e) {
                    e.stopPropagation();
                });
            } else {
                $item.on('click', function () {
                    setSelected($(this), $selected, $dropdown, $menu);
                });
            }
        });

        // $menuInnerWrapper.find('div').first().addClass('is-select');

        $search.on('input', function () {
            filterItems(optionsArr, $menu, $(this).val());
        });

        $(document).on('click', function (e) {
            closeIfClickedOutside($menu, e);
        });

        $dropdown.hide();
    }

    function toggleDropdown($menu, $selected) {
        $menu.toggleClass('open');
        $selected.toggleClass('open');
    }

    function setSelected($item, $selected, $dropdown, $menu) {
        const value = $item.data('value');
        const label = $item.text();

        if ($item.hasClass('disabled-item')) {
            return;
        }

        $selected.text(label);
        $dropdown.val(value);

        $selected.addClass('is-selected');

        $menu.removeClass('open');
        $selected.removeClass('open');
        $menu.find('input').val('');

        $menu.find('.dropdown-menu-item').removeClass('is-select').show();
        $item.addClass('is-select');

        if (value === 'ready') {
            $('.ready-loding').slideDown(200);
            $('.personal-loding').hide();
        } else if (value === 'personal') {
            $('.personal-loding').slideDown(200);
            $('.ready-loding').hide();
        } else {
            $('.ready-loding').hide();
            $('.personal-loding').hide();
        }
    }

    function filterItems(itemsArr, $menu, searchValue) {
        const $customOptions = $menu.find('.dropdown-menu-inner div');
        const value = searchValue.toLowerCase();

        const indexesArr = itemsArr
            .filter(item => $(item).text().toLowerCase().includes(value))
            .map(item => itemsArr.indexOf(item));

        $customOptions.each(function () {
            const $option = $(this);
            const index = $customOptions.index($option);

            if (!indexesArr.includes(index)) {
                $option.hide();
            } else {
                $option.show();
            }
        });
    }

    function closeIfClickedOutside($menu, e) {
        if (!$(e.target).closest('.dropdown').length && !$menu.has(e.target).length && $menu.hasClass('open')) {
            $menu.removeClass('open');
            $('.dropdown-select').removeClass('open');
        }
    }
});

// با انتخاب گزینه سفارشی سازی
$(document).ready(function () {

    $('.dropdown-menu-item').on('click', function () {
        const selectedValue = $(this).data('value');
        const $parentItem = $(this).closest('.item');

        if (selectedValue === 'custom') {
            $parentItem.find('.inp-rang').css('display', 'flex').hide().slideDown();
        } else {
            $parentItem.find('.inp-rang').slideUp(function () {
                $(this).css('display', 'none');
            });
        }
    });
});

//  for animations
$('.animations .anim-item').click(function () {
    $('.animations .anim-item').removeClass('active');
    $(this).addClass('active');
});


// sidbar
$('.sidbar-item').on('click', function () {
    $('.sidbar-item').removeClass('select');
    $(this).addClass('select');
})

// rang
$(document).ready(function () {
    $('.rang').each(function () {
        var value = $(this).val();
        var min = $(this).attr('min');
        var max = $(this).attr('max');
        var percentage = (value - min) / (max - min) * 100;
        $(this).css('background', 'linear-gradient(to right, var(--theme-main) ' + percentage + '%, var(--gray-11) ' + percentage + '%)');
        $(this).next('.rang-number').find('span.num').text(value);
    });

    $('.rang').on('input', function () {
        var value = $(this).val();
        var min = $(this).attr('min');
        var max = $(this).attr('max');
        var percentage = (value - min) / (max - min) * 100;
        $(this).css('background', 'linear-gradient(to right, var(--theme-main) ' + percentage + '%, var(--gray-11) ' + percentage + '%)');
        $(this).next('.rang-number').find('span.num').text(value);
    });
});


// to open and close a new

$(document).ready(function () {
    $('.sliders_section,.offer_section,.notif_section').on('click','.suggestion-title', function () {
        var parent = $(this).closest('.add-suggestions'); // پیدا کردن والد .add-suggestions
        parent.toggleClass('opened');
    });
});

// show and hide days
$(document).ready(function () {
    $('.send-time').hide();
    $('.send-day input[type="checkbox"]:first').prop('checked', true);
    $('.send-day input[type="checkbox"]:first').closest('.shipping-time').find('.send-time').show();


    $('.send-day input[type="checkbox"]').on('change', function () {
        var sendTime = $(this).closest('.shipping-time').find('.send-time');
        if ($(this).is(':checked')) {
            sendTime.slideDown(300);
        } else {
            sendTime.slideUp(300);
        }
    });

    $(document).ready(function () {

        $('.add-time').on('click', function () {
            var newTime = $('<div class="hours-time"><input type="text" placeholder="۱۰ تا ۱۲"><button class="delete-btn"><img src="./img/trash.svg" alt="حذف"></button></div>');
            var addTime = $(this).closest('.send-time');
            newTime.hide().prependTo(addTime).slideDown(200); // ابتدا آیتم مخفی می‌شود، سپس با انیمیشن اضافه می‌شود
        });

        $('.send-time').on('click', '.delete-btn', function () {
            var delete_inp = $(this).closest('.hours-time');
            delete_inp.slideUp(300, function () {
                $(this).remove();
            });
        });
    });

});

//  add filed
$(document).ready(function () {
    $("#addFieldBtn").click(function () {

        var newItem = `
          <div class="field-item">
<div><img src="./img/menu.svg" alt=""></div>
<div><input type="text" placeholder="فیلد سفارشی"></div>
<div><input type="text" placeholder="custom_field"></div>
<div><input type="text" placeholder="فیلد سفارشی"></div>
                                                       
<div class="btn-select select-filed">
<input type="checkbox" class="switch" id="switch1">
</div>
<div class="btn-select select-filed">
<input type="checkbox" class="switch" id="switch1">
</div>
<div class="btn-select select-filed">
<input type="checkbox" class="switch" id="switch1">
</div>
<div>
<button class="delete-btn"><img src="./img/trash.svg" alt=""></button>
</div>
</div>
`;


        $(".peyment-fields").append(newItem);
    });


    $(document).on('click', '.delete-btn', function () {
        $(this).closest('.field-item').remove();
    });
});

// for focus and hover input
$(document).ready(function () {
    $('input[type="text"]').hover(function () {
        $(this).addClass('hovered');
    });

    $('input[type="text"]').focus(function () {
        $(this).removeClass('hovered');

    });
});


// for multy select
$(document).ready(function () {
    $('.js-example-basic-multiple').select2();
});

//  inter and exter
$('.iner-btns .imp-clipboard').on('click', function () {
    $('.text-input').stop(true, true).slideDown(200);
})
$('.iner-btns .imp-file').on('click', function () {
    $('.file-name').stop(true, true).slideDown(200);

})


// 
$(document).ready(function () {
    // افزودن ورودی جدید با اسلاید
    $('.postal-companies .add-time').on('click', function () {
        let newInput = `
        <div class="hours-time names-postal-companies" style="display: none;">
            <input type="text" placeholder="شرکت ملی پست" class="hovered">
            <button class="delete-btn">
                <img src="./img/trash.svg" alt="">
            </button>
        </div>`;

        // اضافه کردن به HTML
        let $newElement = $(newInput).prependTo('.postal-companies');

        // اسلاید کردن به سمت پایین برای نمایش عنصر
        $newElement.slideDown(200);
    });

    // حذف ورودی هنگام کلیک روی دکمه حذف
    $(document).on('click', '.delete-btn', function () {
        var postal_parent = $(this).closest('.names-postal-companies');
        postal_parent.slideUp(100, function() {
            postal_parent.remove();
        });
    });
});

$('.sliders_section,.offer_section,.notif_section').repeater({
    isFirstItemUndeletable: false,
    initEmpty: false,
    show: function () {
        var currentTimeStamp = Math.floor(Date.now() / 1000);
        $(this).find('.date_notif_class').attr('value',currentTimeStamp);
        
        $('.upload_image', this).html('');
        $('.upload-image-button', this).removeClass('blue-btn upload-btn').html('ویرایش');
        $('.upload-image-button', this).addClass('blue-btn upload-btn').html('آپلود');
        $('.remove-image-button', this).hide();
        $(this).slideDown();
    },
    hide: function (deleteElement) {
        //if(confirm(pgs_woo_api.delete_msg)) {
            $(this).slideUp(deleteElement);
        //}
    },
    ready: function (setIndexes) {
        
    }
});
// $('.offer_section').repeater({
//     isFirstItemUndeletable: false,
//     initEmpty: false,
//     show: function () {
        
//         $('.upload_image', this).html('');
//         $('.upload-image-button', this).removeClass('blue-btn upload-btn').html('ویرایش');
//         $('.upload-image-button', this).addClass('blue-btn upload-btn').html('آپلود');
//         $('.remove-image-button', this).hide();
//         $(this).slideDown();
//     },
//     hide: function (deleteElement) {
//         //if(confirm(pgs_woo_api.delete_msg)) {
//             $(this).slideUp(deleteElement);
//         //}
//     },
//     ready: function (setIndexes) {
        
//     }
// });

$('.btn-select input').on('click',function(e){
    if ($(this).is(':checked')) {

        $(this).val( 1 ).trigger( 'change' );
    }else{
        $(this).val( 0 ).trigger( 'change' );
    }
});

})( jQuery );