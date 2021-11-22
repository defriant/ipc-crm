
function resend_code(){
    $('#resend-code').hide();
    $('#resend-loading').show();
    var url = $('#resend-code').data('href');
    $.ajax({
        type:'get',
        url:url,
        success:function(data){
            $('#resend-loading').hide();
            $('#resend-code').show();
            M.toast({
                html: 'Verification code successfuly sent to '+data.email,
                classes: 'rounded green darken-2'
            })
        }
    })
}

$('#verification-attempt').on('click', function(){
    var id = $(this).data('id');
    var code = $('#code').val();
    if (code.length == 0) {
        $('#code').focus();
        $('#code').addClass('invalid');
    }else{
        $('#verification-attempt').addClass('disabled');
        $.ajax({
            type:'get',
            url:'/verification-attempt/'+code+'/'+id,
            success:function(data){
                if (data.result == 'success') {
                    $('#form-verification-code').submit();
                }else{
                    $('#code').focus();
                    $('#code').addClass('invalid');
                    $('#invalid-code').show();
                    $('#verification-attempt').removeClass('disabled');
                }
            }
        })
    }
})

$('#code').on('input', function(){
    if ($(this).val().length > 0) {
        $('#code').removeClass('invalid');
        $('#invalid-code').hide();
    }else{
        $('#code').focus();
        $('#code').addClass('invalid');
    }
})

var pp_input = document.querySelector('#pp-input');
pp_input.addEventListener('change', pp_preview);
function pp_preview(){
    var fileObject = this.files[0];
    var fileReader = new FileReader();
    fileReader.readAsDataURL(fileObject);
    fileReader.onload = function(){
        var result = fileReader.result;
        var img = document.querySelector('#pp-view');
        img.setAttribute('src', result);
    }
}