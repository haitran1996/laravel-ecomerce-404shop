// let cuponCode = [
//    "30OFF",
//    "404",
// ];
//
// let valueCupon = [30, 69];
//
$(function () {
//     let total = $(".total-cart-p").text();
//
//     // window.onload(
//     //     changeValueWhileSelect($(".shipping").text(),
//     //         getCookie("checked")));
//
    $('#form-add-cart').on('submit', function (event) {
        // using this page stop being refreshing
        event.preventDefault();

        let product_id = $('#product_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url:  origin + "/404shop/cart/add/" + product_id,
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
            }
        });
    });
//
//     $('#one').click(changeValueWhileSelect("Free", "one"));
//     $('#two').click(changeValueWhileSelect("40,000", "two"));
//     $('#three').click(changeValueWhileSelect("Free", "three"));
//
//     function changeValueWhileSelect(text, idSelect) {
//         $(".shipping").text(text);
//         let val = 0;
//         if (text !== "Free") {
//             val = format_num_to_num(text);
//         };
//         let displayTotal = format_num_to_num(total) - val;
//         $(".total-cart-p").text(num_to_format_num(displayTotal));
//         document.cookie = "checked=" + idSelect;
//         console.log(idSelect);
//     }
//
//     function format_num_to_num(format_num) {
//         return format_num.split(",").join("");
//     };
//
//     function num_to_format_num(num) {
//         num = Number(num);
//
//         let strNum = '';
//         let reverseNum = String(num).split("").reverse().join("");
//         let start = 0;
//
//         while(true) {
//             strNum += reverseNum.substr(start,3);
//             start += 3;
//             if (reverseNum.length - start > 0) {
//                 strNum += ",";
//             } else {
//                 break;
//             }
//         }
//
//         return strNum.split("").reverse().join("");
//     };
});
