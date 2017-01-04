/*
 To change this license header, choose License Headers in Project Properties.
 To change this template file, choose Tools | Templates
 and open the template in the editor.
 */
/* 
 Created on : Dec 28, 2016, 5:05:33 PM
 Author     : nguyen.xuan.tam
 */
common = {
    init: function () {
        common.deleteConfirmModal();
        common.clickHidenSideleft();
    },
    deleteConfirmModal: function () {
        $('.btn-delete-confirm').click(function (e) {
            e.preventDefault();
            var self = $(this);
            var name = (self.data('name')) ? self.data('name') : '';
            common.confirm({
                message: "<h3><center>削除してもよろしいですか？<center></h3>",
                buttons: {
                    confirm: {
                        label: ' 削除 ',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'キャンセル',
                        className: 'btn-default'
                    }
                },
                callback: function (result) {
                    if (result) {
                        window.location = self.attr('href');
                    }
                }
            });
        });
    },
    clickHidenSideleft: function () {
        $('.sidebar-toggle').click(function () {
            $('body').toggleClass('sidebar-collapse');
        });
    },
}