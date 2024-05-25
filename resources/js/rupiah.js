$(document).ready(function(){
    $('#rupiah').inputmask({
        alias: 'numeric',
        radixPoint: ',',
        groupSeparator: '.',
        autoGroup: true,
        digits: 0,
        digitsOptional: false,
        rightAlign: false,
        prefix: 'Rp ',
        placeholder: '0',
        allowMinus: false,
        showMaskOnHover: false,
        numericInput: true
    });
});
