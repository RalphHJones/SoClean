$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            //$target.find('input:eq(0)').focus();
            $('html,body').scrollTop(0);
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');

    });

    $('div.setup-panel div a.btn-primary').trigger('click');

    $("#same_shipping").click(function () {
        if ($(this).is(':checked')) {
            $("#form_ship_to_first_name").val($("#form_first_name").val());
            $("#form_ship_to_last_name").val($("#form_last_name").val());
            $("#form_ship_to_address1").val($("#form_address1").val());
            $("#form_ship_to_address2").val($("#form_address2").val());
            $("#form_ship_to_city").val($("#form_city").val());
            $("#form_ship_to_state").val($("#form_state").val());
            $("#form_ship_to_country").val($("#form_country").val());
            $("#form_ship_to_zip_code").val($("#form_zip_code").val());
        }
    });
    
    /////////// From George starts below

    $('#form_phone, #form_tfn').mask('(000) 000-0000');
    $('#form_ship_to_zip_code, #form_zip_code').mask('00000-000');
    $('#form_card_number').payment('formatCardNumber');
    $('#form_card_code').mask('000');

    // phone number validation
    function validatePhone(a) {
        var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        if (filter.test(a)) {
            return true;
        } else {
            return false;
        }
    }

    $("#form_phone").focusout(function () {
        var obj = $(this);
        var parent = $(this).parents('.form-group');

        if (validatePhone($(this).val())) {
            obj[0].setCustomValidity('');
            parent.removeClass('has-error');
        } else {
            obj[0].setCustomValidity('Phone is invalid');
            parent.addClass('has-error');
        }

    });



    $("#customder_fname").change(function () {
        $(".cname").html(this.value);
        $('.cnameInput').val(this.value);
    });

    // perform zip search in shipping address form
    $("#form_ship_to_zip_code").keyup(function () {
        var search = $(this).val();

        if (search.length > 2) {
            $.getJSON("/search-location/" + search, function (data) {
                if (data.city) {
                    $('#form_ship_to_city').val(data.city);
                }

                if (data.state) {
                    $('#form_ship_to_state').val(data.state);
                }

                if (data.country) {
                    $('#form_ship_to_country').val(data.country);
                }
            });
        }
    });

    // perform validation in shipping address form
    $("#form_ship_to_zip_code").focusout(function () {
        var search = $(this).val();
        var parent = $(this).parents('.form-group');

        if (search.length > 2) {
            $.getJSON("/search-location/" + search, function (data) {
                if (!data.city || !data.state) {
                    parent.addClass('has-error');
                } else {
                    parent.removeClass('has-error');
                }
            });
        }
    });

    // perform zip search in billing address form
    $("#form_zip_code").keyup(function () {
        var search = $(this).val();

        if (search.length > 2) {
            $.getJSON("/search-location/" + search, function (data) {
                if (data.city) {
                    $('#form_city').val(data.city);
                }

                if (data.state) {
                    $('#form_state').val(data.state);
                }

                if (data.country) {
                    $('#form_country').val(data.country);
                }
            });
        }
    });

    // perform email validation
    $("#form_email_address").focusout(function () {
        var search = $(this).val();
        var parent = $(this).parents('.form-group');
        var obj = $(this);

        if (search.length) {
            $('.nextBtn:visible').prop('disabled', 'disabled');

            $.getJSON("/validate-email/" + search, function (data) {

                if (data.success) {
                    $('.nextBtn:visible').prop('disabled', '');
                    obj[0].setCustomValidity('');
                    parent.removeClass('has-error');
                } else {
                    obj[0].setCustomValidity('This email is invalid');
                    parent.addClass('has-error');
                    $('.nextBtn:visible').prop('disabled', 'disabled');
                }
            });
        } else {
            $('.nextBtn:visible').prop('disabled', '');
            obj[0].setCustomValidity('');
            parent.removeClass('has-error');
        }
    });


    $('#validateCreditCard').click(function () {
        $('#ccInfo').html('VALIDATING... PLEASE WAIT...').addClass('loading');

        var element = $(this);

        if (element.data('clicked')) {
            return false;
        }

        $(this).data('clicked', true);

        var data = {
            number: $('#form_card_number').val(),
            expiration: ('0' + $('#form_card_expiration_month').val()).slice(-2) + '20' + $('#form_card_expiration_year').val(),
            code: $('#form_card_code').val()
        };

        $.post("/authorize-card", data, function (response) {
            if (response) {
                $('#ccInfo').html(response.message);
                if (response.success) {
                    $('#ccInfo').attr('class', 'success');
                    $('.nextBtn:visible').prop('disabled', '');
                }
            }
            element.data('clicked', false);
        });

    });

    $('#goToPreSteps').click(function () {
        $('a[href="#step-3"]').removeAttr('disabled');
    });


    $('#goToShipping').click(function () {
        $('a[href=#step-3]').trigger('click');
    });



    $('.card-block a[href=#step-3]').click(function () {
        $('.setup-panel a[href=#step-3]').removeAttr('disabled');
        $('.setup-panel a[href=#step-3]').trigger('click');
    });

    $('#form_isdiscount').change(function () {
        if ($(this).is(':checked')) {
            $('#form_shipping_total').val($('#form_shipping_total').data('default-shipping-charge'));
        }
    });

    $('[data-edit-url]').each(function () {
        $(this).addClass('quickEdit');
    });

    $('[data-edit-url]').click(function (event) {
        if ($('body').hasClass('quickEditMode')) {
            event.preventDefault();
            window.location.href = $(this).data('edit-url');
        }
    });

    $('#quickEditToggle').click(function () {
        $(this).toggleClass('active');
        $('body').toggleClass('quickEditMode');
    });

    $('.paymentTypes').change(function () {
        var value = $(this).val();

        $('.paymentTypes').not($(this)).val(value);

        $(".paymentText").hide();
        $('.payText' + value).show();

        // disable all discount options if 3Pay is selected
        if (value === '3Pay') {
            $('.discountOption').prop('checked', '');
            $('#form_isdiscount').val(0);
        }

        $('#form_ship_method').val(value).trigger('change');

    });

    $('#form_ship_method').change(function () {
        var value = $(this).find(":selected").data('value');

        $('#form_shipping_total').val(value);
    });


    $('.discountOption').click(function () {
        $('.discountOption').not($(this)).removeAttr('checked');
        if ($('.discountOption:checked').length === 0) {
            $('#form_isdiscount').val(0);
        } else {
            $('#form_isdiscount').val($('.discountOption:checked').val());
        }
    });


    $('.editRow').click(function () {
        var item = $(this).parents('.item');

        if (item.find('.saveRow').is(':visible')) {
            return false;
        }

        item.find('.saveRow').show();

        var q = item.find('.itemQuantity');
        var s = item.find('.itemShipping');

        var quantity = q.text();
        var shipping = s.text();

        q.empty();
        s.empty();

        $('<input />', {
            'type': 'number',
            'class': 'number'
        }).val(quantity).appendTo(item.find('.itemQuantity'));

        $('<input />', {
            'class': 'floatNumber',
            'type': 'number'

        }).val(shipping).appendTo(item.find('.itemShipping'));

    });

    $('.saveRow').click(function () {
        var item = $(this).parents('.item');
        var element = $(this);

        element.hide();

        var iq = item.find('.itemQuantity input').val();
        item.find('.itemQuantity').html(iq);

        var s = item.find('.itemShipping input').val();
        item.find('.itemShipping').html(s);

        var data = {quantity: iq, shipping: s};
        $.post(item.data('update-orderdetail'), data, function (data) {
            updateSummaryTable(data, item);
        });

    });


    $('.deleteRow').click(function () {
        var item = $(this).parents('.item');

        $.confirm({
            title: 'Confirmation',
            confirmButton: 'Yes',
            cancelButton: 'Cancel',
            content: 'Are you sure you want to delete this row?',
            confirm: function () {

                $.get(item.data('delete-orderdetail-url'), {}, function (data) {
                    updateSummaryTable(data, item);
                    item.remove();
                });

            }
        });
    });

    function updateSummaryTable(data, item) {
        $.each(data, function (id, value) {
            $('.field-' + id).html(value);

            if (id.search('item')) {
                item.find('.unique-field-' + id).text(value);
            }
        });
    }

    $('.floatNumber').mask('000.00', {reverse: true});
    $('.number').mask('0#');

    var $chosenProduct = $('#chosenProduct');
    var $extraProducts = $('.extraProduct');
    var $discountedProductQuantity = $('#form_qte');
    var $discountedProduct = $('#discountedProduct');
    var $taxState = $('#form_taxstate');
    var $shippingTotal = $('#form_shipping_total');
    var $paymentType = $('.paymentTypes[name="form[type]"]');
    var $shippingMethod = $('#form_ship_method');
    var $mainForm = $('#mainForm');

    function calculateTotal(element) {
        // execute this only on the main page
        if (!$('#mainForm').length) {
            return false;
        }
        if (element && (element.attr('min') && element.attr('max'))) {
            if (parseInt(element.val()) > element.attr('max')) {
                element.val(element.attr('max'));
            }
            if (parseInt(element.val()) < element.attr('min')) {
                element.val(element.attr('min'));
            }
        }

        // get new shipping default value
        if (element && element.attr('id') === 'form_qte') {
            $shippingTotal.val($('#form_ship_method').find(":selected").data('value'));
        }

        // main product
        var total = parseFloat($chosenProduct.find(":selected").data('value'));

        // extra products
        $extraProducts.each(function () {
            if ($(this).val() > 0) {
                var tmp = ($(this).val() * parseInt($(this).data('price'))).toFixed(2);
                total = (parseFloat(total) + parseFloat(tmp)).toFixed(2);
            }
        });

        var discountedProductQuantity = parseInt($discountedProductQuantity.val());

        // discounted product
        if (discountedProductQuantity > 0) {
            var tmp = (parseFloat($discountedProduct.find(":selected").data('value')) * discountedProductQuantity).toFixed(2);
            total = (parseFloat(total) + parseFloat(tmp)).toFixed(2);
        }

        // apply state tax if needed
        var taxState = $taxState.is(':checked');
        var taxPercentage = parseFloat($taxState.data('tax-percentage'));

        var taxTotal = 0;
        if (taxState && taxPercentage) {
            var tmp = parseFloat(total * taxPercentage);
            taxTotal = tmp.toFixed(2);
        }

        // apply discount
        var discount = $('.discountOption:checked').data('value');
        if (discount) {
            var tmp = parseFloat(total) - parseFloat(discount);
            total = tmp.toFixed(2);
        }

        // apply shipping tax
        var shippingTotal = 0;
        var shipping = parseFloat($shippingTotal.val());
        if (shipping) {
            shippingTotal = shipping.toFixed(2);
        }

        // apply shipping tax for additional products
        if (discountedProductQuantity > 0) {
            var discountedProductsShippingCharge = 0;

            if ($paymentType.val() === '3Pay') {
                discountedProductsShippingCharge = parseFloat($mainForm.data('shipping-charge-threepay-additional-product')) * discountedProductQuantity;
            }

            if ($shippingMethod.val() === 'rush') {
                discountedProductsShippingCharge = parseFloat($('#form_ship_method').find(":selected").data('value')) * +discountedProductQuantity;
            }

            shippingTotal = (parseFloat(shippingTotal) + parseFloat(discountedProductsShippingCharge)).toFixed(2);

            // update shipping total field
            $shippingTotal.val(shippingTotal);
        } else {


        }

        var grandTotal = (parseFloat(total) + parseFloat(taxTotal) + parseFloat(shippingTotal)).toFixed(2);

        //  update 1Pay
        $('.totalCharge').html(grandTotal);

        // update 3Pay
        var firstPaymentCharge = parseFloat($mainForm.data('first-payment-amount'));
        var firstCharge = (parseFloat(firstPaymentCharge) + parseFloat(taxTotal) + parseFloat(shippingTotal)).toFixed(2);
        var remaining = parseFloat((parseFloat(grandTotal) - parseFloat(firstCharge)) / 2).toFixed(2);

        $('.firstCharge').html(firstCharge);
        $('.subsequentCharges').html(Math.round(remaining * 100) / 100);
    }


    $([$chosenProduct, $extraProducts, $discountedProductQuantity, $discountedProduct,
        $taxState, $shippingTotal, $paymentType, $('.discountOption'), $shippingMethod]).each(function () {
        $(this).change(function () {
            calculateTotal($(this));
        });
    });

    calculateTotal();

    $(document).on('change', '.itemQuantity input', function () {
        var item = $(this).parents('.item');

        if (item.data('is-discounted-product')) {
            if ($('#paymentType').val() === '3Pay') {
                var total = $('#shippingCharge3PayAdditionalProduct').val() * $(this).val();
            }
            if ($('#shippingMethod').val() === 'rush') {
                var total = $('#shippingChargeRushShippingAdditionalProduct').val() * $(this).val();
            }

            item.find('.itemShipping input').val(parseFloat(total).toFixed(2));
        }
    });





});