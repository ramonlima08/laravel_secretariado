
$(function () {

    /* Brazilian initialisation for the jQuery UI date picker plugin. */
    /* Written by Leonildo Costa Silva (leocsilva@gmail.com). */
    if ($.isFunction($.fn.datepicker)) {
        jQuery(function ($) {
            $.datepicker.regional['pt-BR'] = {
                closeText: 'Fechar',
                prevText: '&#x3c;Anterior',
                nextText: 'Pr&oacute;ximo&#x3e;',
                currentText: 'Hoje',
                monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                dayNames: ['Domingo', 'Segunda-feira', 'Ter&ccedil;a-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sabado'],
                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 0,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
        });

        $('.datePk').datepicker();
    }

    if ($.isFunction($.fn.mask)) {
        $('.maskCpf').mask('000.000.000-00', {reverse: true});
        $('.maskCnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.maskPhone').mask("(99) 9999-99999");
        $('.maskDate').mask('00/00/0000');
        $('.maskDateTime').mask('00/00/0000 00:00');
        $('.maskPostalCode').mask('00000-000');
        $('.maskMoney').mask("#.##0,00", {reverse: true});
    }

    jQuery("body").on('click', '#checkAll,.checkAll', function () {
        var attrName = $(this).attr('data-name');
        var attrType = $(this).attr('data-type');
        var type = "name";
        if (attrType != null) {
            type = "attrType";
        }

        if ($(this).is(":checked")) {
            jQuery(":checkbox[" + type + "^=" + attrName + "]").prop("checked", true);
        } else {
            jQuery(":checkbox[" + type + "^=" + attrName + "]").prop("checked", false);
        }
    });

});    