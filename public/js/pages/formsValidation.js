/*
 *  Document   : formsValidation.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Validation page
 */

var FormsValidation = function() {

    return {
        init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Form Validation */
            $('#form-validation').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block').remove();
                },
                rules: {
                    val_username: {
                        required: true,
                        minlength: 3
                    },
                    val_email: {
                        required: true,
                        email: true
                    },
                    val_password: {
                        required: true,
                        minlength: 5
                    },
                    val_confirm_password: {
                        required: true,
                        equalTo: '#val_password'
                    },
                    val_bio: {
                        required: true,
                        minlength: 5
                    },
                    val_skill: {
                        required: true
                    },
                    val_website: {
                        required: true,
                        url: true
                    },
                    val_credit_card: {
                        required: true,
                        creditcard: true
                    },
                    val_digits: {
                        required: true,
                        digits: true
                    },
                    val_number: {
                        required: true,
                        number: true
                    },
                    val_range: {
                        required: true,
                        range: [1, 100]
                    },
                    val_terms: {
                        required: true
                    },
                    /////////////TRANSACTIONS
                    //CLIENT
                    strClientName: {
                        required: true
                    },
                    strClientContactPerson: {
                        required: true
                    },
                    strClientPosition: {
                        required: true
                    },
                    strClientEmail: {
                        required: true,
                        email: true
                    },
                    strClientTIN: {
                        required: true
                    },
                    strClientContactNo: {
                        required: true
                    },
                    strClientCity: {
                        required: true
                    },
                    strClientProv: {
                        required: true
                    },

                    //CONTRACT
                    intContClientID: {
                        required: true
                    },
                    strContractNo: {
                        required: true
                    },
                    datStart: {
                        required: true
                    },
                    datEnd: {
                        required: true
                    },
                    datQStart: {
                        required: true
                    },
                    datQEnd: {
                        required: true
                    },
                    strFormPayment: {
                        required: true
                    },
                    strTermPayment: {
                        required: true
                    },
                    dblContractAmount: {
                        required: true
                    },

                    firstname:{
                        required: true
                    },
                    lastname:{
                        required: true
                    },
                    contactnum:{
                        required: true,
                        minlength:11
                    },
                    streetcity:{
                        required: true
                    },
                    streetprov:{
                        required: true
                    },

                    //Delivery
                    proj:{
                        required: true
                    },
                    worker:{
                        required: true
                    },
                    delidate:{
                        required: true
                    },
                    deladdress:{
                        required: true
                    },
                    City:{
                        required: true
                    },
                    Province:{
                        required: true
                    },

                    // billing
                    conumber:{
                        required: true
                    },
                    ornumber:{
                        required: true,
                        unique:true
                    },



                },
                messages: {
                    val_username: {
                        required: 'Please enter a username',
                        minlength: 'Your username must consist of at least 3 characters'
                    },
                    val_email: 'Please enter a valid email address',
                    val_password: {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 5 characters long'
                    },
                    val_confirm_password: {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 5 characters long',
                        equalTo: 'Please enter the same password as above'
                    },
                    val_bio: 'Don\'t be shy, share something with us :-)',
                    val_skill: 'Please select a skill!',
                    val_website: 'Please enter your website!',
                    val_credit_card: 'Please enter a valid credit card! Try 446-667-651!',
                    val_digits: 'Please enter only digits!',
                    val_number: 'Please enter a number!',
                    val_range: 'Please enter a number between 1 and 100!',
                    val_terms: 'You must agree to the service terms!',
                    //////////TRANSACTIONS
                    //CLIENT
                    strClientName: 'Please enter a Client Name',
                    strClientEmail: 'Please enter a valid email address',
                    
                    proj: 'Project Selection field is required!',
                    worker: 'Person-in-Charge field is required!',
                    delidate: 'Delivery Date field is required!',
                    deladdress: 'Address field is required!',
                    City: 'City field is required!',
                    Province: 'Province field is required!',

                    conumber: 'Contract Order field is required!',
                    ornumber: {
                        required:'Official Receipt field is required!',
                        unique:'Official Receipt exists!'
                    }


                    
                }
            });

            $('#form-progress').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block').remove();
                },
                rules: {
                    serv: {
                        required: true
                    },
                    actdesc: {
                        required: true,
                        minlength: 3
                    },
                   datStart: {
                        required: true
                    },
                    datEnd: {
                        required:true
                    },
                    spec: {
                        required:false
                    },
                    workers: {
                        required:true
                    },
                    equip: {
                        required:false
                    },
                },
                messages: {
                   serv:" Service Name field is required!",
                   actdesc:{
                     required: " Activity field is required!",
                     minlength: " Activity field must be at least 3 characters long",
                   },
                   datStart: "Target Start Date field is required!",
                   datEnd: "Target End Date field is required!",
                   workers: "This field is required!",
                }
            });

            // Initialize Masked Inputs
            // a - Represents an alpha character (A-Z,a-z)
            // 9 - Represents a numeric character (0-9)
            // * - Represents an alphanumeric character (A-Z,a-z,0-9)
           
            

        }
    };
}();