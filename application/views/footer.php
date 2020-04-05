    </div><!--row-->   
    
    <footer>
        <div class="col-md-12" style="text-align:center;">
            <hr>
            ALL RIGHT RESERVED | COPYRIGHT © 2019 | <a href="<?php echo base_url(); ?>"> GRAPHICGEEKS</a>
        </div>
    </footer>
    </div><!-- /container -->  
    
    <!-- /Load Js -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url().'public/js/main.js' ?>"></script>
    </body>
</html>
<script type="text/javascript">
function minusValue(pid){
    var current_val = $('#quantity_'+pid).val();
    if(current_val > 1){
        $('#quantity_'+pid).val(parseInt(current_val) - 1);
    }else{
        $('#quantity_'+pid).val(1);
    }
    get_product_qty(pid); 
    updateItem(pid);
}
function plusValue(pid){
    var current_val = $('#quantity_'+pid).val(); 
    $('#quantity_'+pid).val(parseInt(current_val) + 1); 
    get_product_qty(pid);
    updateItem(pid); 
}
function get_product_qty(pid){
    var product_price = $('#product_price_'+pid).val(); 
    var current_val = $('#quantity_'+pid).val(); 
    var total_value = product_price * current_val; 
    $('#total_price_'+pid).val(total_value);
}

function addtocart(pid){
    var product_id = pid;
    var product_price = $('#product_price_'+pid).val(); 
    var current_val = $('#quantity_'+pid).val();  
    var product_name = $('#product_name_'+pid).val(); 
    var product_image = $('#product_image_'+pid).val(); 

    $.post( "<?php echo site_url('graphicmain/add_to_cart'); ?>", { product_id: product_id, product_price: product_price , quantity:current_val, product_name:product_name,product_image:product_image})
        .done(function( data ) {
            var obj = JSON.parse(data);
        alert( obj.message );
        $("#cart_cont_refresh").load(location.href + " #cart_cont_refresh");
        $('.popup').dialog('close');
    });
}
$(function(){
  $('.checkout').on('click',function(e){
    e.preventDefault();
  });
})

function updateItem(productid){
    var rowid = $('#product_row_'+productid).val();
    var current_val = $('#quantity_'+productid).val();
        $.post( "<?php echo site_url('graphicmain/updateItem'); ?>", { rowid: rowid, p_count : current_val })
        .done(function( data ) {
            var obj = JSON.parse(data);
        alert( obj.message );
        $("#cart_cont_refresh").load(location.href + " #cart_cont_refresh");
    });
}
function deleteItem(productid){
    var rowid = $('#product_row_'+productid).val();    
    if(confirm("Are You sure to delete ?")){
        $.post( "<?php echo site_url('graphicmain/deleteItem'); ?>", { rowid : rowid })
            .done(function( data ) {
                var obj = JSON.parse(data);
            alert( obj.message );
            $("#cart_cont_refresh").load(location.href + " #cart_cont_refresh");
        });   
    }   
}
</script>