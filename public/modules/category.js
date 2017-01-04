/*
 To change this license header, choose License Headers in Project Properties.
 To change this template file, choose Tools | Templates
 and open the template in the editor.
 */
/* 
 Created on : Dec 29, 2016, 10:45:18 AM
 Author     : nguyen.xuan.tam
 */

app = {
    categories: {
        init: function () {
            app.categories.sortAbleOfCategories();
        },
        sortAbleOfCategories: function () {
            $(".column").sortable({
                connectWith: ".categoriparent",
                stop: function (evt, ui) {
                    var catergory_id = $('.categoriparent').find('.portlet').data('id');
                    $('#category_id').val(catergory_id);
                }
            });
            $(".categoriparent").sortable({
                connectWith: ".column",
                receive: function (event, ui) {
                    if ($(this).children().length > 1) {
                        $(ui.sender).sortable('cancel');
                    }
                },
                stop: function (evt, ui) {
                    var catergory_id = $('.categoriparent').find('.portlet').data('id');
                    $('#category_id').val(catergory_id);
                }
            }).disableSelection();
            $(".portlet")
                    .addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
                    .find(".portlet-header")
                    .addClass("ui-widget-header ui-corner-all")
                    .prepend("<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
            $(".portlet-toggle").on("click", function () {
                var icon = $(this);
                icon.toggleClass("ui-icon-minusthick ui-icon-plusthick");
                icon.closest(".portlet").find(".portlet-content").toggle();
            });
        },
    },
}
      