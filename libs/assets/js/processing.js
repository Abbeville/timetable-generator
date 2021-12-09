/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
//    alert("hello")  ;
    var url = "http://localhost/finale/";
    $(document).on("click", ".nominee", function (e) {
//        alert("nominee");
        var id = $(this).children().children().attr("hfgjfgjfgfhj");
//        alert(id);
        $.post(url + "/dataprocessing/load_norminee_in_cat/request", {
            catid: id
        },
                function (r) {
//                    alert(r)
                });
    });

    $(document).on("click", ".loginmenow", function (e) {
//        alert("nominee");
        e.preventDefault();
        var token = $(".mytoken").val();
//        alert(token);
        if (token === "") {

        } else {
            $.post(url + "/dataprocessing/login/request", {
                token: token
            },
                    function (r) {
                        alert(r)
                    });
        }


    });

    $(document).on("click", ".proceddnoww", function (e) {
//        alert("nominee");
        var nomi = $(this).parents(".carousel").attr("kjkjkjk");
//                
//console.log(nomi);
//        alert(nomi);
        var cat = $(this).parents("h3").attr("lklklklk");
        console.log(cat);
//        alert(nomi);
//        alert(cat);
        alertify.confirm('ARE YOU SURE', function () {
            alertify.success('Ok')
            $.post(url + "/dataprocessing/votemein/request", {
                nomi: nomi,
                cat: cat
            },
                    function (r) {
                        if (r === "gud") {
                            alertify.alert("Vote Succesful");
                            window.location = url;
                        } else {
                            alert(r);
                        }


                    });
        },
                function () {
                    alertify.error('Cancel')

                    alert('Cancel')
                }
        )

    });

    $(document).on("click", ".withrewwww", function (e) {
//        alert("nominee");
        var vid = $(this).parent().attr("kjkjkjk");
//        alert(vid);

        alertify.confirm('ARE YOU SURE', function () {
            alertify.success('Ok')
            $.post(url + "/dataprocessing/withdrawvote/request", {
                vid: vid

            },
                    function (r) {
//                                alert(r) 
                        if (r === "gud") {
                            alertify.alert("Vote Withdraw Succesful");
                            window.location = url;
                        } else {
                            alert(r);
                        }


                    });
        },
                function () {
                    alertify.error('Cancel')

//                    alert('Cancel')
                }
        )

    });

    $(document).on("click", ".uploadnew", function () {
//          alert("io");
//           $('.fileimage').trigger('click').change(function() {
////              $('.piximage').trigger('click');
//        });
        c();
    })

    function c() {
        var allowed = "image/jpeg,image/jpg,image/png,image/gif";
        $('.fileimage').trigger('click').change(function () {
            if (this.files && this.files[0]) {
                fileMan = new FileReader();
                fileMan.readAsDataURL(this.files[0]);
                fileMan.onload = function (e) {
                    pixTemp = e.target.result;
                    console.log(pixTemp);
                    fileType = pixTemp.substring(5, pixTemp.indexOf(";"));
                    if (allowed.indexOf(fileType) < 0) {
                        alert(' The File Type You Chose Is Not Supported!\nPlease Select A Valid Image File');
                    } else {
                        changepix = "true";
                        $('.display_logo').empty();
                        $('.display_logo').append('<img style="" class="bannerPreview img-thumbnail" src="' + pixTemp + '">');
//                        alert(pixTemp);
                    }
//                    alert(pixTemp.indexOf(";"));
//                $('.imageTemp').attr('src', pixTemp);
                };
            }
        });
    }

    $(document).on("click", ".makeprofile", function () {
// var imagename = $(this).parent();
        var imagename = $(this).parent().attr("httpddiogdhnhjhgh").trim();
// alert(imagename)
        alertify.confirm('ARE YOU SURE', function () {
            alertify.success('Ok')

            $.post("" + url + "dataprocessing/makedp/request",
                    {

                        imagename: imagename

                    },
                    function (data) {
// alert(data);
                        if (data === "gud") {
                            alertify.alert("DATABASE INFOMATION", "Succesful");
//                                location.reload();
                            window.location = url;

                        } else {
                            alert("Error Occure");
                        }

                    });

        },
                function () {
                    alertify.error('Cancel')

                    alert('Cancel')
                }
        )


    });

    $(document).on("click", ".remove_pix", function () {
// var imagename = $(this).parent();
        var imagename = $(this).parent().attr("httpddiogdhnhjhgh").trim();
// alert(imagename)
        alertify.confirm('ARE YOU SURE', function () {
            alertify.success('Ok')


            $.post("" + url + "dataprocessing/remove_image/request",
                    {

                        imagename: imagename

                    },
                    function (data) {
// alert(data);
                        if (data === "gud") {
                            alertify.alert("DATABASE INFOMATION", "Succesful");
                            location.reload();
//window.location=url;

                        } else {
                            alert("Error Occure");
                        }

                    });

        },
                function () {
                    alertify.error('Cancel')

                    alert('Cancel')
                }
        )

    });
});