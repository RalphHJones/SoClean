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

        //

    });

    $('div.setup-panel div a.btn-primary').trigger('click');

    ///////////

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

    $("#same_shipping").click(function () {
        if ($('#same_shipping:checkbox:checked').length > 0) {
            $("#form_first_name").val($("#form_ship_to_first_name").val());
            $("#form_last_name").val($("#form_ship_to_last_name").val());
            $("#form_address1").val($("#form_ship_to_address1").val());
            $("#form_address2").val($("#form_ship_to_address2").val());
            $("#form_city").val($("#form_ship_to_city").val());
            $("#form_state").val($("#form_ship_to_state").val());
            $("#form_country").val($("#form_ship_to_country").val());
            $("#form_zip_code").val($("#form_ship_to_zip_code").val());
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

    $('#goToShipping').click(function () {
        $('a[href=#step-4]').trigger('click');
    });

    $('#goToPreSteps').click(function () {
        $('a[href=#step-3]').prop('disabled', '');
    });


    $('.card-block a[href=#step-3]').click(function () {
        $('.setup-panel a[href=#step-3]').removeAttr('disabled');
        $('.setup-panel a[href=#step-3]').trigger('click');
    });

    $('#form_isdiscount').change(function () {
        if ($(this).is(':checked')) {
            $('#form_shipping_total').val('0');
        } else {
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
        $('#payText' + value).show();

    });

});
