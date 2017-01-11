/*
 To change this license header, choose License Headers in Project Properties.
 To change this template file, choose Tools | Templates
 and open the template in the editor.
 */
/* 
 Created on : Jan 11, 2017, 9:56:43 AM
 Author     : nguyen.xuan.tam
 */
var totalMoney = 0;
var i = 0;
bill_export = {
    init: function () {
//        bill_export.common.selectProductChange();
        bill_export.common.addNewProduct();
    },
    /**
     * common
     */
    common: {
        /**
         * 
         * @returns {undefined}
         */
        addNewProduct: function () {
            $('#btn_add_product').click(function (e) {
                i++;
                var idProduct = $('#name_product').val();
                if (idProduct) {
                    var quanlity = $('#quanlity').val();
                    if (quanlity) {
                        var name = $('#name_product option:selected').text();
                        var price = $('#price').val();
                        totalMoney += quanlity * price;
                        var html = "<tr><td> <input type='hidden' name='billDetail[" + i + "][name]' class='product_id' value=" + idProduct + ">" + name + "</td>";
                        html += "<td> <input type='text' name='billDetail[" + i + "][quanlity]' value=" + quanlity + "></td>";
                        html += '<td>' + price + '</td>';
                        html += '<td>' + quanlity * price + '</td>';
                        html += '<td><i class="fa fa-remove"></i></td></tr>';
                        var checkIsset = false;
                        $('#content_bill .product_id').each(function () {
                            if ($(this).val() == idProduct) {
                                checkIsset = true;
                            }

                        });
                        if (checkIsset == false) {
                            $('#content_bill').append(html);
                            $('#total_money_of_bill').text(totalMoney);
                            $('#total_money').val(totalMoney);
                            $('.fa-remove').click(function () {
                                $(this).parents('tr').remove();
                            });
                        } else {
                            toastr.error(message.productInSelect);
                        }

                    } else {
                        toastr.error(message.inputQuanlity);
                    }
                } else {
                    toastr.error(message.selectProduct);
                }
            });
        },
    },
    /**
     * bill
     * 
     * @type type
     */
    bill: {
        /**
         * 
         * @returns {undefined}
         */
        selectProductChange: function () {
            $('#name_product').change(function (e) {
                var idProduct = $(this).val();
                var url = $(this).data('url');
                $.ajax({
                    'type': 'GET',
                    'url': url,
                    'data': {'idProduct': idProduct},
                    success: function (data) {
                        $('#quanlity_still').val(data.quanlityStill);
                        $('#price').val(data.price);
                    }
                });
            });
        },
    },
    /**
     * Export
     * @type type
     */
    export: {
    }
};

