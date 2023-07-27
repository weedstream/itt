
$('.btn-panggil').on('click', function () {

    let suaraBel = $('#suarabel');
    let noUrut = $('#suarabelnomorurut');
    let diLoket = $('#diloket');

    let antrian = $(this).data('antrian');
    let antrian1 = $(this).data('antrian1');
    let loket = $(this).data('loket');
    let url = $(this).data('action');

    console.log(loket, antrian, url)

    $.ajax({
        url: url,
        data: {
            loket_id: loket,
            no_antrian_loket: antrian
        },
        type: 'post',
        success: function (data) {
            suaraBel[0].pause();
            suaraBel[0].currentTime = 0;
            suaraBel[0].play();

            let totalWaktu = suaraBel[0].duration * 700;

            setTimeout(function () {
                noUrut[0].pause();
                noUrut[0].currentTime = 0;
                noUrut[0].play();
            }, totalWaktu);

            totalWaktu = totalWaktu + 2000;

            if (antrian < 10) {
                setTimeout(function () {
                    $('#antrian')[0].pause();
                    $('#antrian')[0].currentTime = 0;
                    $('#antrian')[0].play();
                }, totalWaktu);
                totalWaktu = totalWaktu + 1000;
            }

            else if (antrian == 10) {
                setTimeout(function () {
                    document.getElementById("sepuluh").pause();
                    document.getElementById("sepuluh").currentTime = 0;
                    document.getElementById("sepuluh").play();
                }, totalWaktu);
                totalWaktu = totalWaktu + 1000;
            }

            else if (antrian == 11) {
                setTimeout(function () {
                    document.getElementById("sebelas").pause();
                    document.getElementById("sebelas").currentTime = 0;
                    document.getElementById("sebelas").play();
                }, totalWaktu);
                totalWaktu = totalWaktu + 1000;

            }

            else if (antrian > 11 && antrian < 20) {

                setTimeout(function () {
                    document.getElementById("antrian").pause();
                    document.getElementById("antrian").currentTime = 0;
                    document.getElementById("antrian").play();
                }, totalWaktu);
                totalWaktu = totalWaktu + 700;

                setTimeout(function () {
                    document.getElementById("belas").pause();
                    document.getElementById("belas").currentTime = 0;
                    document.getElementById("belas").play();
                }, totalWaktu);
                totalWaktu = totalWaktu + 1000;

            }

            else if (antrian == 20) {

                setTimeout(function () {
                    document.getElementById("antrian").pause();
                    document.getElementById("antrian").currentTime = 0;
                    document.getElementById("antrian").play();
                }, totalWaktu);
                totalWaktu = totalWaktu + 800;

                setTimeout(function () {
                    document.getElementById("puluh").pause();
                    document.getElementById("puluh").currentTime = 0;
                    document.getElementById("puluh").play();
                }, totalWaktu);
                totalWaktu = totalWaktu + 1000;

            }

            else if (antrian > 20 && antrian < 100) {

                setTimeout(function () {
                    document.getElementById("antrian").pause();
                    document.getElementById("antrian").currentTime = 0;
                    document.getElementById("antrian").play();
                }, totalWaktu);
                totalWaktu = totalWaktu + 800;

                setTimeout(function () {
                    document.getElementById("puluh").pause();
                    document.getElementById("puluh").currentTime = 0;
                    document.getElementById("puluh").play();
                }, totalWaktu);
                totalWaktu = totalWaktu + 1000;

                setTimeout(function () {
                    document.getElementById("antrian1").pause();
                    document.getElementById("antrian1").currentTime = 0;
                    document.getElementById("antrian1").play();
                }, totalWaktu);
                totalWaktu = totalWaktu + 800;

            }

            else if (antrian == 100) {

                setTimeout(function () {
                    document.getElementById("seratus").pause();
                    document.getElementById("seratus").currentTime = 0;
                    document.getElementById("seratus").play();
                }, totalWaktu);
                totalWaktu = totalWaktu + 800;
            }



            // totalWaktu = totalWaktu + 700;

            setTimeout(function () {
                $('#diloket')[0].pause();
                $('#diloket')[0].currentTime = 0;
                $('#diloket')[0].play();
            }, totalWaktu);

            totalWaktu = totalWaktu + 1500;

            setTimeout(function () {
                $('#loket' + loket)[0].pause();
                $('#loket' + loket)[0].currentTime = 0;
                $('#loket' + loket)[0].play();
            }, totalWaktu);

            console.log(data, antrian);
        }
    })

});
