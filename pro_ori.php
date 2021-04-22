<?php 
include('database/dbconfig.php');
include('navbar.php');
include("Product.php");
$product = new Product();
$categories = $product->getCategories();
$brands = $product->getBrand();
$materials = $product->getMaterial();
$productSizes = $product->getProductSize();
$totalRecords = $product->getTotalProducts();
?>
      
<!-- <link rel="stylesheet" type='text/css' href="css/style.css">  -->
<div class="container-fluid">
	<div class="row">
	  <div class="col-sm-2">
        <div class="container">
      <form method="post" id="search_form">
        <div class="container mt-3" style="width: 100%; height: auto; border: 1px solid gray; padding: 6px;">
          <h5 id="type">Brand</h5><div id="div1" class="myDIV">
                                 <ul class="list-group">
                                <?php  
								foreach ($categories as $key => $category) {
                                    if(isset($_POST['category'])) {
                                        if(in_array($product->cleanString($category['category_id']),$_POST['category'])) {
                                            $categoryCheck ='checked="checked"';
                                        } else {
											$categoryCheck="";
                                        }
									}
                                ?>
								<li class="list-group-item">
									<div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($category['category_id']); ?>" <?php echo @$categoryCheck; ?> name="category[]" 
                  class="sort_rang category"><?php echo ucfirst($category['category_name']); ?></label></div>
								</li>
                                <?php } ?>
                                <div>
                                </ul>
                
                            </div>
                        </div>
                          <div class="container mt-3" style="width: 100%; height: auto; border: 1px solid gray; padding: 6px;">
          <h5 id="categ">Categories</h5><div id="div2" class="myDIV">
                                <?php 
								foreach ($brands as $key => $brand) {
                                    if(isset($_POST['brand'])) {
                                        if(in_array($product->cleanString($brand['brand']),$_POST['brand'])) {
                                            $brandChecked ='checked="checked"';
                                        } else {
											$brandChecked="";
                                        }
									}
                                ?>
								<li class="list-group-item">
									<div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($brand['brand']); ?>" <?php echo @$brandChecked; ?> name="brand[]" class="sort_rang brand"><?php echo ucfirst($brand['brand']); ?></label></div>
								</li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="container mt-3" style="width: 100%; height: auto; border: 1px solid gray; padding: 6px;">
          <h5 id="sort">Sort By</h5><div id="div3" class="myDIV">
        
								<div class="radio disabled">
									<label><input type="radio" name="sorting" value="newest" <?php if(isset($_POST['sorting']) && ($_POST['sorting'] == 'newest' || $_POST['sorting'] == '')) {echo "checked";} ?> class="sort_rang sorting">Newest</label>
								</div> 
								<div class="radio">
									<label><input type="radio" name="sorting" value="low" <?php if(isset($_POST['sorting']) && $_POST['sorting'] == 'low') {echo "checked";} ?> class="sort_rang sorting">Price: Low to High</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="sorting" value="high" <?php if(isset($_POST['sorting']) && $_POST['sorting'] == 'high') {echo "checked";} ?> class="sort_rang sorting">Price: High to Low</label>
								</div>								                              
                            </div>
                        </div>
                        <div class="container mt-3" style="width: 100%; height: auto; border: 1px solid gray; padding: 6px;">
          <h5 id="material">Material</h5><div id="div4" class="myDIV">
                <ul class="list-group">
                                <?php 
								foreach ($materials as $key => $material) {
                                    if(isset($_POST['material'])) {
                                        if(in_array($product->cleanString($material['material']),$_POST['material'])) {
                                            $materialCheck='checked="checked"';
										} else { 
											$materialCheck="";
										}
                                    }
                                ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($material['material']); ?>" <?php echo @$materialCheck?>  name="material[]" class="sort_rang material"><?php echo ucfirst($material['material']); ?></label></div>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="container mt-3" style="width: 100%; height: auto; border: 1px solid gray; padding: 6px;">
          <h5 id="size">Size</h5><div id="div5" class="myDIV">
                <ul class="list-group">
                                    <?php foreach ($productSizes as $key => $productSize) {
                                        if(isset($_POST['size'])){
                                            if(in_array($productSize['size'],$_POST['size'])) {
                                                $sizeCheck='checked="checked"';
                                            } else {
											                       	$sizeCheck="";
                                            }
                                        }
                                    ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?php echo $productSize['size']; ?>" <?php echo @$sizeCheck; ?>  name="size[]" class="sort_rang size"><?php echo $productSize['size']; ?></label></div>
                                        <?php } ?>
                                </ul>
                            </div>
                        </div>
                        </div>
                        </div>
                        
                        <section class="col-sm-10">
                        <div class="row1 row-2">
                            <div id="results">
                           
                            </div>

                        </div>
                    </section>
               
              
				<input type="hidden" id="totalRecords" value="<?php echo $totalRecords; ?>">        
                <div>  
            </form>
            
            <div>
        </div> 
           </div>
           </div>
           <hr>
           <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>

  <?php
  include('footer.php');
?>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="index.js"></script>

  <script type="text/javascript">
    function up(max) {
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
    
    if (document.getElementById("myNumber").value >= parseInt(max)) {
        document.getElementById("myNumber").value = max; 
    }
    document.getElementById("price").value = parseInt( document.getElementById("price").value )* 
                                             parseInt( document.getElementById("myNumber").value );
    document.getElementById("total").value = parseInt(document.getElementById("price").value) ;
    
}
function down(min) {
  
  document.getElementById("price").value = parseInt( document.getElementById("price").value ) / parseInt( document.getElementById("myNumber").value );
  document.getElementById("total").value = parseInt(document.getElementById("price").value) ;
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
  
   
    if (document.getElementById("myNumber").value <= parseInt(min)) {
        document.getElementById("myNumber").value = min;
      
    }
}
$(function(){
      $(".myDIV").hide(); // try to hide google navigation bar
   });
    $("#type").click(function(){
     $("#div1").toggle();
    });
    $("#categ").click(function(){
     $("#div2").toggle();
    });
    $("#sort").click(function(){
     $("#div3").toggle();
    });
    $("#material").click(function(){
     $("#div4").toggle();
    });
    $("#size").click(function(){
     $("#div5").toggle();
    });
    

$(document).ready(function() {
    var totalRecord = 0;
	var category = getCheckboxValues('category');
    var brand = getCheckboxValues('brand');
    var material = getCheckboxValues('material');
    var size = getCheckboxValues('size');
    var totalData = $("#totalRecords").val();
	var sorting = getCheckboxValues('sorting');
	$.ajax({
		type: 'POST',
		url : "load_products.php",
		dataType: "json",			
		data:{totalRecord:totalRecord, brand:brand, material:material, size:size, category:category, sorting:sorting},
		success: function (data) {
			$("#results").append(data.products);
			totalRecord++;
		}
	});	
    $(window).scroll(function() {
		scrollHeight = parseInt($(window).scrollTop() + $(window).height());		
        if(scrollHeight == $(document).height()){	
            if(totalRecord <= totalData){
                loading = true;
                $('.loader').show();                
				$.ajax({
					type: 'POST',
					url : "load_products.php",
					dataType: "json",			
					data:{totalRecord:totalRecord, brand:brand, material:material, size:size},
					success: function (data) {
						$("#results").append(data.products);
						$('.loader').hide();
						totalRecord++;
					}
				});
            }            
        }
    });
    function getCheckboxValues(checkboxClass){
        var values = new Array();
		$("."+checkboxClass+":checked").each(function() {
		   values.push($(this).val());
		});
        return values;
    }
    $('.sort_rang').change(function(){
        $("#search_form").submit();
        return false;
    });
	$(document).on('click', 'label', function() {
		if($('input:checkbox:checked')) {
			$('input:checkbox:checked', this).closest('label').addClass('active');
      $(".myDIV").show(); 
		}
    
	});	
});
</script>


  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  

</body>

</html>          
	
