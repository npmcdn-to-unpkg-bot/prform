$(document).ready(function()
{
	"use strict";

	$('.date-field').datetimepicker({
		//format: 'DD/MM/YYYY'
        format: 'YYYY/MM/DD'
	});

/*	$('.check-styled').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green',
        cursor: true,
        labelHover: true,
        labelHoverClass: 'hover',
    });*/

   $(function(){
        $('#color_pic_1').colorpicker({
            container: '.color-pic-container-1'
        });
        $('#color_pic_2').colorpicker({
            container: '.color-pic-container-2'
        });
    });

});
