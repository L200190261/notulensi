<script>
    $(document).ready (function(){
        $("#type").change(function() {
      if ($(this).val() == 'NON ASN') {
        $(".dis").attr("disabled", "disabled");
      } else {
        $(".dis").removeAttr("disabled");
      }
    }).trigger("change");
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>