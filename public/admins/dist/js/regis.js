
$(window).on('load', function(){
    side_menu_regis();
    view_regis();
})

function view_regis(){
    $('.link').click(function(){
        $('.overlay').show();
        var href = $(this).data("href");
        $.ajax({
            type:'get',
            url:href,
            success:function(data){
                $('#data-pendaftaran').html(data);
                elements();
                $('.overlay').hide();
            }
        })
    });
}

var my_id = $('#my_id').val();
var my_role = $('#my_role').val();

var pusher = new Pusher('5e1260902fbfd4b1058a', {
    cluster: 'ap1'
});

// Notif new regis
var channel = pusher.subscribe('new-regis');
channel.bind('new-regis-event', function(data) {
    if(my_role = data.to){
        company_regis();
        company_regis_count();
    }
});

function company_regis() {
    $.ajax({
        type:'get',
        url:'/company-regis',
        success:function(data){
            $('#company_regis_data').empty();
            $.each(data, function(i, value){
                var tr = "<tr class='link' data-href='/registration/"+value.id+"' style='cursor:pointer;'><td><span class='badge badge-danger'>New</span></td><td class='mailbox-name'>"+value.company_name+"</td><td class='mailbox-date'>"+value.time+"</td></tr>";
                $('#company_regis_data').append(tr);
                
            });
            $('#wlist-load').removeClass('fa-spin');
            view_regis();
        }
    });
}

function company_regis_count() {
    $.ajax({
        type:'get',
        url:'/company-regis-count',
        success:function(data){
            if (data > 0) {
                notif_sound();
                $('#side-menu-regis-notif').show();
                toastr.info('Data perusahaan baru menunggu persetujuan !');
            }else{
                $('#side-menu-regis-notif').hide();
            }
        }
    });
};

function side_menu_regis(){
    $.ajax({
        type:'get',
        url:'/company-regis-count',
        success:function(data){
            if (data > 0) {
                $('#side-menu-regis-notif').show();
            }else{
                $('#side-menu-regis-notif').hide();
            }
        }
    });
}

$('#wl-refresh').on('click',function(){
    $('#wlist-load').addClass('fa-spin');
    company_regis();
})

function elements(){
    $('#check-npwp').on('change', function(){
        if(this.checked){
            $('.check-npwp').removeAttr('disabled');
        }else{
            $('.check-npwp').attr('disabled', true);
        }
    })

    $('#check-surat').on('change', function(){
        if(this.checked){
            $('.check-surat').removeAttr('disabled');
        }else{
            $('.check-surat').attr('disabled', true);
        }
    })

    // btn terima
    $('#terima').on('show.bs.modal', function(e){
        $('.btn-terima').on('click', function(){
            location.href=$(e.relatedTarget).data('href')
        })
    })
}
    
    