$("body").on('change', '#plan,#user_locations', function () {
    var plan = $('#plan').val();
    var user = $('#user_locations').val();
    var yearly_charge = '';
    var totalamount = '';
    if ((plan != '') && (user != '')) {
        if (plan == 'monthly') {
            if (user == '5') {
                totalamount = 19;
            } else if (user == '25') {
                totalamount = 49;
            } else if (user == '100') {
                totalamount = 99;
            }
            else {
                totalamount = 249;
            }
        } else {
            if (user == '5') {
                yearly_charge = (19 * 12);
            } else if (user == '25') {
                yearly_charge = (49 * 12);
            } else if (user == '100') {
                yearly_charge = (99 * 12);
            }
            else {
                yearly_charge = (249 * 12);
            }
            var discount = (yearly_charge * 20) / 100;
            totalamount = yearly_charge - discount;

        }
        if (totalamount != '') {
            $('#result_final').html(totalamount);
        } else {
            $('#result_final').html(0);
        }
    }
});


$("body").on('keyup', '#cardNumber', function () {
    var regexp1 = new RegExp("[^0-9]");
    if (regexp1.test(document.getElementById("cardNumber").value)) {
        $('#card_error').show();
        $('#card_error').html('Only Numbers Allowed');
        $('#cardNumber').focus();
        return false;
    } else {
        $('#card_error').hide();
    }

});

$("body").on('keyup', '#expiryMonth', function () {
    var regexp1 = new RegExp("[^0-9]");
    if (regexp1.test(document.getElementById("expiryMonth").value)) {
        $('#expiry_error').show();
        $('#expiry_error').html('Only Numbers Allowed');
        $('#expiryMonth').focus();
        return false;
    } else {
        $('#expiry_error').hide();
    }

});
$("body").on('keyup', '#expiryYear', function () {
    var regexp1 = new RegExp("[^0-9]");
    if (regexp1.test(document.getElementById("expiryYear").value)) {
        $('#expiry_error').show();
        $('#expiry_error').html('Only Numbers Allowed');
        $('#expiryYear').focus();
        return false;
    } else {
        $('#expiry_error').hide();
    }

});
$("body").on('keyup', '#cvCode', function () {
    var regexp1 = new RegExp("[^0-9]");
    if (regexp1.test(document.getElementById("cvCode").value)) {
        $('#expiry_error').show();
        $('#expiry_error').html('Only Numbers Allowed');
        $('#cvCode').focus();
        return false;
    } else {
        $('#expiry_error').hide();
    }

});



