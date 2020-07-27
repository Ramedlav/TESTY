$(document).ready(function() {
    $("#next").click(
        function(){

                if(validation() == true){
                    data = $("#id_form_1").serialize();
                    $.post('/main/register',data , function(data) {
                        $('#part1').hide();
                        $('#email_2').val($('#email_1').val());
                        $('#part2').show();
                    });
                }//else{alert(validation()); }
        }
    );
});

function validation() {
     check = true;

     if(!($.isNumeric($("#phone").val()))){
         $("#phone").addClass("empty-class");
         check = false;
     }else{$("#phone").removeClass("empty-class");}
    $('#phone').on('', function() {
        alert('change');
        $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё]/, ''))
    });
     $("#id_form_1").find ("input, select").each(function() {

        if($(this).val() == '' || $(this).val() == 0)
        {
            $(this).addClass("empty-class");
            check = false;
        }else{
            $(this).removeClass("empty-class");
        }
    });
    return check;
}