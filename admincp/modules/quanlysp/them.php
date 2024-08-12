

<div class="form">
<h2>Thêm sản phẩm</h2>
<div class="table">
 <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
	  <div class="input1">
	   <h3>Tên sản phẩm</h3>
	  <input type="text" name="tensanpham">
	</div>
	  
	<div class="input1">
	   <h3>Mã Sản Phẩm</h3>
	 <input type="text" name="masp">
	</div>

	<div class="input1">
	   <h3>Giá Sản Phẩm</h3>
	 <input type="text" name="giasp">
	</div>
	   
	<div class="input1">
	   <h3>Số lượng</h3>
	 <input type="text" name="soluong">
	</div>
	  
	<div class="input1">
	   <h3>Giảm Giá</h3>
	 <input type="text" name="sale">
	</div>

	<div class="input1">
	   <h3>Nơi Sản Xuất</h3>
	 <input type="text" name="sanxuat">
	</div>
	<div class="input1" >
	   <h3>Hình ảnh</h3>
	<div class="btn-ha">
	 <input type="file" name="hinhanh" id="actual-btn" hidden/>
	 <label for="actual-btn">Choose File</label>
     <span id="file-chosen">No file chosen</span>
	</div>
    
    </div>
	
	<!-- <div class="input1" >
	   <h3>Hình ảnh bổ trợ 1</h3>
	<div class="btn-ha">
	 <input type="file" name="hinhanh2" id="actual-btn2" hidden/>
	 <label for="actual-btn2">Choose File</label>
     <span id="file-chosen2">No file chosen</span>
	</div>
    
    </div>
	
	<div class="input1" >
	   <h3>Hình ảnh bổ trợ 2</h3>
	<div class="btn-ha">
	 <input type="file" name="hinhanh3" id="actual-btn3" hidden/>
	 <label for="actual-btn3">Choose File</label>
     <span id="file-chosen3">No file chosen</span>
	</div>
    
    </div>
	<div class="input1" >
	   <h3>Hình ảnh bổ trợ 3</h3>
	<div class="btn-ha">
	 <input type="file" name="hinhanh4" id="actual-btn4" hidden/>
	 <label for="actual-btn4">Choose File</label>
     <span id="file-chosen4">No file chosen</span>
	</div>
    
    </div>
	<div class="input1" >
	   <h3>Hình ảnh bổ trợ 4</h3>
	<div class="btn-ha">
	 <input type="file" name="hinhanh5" id="actual-btn5" hidden/>
	 <label for="actual-btn5">Choose File</label>
     <span id="file-chosen5">No file chosen</span>
	</div>
    
    </div>
	  -->
	  
	 <div class="input3">
	  	<h3>Tóm tắt</h3>
	  	<textarea rows="10"  name="tomtat" style="resize: none"></textarea>
	   </div>

	   <div class="input3">
	  	<h3>Nội Dung</h3>
	  	<textarea rows="10"  name="noidung" style="resize: none"></textarea>
	   </div>
	  
	  <div class="input1">
	    <h3>Danh mục sản phẩm</h3>
	    <div class="custom-select" style="width:200px;">
	    	<select name="danhmuc">
				<option value="0">Chọn Danh Mục</option>
	    		<?php
	    		$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
	    		$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	    		while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
	    		?>
	    		<option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
	    		<?php
	    		} 
	    		?>
	    	</select>
		</div>
	    </div>
	  </tr>
	  <tr>


	  <!-- <div class="input1">
	    <h3>Thương Hiệu</h3>
		<div class="custom-select" style="width:200px;">
	    
	    	<select name="band">
			<option value="0">Chọn Thương Hiệu</option>
	    		<?php
	    		$sql_band = "SELECT * FROM tbl_band ORDER BY id_band DESC";
	    		$query_band = mysqli_query($mysqli,$sql_band);
	    		while($row_band = mysqli_fetch_array($query_band)){
	    		?>
	    		<option value="<?php echo $row_band['id_band'] ?>"><?php echo $row_band['tenband'] ?></option>
	    		<?php
	    		} 
	    		?>
	    	</select>
		</div>
	    </div> -->

		
	  
		  <div class="input1">
	    <h3>Tình trạng</h3>
	    <div class="custom-select" style="width:200px;">
	    	<select name="tinhtrang">
			    <option value="123">Chọn Trạng Thái</option>
	    		<option value="1">Kích hoạt</option>
	    		<option value="0">Ẩn</option>
	    	</select>
	    </div>
	 
	</div>
	   <div class="input2" > 
	<input type="submit" name="themsanpham" value="Thêm sản phẩm"></div>
	  
 </form>
</div>
</div>





















<script>
	const actualBtn = document.getElementById('actual-btn');

const fileChosen = document.getElementById('file-chosen');

actualBtn.addEventListener('change', function(){
  fileChosen.textContent = this.files[0].name
})


const actualBtn2 = document.getElementById('actual-btn2');

const fileChosen2 = document.getElementById('file-chosen2');

actualBtn2.addEventListener('change', function(){
  fileChosen2.textContent = this.files[0].name
})


const actualBtn3 = document.getElementById('actual-btn3');

const fileChosen3 = document.getElementById('file-chosen3');

actualBtn3.addEventListener('change', function(){
  fileChosen3.textContent = this.files[0].name
})

const actualBtn4 = document.getElementById('actual-btn4');

const fileChosen4 = document.getElementById('file-chosen4');

actualBtn4.addEventListener('change', function(){
  fileChosen4.textContent = this.files[0].name
})

const actualBtn5 = document.getElementById('actual-btn5');

const fileChosen5 = document.getElementById('file-chosen5');

actualBtn5.addEventListener('change', function(){
  fileChosen5.textContent = this.files[0].name
})
</script>

<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>