$(document).ready(function() {
    $("#bo_date_of_birth").datepicker({dateFormat: "yy-mm-dd"}).val();
    $("#inv_date_of_birth").datepicker({dateFormat: "yy-mm-dd"}).val();
    $("#bo_registration_year").datepicker({
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        onClose: function (dateText, inst) {
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, 1));
        }
    });
    $("#bo_registration_year").focus(function () {
        $(".ui-datepicker-month").hide();
        $(".ui-datepicker-calendar").hide();
    });

    $("#bo_next_step3").attr('disabled', 'disabled');
    $("#bo_agree_terms, #bo_agree_fees").change(function () {
        if ($("#bo_agree_terms").is(':checked') && $("#bo_agree_fees").is(':checked')) {
            $("#bo_next_step3").attr('disabled', false);
        } else {
            $("#bo_next_step3").attr('disabled', true);
        }
    });
    $("#inv_next_step1").attr('disabled', 'disabled');
    $("#inv_agree_terms").change(function () {
        if ($("#inv_agree_terms").is(':checked')) {
            $("#inv_next_step1").attr('disabled', false)
        } else {
            $("#inv_next_step1").attr('disabled', true);
        }
    });
    // $('.btn-circle').on('click',function(){
    //     $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
    //     $(this).addClass('btn-info').removeClass('btn-default').blur();
    // });
    jQuery.validator.addMethod("alpha", function (value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
    }, "Please enter alphabets only");

    $('.next-step, .prev-step').on('click', function (e) {
        var $activeTab = $('.tab-pane.active');
        var form = $("#bo_application");
        form.validate({
            errorElement: 'span',
            errorClass: 'help-block',
            highlight: function (element, errorClass, validClass) {
                $(element).closest('.form-group').addClass("has-error");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass("has-error");
            },
            rules: {
                bo_first_name: {required: true, alpha: true,},
                bo_last_name: {required: true, alpha: true,},
                bo_identification_card_number: {required: true,},
                bo_date_of_birth: {required: true,},
                bo_gender: {required: true,},
                bo_personal_street: {required: true,},
                bo_personal_city: {required: true, alpha: true,},
                bo_personal_state: {required: true, alpha: true,},
                bo_personal_zipcode: {required: true, number: true,},
                bo_personal_country: {required: true, alpha: true,},
                bo_personal_phonenumber: {required: true, number: true,},
                //bo_upload_IC: {required: true,},
                bo_business_street: {required: true,},
                bo_business_city: {required: true, alpha: true,},
                bo_business_state: {required: true, alpha: true,},
                bo_business_zipcode: {required: true, number: true,},
                bo_business_country: {required: true, alpha: true,},
                bo_business_phonenumber: {required: true, number: true,},
                bo_industry: {required: true,},
                bo_type: {required: true,},
                bo_legal_entity: {required: true,},
                bo_registration_number: {required: true,},
                bo_registration_year: {required: true, number: true,},
                bo_court_judgement: {required: true,},
                //bo_business_license: {required: true,},
                //bo_entity_type: {required: true,},
                //bo_CTOS: {required: true,},
                bo_bank_name: {required: true,},
                bo_bank_account: {required: true,}
                // bo_audited_statements: {required: true,},
                // bo_operating_statements: {required: true,},
                // bo_tax_returns: {required: true,}
                // bo_agree_terms: {required: true,},
                // bo_agree_fees: {required: true,}
            }
        });
        if (form.valid() === true) {
            $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
            if ($(e.target).hasClass('next-step')) {
                var nextTab = $activeTab.next('.tab-pane').attr('id');
                $('[href="#' + nextTab + '"]').addClass('btn-info').removeClass('btn-default');
                $('[href="#' + nextTab + '"]').tab('show');
            }
            else {
                var prevTab = $activeTab.prev('.tab-pane').attr('id');
                $('[href="#' + prevTab + '"]').addClass('btn-info').removeClass('btn-default');
                $('[href="#' + prevTab + '"]').tab('show');
            }
        }

    });

    $('.next-step1, .prev-step1').on('click', function (e) {
        var $activeTab = $('.tab-pane.active');
        var form1 = $("#inv_application");
        form1.validate({
            errorElement: 'span',
            errorClass: 'help-block',
            highlight: function (element, errorClass, validClass) {
                $(element).closest('.form-group').addClass("has-error");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass("has-error");
            },
            rules: {
                inv_first_name: {required: true, alpha: true,},
                inv_last_name: {required: true, alpha: true,},
                inv_identification_card_number: {required: true,},
                inv_date_of_birth: {required: true,},
                inv_gender: {required: true,},
                inv_street: {required: true,},
                inv_city: {required: true, alpha: true,},
                inv_state: {required: true, alpha: true,},
                inv_zipcode: {required: true, number: true,},
                inv_country: {required: true, alpha: true,},
                inv__phonenumber: {required: true, number: true,},
                inv_identity: {required: true,},
                inv_income: {required: true,},
                inv_agree_terms: {required: true,},
                inv_net_worth: {required: true,},
                inv_liquid_asset: {required: true,},
                inv_estimated_p2p: {required: true, number:true,},
                inv_risk_tolerance: {required: true,},
                inv_stock_market: {required: true,},
                inv_bonds_notes: {required: true,},
                inv_mutual_funds: {required: true,},
                inv_sme_business: {required: true,},
                inv_p2p_lending: {required: true,}
                // // bo_audited_statements: {required: true,},
                // // bo_operating_statements: {required: true,},
                // // bo_tax_returns: {required: true,}
                // // bo_agree_terms: {required: true,},
                // // bo_agree_fees: {required: true,}
            }
        });

        if (form1.valid() === true) {
            $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
            if ($(e.target).hasClass('next-step1')) {
                var nextTab = $activeTab.next('.tab-pane').attr('id');
                $('[href="#' + nextTab + '"]').addClass('btn-info').removeClass('btn-default');
                $('[href="#' + nextTab + '"]').tab('show');
            }
            else {
                var prevTab = $activeTab.prev('.tab-pane').attr('id');
                $('[href="#' + prevTab + '"]').addClass('btn-info').removeClass('btn-default');
                $('[href="#' + prevTab + '"]').tab('show');
            }
        }

    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var form = document.forms.namedItem("file-loader");
    var formData = new FormData();
    formData.append('file', $('input[type=file]')[0].files[0]);
    jQuery(function($) {
        $('input[type="file"]').change(function() {
            if ($(this).val()) {
                var filename = $(this).val();

                $.ajax({
                    method: 'POST',
                    url: "upload",
                    enctype: 'multipart/form-data',
                    data: formData,
                    success: function (res) {
                        console.log("Data Uploaded: " + res);
                        window.href = res;
                        download.attr('href', href);
                    },

                    cache: false,
                    contentType: false,
                    processData: false,
                })

                var name = filename.split('\\').pop();
                download = $(this).closest('.file-upload').find('.file-name');
                download.html(name);
            }
        });

    });
});
