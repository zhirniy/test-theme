jQuery(document).ready(function ($) {
    let cookieCountry = (document.cookie.match(/^(?:.*;)?\s*country\s*=\s*([^;]+)(?:.*)?$/)||[,null])[1];
    $('.btn-form').on('click', function(e) {
        e.preventDefault();
        let form = $(this).closest('form');
        $(form).attr('novalidate', 'novalidate');
        let errorsForm = {};
        let name = $("input[name=first-name]").val().trim();
        let nameLast = $("input[name=last-name]").val().trim();
        let nameLastPattern = new RegExp( $("input[name=last-name]").attr('pattern') , "g");
        let position = $("input[name=position]").val().trim();
        let web = $("input[name=web]").val().trim();
        let comment = $("textarea[name=comment]").val().trim();
        let commentPattern = new RegExp( $("textarea[name=comment]").attr('pattern') , "g");

        /*if needs showing error code*/
        if(nameLast === ''){
            errorsForm.nameLast='Empty field';
        }else if(!nameLastPattern.test(nameLast)){
            errorsForm.nameLast = 'Wrong last name';
        }

        if(comment === ''){
            errorsForm.comment='Empty field';
        }else if(!commentPattern.test(comment)){
            errorsForm.comment='Wrong message';
        }
        // Check last name input
        if (errorsForm.nameLast) {
            $("input[name=last-name]").siblings('.label-line').addClass('label-line-error');
        } else {
            $("input[name=last-name]").siblings('.label-line').removeClass('label-line-error');
        }
        // Check message textarea
        if (errorsForm.comment) {
            $("textarea[name=comment]").siblings('.label-line').addClass('label-line-error');
        } else {
            $("textarea[name=comment]").siblings('.label-line').removeClass('label-line-error');
        }
        if(Object.keys(errorsForm ).length == 0){
            let formData = new FormData();
            formData.append("name", name);
            formData.append("lastname", nameLast);
            formData.append("position", position);
            formData.append("web", web);
            formData.append("comment", comment);
            formData.append("action", 'sent_email');
            formData.append("cookie", cookieCountry);
            formData.append("nonce", ajax_var.nonce);

            $.ajax({
                type: "POST",
                url: ajax_var.url,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {

                },
                complete: function(response) {
                    console.log(response);
                },
                success: function (response) {
                    if (response == 'success') {
                        $(form)[0].reset();
                        $('#notification').removeClass('error');
                        $('#notification').addClass('open-notification success');
                    }

                    setTimeout(function (){
                        $('#notification').removeClass('open-notification');
                    }, 1000);

                },
                error: function () {

                }

            });
        }else{
            $('#notification').removeClass('success');
            $('#notification').addClass('open-notification error');
        }

    });

    $('#notification .btn-close').on('click', function(e) {
        $('#notification').removeClass('open-notification error');
    });
});