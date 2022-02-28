    $(document).ready(function() {
      $("#course").change(function() {
        var faculty_id = $(this).val();
        if(faculty_id !== "") {
            $.ajax({
            url:"time-table.php",
            data:{f_id:faculty_id},
            type:'POST',
            success:function(response) {
              var resp = $.trim(response);
              $("#yos").html(resp);
            }
        });
        } else {
          $("#yos").html("<option value=''>- Select YoS -</option>");
        }
      });  
    });