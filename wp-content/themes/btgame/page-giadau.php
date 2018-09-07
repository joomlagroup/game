<form method="get" class="searchform" action="<?php echo home_url( '/'); ?>" >
 <select class="form-control" name="cat">
 <option value="">Toàn bộ</option>
 <?php
 $categories = get_the_category();
 foreach( $categories as $category ) {
 $option = '<option value="'.$category->cat_ID.'"';
 $option .= '>';
 $option .= '</option>';
 echo $option;
 }
 ?>
 </select>
 <input type="text" class="field s" name="s" value="<?php _e('Nhập từ khóa để tìm kiếm...', '') ?>" onfocus="if (this.value == '<?php _e('Nhập từ khóa để tìm kiếm...', '') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Nhập từ khóa để tìm kiếm...', '') ?>';}" />
 <input type="submit" class="search-submit btn" name="submit" value="Tìm kiếm" />
</form>