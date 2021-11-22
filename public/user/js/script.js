// Materialize script

    // sidenav
    // $('.sidenav').sidenav();

    // dropdown menu
    $('.dropdown-trigger').dropdown({
        hover: true,
        inDuration: 500,
        outDuration: 500,
        coverTrigger: false,
        constrainWidth: false,
    });

    $('.dropdown-trigger-akun').dropdown({
        alignment:'right',
        hover: false,
        inDuration: 500,
        outDuration: 500,
        coverTrigger: false,
        constrainWidth: false
    }); 

    // slider
    $('.slider').slider({
        indicators: false,
        height: 400,
        interval: 3000
    });

    // parallax
    $('.parallax').parallax();

    // collaps button
    $('.collapsible').collapsible();

    // modal
    $('.modal').modal();

    // Select
    $('select').formSelect();

    $('ul.tabs').tabs();

    $('.tooltipped').tooltip({
        exitDelay: 0,
        enterDelay: 100
    });

// End Materialize script

// Public script

    $(window).on('load', function () {
        $('.kiri').addClass('muncul');
        $('.kanan').addClass('muncul');
        $('.tengah').addClass('muncul');
        get_notification();
        get_notification_count();
        aktifitas();
    });

    $(window).on('scroll', function(){
        if ($(window).scrollTop()) {
            $('nav').addClass('white');
            // $('.nav-link').removeClass('grey-text text-darken-3');
        }else{
            $('nav').removeClass('white');
            // $('.nav-link').addClass('grey-text text-darken-3');
        }
    });

    $('.dropdown-trigger-notifikasi').on('click', function(){
        $.ajax({
            type:'get',
            url:'/notification-read',
            success:function(data){
                $('#notif-count').remove();
            }
        })
    })

    function dropdown_notif(){
        $('.dropdown-trigger-notifikasi').dropdown({
            alignment:'right',
            hover: false,
            inDuration: 500,
            outDuration: 500,
            coverTrigger: false,
            constrainWidth: false
        });
    }
    
    function get_notification(){
        $.ajax({
            type:'get',
            url:'/get-notification',
            success:function(data){
                $('#notif-list').html(data);
                dropdown_notif();
            }
        })
    }
    
    function get_notification_count(){
        $.ajax({
            type:'get',
            url:'/get-notification-count',
            success:function(data){
                if (data.length > 0) {
                    $('#notif-header').append('<span id="new-badge" class="new badge">'+data.length+'</span>');
                    $('#notif').append('<small id="notif-count" class="notification-badge pink accent-2">'+data.length+'</small>');
                }
            }
        })
    }

// End Public script

// Home script

    function aktifitas(){
        $('#activity-load').show();
        $.ajax({
            type:'get',
            url:'/aktifitas',
            success:function(data){
                $('.activity').html(data);
                $('#activity-load').hide();
                load_next_activity();
            }
        })
    }

    function load_next_activity(){
        $('#load-next').on('click', function(e){
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $(this).hide();
            $('#preload-next').show();
            $.ajax({
                url:'/aktifitas?page='+page,
                success:function(data){
                    $('#preload-next').hide();
                    $('#muat-selanjutnya').remove();
                    $('.activity').append(data);
                    load_next_activity();
                }
            })
        })
    }

    $('#company-edit').on('click', function(){
        $('#work-collections').fadeOut( 400 );
        $('#company-update').delay( 500 ).fadeIn( 400 );
    })

    $('#cancel-update').on('click', function(){
        $('#company-update').fadeOut( 400 );
        $('#work-collections').delay( 500 ).fadeIn( 400 );
    })

    $('#company-update-form').on('submit', function(){
        $('#company-update-button').hide();
        $('#company-update-loading').show();
    })

// End Home script

// CS Sript

    $('#buat-pengaduan').on('submit', function(){
        if($('#nama').val().length == 0){
            $('#nama').addClass('invalid');
            alert('Nama pengadu tidak boleh kosong');
            valid = false;
        }else if($('#perusahaan').val().length == 0){
            $('#perusahaan').addClass('invalid');
            alert('Perusahaan / Instansi tidak boleh kosong');
            valid = false;
        }else if($('#email').val().length == 0){
            $('#email').addClass('invalid');
            alert('Email tidak boleh kosong');
            valid = false;
        }else if($('#perihal').val().length == 0){
            $('#perihal').addClass('invalid');
            alert('Perihal tidak boleh kosong');
            valid = false;
        }else if($('#tanggal_permasalahan').val().length == 0){
            $('#tanggal_permasalahan').addClass('invalid');
            alert('Tanggal permasalahan tidak boleh kosong');
            valid = false;
        }else if($('#aplikasi').val() == null){
            $('#aplikasi').addClass('invalid');
            alert('Aplikasi tidak boleh kosong');
            valid = false;
        }else if($('#kegiatan').val() == null){
            $('#kegiatan').addClass('invalid');
            alert('kegiatan tidak boleh kosong');
            valid = false;
        }else if($('#permasalahan').val().length == 0){
            $('#permasalahan').addClass('invalid');
            alert('Permasalahan tidak boleh kosong');
            valid = false;
        }else{
            $('#btn-submit').hide();
            $('#submit-loading').show();
            valid = true;
        }
        return valid;
    })

    $('.input-form').on('input', function(){
        $(this).removeClass('invalid');
    })

    $('.tanggalPermasalahan').on('change', function(){
        $(this).removeClass('invalid');
    })

    $('.tanggalPermasalahan').datepicker({
        format: 'dd mmm yyyy'
    });

    let userId = $('meta[name="user-id"]').attr('content')
    var pusher = new Pusher('5e1260902fbfd4b1058a', {
        cluster: 'ap1'
    });
    var channel = pusher.subscribe('cs-reply-'+userId);
    channel.bind('cs-reply-event', function (data) {
        var pending = parseInt($('#notif-count').html());
        var my_id = $('#my_id').val();
        get_notification();
        cs_data();
        if(pending > 0){
            $('#new-badge').html(pending + 1);
            $('#notif-count').html(pending + 1);
        }
        else{
            $('#new-badge').remove();
            $('#notif-header').append('<span id="new-badge" class="new badge">1</span>')
            $('#notif').append('<small id="notif-count" class="notification-badge pink accent-2">1</small>');
        }
        // if (my_id == data.to) {
        // } else {
            
        // }
    });

    function cs_data(){
        $.ajax({
            url:'/customer-service/page',
            success:function(data){
                $('.cs-data').html(data);
                $('.link').click(function(){
                    window.location = $(this).data("href");
                });
            }
        });
    }

// End CS Script

