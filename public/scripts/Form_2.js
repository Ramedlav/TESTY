$(document).ready(function() {
    $("#next_2").click(function()
    {
        var formData = new FormData();

            // if(($("#myfile")[0].files[0]).length != 0)
            // {
                formData.append("img" , $("#myfile")[0].files[0]);
                $("#id_form_2").find ("input, textarea, select").each(function() {
                    if($(this).val()!='')
                    {
                        formData.append(this.name,  $(this).val());
                    }
                });
            // }

            $.ajax({
              type:"POST",
              url:"/main/register_img",
              data:formData,
              cache:false,
              contentType:false,
              processData:false,
              beforeSend:function()
              {
                  $("#id_form_2").find('input').prop('disabled',true);

              },
              success:function (data)
              {
                  $('#part2').hide();
                  $('#part3').show();
                  console.log(data);
              },
              complete:function ()
              {
                  $("#id_form_2").find('input').prop('disabled',false);
              },
            });

        });
});


