var  postSelectedControl = elementor.modules.controls.BaseData.extend({

    onReady: function() {
        var self = this;
        this.control_select = this.$el.find('.product-include-select');
        var el = this.$el.find('.product-include-select');
        
        this.save_input = this.$el.find('.product-include-select-save-value').val();

        this.control_select.select2({
            
            ajax:{

                url: woodplusAjaxElementorSelect2.ajaxurl+"?action=find_product",
                dataType: 'json',
                processResults: function(data) {
                    return {
                        results: data
                    }
                }

            },
            multiple: true,
            minimumInputLength : 3,
            placeholder: 'لطفه حد اقل 3 کلمه وارد کنید',
            language: {
                inputTooShort: function () {
                    return 'لطفاً حداقل ۳ حرف وارد کنید';
                },
                noResults: function() {
                    return 'نتیجه‌ای یافت نشد';
                },
                searching: function() {
                    return 'در حال جستجو...';
                }
            }

        });

        var ids = ( typeof self.getControlValue() !== 'undefined' ) ? self.getControlValue() : '';
        if ( ids.isArray ) {
            ids = self.getControlValue().join();
        }
        jQuery.ajax( {
            url: woodplusAjaxElementorSelect2.ajaxurl+"?action=save_product",
            dataType: 'json',
            data: {
                ids: String( ids )
            }

        } ).then( function ( ret ) {

            var array = jQuery.map(ret, function(value, index) {
                
                return [value];
            });

            if ( ret.status !== false && ret.length > 0 ) {
                
                jQuery.each( ret, function ( i, v ) {

                    var op = new Option( v.text, v.id, true, true );
                    
                    el.append( op ).trigger( 'change' );

                } );

                el.trigger( {
                    type: 'select2:select',
                    params: {
                        data: array
                    }
                } );
            }
        } );



        this.control_select.on('change', () => {

            this.saveValue();

        })

    },

    saveValue: function() {

        this.setValue(this.control_select.val())

    },

    onBeforeDestroy: function() {

    }

});

elementor.addControlView('chooseproduct',postSelectedControl);


var  productExcludeControl = elementor.modules.controls.BaseData.extend({

    onReady: function() {
        var self = this;
        this.control_select = this.$el.find('.product-exclude-select');
        var el = this.$el.find('.product-exclude-select');
        
        this.save_input = this.$el.find('.product-exclude-select-save-value').val();

        this.control_select.select2({
            
            ajax:{

                url: woodplusAjaxElementorSelect2.ajaxurl+"?action=find_product_exclude",
                dataType: 'json',
                processResults: function(data) {
                    return {
                        results: data
                    }
                }

            },
            multiple: true,
            minimumInputLength : 3,
            placeholder: 'لطفه حد اقل 3 کلمه وارد کنید',
            language: {
                inputTooShort: function () {
                    return 'لطفاً حداقل ۳ حرف وارد کنید';
                },
                noResults: function() {
                    return 'نتیجه‌ای یافت نشد';
                },
                searching: function() {
                    return 'در حال جستجو...';
                }
            }

        });

        var ids = ( typeof self.getControlValue() !== 'undefined' ) ? self.getControlValue() : '';
        if ( ids.isArray ) {
            ids = self.getControlValue().join();
        }
        jQuery.ajax( {
            url: woodplusAjaxElementorSelect2.ajaxurl+"?action=save_product_exclude",
            dataType: 'json',
            data: {
                ids: String( ids )
            }

        } ).then( function ( ret ) {

            var array = jQuery.map(ret, function(value, index) {
                
                return [value];
            });

            if ( ret.status !== false && ret.length > 0 ) {
                
                jQuery.each( ret, function ( i, v ) {

                    var op = new Option( v.text, v.id, true, true );
                    
                    el.append( op ).trigger( 'change' );

                } );

                el.trigger( {
                    type: 'select2:select',
                    params: {
                        data: array
                    }
                } );
            }
        } );



        this.control_select.on('change', () => {

            this.saveValue();

        })

    },

    saveValue: function() {

        this.setValue(this.control_select.val())

    },

    onBeforeDestroy: function() {

    }

});

elementor.addControlView('excludeproduct',productExcludeControl);


var  categoryControl = elementor.modules.controls.BaseData.extend({

    onReady: function() {
        var self = this;
        this.control_select = this.$el.find('.category-product-select');
        var el = this.$el.find('.category-product-select');
        
        this.save_input = this.$el.find('.category-product-select-save-value').val();

        this.control_select.select2({
            
            ajax:{

                url: woodplusAjaxElementorSelect2.ajaxurl+"?action=find_category_product",
                dataType: 'json',
                processResults: function(data) {
                    return {
                        results: data
                    }
                }

            },
            multiple: true,
            minimumInputLength : 3,
            placeholder: 'لطفه حد اقل 3 کلمه وارد کنید',
            language: {
                inputTooShort: function () {
                    return 'لطفاً حداقل ۳ حرف وارد کنید';
                },
                noResults: function() {
                    return 'نتیجه‌ای یافت نشد';
                },
                searching: function() {
                    return 'در حال جستجو...';
                }
            }

        });

        var ids = ( typeof self.getControlValue() !== 'undefined' ) ? self.getControlValue() : '';
        if ( ids.isArray ) {
            ids = self.getControlValue().join();
        }
        jQuery.ajax( {
            url: woodplusAjaxElementorSelect2.ajaxurl+"?action=save_category_product",
            dataType: 'json',
            data: {
                ids: String( ids )
            }

        } ).then( function ( ret ) {

            var array = jQuery.map(ret, function(value, index) {
                
                return [value];
            });

            if ( ret.status !== false && ret.length > 0 ) {
                
                jQuery.each( ret, function ( i, v ) {

                    var op = new Option( v.text, v.id, true, true );
                    
                    el.append( op ).trigger( 'change' );

                } );

                el.trigger( {
                    type: 'select2:select',
                    params: {
                        data: array
                    }
                } );
            }
        } );



        this.control_select.on('change', () => {

            this.saveValue();

        })

    },

    saveValue: function() {

        this.setValue(this.control_select.val())

    },

    onBeforeDestroy: function() {

    }

});

elementor.addControlView('categoryproduct',categoryControl);


