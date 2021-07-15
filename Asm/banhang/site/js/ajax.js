 /* global $_SESSION */
    $(document).ready(function(){


        $("input#number-order").change(function(){
            var id = $(this).attr('data-id');
            var qty = $(this).val();
            var data = {id:id,qty:qty};

            $.ajax({
                url: 'controllers/ajax/cart.php',          //trang xá»­ lÃ­ ,máº·c Ä‘á»‹nh trang hiá»‡n táº¡i
                method: 'POST',      //post hoáº·c get, máº·c Ä‘á»‹nh get
                data:  data,        //dá»¯ liá»‡u truyá»�n lÃªn server
                dataType: 'json',    //kiá»ƒu dá»¯ liá»‡u html,text,script hoáº·c json
                success : function(data){

                    $("#sub_total-"+id).text(data.sub_total);
                    //tong tien
                    $("#total-price").text(data.total);


                    // //so luong tung sp
                    // console.log(data);

                },
                error: function(xhr,ajaxOptions,thrownError){
                    console.log(xhr);
                    console.log(thrownError);
                    console.warn(xhr.responseText);
                }
            });
        });

    });
