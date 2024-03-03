var segmentTerakhir = window.location.href.split('/').pop();

$.ajax({
    url: window.location.origin + '/detail/' + segmentTerakhir + '/getdatadetail',
    type: "GET",
    dataType: "JSON",
    success: function(res) {
        console.log(res)
        $('#fotodetail').prop('src', '/assets/' + res.datadetailfoto.lokasi_file)
        $('#judulfoto').html(res.datadetailfoto.judul_foto)
        $('#deskripsifoto').html(res.datadetailfoto.deskripsi_foto)
        $('#tanggalunggah').html(res.datadetailfoto.created_at)
        $('#like-count').html(res.jumlahdata.like_foto_count)
        // $('#listkomentar').html(res.datakomentar.tampilkankomentar)
        $('#coment-count').html(res.jumlahdata.komentar_count)
        $('#username').html(res.datadetailfoto.users.username)


        ambilkomentar()
    },
    error: function(jqXHR, textStatus, errorThrown){
        alert('gagal')
    }
})



function ambilkomentar() {
    $.getJSON(
        window.location.origin + '/detailsya/getkomentar/' + segmentTerakhir,
        function (res) {
            console.log(res);
            if(res.datakomentar.length === 0) {
                $('#listkomentar').html("<div>Belum ada Komentar</div>");
            } else {
                Komentar = [];
                res.datakomentar.map((x) => {
                    let datakomentar = {
                        userid : x.userid,
                        pengirim : x.users.username,
                        fotouser : x.users.pictures,
                        waktu : x.tanggal_komentar,
                        isikomentar : x.isi_komentar,
                    };
                    Komentar.push(datakomentar);
                })
                tampilkankomentar();
            }
        }
    )
}

const tampilkankomentar = () => {
    $('#listkomentar').html();
    Komentar.map((x, i) => {
        $('#listkomentar').append(
            `
            <div class="flex gap-3 mt-4">
                            <div>
                                <img src="/fotoprofile/${x.fotouser}"  alt="" class="w-[50px] h-[50px] rounded-full">
                            </div>
                            <div class="flex flex-col">
                                <div class="font-semibold">${x.pengirim}</div>
                                <div class="text-[12px] text-slate-400">${new Date(x.waktu).toLocaleDateString("id")}</div>
                                <div class="w-40">${x.isikomentar}</div>
                            </div>
                    </div>
            `
        )
    })
}

function kirimkomentar() {
    $.ajax({
        url: window.location.origin + '/detail/kirimkomentar',
        type: "POST",
        dataType: "JSON",
        data: {
            _token: $('input[name="_token"]').val(),
            fotoid: segmentTerakhir,
            isi_komentar: $('input[name="textkomentar"]').val()
        },
        success: function(res) {
            // $('input[name="textkomentar"]').val('')
            location.reload()
        },
        error: function(jqXHR, textStatus, errorThorw) {
            alert('gagal mengirim komentar')
        }

    })
}

// setInterval(ambilkomentar, 500);
