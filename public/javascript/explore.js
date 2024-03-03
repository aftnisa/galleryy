var paginate = 1;
var dataExplore = [];
loadMoreData(paginate);
$(window).scroll(function () {
    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        paginate++;
        loadMoreData(paginate);
    }
})

function loadMoreData(paginate) {
    var urlnya = window.location.href.split("?")[1];
    var parameter = new URLSearchParams(urlnya);
    var cariValue = parameter.get('cari')
    if(cariValue == 'null') {
        url = window.location.origin +'/getdataexplore/' + '?page=' +paginate;
    } else {
        url = window.location.origin +'/getdataexplore?cari='+ cariValue + '&page=' +paginate
    }
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function(e) {
            console.log(e)
            e.data.data.map((x)=> {
                var hasilPencarian =x.like_foto.filter(function(hasil) {
                    return hasil.user_id === e.idUser
                })
                if(hasilPencarian.length <= 0) {
                    userlike = 0;
                } else {
                    userlike = hasilPencarian[0].user_id;
                }
                let datanya = {
                    id: x.id,
                    judul: x.judul_foto,
                    deskripsi: x.deskripsi_foto,
                    foto: x.lokasi_file,
                    jml_comment: x.komentar_count,
                    jml_like: x.like_foto_count,
                    idUserLike: userlike,
                    useractive: e.idUser
                }
                dataExplore.push(datanya)
            })
            getExplore()
            // getPosting()
        },
        error:function(jqXHR, textStatus, errorThorw){
            console.error("kesalahan ajax:", textStatus, errorThorw)
        }
    })
}

const getExplore =()=>{
    $('#exploredata').html('')
    dataExplore.map((x, i)=>{
        $('#exploredata').append(
            `
            <div class="w-1/4 flex-width">
            <div class="flex flex-col p-3">
            <a href="/detail/${x.id}">
                <div class="w-[285px] h-[285px] overflow-hidden">
                    <img src="/assets/${x.foto}" alt="">
                </div>
            </a>
                <div class="flex justify-between items-center">
                    <div class="flex flex-col ">
                        <div class="font-semibold">
                            ${x.judul}
                        </div>
                    </div>
                    <div class="gap-4 mt-auto">
                    <small>${x.jml_like}</small>
                    <span class="bi ${x.idUserLike === x.useractive ? 'bi-heart-fill text-red-600' : 'bi-heart'}" onclick="likes(this, ${x.id})"></span>
                    <small>${x.jml_comment}</small>
                    <a href="/detail/${x.id}">  <span class="bi bi-chat text-2xl"></span></a>
                    </div>
                </div>
            </div>
        </div>
            `
        )
    })
}

function likes(txt, id){
    console.log(id)
    $.ajax({
        url:'/likefotos',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            fotoid: id,
        },
        success: function(res){
            location.reload()
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('gagal')
        }
    })
}


