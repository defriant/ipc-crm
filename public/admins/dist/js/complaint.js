
$(window).on('load', function(){
    complaint_side_menu();
});

$('#newcomplaint').on('click', function(){
    $('.complaint').removeClass('selected');
    $(this).addClass('selected');
    $('#load1').show();
    $.ajax({
        type:'get',
        url:'/complaint-new',
        success:function(data){
            $('#complaint').html(data);
            view();
            $('#load1').hide();
        }
    })
})

$('#allcomplaint').on('click', function(){
    $('.complaint').removeClass('selected');
    $(this).addClass('selected');
    $('#load2').show();
    $.ajax({
        type:'get',
        url:'/complaint-all',
        success:function(data){
            $('#complaint').html(data);
            view();
            $('#load2').hide();
        }
    })
})

$('#ongoing').on('click', function(){
    $('.complaint').removeClass('selected');
    $(this).addClass('selected');
    $('#load3').show();
    $.ajax({
        type:'get',
        url:'/complaint-ongoing',
        success:function(data){
            $('#complaint').html(data);
            view();
            $('#load3').hide();
        }
    })
})

var my_id = $('#my_id').val();
var my_role = $('#my_role').val();

// Pusher
var pusher = new Pusher('5e1260902fbfd4b1058a', {
    cluster: 'ap1'
});
var channel = pusher.subscribe('complaint');

// Notif new complaint
channel.bind('new-complaint-event', function(data) {
    var new_total = parseInt($('#new-complaint-count').html());
    if (my_role == data.to) {
        $.ajax({
            type:'get',
            url:'/complaint-all-data',
            success:function(data){
                $('#complaint').find('#all-complaint-data').html(data);
                view();
            }
        })
        $.ajax({
            type:'get',
            url:'/complaint-new-data',
            success:function(data){
                $('#complaint').find('#new-complaint-data').html(data);
                view();
            }
        })
        if (new_total > 0) {
            $('#new-complaint-count').html(new_total + 1);
        }else{
            $('#newcomplaint').append('<span class="badge bg-danger float-right" id="new-complaint-count">1</span>')
        }
        $('#side-menu-complaint-notif').show();
        notif_sound();
        toastr.info(data.name+' Membuat pengaduan baru');
    }else{
        //
    }
});

// Notif balas tanggapan
function customer_reply(){
    $.ajax({
        type:'get',
        url:'/customer-reply',
        success:function(data){
            if(data.length > 0){
                $('.new-reply').remove();
                $('#ongoing').append('<span class="badge badge-danger new-reply">New</span>')
            }else{
                $('.new-reply').remove();
            }
        }
    })
}

channel.bind('balas-tanggapan-event', function(data) {
    if(my_id = data.to){
        customer_reply();
        $.ajax({
            type:'get',
            url:'/complaint-ongoing-data',
            success:function(data){
                $('#complaint').find('#ongoing-complaint-data').html(data);
                view();
            }
        })
        $('#side-menu-complaint-notif').show();
        notif_sound();
        toastr.info(data.name+' Membalas tanggapan anda');
    }else{
        // 
    }
});

// Tutup pengaduan notif
channel.bind('tutup-pengaduan-event', function(data) {
    if(my_id = data.to){
        $.ajax({
            type:'get',
            url:'/complaint-ongoing-data-count',
            success:function(data){
                $.ajax({
                    type:'get',
                    url:'/complaint-ongoing-data',
                    success:function(data){
                        $('#complaint').find('#ongoing-complaint-data').html(data);
                        view();
                    }
                })
                var ongoing_total = parseInt($('#ongoing-complaint-count').html());
                if(ongoing_total > 1){
                    $('#ongoing-complaint-count').html(ongoing_total - 1);
                }else{
                    $('#ongoing-complaint-count').remove();
                }
            }
        })
        notif_sound();
        toastr.success('Pengaduan pelanggan '+data.name+' telah selesai');
    }else{
        // 
    }
});

// complaint side menu badge
function complaint_side_menu(){
    $.ajax({
        type:'get',
        url:'/complaint-side-menu-notif',
        success:function(data){
            if(data > 0){
                $('#side-menu-complaint-notif').show();
            }else{
                $('#side-menu-complaint-notif').hide();
            }
        }
    })
}

function new_complaint_count(){
    $.ajax({
        type:'get',
        url:'/complaint-new-data-count',
        success:function(data){
            var new_total = parseInt($('#new-complaint-count').html());
            if (new_total > 1) {
                $('#new-complaint-count').html(new_total - 1);
            }else{
                $('#new-complaint-count').remove();
            }
        }
    })
}

function ongoing_complaint_count(){
    $.ajax({
        type:'get',
        url:'/complaint-ongoing-data-count',
        success:function(data){
            var ongoing_total = parseInt($('#ongoing-complaint-count').html());
            if(ongoing_total > 0){
                $('#ongoing-complaint-count').html(ongoing_total +1);
            }else{
                $('#ongoing').append('<span class="badge bg-primary float-right" id="ongoing-complaint-count">1</span>')
            }
        }
    })
}

// table row click href
function view(){
    $('.link').click(function(){
        $('.overlay').show();
        var href = $(this).data("href");
        $.ajax({
            type:'get',
            url:href,
            success:function(data){
                $('#complaint').html(data);
                follup();
                form_balas();
                $('.overlay').hide();
            }
        })
    });
}

// follup button
function follup(){
    $('.follup').on('click', function () {
        var pengaduan_id = $('#pengaduan_id').val();
        $.ajax({
            type: 'get',
            url: '/foll-up/'+pengaduan_id,
            success: function (data) {
                new_complaint_count();
                ongoing_complaint_count();
                customer_reply();
                $('#balas-pengaduan').toggle('slide');
                $('.follup').toggle('slide');
                $('.complaint').removeClass('selected');
                $('#ongoing').addClass('selected');
            }
        })
    })
}

// form balas pengaduan
function form_balas(){
    $('#form-balas').on('submit', function(event){
        $('.overlay').show();
        event.preventDefault();
        let id = $('#id').val();
        let balasan = $('#balasan').val();
        let token = $('#_token').val();
        $.ajax({
            type:'post',
            url:'/balas-pengaduan/'+id,
            data:{
                "_token": token,
                balasan:balasan
            },
            success:function(data){
                $.ajax({
                    type:'get',
                    url:'/complaint-ongoing',
                    success:function(data){
                        $('#complaint').html(data);
                        view();
                        $('.overlay').hide();
                        customer_reply();
                        $('.complaint').removeClass('selected');
                        $('#ongoing').addClass('selected');
                        complaint_side_menu();
                        toastr.success('Berhasil mengirim balasan');
                    }
                });
            }
        });
    })
}

